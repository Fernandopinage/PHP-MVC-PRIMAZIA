<?php

include_once "../../layout/heard.php";
include_once  "../../class/ClassAdmin.php";
include_once "../../dao/AdminDAO.php";

if (isset($_POST['loginenviar'])) {

    $AdiminClass = new Admin();
    $AdiminClass->SetEmail($_POST['email']);
    $AdiminClass->SetSenha($_POST['senha']);

    $Admin = new AdminDAO();
    $Admin->validarLogin($AdiminClass);

}

    
?>

<link href="../../layout/css/profissional_login.css" rel="stylesheet">
<div class="container-fluid">
    <div class="text-center">
        <img id="logo" src="../../images/primazia.png" class="img"><br>
    </div>

    <div class="title text-center">
        <p>LOGIN ADMINISTRADOR</p>
        

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
            <div class="col-6">
                <a id="registro" href="../admin/registro.php">Criar login do Adm</a>

            </div>
            <div class="col-6 text-end">
                <a id="registro" href="../admin/redefinir.php">Esqueceu Senha?</a>
            </div>
            <div class="d-grid text-center" style="margin-top: 40px;">
                <button type="submit" name="loginenviar" class="btn btn-lg orangered">ENVIAR</button>
            </div>
        </form>
    </div>

</div>


<?php

include_once "../../layout/footer.php";
?>