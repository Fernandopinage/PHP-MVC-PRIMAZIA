<?php 


class PequenoReparo{

    private $servico;
    private $descricao;


    public function SetServico($servico){

        $this->servico = $servico;
    }

    public function GetServico(){
        return $this->servico;
    }

    public function SetDescricao($descricao){

        $this->descricao = $descricao;
    }

    public function GetSDescricao(){
        return $this->descricao;
    }
}


?>