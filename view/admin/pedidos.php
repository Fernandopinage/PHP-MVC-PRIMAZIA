<?php
include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
include_once "../../class/ClassServico.php";
include_once "../../dao/ServicoDAO.php";


session_start();

if (empty($_SESSION['admin'])) {

    header('location: ../../view/admin/login.php');
}

if (isset($_POST['filtror'])) {

    if (isset($_POST['status_filtro']) or isset($_POST['num_filtro'])) {

        $status =  $_POST['status_filtro'];
        $num =  $_POST['num_filtro'];

        $ClassPedido = new CategoriaDAO();
        $dados = $ClassPedido->pedidosFiltro($status, $num);
    }
    if (empty($_POST['status_filtro']) and empty($_POST['num_filtro'])) {


        $ClassPedido = new CategoriaDAO();
        $dados = $ClassPedido->pedido();
    }

    if (!empty($_POST['status_filtro']) and !empty($_POST['data_inicio_filtro']) or !empty($_POST['data_final_filtro'])) {

        $status = $_POST['status_filtro'];
        $data_inicio =  $_POST['data_inicio_filtro'];
        $data_final =  $_POST['data_final_filtro'];

        $ClassPedido = new CategoriaDAO();
        $dados = $ClassPedido->pedidosFiltroData($status, $data_inicio, $data_final);
    }
} else {

    $ClassPedido = new CategoriaDAO();
    $dados = $ClassPedido->pedido();
}




if (isset($_POST['chamado'])) {

    if ($_POST['pessoa'] != 'Selecione o profissional') {

        $data =  date('Y/m/d');

        $ClassServico = new Servico();

        $ClassServico->SetNome($_POST['pessoa']);
        $ClassServico->SetData($data);
        $ClassServico->SetStatus($_POST['status']);
        $ClassServico->SetProtocolo($_POST['numero_protocolo']);
        $ClassServico->SetID($_POST['id']);
        $ClassServico->SetPagamento($_POST['pagamento']);

        $Servico = new ServicoDao();
        $Servico->inserServico($ClassServico);
    }
}

if (isset($_POST['chamado_cancelado'])) {

    $ClassProtocolo = new Servico();
    $ClassProtocolo = $_POST['numero_protocolo'];

    $Protocolo = new CategoriaDAO();
    $Protocolo->updateStatus($ClassProtocolo);
}

if (isset($_POST['chamado_ativar'])) {

    $ClassProtocolo = new Servico();
    $ClassProtocolo = $_POST['numero_protocolo'];

    $Protocolo = new CategoriaDAO();
    $Protocolo->ativaStatus($ClassProtocolo);
}

if (isset($_POST['chamado_finalizado'])) {

    $ClassServico = new Servico();
    $ClassServico->SetStatus($_POST['status']);
    $ClassServico->SetProtocolo($_POST['numero_protocolo']);

    $Servico = new ServicoDao();
    $Servico->finalizarServico($ClassServico);

    /********* aqui logica da star *************/
    //        usar o numero do protocolo        /
    /***************************************** */
}

?>

<div id="logo">
    <a href="https://primazia.agenciaprogride.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
</div>
<hr>
<br>

<div class="container">
    <form method="POST">

        <div class="row g-3">



            <div class="col-md-2">
                <label for="validationServer01" class="form-label">Status</label>
                <select class="form-select form-select-sm" name="status_filtro" aria-label="select example">
                    <option value=""></option>
                    <option value="A">Em Aberto</option>
                    <option value="E">Em Atendimento</option>
                    <option value="F">Finalizado</option>
                    <option value="C">Cancelado</option>
                </select>

            </div>

            <div class="col-md-2">
                <label for="validationDefault01" class="form-label">Número do Pedido</label>
                <input type="text" name="num_filtro" class="form-control form-control-sm" id="validationDefault01">

            </div>
            <div class="col-md-2">
                <label for="validationDefault01" class="form-label">Data Inicial</label>
                <input type="date" name="data_inicio_filtro" class="form-control form-control-sm" id="validationDefault01">

            </div>
            <div class="col-md-2">
                <label for="validationDefault01" class="form-label">Data Final</label>
                <input type="date" name="data_final_filtro" class="form-control form-control-sm" id="validationDefault01">

            </div>
            <div class="col-md-2">
                <label for="validationDefault01" class="form-label">Forma de Pagamento</label>
                <select class="form-select form-select-sm" name="status_filtro" aria-label="select example">
                    <option value=""></option>
                    <option value="Dinheiro">Pix</option>
                    <option value="Cartão de Crédito">Cartão de Crédito</option>
                    <option value="Cartão de Débito">Cartão de Débito</option>

                </select>

            </div>
            <div class="col-md-2" style="margin-top: 42px;">
                <input type="submit" name="filtror" class="btn btn-secondary" value="Filtrar">

            </div>

        </div>



    </form>
</div>

<div class="container" style="margin-top:30px; margin-bottom:30px;">

    <div class="text-center">

        <img src="../../icons/0.jfif" width="30"> Em Aberto
        <img src="../../icons/2.png" width="30"> Em Atendimento
        <img src="../../icons/1.png" width="30"> Finalizado
        <img src="../../icons/3.png" width="30"> Cancelado

    </div>

</div>



