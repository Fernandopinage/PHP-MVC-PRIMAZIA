<?php

require_once __DIR__."../../mail/Mail.php";
include_once "../../class/ClassCategoria.php";
include_once "../../dao/DAO.php";


class CategoriaDAO extends DAO{


    public function insertReparos($ClassRequest){
      
     
      $sql = "INSERT INTO `pedido`(`pedido_id`, `pedido_nome`, `pedido_telefone`, `pedido_email`, `pedido_cpf`, `pedido_cep`, `pedido_data`, `pedido_descricao`) VALUES (null, :pedido_nome, :pedido_telefone, :pedido_email, :pedido_cpf, :pedido_cep, :pedido_data, :pedido_descricao)";
      $insert = $this->con->prepare($sql);
      $insert->bindValue(':pedido_nome',$ClassRequest->GetNome());
      $insert->bindValue(':pedido_telefone',$ClassRequest->GetTelefone());
      $insert->bindValue(':pedido_email',$ClassRequest->GetEmail());
      $insert->bindValue(':pedido_cpf',$ClassRequest->GetCpf());
      $insert->bindValue(':pedido_cep',$ClassRequest->GetCep());
      $insert->bindValue(':pedido_data', date('Y-m-d h:i:s A'));
      $insert->bindValue(':pedido_descricao',json_encode($ClassRequest->GetDescricao(),JSON_UNESCAPED_UNICODE));
      

      $nome = $ClassRequest->GetNome();
      $email = $ClassRequest->GetEmail();
      $pedido = $ClassRequest->GetDescricao();
      $telefone = $ClassRequest->GetTelefone();
      $data = date('Y-m-d h:i:s A');

    
      
      
      $MAIL = new Mail();
      $MAIL->Envio($nome,$email,$pedido,$telefone,$data);

      try {
        $insert->execute();

        ?>

        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Parabéns',
                text:'Pedido Realizado Com Sucesso'+' Em breve estaremos entrando em contato'+' Horário da central de atendimento das 08:00 ás 18:00 hs',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
            })
        </script>


    <?php

        header('Refresh: 4.0; url=painel.php');

      } catch (PDOException $e) {
        ?>

        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Falha',
                text:'Ao Realizar O Pedido',
                showConfirmButton: false,
                timer: 3500
            })
        </script>



    <?php
      }
      
      
    }

    public function pedidos(){
        
        $sql = "SELECT * FROM `pedido`";
        $select = $this->con->prepare($sql);
        $select->execute();
      
        $array = array();

        while($row = $select->fetch(PDO::FETCH_ASSOC)){

          
            $array[] = array(

                'data' => $row['pedido_data'],
                'pedido' => json_decode($row['pedido_descricao'])
            );
           
           

        }

        return $array;

    }
}