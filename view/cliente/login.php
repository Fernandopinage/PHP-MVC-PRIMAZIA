<?php

include_once "../../layout/heard.php";
include_once  "../../class/ClassCliente.php";
include_once "../../dao/ClienteDAO.php";

    if(isset($_POST['loginenviar'])){

        $ClienteClass = new Cliente();
        $ClienteClass->SetEmail($_POST['email']);
        $ClienteClass->SetSenha($_POST['senha']);

        $Cliemte = new ClienteDAO();
        $Cliemte->validarLogin($ClienteClass);
    }   

?>

<link href="../../layout/css/cliente_login.css" rel="stylesheet">
<div class="container-fluid">
    <div class="text-center">
        <img id="logo" src="../../images/primazia.png" class="img"><br>
    </div>

    <div class="title text-center">
        <p>LOGIN CLIENTE</p>
        <h5 id="registro">Já possui um cadastro?</h5>
       
    </div>
    <div class="container">
        <form class="row g-2" id="form" method="POST">

        <div class="col">
        </div>
            <div class="col-12">
                <label for="exampleInputEmail1" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-12">
                <label for="exampleInputPassword1" class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha" id="exampleInputPassword1">
            </div>
            <div>
                <a id="registro" href="../cliente/registro.php">Criar uma conta</a>
                
            </div>
            <div class="d-grid text-center">
                <button type="submit" name="loginenviar" class="btn btn-lg orangered">ENVIAR</button>
            </div>
        </form>
    </div>

</div>


<?php

include_once "../../layout/footer.php";
?>