<div class="container">


    <table class="table table-hover">
        <thead style="background-color: #e9781e; color:white; font-family: 'Montserrat', sans-serif">
            <tr>
                <th class="text-center" scope="col">Status</th>
                <th scope="col">Nº Pedido</th>
                <th scope="col">Cliente</th>
                <!-- <th scope="col">Telefone</th> --->
                <th scope="col">Serviço</th>
                <!-- <th scope="col">Tipo de Serviço</th> -->
                <th scope="col">Pagamento</th>
            </tr>
        </thead>
        <tbody style="color: #0D2238;font-family: 'Montserrat', sans-serif">
            <?php

            foreach ($dados as $dados) {


            ?>
                <tr data-bs-toggle="modal" data-bs-target="#view<?php echo $dados['id']; ?>">
                    <td class="text-center"><?php

                                            if ($dados['status'] === 'A') {
                                            ?> <img src="../../icons/0.jfif" width="30"> <?php
                                                                                        } elseif ($dados['status'] === 'E') {
                                                                                            ?> <img src="../../icons/2.png" width="30"> <?php
                                                                                                                                    } elseif ($dados['status'] === 'F') {
                                                                                                                                        ?> <img src="../../icons/1.png" width="30"> <?php
                                                                                                                                                                                } elseif ($dados['status'] === 'C') {
                                                                                                                                                                                    ?>
                            <img src="../../icons/3.png" width="30"><?php
                                                                                                                                                                                }
                                                                    ?>
                    </td>
                    <th scope="row" style="color: #086c24;" data-bs-toggle="modal"><?php echo $dados['protocolo']; ?></th>
                    <td><?php echo $dados['nome']; ?></td>
                    <!-- <td><?php echo $dados['telefone']; ?></td>-->
                    <td>
                        <?php

                        $obj = $dados['descricao'];
                        print_r($obj->tpservico);

                        ?>

                    </td>
                    <th scope="row" style="color: #086c24;"></th>
                    <!--
                    <td>
                        <?php

                        $obj = $dados['descricao'];
                        $total = $obj->categoria;

                        foreach ($total as $total) {

                            echo $total . "<br>";
                        }
                        ?>

                    </td>
                    -->

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
                                        if (isset($perfil["foto"])) {

                                            echo ' <img src="../../images/' . $perfil["foto"] . ' "width="100px">';
                                        } else {
                                            echo '<img id="usuario" src="../../images/perfil.png" class="img">';
                                        }
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

                                        $ClassPedido = new CategoriaDAO();
                                        $dados3 = $ClassPedido->listaServico($dados['protocolo']);



                                        ?>

                                        <?php

                                        if ($dados['status'] === 'A' or $dados['status'] === 'C') {


                                        ?>

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <select class="form-select" name="pessoa" id="pessoa" aria-label="Default select example">


                                                        <?php

                                                        $tamanho = count($dados2);

                                                        if ($tamanho > 0) {

                                                            if ($dados['status'] != 'C') {

                                                                if ($dados['status'] != 'F') {

                                                                    echo " <option></option>";
                                                                    for ($i = 0; $i < $tamanho; $i++) {
                                                                        echo "<option value='" . $dados2[$i]['nome'] . " - " . $dados2[$i]['telefone'] . " - " . $dados2[$i]['email'] . "'>" . $dados2[$i]['nome'] . " - " . $dados2[$i]['telefone'] . " - " . $dados2[$i]['email'] . "</option>";
                                                                    }
                                                                } else {
                                                                    echo "<option value='" . $dados2[$i]['nome'] . "'>Finalizado</option>";
                                                                }
                                                            } else {
                                                                echo "<option value='Cliente cancelado!'>Cliente cancelado!</option>";
                                                            }
                                                        } else {
                                                            echo "<option>Não possui profissional para essa demanda!</option>";
                                                        }


                                                        ?>

                                                    </select>
                                                </div>
                                      
                                            </div>
                                        <?php
                                        } else {

                                            echo '<input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example" value="' . $dados3[0]['nome'] . '"disabled>';
                                        }
                                        ?>
      

                                        <hr>
                                        <p><b>Forma de Pagamento</b></p>
                                        <div class="row">
                                        <div class="col-md-4" style="margin-bottom: 50px;">
                                                    <select class="form-select form-select-sm" name="pagamento" id="pagamento" aria-label="Default select example">
                                                        <option></option>
                                                        <option value="Cartão de Crédito">Cartão de Crédito</option>
                                                        <option value="Cartão de Debito">Cartão de Debito</option>
                                                        <option value="Pix">Pix</option>
                                                    </select>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <?php

                                            if ($dados['status'] === 'A') {
                                            ?>
                                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
                                                <input type="submit" name="chamado_cancelado" class="btn btn-secondary" value="Cancelar" style="color: white;">
                                                <?php
                                                if ($tamanho > 0) {
                                                ?>

                                                    <input type="submit" name="chamado" class="btn btn-success" value="Atender">

                                                <?php
                                                } else {
                                                ?>

                                                    <a onclick="profissional()" class="btn btn-success">Atender </a>

                                                <?php

                                                }

                                                ?>
                                            <?php
                                            }

                                            if ($dados['status'] === 'F') {
                                            ?>
                                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
                                                <button type="button" class="btn btn-danger">Finalizado</button>

                                            <?php
                                            }

                                            if ($dados['status'] === 'E') {
                                            ?>
                                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
                                                <input type="submit" name="chamado_cancelado" class="btn btn-secondary" value="Cancelar" style="color: white;">
                                                <input type="submit" name="chamado_finalizado" class="btn btn-warning" value="Finalizar" style="color: white;">
                                            <?php
                                            }

                                            if ($dados['status'] === 'C') {

                                            ?>
                                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
                                                <input type="submit" name="chamado_ativar" class="btn btn-success" value="Ativar">
                                                <button type="button" class="btn btn-danger">Cancelado</button>

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

<script>
    function profissional() {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Erro',
            text: 'Não foi selecionado nenhum profissional!',
            showConfirmButton: false,
            timer: 3500
        })
    }
</script>



<?php
require "../../layout/footer.php";
?>