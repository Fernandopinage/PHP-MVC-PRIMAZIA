<?php 

class Admin{

    private $id;
    private $descricao;
    private $cnpj;



    public function SetId($id){

        $this->id = $id;
    }

    public function GetId(){

      return $this->id;
    }
    
    public function SetDescricao($descricao){

        $this->descricao = $descricao;
    }

    public function GetDescricao(){

      return $this->descricao;
    }
    
    public function SetCnpj($cnpj){

        $this->cnpj = $cnpj;
    }

    public function GetCnpj(){

      return $this->cnpj;
    }

    
}
?>