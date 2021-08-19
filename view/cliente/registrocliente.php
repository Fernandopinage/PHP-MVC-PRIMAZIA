<?php

require "../../layout/head.php";

?>

<div id="desktop">
    <div id="conteudo-left" style="background-color: blue;">
        <div class="container">

            <img id="logo" src="../../images/primazia.png" class="img"><br>
            <div id='titlespecial'>
                <title>ÁREA DO CLIENTE</title>
                <h1>
                    <center>REGISTRO CLIENTE</center>

                </h1>
            </div>
            <form action="registrocliente.php" method="post">
                <div id="form-row">
                    <div class="row" style="padding: 40px;">
                        <center><img id="editarusuario" src="../../images/usuario.png" class="img" width="100"></center>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="nome" class="form-control" placeholder="Nome de Usuário" aria-label="Nome de Usuário">
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="E-mail" aria-label="E-mail">
                        </div>
                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="cpf" class="form-control cpf-mask" placeholder="CPF">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="telefone" class="form-control phone-ddd-mask" placeholder="Telefone">
                        </div>
                    </div>
                    <br>
                    <div class="row g-6">
                        <div class="col">
                            <center><button id='botaoEnviar' type="button" onclick="window.location = 'logincliente.php';" class="btn btn-primary btn-lg">ENVIAR</button></center>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="conteudo-right" style="background-color: green;">

    <div class="col-md-6">
        <img id='photo' src="../../images/cliente.gif" class="img">

    </div>

</div>

</form>
<?php
require "../../layout/footer.php";
?>