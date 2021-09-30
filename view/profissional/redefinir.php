<?php

include_once "../../layout/heard.php";
include_once "../../class/ClassProfissional.php";
include_once "../../dao/ProfissionalDAO.php";


if (isset($_POST['redefinirSenha'])) {

    $ClassProfissional = new Profissional();
    $ClassProfissional->SetEmail($_POST['email']);
 
    $Profissional = new ProfissionalDAO();
    $Profissional->redefinirSenha($ClassProfissional);

}

?>

<link href="../../layout/css/profissional_login.css" rel="stylesheet">
<div class="container-fluid">
    <div class="text-center">
    <a href="https://primazia.agenciaprogride.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
    </div>

    <div class="title text-center">
        <p>REDEFINIR SENHA</p>
       
    </div>
    <div class="container">
        <form class="row g-2" id="form" method="POST">

            <div class="col">
            </div>

            <div class="text-center">
            <h4>Informe seu e-mail</h4>
            </div>
            <div class="col-12">
                
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="d-grid text-center" style="margin-top: 40px;">
                <button type="submit" name="redefinirSenha" class="btn btn-lg orangered">REDEFINIR</button>
            </div>
        </form>
    </div>

</div>


<?php

include_once "../../layout/footer.php";
?>