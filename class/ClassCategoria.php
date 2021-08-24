<?php 


class Categoria{

    private $nome;
    private $telefone;
    private $email;
    private $cpf;
    private $cep;
    private $descricao;


    public function SetNome($nome){

        $this->nome = $nome;
    }

    public function GetNome(){
        return $this->nome;
    }

    public function SetTelefone($telefone){

        $this->telefone = $telefone;
    }

    public function GetTelefone(){
        return $this->telefone;
    }

    public function SetEmail($email){

        $this->email = $email;
    }

    public function GetEmail(){
        return $this->email;
    }

    public function SetCpf($cpf){

        $this->cpf = $cpf;
    }

    public function GetCpf(){
        return $this->cpf;
    }

    public function SetCep($cep){

        $this->cep = $cep;
    }

    public function GetCep(){
        return $this->cep;
    }

    public function SetDescricao($descricao){

        $this->descricao = $descricao;
    }

    public function GetDescricao(){
        return $this->descricao;
    }

}


?>