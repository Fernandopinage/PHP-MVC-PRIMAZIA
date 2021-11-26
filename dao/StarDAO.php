<?php
include_once "../../layout/heard.php";
include_once "../../class/ClassStar.php";
include_once "../../dao/DAO.php";


class StarDAO extends Dao{



    public function insertStar(){


        $sql = "INSERT INTO `star`(`star_id`, `star_cli_id`, `star_pro_id`, `star_status_cli`, `star_status_pro`, `star_nota_cli`, `star_nota_pro`)
         VALUES (null, :star_cli_id, :star_pro_id, :star_status_cli, :star_status_pro, :star_nota_cli, :star_nota_pro)";
        $select = $this->con->prepare();
        $select->bindValue(':star_cli_id',);
        $select->bindValue(':star_pro_id',);
        $select->bindValue(':star_status_cli',);
        $select->bindValue(':star_status_pro',);
        $select->bindValue(':star_nota_cli',);
        $select->bindValue(':star_nota_pro',);
        $select->execute();

    }

    public function selectProfissional($email){

        $sql = "SELECT * FROM `profissional` WHERE profissional_email ='".$email."'";
        $select = $this->con->prepare($sql);
      
        $select->execute();

        $array = array();

        if ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            

            $array = array(

                'id' => $row['profissional_id'],
                'nome' => $row['profissional_nome'],
                'opt' => $row['profissional_option'],
                'razao' => $row['profissional_razao'],
                'email' => $row['profissional_email'],
                'cpf' => $row['profissional_cpf'],
                'telefone' => $row['profissional_telefone'],
                'cep' => $row['profissional_cep'],
                'uf' => $row['profissional_uf'],
                'rua' => $row['profissional_logradouro'],
                'numero' => $row['profissional_num'],
                'cidade' => $row['profissional_cidade'],
                'bairro' => $row['profissional_bairro'],
                'complemento' => $row['profissional_complemento'],
                'foto' => $row['profissional_foto'],
                'senha' => $row['profissional_senha'],
                'servico' => $row['profissional_servico'],
                'termo' => $row['profissional_termo'],
                'sexo' => $row['profissional_sexo'],
                'nascimento' => $row['profissional_nascimento']
            );
        }

        return $array; 
    }

    public function selectCliente($email){

        $sql = "SELECT * FROM `cliente` WHERE CLIENTE_EMAIL ='".$email."'";
        $select = $this->con->prepare($sql);
      
        $select->execute();

        $array = array();

        if ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            

            $array = array(

                    'id' => $row['CLIENTE_ID'],
                    'nome' => $row['CLIENTE_NOME'],
                    'email' => $row['CLIENTE_EMAIL'],
                    'cpf' => $row['CLIENTE_CPF'],
                    'telefone' => $row['CLIENTE_TELEFONE'],
                    'cep' => $row['CLIENTE_CEP'],
                    'uf' => $row['CLIENTE_UF'],
                    'rua' => $row['CLIENTE_LOGRADOURO'],
                    'numero' => $row['CLIENTE_NUM'],
                    'cidade' => $row['CLIENTE_CIDADE'],
                    'bairro' => $row['CLIENTE_BAIRRO'],
                    'complemento' => $row['CLIENTE_COMPLEMENTO'],
                    'foto' => $row['CLIENTE_FOTO'],
                    'sexo' => $row['CLIENTE_SEXO'],
                    'termo' => $row['CLIENTE_TERMO'],
                    'nascimento' => $row['CLIENTE_NASCIMENTO']
            );
        }

        return $array; 

    }


    public  function updateStarCancel($profissional, $protocolo, $status, $valo)
    {
     
        $sql = "UPDATE `star` SET star_status_cli = '$status' , star_nota_pro = $valo  WHERE star_protocolo = '$protocolo' and star_pro_email = '$profissional' ";
        $update = $this->con->prepare($sql);
        $update->execute();

        $query = "SELECT * FROM `star` WHERE star_cli_email =:star_cli_email and 	star_status_cli = 'of'";
        $select = $this->con->prepare($query);
        $select->bindValue(':star_cli_email', 'luiz.c@progride.com.br');
        $select->execute();

        if($row = $select->fetch(PDO::FETCH_ASSOC)){
           @session_start();
            $_SESSION['star']  = array(

                'cliente' => $row['star_cli_email'],
                'profissional' => $row['star_pro_email'],
                'cliente_status' => $row['star_status_cli'],
                'profissional_status' => $row['star_status_pro'],
                'cliente_note' => $row['star_nota_cli'],
                'profissional_note' => $row['star_nota_pro'],
                'protocolo' => $row['star_protocolo'],


            );

            ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Profissional avaliado com sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>
            <?php

                header('Refresh: 3.5; url=../cliente/avaliar.php');
            //header('location: ../../view/cliente/avaliar.php');

        }else{

            ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Profissional avaliado com sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>
            <?php

           // header('location: ../../view/cliente/painel.php');
            header('Refresh: 3.5; url=../cliente/painel.php');
        }

    }

    public  function updateStarCliente($cliente, $protocolo, $status, $valo)
    {
     
        $sql = "UPDATE `star` SET star_status_pro = '$status' , star_nota_cli = $valo  WHERE star_protocolo = '$protocolo' and star_cli_email = '$cliente' ";
        $update = $this->con->prepare($sql);
        $update->execute();

        $query = "SELECT * FROM `star` WHERE star_pro_email =:star_pro_email and star_status_pro = 'of'";
        $select = $this->con->prepare($query);
        $select->bindValue(':star_pro_email', 'luizfernandoluck@hotmail.com');
        $select->execute();

        if($row = $select->fetch(PDO::FETCH_ASSOC)){
            @session_start();
             $_SESSION['star']  = array(
 
                 'cliente' => $row['star_cli_email'],
                 'profissional' => $row['star_pro_email'],
                 'cliente_status' => $row['star_status_cli'],
                 'profissional_status' => $row['star_status_pro'],
                 'cliente_note' => $row['star_nota_cli'],
                 'profissional_note' => $row['star_nota_pro'],
                 'protocolo' => $row['star_protocolo'],
 
 
             );
 
             ?>
 
             <script>
                 Swal.fire({
                     position: 'center',
                     icon: 'success',
                     title: 'Cliente avaliado com sucesso',
                     showConfirmButton: false,
                     timer: 3500
                 })
             </script>
             <?php
 
                 header('Refresh: 3.5; url=../cliente/avaliar.php');
             //header('location: ../../view/cliente/avaliar.php');
 
         }else{
 
             ?>
 
             <script>
                 Swal.fire({
                     position: 'center',
                     icon: 'success',
                     title: 'Cliente avaliado com sucesso',
                     showConfirmButton: false,
                     timer: 3500
                 })
             </script>
             <?php
 
            // header('location: ../../view/cliente/painel.php');
             header('Refresh: 3.5; url=../profissional/painel.php');
         }


        //header('location: ../../view/profissional/painel.php');
    }


}
