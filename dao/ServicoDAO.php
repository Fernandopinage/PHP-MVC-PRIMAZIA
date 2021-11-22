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


        $sql = "INSERT INTO `servico`(`servico_id`, `servico_status`, `servico_protocolo`, `servico_profissional`, `servico_data` , `servico_idprofissional`, `servico_pagamento`, `servico_text`, `servico_valor`) VALUES (null, :servico_status, :servico_protocolo, :servico_profissional, :servico_data, :servico_idprofissional, :servico_pagamento, :servico_text, :servico_valor)";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(':servico_status', 'E');
        $insert->bindValue(':servico_protocolo',$ClassServico->GetProtocolo());
        $insert->bindValue(':servico_profissional',$ClassServico->GetNome());
        $insert->bindValue(':servico_data',$ClassServico->GetData());
        $insert->bindValue(':servico_pagamento',$ClassServico->GetPagamento());
        $insert->bindValue(':servico_text',$ClassServico->GetText());
        $insert->bindValue(':servico_valor',$ClassServico->GetValor());
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

    
        $nome =  $ClassServico->GetNome();
        $nome = explode('-',$nome);
        $Email_Pro = $nome[3];

        $query = "SELECT * FROM `pedido` inner JOIN servico on servico_protocolo = pedido_protocolo WHERE pedido_protocolo =:pedido_protocolo";
        $select = $this->con->prepare($query);
        $select->bindValue(':pedido_protocolo',$ClassServico->GetProtocolo());
        $select->execute();

        $log = array();

        if($row = $select->fetch(PDO::FETCH_ASSOC)){
           
            $log = array(

                'Email_CLi' => $row['pedido_email'],
                'Email_Pro' => $Email_Pro,
                'protocolo' => $row['pedido_protocolo']
            );

            $queryinsert = "INSERT INTO `star`(`star_id`, `star_cli_email`, `star_pro_email`, `star_status_cli`, `star_status_pro`, `star_nota_cli`, `star_nota_pro`,`star_protocolo`) VALUES (null, '".$log['Email_CLi']."', '".$log['Email_Pro']."', 'of', 'of', 0, 0,'".$log['protocolo']."')";
            $select1 = $this->con->prepare($queryinsert);
            $select1->execute();

        }
        /*
     
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
        */

    }

}

?>