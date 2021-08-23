<?php

include_once "../../class/ClassCliente.php";
include_once "../../dao/DAO.php";

class ClienteDAO extends DAO{



    public function insertCliente($ClassCliente){

        $sql = "INSERT INTO `cliente`(`CLIENTE_ID`, `CLIENTE_NOME`, `CLIENTE_CPF`, `CLIENTE_EMAIL`, `CLIENTE_TELEFONE`, `CLIENTE_CEP`, `CLIENTE_FOTO`) VALUES (null, :CLIENTE_NOME, :CLIENTE_CPF, :CLIENTE_EMAIL, :CLIENTE_TELEFONE, :CLIENTE_CEP, :CLIENTE_FOTO)";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(':CLIENTE_NOME',$ClassCliente->GetNome());
        $insert->bindValue(':CLIENTE_CPF',$ClassCliente->GetCpf());
        $insert->bindValue(':CLIENTE_EMAIL',$ClassCliente->GetEmail());
        $insert->bindValue(':CLIENTE_TELEFONE',$ClassCliente->GetTelefone());
        $insert->bindValue(':CLIENTE_CEP',$ClassCliente->GetCep());
        $insert->bindValue(':CLIENTE_FOTO','');
        $insert->execute();

    }


}



?>