<?php 

class Protocolo{

    public static function gerarProtocolo(){

        $data  =  date(' hisdmy');

        $random =   random_int(1111,9999);

      return $random."".$data;

    }
}
