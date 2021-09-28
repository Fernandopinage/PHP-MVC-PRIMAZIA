<?php

include_once "../../class/ClassServico.php";
include_once "../../dao/DAO.php";


class ServicoDao extends Dao{

    public function inserServico($ClassServico){

        
        $sql = "INSERT INTO `servico`(`servico_id`, `servico_status`, `servico_protocolo`, `servico_profissional`, `servico_data`) VALUES (null, :servico_status, :servico_protocolo, :servico_profissional, :servico_data)";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(':servico_status',$ClassServico->GetStatus());
        $insert->bindValue(':servico_protocolo',$ClassServico->GetProtocolo());
        $insert->bindValue(':servico_profissional',$ClassServico->GetNome());
        $insert->bindValue(':servico_data',$ClassServico->GetData());
        
        
        
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
                    text:'Foi atentido com sucesso!',
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
                    text:'Por favor verifique com os administradores!',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>


        <?php

           }
                   

        } catch (\Throwable $th) {
           

        }
        

    }

    public function finalizarServico($ClassServico){

        $sql = "UPDATE `pedido` SET pedido_status=:pedido_status WHERE pedido_protocolo=:pedido_protocolo";
        $update = $this->con->prepare($sql);
        $update->bindValue(':pedido_status','F');
        $update->bindValue(':pedido_protocolo',$ClassServico->GetProtocolo());
        
        
        try {
            
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