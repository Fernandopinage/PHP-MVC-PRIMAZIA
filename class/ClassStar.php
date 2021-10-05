<?php 


class Start{

    private $id;
    private $id_cli;
    private $id_pro;
    private $stt_cli;
    private $stt_pro;
    private $nota_cli;
    private $nota_pro;


    public function getID()
    {
        return $this->id;
    }

    public function setID($id)
    {
       $this->id = $id;
    }

    
    public function getIdCli()
    {
        return $this->id_cli;
    }

    public function setIdCli($id_cli)
    {
       $this->id_cli = $id_cli;
    }

    public function getIdPro()
    {
        return $this->id_pro;
    }

    public function setIdPro($id_pro)
    {
       $this->id_pro = $id_pro;
    }

    public function getSttusCli()
    {
        return $this->stt_cli;
    }

    public function setSttusCli($stt_cli)
    {
       $this->stt_cli = $stt_cli;
    }

    public function getSttusPro()
    {
        return $this->stt_pro;
    }

    public function setSttusPro($stt_pro)
    {
       $this->stt_pro = $stt_pro;
    }

    public function getNotaCli()
    {
        return $this->nota_cli;
    }

    public function setNotaCli($nota_cli)
    {
       $this->nota_cli = $nota_cli;
    }

    public function getNotaPro()
    {
        return $this->nota_pro;
    }

    public function setNotaPro($nota_pro)
    {
       $this->nota_pro = $nota_pro;
    }


}




?>