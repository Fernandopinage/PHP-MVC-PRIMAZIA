<?php 


class Categoria{

    private $nome;
    private $telefone;
    private $email;
    private $cpf;
    private $cep;
    private $uf;
    private $logradouro;
    private $cidade;
    private $bairro;
    private $complemento;
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
    public function SetUf($uf){

        $this->uf = $uf;
    }

    public function GetUF(){
        return $this->uf;
    }

    public function SetLogradouro($logradouro){

        $this->logradouro = $logradouro;
    }

    public function GetLogradouro(){
        return $this->logradouro;
    }

    public function SetCidade($cidade){

        $this->cidade = $cidade;
    }

    public function GetCidade(){
        return $this->cidade;
    }
    
    
    public function SetBairro($bairro){

        $this->bairro = $bairro;
    }

    public function GetBairro(){
        return $this->bairro;
    }

    public function SetComplemento($complemento){

        $this->complemento = $complemento;
    }

    public function GetComplemento(){
        return $this->complemento;
    }

}


?>