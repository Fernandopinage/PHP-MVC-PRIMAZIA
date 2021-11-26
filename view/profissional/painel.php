<?php
include_once "../../layout/heard.php";
include_once "../../dao/ProfissionalDAO.php";
session_start();

if (empty($_SESSION['profissional'])) {

    header('location: ../../view/profissional/login.php');
}
$Star = new ProfissionalDAO();
$star = $Star->selectStar($_SESSION['profissional']['email']);




?>

<link href="../../layout/css/profissional_painel.css" rel="stylesheet">
<div id="logo">
    <a href="https://gotoservice.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
</div>


<div class="container">

    <div class="text-center">
        <?php
        if (!empty($_SESSION['profissional']['foto'])) {
        ?>
            <img id="usuario" src="../../images/<?php echo $_SESSION['profissional']['foto'] ?>" class="img"><br><br>
        <?php

        } else {
        ?>
            <img id="usuario" src="../../images/perfil.png" class="img"><br><br>
        <?php
        }
        ?>

        <h5 style="text-transform: capitalize;"><?php echo $_SESSION['profissional']['nome']; ?></h5><br>



        <?php


        if ($star ==  0.00) {

        ?>
            <img src="../../icons/5pp.png" class="img" width="130">
        <?php

            echo 5;
        }


        if ($star >=  1.00 and $star <=  1.5) {
        ?>
            <img src="../../icons/1pp.png" class="img" width="130">
        <?php

            echo $star = round($star,2);
        }



        if ($star >= 1.51 and $star <= 1.99) {
        ?>
            <img src="../../icons/1.5pp.png" class="img" width="130">
        <?php

            echo $star = round($star,2);
        }


        if ($star >= 2.00 and $star <= 2.49) {
        ?>
            <img src="../../icons/2pp.png" class="img" width="130">
        <?php

            echo $star = round($star,2);
        }

        if ($star >= 2.50 and $star <= 2.99) {
        ?>
            <img src="../../icons/2.5pp.png" class="img" width="130">
        <?php

            echo $star = round($star,2);
        }

        if ($star >= 3.00 and $star <= 3.49) {
        ?>
            <img src="../../icons/3pp.png" class="img" width="130">
        <?php

            echo $star = round($star,2);
        }


        if ($star >= 3.50 and $star <= 3.99) {
        ?>
            <img src="../../icons/3.5pp.png" class="img" width="130">
        <?php

            echo $star = round($star,2);
        }

        if ($star >= 4.00 and $star <= 4.49) {
        ?>
            <img src="../../icons/4pp.png" class="img" width="130">
        <?php

            echo $star = round($star,2);
        }

        if ($star >= 4.50 and $star <= 4.99) {
        ?>
            <img src="../../icons/4.5pp.png" class="img" width="130">
        <?php

            echo $star = round($star,2);
        }
        if ($star == 5) {
        ?>
            <img src="../../icons/5pp.png" class="img" width="130">
        <?php

            echo $star = round($star,2);
        }


        ?>

    </div>


</div>

<div class="container-fluid">

    <nav class="navbar navbar">
        <div class="row">
            <div class="col-md">
                <a class="navbar-brand" href="../profissional/editar.php">
                    <img src="../../images/pedidosdisponiveis.png" alt="" width="70" height="70">
                </a>
                <p class="fs-7"> Editar Perfil</p>
            </div>
            <div class="col-md">
                <a class="navbar-brand" href="../profissional/meu_pedidos.php">
                    <img src="../../images/pedidosquesolicitei.png" alt="" width="70" height="70">
                </a>
                <p class="fs-7"> Meus Pedidos</p>
            </div>

            <div class="col-md">
                <a class="navbar-brand" href="http://primazia.agenciaprogride.com.br/contato-home/">
                    <img src="../../images/faleconosco.png" alt="" width="80" height="80">
                </a>
                <p class="fs-7"> Fale Conosco </p>

            </div>

            <div class="col-md">
                <a class="navbar-brand" href="../cliente/login.php">
                    <img src="../../images/encontreumprofissionalp.png" alt="" width="70" height="70">
                </a>
                <p class="fs-7"> Encontre um Profissional</p>
            </div>


            <div class="col-md">
                <a class="navbar-brand" href="../../view/cliente/logout.php">
                    <img src="../../icons/photo1629906564.jpeg" alt="" width="70" height="70">
                </a>
                <p class="fs-7">Sair</p>
            </div>
        </div>
    </nav>

</div>




<?php
require "../../layout/footer.php";
?>