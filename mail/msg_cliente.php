<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require "../../vendor/autoload.php";

//Create an instance; passing `true` enables exceptions

class ClienteMSG
{

    public function __mensagem(){

        $mail = new PHPMailer(true); // STOP
        
        try {
            
         
        } catch (\Throwable $th) {
            //throw $th;
        }

    }


}

?>