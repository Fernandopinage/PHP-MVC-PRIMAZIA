<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require "../../vendor/autoload.php";
include_once "../../dao/CategoriaDAO.php";
include_once "../../dao/Subcategoria.php";

//Create an instance; passing `true` enables exceptions

class Mail
{

    public function Envio($nome, $email, $pedido, $telefone, $protodolo, $data, $cidade, $rua, $bairro, $complemento, $numero)
    {


        $mail = new PHPMailer(true); // STOP


        if (isset($pedido['termo'])) {

            $termo = $pedido['termo'];
        }

        if (isset($pedido['tpservico'])) {

            $tpservico = $pedido['tpservico'];
            // $tpservico = implode(',', $tpservico);
        }

        if (isset($pedido['categoria'])) {

            $categoria = $pedido['categoria'];
            $categoria = implode(', ', $categoria);
        }

        if (!empty($pedido['descricao'])) {

            if (gettype($pedido['descricao']) != 'string') {
                if (isset($pedido['descricao'])) {

                    $descricao = $pedido['descricao'];
                    $descricao = implode(', ', $descricao);
                }
            } else {
                $descricao = $pedido['descricao'];
            }
        }

        if (!empty($pedido['quantidade'])) {

            if (gettype($pedido['quantidade']) != 'string') {
                if (isset($pedido['quantidade'])) {

                    $quantidade = $pedido['quantidade'];
                    $quantidade = implode(', ', $quantidade);
                }
            } else {
                $descricao = $pedido['quantidade'];
            }
        }

        if (isset($pedido['local'])) {

            $local = $pedido['local'];
            $local = implode(', ', $local);
        }

        if (isset($pedido['dependente'])) {

            $dependente = $pedido['dependente'];
            $dependente = implode(', ', $dependente);
        }
        if (isset($pedido['serviço'])) {

            $serviço = $pedido['serviço'];
            $serviço = implode(', ', $serviço);
        }

        if (isset($pedido['opcao'])) {

            $opcao = $pedido['opcao'];
            $opcao = implode(', ', $opcao);
        }

        if (!empty($tpservico)) {
            $text = "<b><h3>Profissional solicitado: </h3> </b>" . $tpservico;
        }

        if (!empty($categoria)) {
            $text = $text . "<b><h3>Tipo de Serviço: </h3> </b>" . $categoria;
        }
        if (!empty($descricao)) {
            $text = $text . "<b><h3>Descrição: </h3> </b>" . $descricao;
        }

        if (!empty($quantidade)) {
            $text = $text . "<b><h3>Quantidade: </h3> </b>" . $quantidade;
        }

        if (!empty($local)) {
            $text = $text .  "<b><h3>Local: </h3> </b>" . $local;
        }
        if (!empty($dependente)) {
            $text = $text .  "<b><h3>Dependente: </h3> </b>" . $dependente;
        }
        if (!empty($serviço)) {
            $text = $text .  "<b><h3>Serviço:</h3> </b>" . strtoupper($serviço);
        }
        if (!empty($opcao)) {
            $text = $text .  "<b><h3>Opcao:</h3> </b>" . $opcao;
        }

        if (!empty($termo)) {

            $text = $text .  "<b><h3>Tipo de Contratação:</h3> </b>" . $termo;
        }


        $parceiros = new SubcategoriaDAO();
        $lista = $parceiros->selectProfissionalSub($tpservico);
        $emailP = '';
        
        $tamanho = count($lista);

 


        if ($lista != 'Não já profissional cadastrado nesse seguimento') {

            $tamanho = count($lista);

            for($i = 0; $i<$tamanho; $i++){
    
                $emailP .=  'Telefone: ' . $lista[$i]['telefone'] . ' Nome:' . $lista[$i]['nome'] . "<br>";
            }
        
        } else {
            $emailP =  "Não há profissional cadastrado nesse segmento";
        }
        

     
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
            $mail->addAddress($email, 'G2S - GoToService');     //Add a recipient
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
            $mail->Subject = 'NÚMERO DO PEDIDO ' . $protodolo;

            $mail->Body    = '
                                <b><h3>Nome do Cliente:</h3> </b>' . $nome . '<br>
                                <b><h3>Endereço:</h3> </b>' . $cidade . ',' . $bairro . ',' . $rua . ',' . $numero . ',' . $complemento . '<br>
                                <b><h3>Telefone:</h3> </b>' . $telefone . '<br>
                                <b><h3>Data do pedido:</h3> </b>' . $data . '<br>' . $text . '<br>
                                <b><h3>Profissionais que atendem os pedidos:</h3> </b> <span style="color:blue;">' . $emailP . '</span><br>';



            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';

        } catch (Exception $e) {
            echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
        }

        
    }
}
