<?php


class Cliente{

private $id;
private $nome;
private $email;
private $cpf;
private $telefone;
private $cep;
private $uf;
private $logradouro;
private $cidade;
private $bairro;
private $complemento;
private $foto;
private $senha;


    public function SetId($id){

        $this->id = $id;
    }

    public function GetId(){

      return $this->id;
    }

    public function SetNome($nome){
        $this->nome = $nome;

    }
    public function GetNome(){
        return $this->nome;
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

    public function SetTelefone($telefone){
        $this->telefone = $telefone;

    }
    public function GetTelefone(){
        return $this->telefone;
    }

    public function SetCep($cep){
        $this->cep = $cep;

    }
    public function GetCep(){
        return $this->cep;
    }

    public function SetBairro($bairro){
        $this->bairro = $bairro;

    }
    public function GetBairro(){
        return $this->bairro;
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

    public function SetComplemento($complemento){
        $this->complemento = $complemento;

    }
    public function GetComplemento(){
        return $this->complemento;
    }

    public function SetUf($uf){
        $this->uf = $uf;

    }
    public function GetUf(){
        return $this->uf;
    }

    public function SetFoto($foto){
        $this->foto = $foto;

    }
    public function GetFoto(){
        return $this->foto;
    }

    public function SetSenha($senha){
        $this->senha = $senha;

    }
    public function GetSenha(){
        return $this->senha;
    }

}