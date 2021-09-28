<?php
include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
session_start();

if (empty($_SESSION['profissional'])) {

    header('Refresh: 0.1; url=login.php');
}

$ClassPedido = new CategoriaDAO();
$dados = $ClassPedido->pedidosProfissional($_SESSION['profissional']['id']);



?>
<link href="../../layout/css/cliente_painel.css" rel="stylesheet">
<div id="logo">
    <img src="../../images/primazia.png" alt="" width="250" height="190">
</div>

<div class="container">

    <h3 style="color:orangered">Meus pedidos</h3>

    <?php


    foreach ($dados as $dados) {

        $obj = $dados['descricao'];

    ?>

        <div class=" d-inline-block text-center" style="padding: 8px;">
            <div class="card" style="width: 22rem;">
                <div class="card-body" style="text-align: left;">
                    <p class="card-title" style="font-family: 'Montserrat', sans-serif; font-size:20px"><b>Protocolo:</b> <span style="color: red;"> <?php echo $dados['protocolo']; ?></span></p>
                    <hr>
                    <p class="card-title" style="font-family: 'Montserrat', sans-serif; font-size:20px"><b>Serviço:</b> <?php print_r($obj->tpservico); ?></p>
                    <?php

                    $obj = $dados['descricao'];
                    $total = $obj->categoria;
                    ?>
                    <span class="card-text" style="font-family: 'Montserrat', sans-serif;"><b>Tipo de serviço: </b></span>
                    <?php
                    foreach ($total as $total) {

                        echo $total . ", ";
                    }

                    ?>
                    <hr>
                    <p class="card-text" style="font-family: 'Montserrat', sans-serif;"><b>Cliente: </b><?php echo $dados['nome_cliente']; ?></p>

                    <?php
                    if ($dados['status'] === 'A') {

                    ?>
                        <div class="text-center">
                            <a href="#" class="btn btn-success">Status: Em Aberto</a>
                        </div>
                    <?php
                    }

                    if ($dados['status'] === 'E') {

                    ?>
                        <div class="text-center">
                            <a href="#" class="btn btn-warning" style="color: white;">Em Atendimento</a>
                        </div>
                    <?php

                    }

                    if ($dados['status'] === 'F') {

                    ?>
                        <div class="text-center">
                            <a href="#" class="btn btn-danger">Finalizado</a>
                        </div>
                    <?php
                    }
                    ?>



                </div>
            </div>
        </div>

    <?php
    }
    ?>

</div>

<?php
require "../../layout/footer.php";
?>