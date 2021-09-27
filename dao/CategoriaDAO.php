<?php

require_once __DIR__."../../mail/Mail.php";
include_once "../../class/ClassCategoria.php";
include_once "../../dao/DAO.php";


class CategoriaDAO extends DAO{


    public function insertReparos($ClassRequest){
      
     
      $sql = "INSERT INTO `pedido`(`pedido_id`, `pedido_nome`, `pedido_telefone`, `pedido_email`, `pedido_cpf`, `pedido_cep`, `pedido_data`, `pedido_descricao`, `pedido_uf`, `pedido_cidade`, `pedido_logradouro`, `pedido_bairro`, `pedido_complemento`, `pedido_protocolo`, `pedido_numero`, `pedido_status`) 
      VALUES (null, :pedido_nome, :pedido_telefone, :pedido_email, :pedido_cpf, :pedido_cep, :pedido_data, :pedido_descricao, :pedido_uf, :pedido_cidade, :pedido_logradouro, :pedido_bairro, :pedido_complemento, :pedido_protocolo, :pedido_numero, :pedido_status)";
      $insert = $this->con->prepare($sql);
      $insert->bindValue(':pedido_nome',$ClassRequest->GetNome());
      $insert->bindValue(':pedido_telefone',$ClassRequest->GetTelefone());
      $insert->bindValue(':pedido_email',$ClassRequest->GetEmail());
      $insert->bindValue(':pedido_cpf',$ClassRequest->GetCpf());
      $insert->bindValue(':pedido_cep',$ClassRequest->GetCep());
      $insert->bindValue(':pedido_data', date('Y-m-d h:i:s A'));
      $insert->bindValue(':pedido_descricao',json_encode($ClassRequest->GetDescricao(),JSON_UNESCAPED_UNICODE));
      $insert->bindValue(':pedido_uf',$ClassRequest->GetUf());
      $insert->bindValue(':pedido_cidade',$ClassRequest->GetCidade());
      $insert->bindValue(':pedido_logradouro',$ClassRequest->GetLogradouro());
      $insert->bindValue(':pedido_bairro',$ClassRequest->GetBairro());
      $insert->bindValue(':pedido_complemento',$ClassRequest->GetComplemento());
      $insert->bindValue(':pedido_protocolo',$ClassRequest->GetProtocolo());
      $insert->bindValue(':pedido_numero',$ClassRequest->GetNumero());
      $insert->bindValue(':pedido_status', 'A');

      
      $cidade = $ClassRequest->GetCidade();
      $rua = $ClassRequest->GetLogradouro();
      $bairro = $ClassRequest->GetBairro();
      $numero = $ClassRequest->GetNumero();
      $complemento = $ClassRequest->GetComplemento();
      $nome = $ClassRequest->GetNome();
      $email = $ClassRequest->GetEmail();
      $pedido = $ClassRequest->GetDescricao();
      $telefone = $ClassRequest->GetTelefone();
      $protodolo = $ClassRequest->GetProtocolo();
      $data = date('Y-m-d');

      
      $MAIL = new Mail();
      $MAIL->Envio($nome,$email,$pedido,$telefone,$protodolo,$data,$cidade,$rua,$bairro,$complemento,$numero);

      try {
        $insert->execute();

        ?>

        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Parabéns',
                html:'O seu Pedido G2S Foi Realizado Com Sucesso'+'<br>'+' Em breve estaremos entrando em contato'+'<br>'+' Horário da central de atendimento das 08:00 ás 18:00 hs',
                showConfirmButton: false,
                timer: 7000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
            })
        </script>

    <?php

        //header('Refresh: 5.0; url=painel.php');

      } catch (PDOException $e) {
          echo $e->getMessage();
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

                'id' => $row['pedido_id'],
                'nome' => $row['pedido_nome'],
                'telefone' => $row['pedido_telefone'],
                'email' => $row['pedido_email'],
                'cpf' => $row['pedido_cpf'],
                'cep' => $row['pedido_cep'],
                'data' => $row['pedido_data'],
                'descricao' => json_decode($row['pedido_descricao']),
                'uf' => $row['pedido_uf'],
                'cidade' => $row['pedido_cidade'],
                'logradouro' => $row['pedido_logradouro'],
                'bairro' => $row['pedido_bairro'],
                'complemento' => $row['pedido_complemento'],
                'protocolo' => $row['pedido_protocolo'],
                'numero' => $row['pedido_numero'],
                'status' =>$row['pedido_status']
            );
           
           

        }

        return $array;

    }


    public  function PedidosProfissionais($categoria,$bairro){

        $sql = "SELECT * FROM `profissional` WHERE profissional_servico = :profissional_servico";
        $select = $this->con->prepare($sql);
        $select->bindValue(':profissional_servico',$categoria);
        $select->execute();

        if($select->fetch(PDO::FETCH_ASSOC)){
            echo "sim"; 
        }else{
            echo "nao";
        }


    }

    public function cliente($id){

        $sql = "SELECT * FROM `cliente` WHERE CLIENTE_CPF =:CLIENTE_CPF";
        $select = $this->con->prepare($sql);
        $select->bindValue(':CLIENTE_CPF',$id);
        $select->execute();
        $array = array();

        if($row = $select->fetch(PDO::FETCH_ASSOC)){

            $array = array(

                'nome' => $row['CLIENTE_NOME'],
                'foto' => $row['CLIENTE_FOTO'],
                'telefone' => $row['CLIENTE_TELEFONE'],
                'cep' => $row['CLIENTE_CEP'],
                'uf' => $row['CLIENTE_UF'],
                'bairro' => $row['CLIENTE_BAIRRO'],
                'complemento' => $row['CLIENTE_COMPLEMENTO'],
                'numero' => $row['CLIENTE_NUM'],
                'logradouro' => $row['CLIENTE_LOGRADOURO']
            );

        }else{
            echo "não";

        }

        return $array;

    }

    public function clientePedido($id,$protocolo){

        $sql = "SELECT * FROM `pedido` WHERE pedido_protocolo = :pedido_protocolo and 	pedido_cpf = :pedido_cpf";
        $select = $this->con->prepare($sql);
        $select->bindValue(':pedido_protocolo',$id);
        $select->bindValue(':pedido_cpf',$protocolo);
        $select->execute();
        $array = array();

        if($row = $select->fetch(PDO::FETCH_ASSOC)){

            $array = array(

                'data' => $row['pedido_data'],
                'descrição' => $row['pedido_descricao'],
    
            );

        }else{

            $array = 'Nenhum pedido';
        }
        return $array;

    }
}