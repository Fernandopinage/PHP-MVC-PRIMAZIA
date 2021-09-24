<?php
include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
session_start();
if (empty($_SESSION['admin'])) {

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

    <table class="table table-hover">
        <thead style="background-color: #e9781e; color:white; font-family: 'Montserrat', sans-serif">
            <tr>
                <th scope="col">Status</th>
                <th scope="col">Nº Pedido</th>
                <th scope="col">Cliente</th>
                <th scope="col">Telefone</th>
                <th scope="col">Serviço</th>
                <th scope="col">Subcategorias</th>
            </tr>
        </thead>
        <tbody style="color: #0D2238;font-family: 'Montserrat', sans-serif">
            <?php

            foreach ($dados as $dados) {


            ?>
                <tr data-bs-toggle="modal" data-bs-target="#view<?php echo $dados['id'];?>">
                    <td></td>
                    <th scope="row" style="color: #086c24;" data-bs-toggle="modal"><?php echo $dados['protocolo']; ?></th>
                    <td><?php echo $dados['nome']; ?></td>
                    <td><?php echo $dados['telefone']; ?></td>
                    <td>
                        <?php

                        $obj = $dados['descricao'];
                        print_r($obj->tpservico);

                        ?>

                    </td>
                    <td>
                        <?php

                        $obj = $dados['descricao'];
                        $total = $obj->categoria;

                        foreach ($total as $total) {

                            echo $total . "<br>";
                        }
                        ?>

                    </td>



                    <!-- Modal -->
                    <div class="modal fade" id="view<?php echo $dados['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Understood</button>
                                </div>
                            </div>
                        </div>
                    </div>



                <?php

            }

                ?>
        </tbody>
    </table>


</div>




<?php
require "../../layout/footer.php";
?>