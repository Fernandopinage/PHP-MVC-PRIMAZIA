<?php

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

        $email = explode(" ",$email);
  

        $sql = "SELECT * FROM `profissional` WHERE profissional_email ='".$email[1]."'";
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

    public  function updateStarCancel($profissional, $protocolo, $status, $valo)
    {
     
        $sql = "UPDATE `star` SET star_status_cli = '$status' , star_nota_cli = $valo  WHERE star_protocolo = '$protocolo' and star_pro_email = '$profissional' ";
        $update = $this->con->prepare($sql);
        $update->execute();

        header('location: ../../view/cliente/painel.php');
    }


}
