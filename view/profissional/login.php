<?php

include_once "../../layout/heard.php";
include_once  "../../class/ClassProfissional.php";
include_once "../../dao/ProfissionalDAO.php";

if (isset($_POST['loginenviar'])) {

    $ProfissionalClass = new Profissional();
    $ProfissionalClass->SetEmail($_POST['email']);
    $ProfissionalClass->SetSenha($_POST['senha']);

    $Profissional = new ProfissionalDAO();
    $Profissional->validarLogin($ProfissionalClass);
}

?>

<link href="../../layout/css/profissional_login.css" rel="stylesheet">
<div class="container-fluid">
    <div class="text-center">
    <a href="https://gotoservice.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
    </div>

    <div class="title text-center">
        <p>LOGIN PROFISSIONAL</p>
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
            <div class="col-6">
                <a id="registro" href="../profissional/registro.php">Criar uma conta</a>
            </div>
            <div class="col-6 text-end">
                <a id="registro" href="../profissional/redefinir.php">Esqueceu Senha?</a>
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