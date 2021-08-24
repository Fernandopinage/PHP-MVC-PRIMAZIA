<?php

include_once "../../class/ClassPequenosReparos.php";
include_once "../../dao/DAO.php";


class PequenosReparos extends DAO{


    public function insertReparos($ClassReparos){

      $sql = "INSERT INTO `pedido`(`pedido_id`, `pedido_nome`, `pedido_telefone`, `pedido_email`, `pedido_cpf`, `pedido_cep`, `pedido_data`, `pedido_descricao`) VALUES (null, :pedido_nome, :pedido_telefone, :pedido_email, :pedido_cpf, :pedido_cep, :pedido_data, :pedido_descricao)";
      $insert = $this->con->prepare($sql);
      $insert->bindValue(':pedido_nome',$ClassReparos->GetNome());
      $insert->bindValue(':pedido_telefone',$ClassReparos->GetTelefone());
      $insert->bindValue(':pedido_email',$ClassReparos->GetEmail());
      $insert->bindValue(':pedido_cpf',$ClassReparos->GetCpf());
      $insert->bindValue(':pedido_cep',$ClassReparos->GetCep());
      $insert->bindValue(':pedido_data', date('Y-m-d'));
      $insert->bindValue(':pedido_descricao',json_encode($ClassReparos->GetDescricao()));
      
      try {
        $insert->execute();

        ?>

        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Parabéns',
                text:'Pedido Realizado Com Sucesso',
                showConfirmButton: false,
                timer: 3500
            })
        </script>


    <?php
        
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
}