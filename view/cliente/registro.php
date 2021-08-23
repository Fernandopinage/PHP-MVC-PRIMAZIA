<?php

include_once "../../layout/heard.php";
include_once  "../../class/ClassCliente.php";
include_once "../../dao/ClienteDAO.php";

if(isset($_POST['salvarCliente'])){

    $ClassCliente = new Cliente();
    $ClassCliente->SetNome($_POST['nome']);
    $ClassCliente->SetCpf($_POST['cpf']);
    $ClassCliente->SetCep($_POST['cep']);
    $ClassCliente->SetTelefone($_POST['telefone']);
    $ClassCliente->SetEmail($_POST['email']);

    $Cliente = new ClienteDAO();
    $Cliente->insertCliente($ClassCliente);



   
}



?>
<link href="../../layout/css/cliente_registro.css" rel="stylesheet">
<div class="container-fluid">
    <div class="container" id="registro">
        <form action="" method="post">
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
                        <input type="text" name="nome" id="nome"  class="form-control" placeholder="Nome de Usuário" aria-label="Nome de Usuário">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="cpf" id="cpf" class="form-control cpf-mask" placeholder="CPF">
                    </div>
                </div>


                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <input type="text" name="cep" id="cep" class="form-control cpf-mask" placeholder="CEP">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="telefone" id="telefone" class="form-control phone-ddd-mask" placeholder="Telefone">
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-md-12">
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" aria-label="E-mail">
                    </div>
                </div>

                <div class="row">

                    <div class="d-grid gap-2 col-3 mx-auto mt-5">
                        <button type="submit" name="salvarCliente" class="btn btn-lg orangered">ENVIAR</button>
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