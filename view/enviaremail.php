<?php

require "../layout/head.php";
?>

<?php
//1 – Definimos Para quem vai ser enviado o email
$para = "rhuan.v@progride.com.br";
//2 - resgatar o nome digitado no formulário e  grava na variavel $nome
$nome = $_POST['limpezacomercial'];
// 3 - resgatar o assunto digitado no formulário e  grava na variavel
//$assunto
$assunto = $_POST['limpezacomercial'];
 //4 – Agora definimos a  mensagem que vai ser enviado no e-mail
$mensagem = "<strong>Novo Profissional G2S Cadastrado</strong>".$nome;
$mensagem .= "<br>  <strong>Mensagem: </strong>"
.$_POST['mensagem'];

//5 – agora inserimos as codificações corretas e  tudo mais.
$headers =  "Content-Type:text/html; charset=UTF-8\n";
$headers .= "From:  progride.com.br<rhuan.v@progride.com.br>\n";
//Vai ser //mostrado que  o email partiu deste email e seguido do nome
$headers .= "X-Sender:  <rhuan.v@progride.com.br>\n";
//email do servidor //que enviou
$headers .= "X-Mailer: PHP  v".phpversion()."\n";
$headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
$headers .= "Return-Path:  <rhuan.v@progride.com.br>\n";
//caso a msg //seja respondida vai para  este email.
$headers .= "MIME-Version: 1.0\n";

mail($para, $assunto, $mensagem, $headers);  //função que faz o envio do email.
?>

<?php
require "../layout/footer.php";
?>