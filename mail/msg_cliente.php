<?php
include_once  "../../class/ClassCliente.php";
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

    public function __mensagem($ClassCliente){

        /*
        echo "<pre>";
        var_dump($ClassCliente->GetNome());
        echo "</pre>";
        */
        
        $mail = new PHPMailer(true); // STOP
        
        try {
            
                       
            //Server settings
            //$mail->SMTPDebug = 1;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'primaziateste2021@gmail.com';                     //SMTP username
            $mail->Password   = 'pr0gr!d@2021';                         //SMTP password
            $mail->SMTPSecure = 'SSL';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('primaziateste2021@gmail.com', 'G2S - GoToService');

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->CharSet = 'utf-8';
            $mail->Subject = 'ATUALIZANDO PERFIL - '.$ClassCliente->GetNome();
            $mail->addAddress($ClassCliente->GetEmail(), 'G2S - GoToService');
            $mail->Body    = '

                                <p><h2>Olá, '.$ClassCliente->GetNome().'</h2><p><br><br>
                                <p>Identificamos que você fez uma atualização em seu perfil G2S – GoToService, caso não tenha feito esta alteração, por favor entre em contato com nossos administradores.</p><br><br>
                               
                            
                                    <b>Central de Ajuda, G2S GoToService.</b>
                            ';
                                
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';

        } catch (\Throwable $th) {
            //throw $th;
        }
     

    }


}

?>