<?php
include_once "../../layout/heard.php";

session_start();

if (empty($_SESSION['admin'])) {

    header('location: ../../view/admin/login.php');
}

?>
<link href="../../layout/css/admin_painel.css" rel="stylesheet">
<div id="logo">
<a href="https://primazia.agenciaprogride.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
</div>

<div class="container">

    <div class="text-center">
        <?php
        if (!empty($_SESSION['admin']['foto'])) {
        ?>
            <img id="usuario" src="../../images/<?php echo $_SESSION['admin']['foto'] ?>" class="img"><br><br>
        <?php

        } else {
        ?>
            <img id="usuario" src="../../images/perfil.png" class="img"><br><br>
        <?php
        }
        ?>

        <h5 style="text-transform: capitalize;"><?php echo $_SESSION['admin']['nome'] ?></h5><br>
        
    </div>


</div>

<div class="container-fluid">

    <nav class="nav_bar">
        <div class="row g-4">
            <div class="col-md">
                <a class="navbar-brand" href="../admin/cadastro.php">
                    <img src="../../images/novousuario.png" alt="" width="80" height="80">
                </a>
                <p class="fs-6"> Cadastrar Usuário</p>
            </div>
            <div class="col-md">
                <a class="navbar-brand" href="../admin/editar.php">
                    <img src="../../images/editarusuario.png" alt="" width="80" height="80">
                </a>
                <p class="fs-6"> Editar Usuário </p>
    </div>

            <div class="col-md">
                <a class="navbar-brand" href="../admin/pedidos.php">
                    <img src="../../images/pedidosquesolicitei.png" alt="" width="70" height="70">
                </a>
                <p class="fs-6">Pedidos G2S</p>
            </div>
            <div class="col-md">
                <a class="navbar-brand" href="../../view/cliente/logout.php">
                    <img src="../../icons/photo1629906564.jpeg" alt="" width="70" height="70">
                </a>
                <p class="fs-6">Sair</p>
            </div>
        </div>
    </nav>

</div>




<?php
require "../../layout/footer.php";
?>