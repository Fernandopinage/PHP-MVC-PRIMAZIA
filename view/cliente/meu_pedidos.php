<?php
include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
session_start();

if (empty($_SESSION['user'])) {

    header('location: ../../view/cliente/login.php');
}





$ClassPedido = new CategoriaDAO();
$dados = $ClassPedido->pedidos($_SESSION['user']['email']);





?>
<link href="../../layout/css/cliente_painel.css" rel="stylesheet">
<div id="logo">
<a href="https://gotoservice.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
</div>


<div class="container">

    <h3 style="color:orangered; font-family: 'Montserrat';" >Meus pedidos</h3>

    <?php

    if (!empty($dados)) {


        foreach ($dados as $dados) {


           $protocolo = $dados['protocolo'];
           $dados2 = $ClassPedido->pedidosProfissionalFiltro($protocolo);

           

            $obj = $dados['descricao'];



    ?>

            <div class=" d-inline-block text-center" style="padding-right: 8px; margin-top:10px;">
                <div class="card" style="width: 26rem;">
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

                            echo $total . ". ";
                        }

                        ?>
                        <hr>
                        <p class="card-text" style="font-family: 'Montserrat', sans-serif;"><b>Profissional:
                        
                            <?php 
                            if(@$dados2['nome_profissional'] > 0){
                                echo $dados2['nome_profissional'];
                            }  
                                
                            ?>
                        </b></p>

                        <?php
                        if ($dados['status'] === 'A') {

                        ?>
                            <div class="text-center">
                                
                                <div class="alert alert-primary" role="alert">
                                Status: Em Aberto
                                </div>
                            </div>
                        <?php
                        }

                        if ($dados['status'] === 'E') {

                        ?>
                            <div class="text-center">
                                
                                <div class="alert alert-warning" role="alert">
                                Status: Em Atendimento
                                </div>
                            </div>
                        <?php

                        }

                        if ($dados['status'] === 'F') {

                        ?>
                            <div class="text-center">
                                
                                <div class="alert alert-success" role="alert">
                                Status: Finalizado
                                </div>
                            </div>
                        <?php
                        }

                        if ($dados['status'] === 'C') {

                            ?>
                                <div class="text-center">
                                   <!-- <a  class="btn btn-danger" style="color: white; font-family: 'Montserrat', sans-serif;">Cancelado</a> -->
                                   <div class="alert alert-danger" role="alert">
                                        Status: Cancelado
                                    </div>
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