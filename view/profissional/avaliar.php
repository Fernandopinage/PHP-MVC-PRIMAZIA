<?php
session_start();
include_once "../../dao/StarDAO.php";

$email = $_SESSION['star']['cliente'];

$Valiar = new StarDAO();
$dados = $Valiar->selectCliente($email);

if (isset($_POST['valiar_cancel'])) {



    $cliente =  $_SESSION['star']['cliente'];
    $protocolo =  $_SESSION['star']['protocolo'];
    $status = 'on';
    $valor = 5;

    $Valiar->updateStarCliente($cliente, $protocolo, $status, $valor);
}

if (isset($_POST['valiar_avaliar'])) {

    $cliente =  $_SESSION['star']['cliente'];
    $protocolo =  $_SESSION['star']['protocolo'];
    $status = 'on';

    if (isset($_POST['valor1'])) {

        if ($_POST['valor1'] == 'on') {

            $valor = 1;
        }
    }

    if (isset($_POST['valor2'])) {
        if ($_POST['valor2'] == 'on') {

            $valor = 2;
        }
    }

    if (isset($_POST['valor3'])) {
        if ($_POST['valor3'] == 'on') {

            $valor = 3;
        }
    }

    if (isset($_POST['valor4'])) {
        if ($_POST['valor4'] == 'on') {

            $valor = 4;
        }
    }

    if (isset($_POST['valor5'])) {
        if ($_POST['valor5'] == 'on') {

            $valor = 5;
        }
    }
    $Valiar = new StarDAO();
    $Valiar->updateStarCliente($cliente, $protocolo, $status, $valor);
}




include_once "../../layout/heard.php";
?>
<link href="../../layout/css/star.css" rel="stylesheet">
<div class="container-fluid">
    <div class="text-center">
        <a href="https://gotoservice.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
    </div>

    <div class="title text-center">
        <p>AVALIE O PROFISSIONAL</p>
        <!-- <h5 id="registro">Já possui um cadastro?</h5> -->

    </div>
    <div class="container">

    <div class="text-center">
        <?php
        if (!empty($dados['foto'])) {
        ?>
            <img id="usuario" src="../../images/<?php echo $dados['foto'] ?>" class="img" style="width: 150px; border-radius:8px"><br><br>
        <?php

        } else {
        ?>
            <img id="usuario" src="../../images/perfil.png" class="img"  style="width: 150px;border-radius:8px"><br><br>
        <?php
        }
        ?>

        <h5 style="text-transform: capitalize;"><?php echo $dados['nome'] ?></h5><br>
        
    </div>

        <form method="POST">

            <div class="row">

                <div class="text-center">

                    <span id="str01" style="padding-left: 3px;" onmousemove="star1ON()" onmouseout="star1OF()" onclick="star1()"><img src=".././../icons/star.png"></span>
                    <span id="str02" style="padding-left: 3px;" onmousemove="star2ON()" onmouseout="star2OF()" onclick="star2()"><img src=".././../icons/star.png"></span>
                    <span id="str03" style="padding-left: 3px;" onmousemove="star3ON()" onmouseout="star3OF()" onclick="star3()"><img src=".././../icons/star.png"></span>
                    <span id="str04" style="padding-left: 3px;" onmousemove="star4ON()" onmouseout="star4OF()" onclick="star4()"><img src=".././../icons/star.png"></span>
                    <span id="str05" style="padding-left: 3px;" onmousemove="star5ON()" onmouseout="star5OF()" onclick="star5()"><img src=".././../icons/star.png"></span>



                </div>

                <div class="form-check form-switch" style="display: none;">
                    <input class="form-check-input" type="checkbox" role="switch" id="str_01" name="valor1">

                </div>

                <div class="form-check form-switch" style="display: none;">
                    <input class="form-check-input" type="checkbox" role="switch" id="str_02" name="valor2">

                </div>

                <div class="form-check form-switch" style="display: none;">
                    <input class="form-check-input" type="checkbox" role="switch" id="str_03" name="valor3">

                </div>
                <div class="form-check form-switch" style="display: none;">
                    <input class="form-check-input" type="checkbox" role="switch" id="str_04" name="valor4">

                </div>
                <div class="form-check form-switch" style="display: none;">
                    <input class="form-check-input" type="checkbox" role="switch" id="str_05" name="valor5">
                </div>
            </div>


            <div class="row g-4" style="margin-top:60px;">
                <div class="col-4">
                </div>
                <div class="col-2 d-grid gap-2">
                    <input type="submit" class="btn btn-secondary btn-lg" name="valiar_cancel" value="Cancelar" style="background-color: #fff; color:#E97513; border-color:#E97513">
                </div>
                <div class="col-2 d-grid gap-2">
                    <input type="submit" class="btn btn btn-lg" value="Avaliar" name="valiar_avaliar" style="background-color: #E97513; color:white;border-color:#E97513">
                </div>
            </div>
        </form>
    </div>

