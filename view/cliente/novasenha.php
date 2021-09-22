<?php

include_once "../../layout/heard.php";
include_once "../../class/ClassCliente.php";
include_once "../../dao/ClienteDAO.php";


if(isset($_GET['key']) and isset($_GET['mail']) and isset($_GET['pass'])){

    
    $id = base64_decode($_GET['key']);
    $email = base64_decode($_GET['mail']);
    $senha = $_GET['pass'];
}

if (isset($_POST['novasenha'])) {


    if(isset($_POST['newsenha']) === isset($_POST['confirme'])){

       $novaSenha = $_POST['newsenha'];
        
        $Cliente = new ClienteDAO;
        $Cliente->updateSenha($novaSenha,$id,$email,$senha);

    }else{

        ?>


        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Senha',
                text: 'Incorretas',
                showConfirmButton: false,
                timer: 3500
            })
        </script>

    <?php

    }
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
            <div class="col-12">
                <label for="exampleInputEmail1" class="form-label">Nova senha</label>
                <input type="password" class="form-control" name="newsenha" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-12">
                <label for="exampleInputPassword1" class="form-label">Confirme a nova senha </label>
                <input type="password" class="form-control" name="confirme" id="exampleInputPassword1">
            </div>
            <div class="d-grid text-center" style="margin-top: 40px;">
                <button type="submit" name="novasenha" class="btn btn-lg orangered">REDEFINIR</button>
            </div>
        </form>
    </div>

</div>


<?php

include_once "../../layout/footer.php";
?>