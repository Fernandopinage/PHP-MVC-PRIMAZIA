<?php

include_once "../../layout/heard.php";

?>
<link href="../../layout/css/cliente_registro.css" rel="stylesheet">
<div class="container-fluid">
    <div class="container" id="registro">
        <form action="registrocliente.php" method="post">
            <div class="text-center">
                <img id="logo" src="../../images/primazia.png" class="img"><br>
            </div>

            <div class="title text-center">
                <p>REGISTRO CLIENTE</p>
            </div>


            <div id="form-row">
                <div class="row" style="padding: 40px;">
                    <div class="text-center">
                        <img id="editarusuario" src="../../images/usuario.png" class="img" width="100">
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <input type="text" name="nome" class="form-control" placeholder="Nome de Usuário" aria-label="Nome de Usuário">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="cpf" class="form-control cpf-mask" placeholder="CPF">
                    </div>
                </div>


                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <input type="text" name="cep" class="form-control cpf-mask" placeholder="CEP">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="telefone" class="form-control phone-ddd-mask" placeholder="Telefone">
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-md-12">
                        <input type="email" name="email" class="form-control" placeholder="E-mail" aria-label="E-mail">
                    </div>
                </div>

                <div class="row">

                    <div class="d-grid gap-2 col-3 mx-auto mt-5">
                        <button type="submit" class="btn btn-lg orangered">ENVIAR</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="container" id="registro_logo">
        <img src="../../images/cliente.gif">
    </div>


</div>

<?php
include_once "../../layout/footer.php";
?>