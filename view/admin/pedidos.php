<?php
include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
include_once "../../class/ClassServico.php";
include_once "../../dao/ServicoDAO.php";


session_start();
if (empty($_SESSION['admin'])) {

    header('Refresh: 0.1; url=login.php');
}
$ClassPedido = new CategoriaDAO();
$dados = $ClassPedido->pedidos();


if (isset($_POST['chamado'])) {

    $data =  date('Y/m/d');
    $ClassServico = new Servico();
    $ClassServico->SetNome($_POST['pessoa']);
    $ClassServico->SetData($data);
    $ClassServico->SetStatus($_POST['status']);
    $ClassServico->SetProtocolo($_POST['numero_protocolo']);
    $ClassServico->SetID($_POST['id']);


    $Servico = new ServicoDao();
    $Servico->inserServico($ClassServico);
}

if (isset($_POST['chamado_finalizado'])) {

    $ClassServico = new Servico();
    $ClassServico->SetStatus($_POST['status']);
    $ClassServico->SetProtocolo($_POST['numero_protocolo']);

    $Servico = new ServicoDao();
    $Servico->finalizarServico($ClassServico);
}

?>
<link href="../../layout/css/cliente_painel.css" rel="stylesheet">
<div id="logo">
    <img src="../../images/primazia.png" alt="" width="250" height="190">
</div>

<div class="container">

    <table class="table table-hover">
        <thead style="background-color: #e9781e; color:white; font-family: 'Montserrat', sans-serif">
            <tr>
                <th class="text-center" scope="col">Status</th>
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
                <tr data-bs-toggle="modal" data-bs-target="#view<?php echo $dados['id']; ?>">
                    <td class="text-center"><?php

                                            if ($dados['status'] === 'A') {
                                            ?> <img src="../../icons/1.png" width="30"> <?php
                                                                                    } elseif ($dados['status'] === 'E') {
                                                                                        ?> <img src="../../icons/2.png" width="30"> <?php
                                                                                                                                } elseif ($dados['status'] === 'F') {
                                                                                                                                    ?> <img src="../../icons/3.png" width="30"> <?php
                                                                                                                                                                            }
                                                                                                                                                                                ?>
                    </td>
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

                    <?php

                    $data = $dados['data'];

                    $data = implode('-', array_reverse(explode('/', $data)));
                    $data = implode('/', array_reverse(explode('-', $data)));
                    ?>

                    <!-- Modal -->
                    <div class="modal fade" id="view<?php echo $dados['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Pedido: <?php echo $dados['protocolo']; ?></h5>
                                    <h5 class="modal-title" id="staticBackdropLabel" style="margin-left: 200px;">Data: <?php echo $data; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">



                                    <div>

                                        <?php

                                        $id = $dados['cpf'];
                                        $perfil = $ClassPedido->cliente($id);

                                        echo '<div id="principal">';
                                        echo ' <img src="../../images/' . $perfil["foto"] . ' "width="100px">';
                                        echo '<p style=";margin-top:20px;"><b>Cliente: </b>' . $perfil["nome"] . '</p>';
                                        echo '<p style=""><b>Telefone: </b>' . $perfil["telefone"] . '</p>';
                                        echo '</div>';
                                        echo '<hr>';

                                        echo '<p style=""><b>Endereço: </b>' . $perfil["logradouro"] . ', ' . $perfil["numero"] . ', ' . $perfil["bairro"] . '</p>';
                                        echo '<b>Complemento: </b>' . $perfil["complemento"];
                                        echo '<hr>';


                                        echo '<span style=""><b>Profissional solicitado: </b>' . $obj->tpservico . '</span>';
                                        echo '<br>';
                                        echo '<span style=""><b>Tipo de Serviço:  </b>';
                                        $total = $obj->categoria;
                                        foreach ($total as $total) {

                                            echo $total . ": ";
                                        }
                                        echo '</span>';
                                        ?>

                                    </div>

                                    <hr>
                                    <p><b>Profissionais que atendem</b></p>



                                    <!----------******************************************************************** --->


                                    <form action="" method="POST">

                                        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                        <input type="hidden" name="status" value="<?php echo $dados['status']; ?>">
                                        <input type="hidden" name="numero_protocolo" value="<?php echo $dados['protocolo']; ?>">
                                        <input type="hidden" name="data" value="<?php echo $data; ?>">


                                        <?php
                                        $pedido = $obj->tpservico;
                                        $dados2 = $ClassPedido->listarProfissionalCategoria($pedido);

                                        $dados3 = $ClassPedido->listaServico($dados['protocolo']);

                                        ?>

                                        <?php

                                        if ($dados['status'] === 'A') {


                                        ?>

                                            <select class="form-select" name="pessoa" aria-label="Default select example">


                                                <?php

                                                $tamanho = count($dados2);

                                                if ($tamanho > 0) {

                                                    if ($dados['status'] != 'F') {

                                                        echo " <option selected>Selecione o profissional</option>";
                                                        for ($i = 0; $i < $tamanho; $i++) {
                                                            echo "<option value='" . $dados2[$i]['nome'] . " - " . $dados2[$i]['telefone'] . " - " . $dados2[$i]['email'] . "'>" . $dados2[$i]['nome'] . " - " . $dados2[$i]['telefone'] . " - " . $dados2[$i]['email'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option value='" . $dados2[$i]['nome'] . "'>Finalizado</option>";
                                                    }
                                                } else {
                                                    echo "<option>Não possui profissional para essa demanda!</option>";
                                                }


                                                ?>

                                            </select>
                                        <?php
                                        } else {

                                            echo '<input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example" value="' . $dados3[0]['nome'] . '"disabled>';
                                        }
                                        ?>

                                        <div class="modal-footer">
                                            <?php

                                            if ($dados['status'] === 'A') {
                                            ?>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <input type="submit" name="chamado" class="btn btn-success" value="Atender">
                                            <?php
                                            }

                                            if ($dados['status'] === 'F') {
                                            ?>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-danger">Finalizado</button>

                                            <?php
                                            }

                                            if ($dados['status'] === 'E') {
                                            ?>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <input type="submit" name="chamado_finalizado" class="btn btn-warning" value="Finalizar" style="color: white;">
                                            <?php
                                            }

                                            ?>


                                        </div>
                                    </form>

                                    <!----------******************************************************************** --->

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