<?php 


class Servico{

    private $id;
    private $nome;
    private $status;
    private $protocolo;
    private $data;


    private $pagamento;

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

    public function SetStatus($status){

        $this->status = $status;
    }

    public function GetStatus(){
        return $this->status;
    }

    public function SetProtocolo($protocolo){

        $this->protocolo = $protocolo;
    }

    public function GetProtocolo(){
        return $this->protocolo;
    }

    public function SetData($data){

        $this->data = $data;
    }

    public function GetData(){
        return $this->data;
    }

    public function SetPagamento($pagamento){

        $this->pagamento = $pagamento;
    }

    public function GetPagamento(){
        return $this->pagamento;
    }
}

?>