</div>

<script>
    function star1() {

        if (document.getElementById('str_01').checked != true) {

            document.getElementById('str01').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str_01').checked = true;
            document.getElementById('str_02').checked = false;
            document.getElementById('str_03').checked = false;
            document.getElementById('str_04').checked = false;
            document.getElementById('str_05').checked = false;

        } else {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str_01').checked = false;
        }

    }

    function star1ON() {

        document.getElementById('str01').innerHTML = '<img src=".././../icons/star_on.png">';

    }

    function star1OF() {

        if (document.getElementById('str_01').checked == true) {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star_on.png">';
        } else {

            document.getElementById('str01').innerHTML = '<img src=".././../icons/star.png">';
        }

    }


    function star2() {

        if (document.getElementById('str_02').checked != true) {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str_01').checked = false;
            document.getElementById('str_02').checked = true;
            document.getElementById('str_03').checked = false;
            document.getElementById('str_04').checked = false;
            document.getElementById('str_05').checked = false;

        } else {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str_02').checked = false;
        }

    }


    function star2ON() {
        document.getElementById('str01').innerHTML = '<img src=".././../icons/star_on.png">';
        document.getElementById('str02').innerHTML = '<img src=".././../icons/star_on.png">';

    }

    function star2OF() {

        if (document.getElementById('str_02').checked == true) {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star_on.png">';
        } else {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star.png">';
        }



    }


    function star3() {

        if (document.getElementById('str_03').checked != true) {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str03').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str_01').checked = false;
            document.getElementById('str_02').checked = false;
            document.getElementById('str_03').checked = true;
            document.getElementById('str_04').checked = false;
            document.getElementById('str_05').checked = false;

        } else {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str03').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str_03').checked = false;
        }

    }

    function star3ON() {
        document.getElementById('str01').innerHTML = '<img src=".././../icons/star_on.png">';
        document.getElementById('str02').innerHTML = '<img src=".././../icons/star_on.png">';
        document.getElementById('str03').innerHTML = '<img src=".././../icons/star_on.png">';

    }


    function star3OF() {

        if (document.getElementById('str_03').checked == true) {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str03').innerHTML = '<img src=".././../icons/star_on.png">';
        } else {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str03').innerHTML = '<img src=".././../icons/star.png">';
        }

    }



    function star4() {

        if (document.getElementById('str_04').checked != true) {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str03').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str04').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str_01').checked = false;
            document.getElementById('str_02').checked = false;
            document.getElementById('str_03').checked = false;
            document.getElementById('str_04').checked = true;
            document.getElementById('str_05').checked = false;

        } else {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str03').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str04').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str_04').checked = false;
        }

    }

    function star4ON() {
        document.getElementById('str01').innerHTML = '<img src=".././../icons/star_on.png">';
        document.getElementById('str02').innerHTML = '<img src=".././../icons/star_on.png">';
        document.getElementById('str03').innerHTML = '<img src=".././../icons/star_on.png">';
        document.getElementById('str04').innerHTML = '<img src=".././../icons/star_on.png">';

    }

    function star4OF() {

        if (document.getElementById('str_04').checked == true) {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str03').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str04').innerHTML = '<img src=".././../icons/star_on.png">';
        } else {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str03').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str04').innerHTML = '<img src=".././../icons/star.png">';
        }

    }

    function star5() {

        if (document.getElementById('str_05').checked != true) {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str03').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str04').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str05').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str_01').checked = false;
            document.getElementById('str_02').checked = false;
            document.getElementById('str_03').checked = false;
            document.getElementById('str_04').checked = false;
            document.getElementById('str_05').checked = true;

        } else {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str03').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str04').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str05').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str_05').checked = false;
        }

    }

    function star5ON() {

        document.getElementById('str01').innerHTML = '<img src=".././../icons/star_on.png">';
        document.getElementById('str02').innerHTML = '<img src=".././../icons/star_on.png">';
        document.getElementById('str03').innerHTML = '<img src=".././../icons/star_on.png">';
        document.getElementById('str04').innerHTML = '<img src=".././../icons/star_on.png">';
        document.getElementById('str05').innerHTML = '<img src=".././../icons/star_on.png">';
    }

    function star5OF() {

        if (document.getElementById('str_05').checked == true) {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str03').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str04').innerHTML = '<img src=".././../icons/star_on.png">';
            document.getElementById('str05').innerHTML = '<img src=".././../icons/star_on.png">';
        } else {
            document.getElementById('str01').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str02').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str03').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str04').innerHTML = '<img src=".././../icons/star.png">';
            document.getElementById('str05').innerHTML = '<img src=".././../icons/star.png">';
        }

    }
</script>

<?php

include_once "../../layout/footer.php";
?>