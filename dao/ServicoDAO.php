<?php

include_once "../../class/ClassServico.php";
include_once "../../dao/DAO.php";


class ServicoDao extends Dao{

    public function inserServico($ClassServico){

        
        $email = explode("-",$ClassServico->GetNome());
        @$email = explode(" ",$email[3]);
        
        
        $query = "SELECT * FROM `profissional` WHERE profissional_email = :profissional_email";
        $select = $this->con->prepare($query);
        @$select->bindValue(':profissional_email',$email[1]);
        $select->execute();

        if($row = $select->fetch(PDO::FETCH_ASSOC)){
           $id =  $row['profissional_id'];
        }


        $sql = "INSERT INTO `servico`(`servico_id`, `servico_status`, `servico_protocolo`, `servico_profissional`, `servico_data` , `servico_idprofissional`, `servico_pagamento`, `servico_text`) VALUES (null, :servico_status, :servico_protocolo, :servico_profissional, :servico_data, :servico_idprofissional, :servico_pagamento, :servico_text)";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(':servico_status', 'E');
        $insert->bindValue(':servico_protocolo',$ClassServico->GetProtocolo());
        $insert->bindValue(':servico_profissional',$ClassServico->GetNome());
        $insert->bindValue(':servico_data',$ClassServico->GetData());
        $insert->bindValue(':servico_pagamento',$ClassServico->GetPagamento());
        $insert->bindValue(':servico_text',$ClassServico->GetText());
        @$insert->bindValue(':servico_idprofissional',$id);
        
        
        
        
        try {
            $insert->execute();
            $sql2 = "UPDATE `pedido` SET pedido_status=:pedido_status WHERE pedido_id=:pedido_id";
            $update = $this->con->prepare($sql2);
            $update->bindValue(':pedido_status', 'E');
            $update->bindValue(':pedido_id', $ClassServico->GetId());
            
            try {
               $update->execute();
            ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'O Pedido',
                    text:'Foi atendido  com sucesso!',
                    showConfirmButton: false,         
                    timer: 3500   
                })
            </script>

                
         <?php

            header('Refresh: 3.4; url=../admin/pedidos.php');

           } catch (\Throwable $th) {
            ?>

        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Erro',
                text: 'Não foi selecionado nenhum profissional!',
                showConfirmButton: false,
                timer: 3500
            })
        </script>


        <?php

           }
                   

        } catch (\Throwable $th) {
           
              

            ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Erro',
                    text:'Não foi selecionado nenhum profissional!',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>


        <?php

        }
        
       
            
    }

    public function finalizarServico($ClassServico){

        $sql = "UPDATE `pedido` SET pedido_status=:pedido_status WHERE pedido_protocolo=:pedido_protocolo";
        $update = $this->con->prepare($sql);
        $update->bindValue(':pedido_status','F');
        $update->bindValue(':pedido_protocolo',$ClassServico->GetProtocolo());
        
        
        try {
            
            $update->execute();

            $query = "UPDATE `servico` SET `servico_status`=:servico_status where servico_protocolo =:servico_protocolo " ;
            $update = $this->con->prepare($query);
            $update->bindValue(':servico_protocolo',$ClassServico->GetProtocolo());
            $update->bindValue(':servico_status','F');
            $update->execute();
            ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Serviço',
                    text:'Foi finalizado com sucesso!',
                    showConfirmButton: false,         
                    timer: 3500   
                })
            </script>


        <?php
        header('Refresh: 3.4; url=../admin/pedidos.php');


        } catch (\Throwable $th) {
            //throw $th;
        }


    }

}

?>