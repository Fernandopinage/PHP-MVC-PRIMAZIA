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
<a href="https://primazia.agenciaprogride.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
</div>

<div class="container">

    

    <div class="col-md-3">
        <label for="validationServer01" class="form-label">Meus pedidos:</label>
        <select class="form-select" name="status_filtro"  aria-label="select example">
            <option value=""></option>
            <option value="p">PROFISSIONAL</option>
            <option value="c">CLIENTE</option>
        </select>
    </div>
   

    <h3  style="color:orangered;margin-top:50px;">Meus pedidos</h3>

    <?php

    if (!empty($dados)) {


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
                                <a href="#" class="btn btn-success" style="font-family: 'Montserrat', sans-serif;">Status: Em Aberto</a>
                            </div>
                        <?php
                        }

                        if ($dados['status'] === 'E') {

                        ?>
                            <div class="text-center">
                                <a href="#" class="btn btn" style="background-color: #ffc107; color: white; font-family: 'Montserrat', sans-serif;">Em Atendimento</a>
                            </div>
                        <?php

                        }

                        if ($dados['status'] === 'F') {

                        ?>
                            <div class="text-center">
                                <a href="#" class="btn btn-danger" style="color: white; font-family: 'Montserrat', sans-serif;">Finalizado</a>
                            </div>
                        <?php
                        }
                        ?>



                    </div>
                </div>
            </div>

    <?php
        }
    }else{
        ?>
        
        <div class=" d-inline-block text-center" style="padding: 8px;">
                <div class="card" style="width: 22rem;">
                    <div class="card-body" style="text-align: left;">
                        <p class="card-title" style="font-family: 'Montserrat', sans-serif; font-size:20px"></p>
                        <hr>
                        <p class="card-title" style="font-family: 'Montserrat', sans-serif; font-size:20px">  </p>
                        <div class="text-center">
                        <a href="#" class="btn btn-danger" style="color: white; font-family: 'Montserrat', sans-serif;">Não possui pedidos</a>
                        </div>
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