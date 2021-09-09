<?php
include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
session_start();

if (empty($_SESSION['user'])) {

    header('Refresh: 0.1; url=login.php');
}

$ClassPedido = new CategoriaDAO();
$dados = $ClassPedido->pedidos();




?>
<link href="../../layout/css/cliente_painel.css" rel="stylesheet">
<div id="logo">
    <img src="../../images/primazia.png" alt="" width="250" height="190">
</div>

<div class="container">

    <h3 style="color:orangered">Meus pedidos</h3>



    <?php

    echo "<pre>";
    echo print_r($dados);
    //echo print_r($dados[1]['pedido']);
    echo "</pre>";



    foreach ($dados as $dados => $obj) {
    ?>
        <div class=" d-inline-block text-center" style="padding: 8px;">
            <div>
                <?php echo $obj['data']; ?>

            </div>
            <div>
              <!--  <?php //echo "<pre>"; var_dump($obj['pedido']); echo "/<pre>";?> -->
                <?php 
                
                $dados = $obj['pedido'];
                
                //echo var_dump($dados);
                ?>

            </div>
            

        </div>

    <?php
    }

    ?>

</div>



<div class="container-fluid">

    <nav class="navbar navbar">
        <div class="row g-5">
            <div class="col-md">
                <a class="navbar-brand" href="../cliente/pedido.php">
                    <img src="../../images/encontreumprofissional.png" alt="" width="80" height="80">
                </a>
                <p class="fs-6"> Encontre um Profissional</p>
            </div>
            <div class="col-md">
                <a class="navbar-brand" href="http://primazia.agenciaprogride.com.br/contato-home-resumida/">
                    <img src="../../images/faleconosco.png" alt="" width="80" height="80">
                </a>
                <p class="fs-6"> Fale Conosco </p>

            </div>

            <div class="col-md">
                <a class="navbar-brand" href="http://primazia.agenciaprogride.com.br/login-registro-profissional/">
                    <img src="../../images/cadastresecomoprofissional.png" alt="" width="70" height="70">
                </a>
                <p class="fs-6"> Cadastre-se como Profissional</p>
            </div>

            <div class="col-md">
                <a class="navbar-brand" href="../cliente/meu_pedidos.php">
                    <img src="../../images/pedidosquesolicitei.png" alt="" width="70" height="70">
                </a>
                <p class="fs-6"> Meus Pedidos</p>
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