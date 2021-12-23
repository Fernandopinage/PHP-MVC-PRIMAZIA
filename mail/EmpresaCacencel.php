<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require "../../vendor/autoload.php";

//Create an instance; passing `true` enables exceptions

class AtendimentoCanceladoEmpresa
{

    public static function CanceladoEmpresa($email,$nome){

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
            $mail->addAddress('luiz.c@progride.com.br', 'CANCELAMENTO');     //Add a recipient primaziateste2021@gmail.com
            //$mail->addAddress('ellen@example.com');               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->CharSet = 'utf-8';
            $mail->Subject = 'SERVIÇO FINALIZADO';

            $mail->Body    = '

                                <p><h2>Olá, o cliente '.$nome.' com o e-mail <b>'.$email.'</b></h2><p><br><br>
                                <p>Realizou um CANCELAMENTO do seu pedido!
                                </p><br><br>
                                ';
                                



            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';

       } catch (\Throwable $th) {
          echo $th;
       }
       
    }


}