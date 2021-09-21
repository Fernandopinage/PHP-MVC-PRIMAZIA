<?php

include_once "../../layout/heard.php";
include_once "../../class/ClassAdmin.php";
include_once "../../dao/AdminDAO.php";


if (isset($_POST['redefinirSenha'])) {

    $ClassAdmin = new Admin();
    $ClassAdmin->SetEmail($_POST['email']);
 
    $Admin = new AdminDAO();
    $Admin->redefinirSenha($ClassAdmin);

}

?>

<link href="../../layout/css/profissional_login.css" rel="stylesheet">
<div class="container-fluid">
    <div class="text-center">
        <img id="logo" src="../../images/primazia.png" class="img"><br>
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