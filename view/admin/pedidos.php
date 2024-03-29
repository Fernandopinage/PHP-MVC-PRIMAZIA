<?php


include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
include_once "../../class/ClassServico.php";
include_once "../../dao/ServicoDAO.php";
include_once "../../dao/ClienteDAO.php";


session_start();

if (empty($_SESSION['admin'])) {

    header('location: ../../view/admin/login.php');
}

if (isset($_POST['filtror'])) {

    if (!empty($_POST['status_filtro']) or !empty($_POST['num_filtro']) or !empty($_POST['pagamento']) or !empty($_POST['data_inicio_filtro']) or !empty($_POST['data_final_filtro'])) {



        $status =  $_POST['status_filtro'];
        $num =  $_POST['num_filtro'];
        $pagamento =  $_POST['pagamento'];
        $data_inicio =  $_POST['data_inicio_filtro'];
        $data_final =  $_POST['data_final_filtro'];

        $ClassPedido = new CategoriaDAO();
        $dados = $ClassPedido->pedidosFiltro($status, $num, $pagamento, $data_inicio, $data_final);
    } else {



        $ClassPedido = new CategoriaDAO();
        $dados = $ClassPedido->pedido();
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
        $ClassServico->SetText($_POST['text']);
        $ClassServico->SetValor($_POST['valor']);

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
    $ClassServico->SetNome($_POST['pessoa_finalizado']);

    $Servico = new ServicoDao();
    $Servico->finalizarServico($ClassServico);
}

if (isset($_POST['chamado_atualizado'])) {

    $ClassServico = new Servico();
    $ClassServico->SetProtocolo($_POST['protocolo']);
    $ClassServico->SetNome($_POST['profissional']);
    $ClassServico->SetPagamento($_POST['pagamento']);
    $ClassServico->SetValor($_POST['valor']);
    $ClassServico->SetText($_POST['text']);



    $Servico = new ServicoDao();
    $Servico->updateServico($ClassServico);
}




?>

<div style="margin-left: 50px;">
    <a id="retorne" href="../../view/admin/painel.php" class="btn" style="position: relative; top:50px;background-color:orangered"><img src="../../images/left-arrow.png" width="28px" alt=""></a>
</div>
<div class="text-center">
    <a href="https://gotoservice.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
</div>
<hr>
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
                <select class="form-select form-select-sm" name="pagamento" aria-label="select example">
                    <option value=""></option>
                    <option value="Pix">Pix</option>
                    <option value="Cartão de Crédito">Cartão de Crédito</option>
                    <option value="Cartão de Débito">Cartão de Débito</option>

                </select>

            </div>
            <div class="col-md-2" style="margin-top: 42px;">
                <input type="submit" name="filtror" class="btn btn-secondary" value="Filtrar">
                <?php
                if (isset($dados[0]['excel'])) {


                ?>

                    <a href="../admin/excel.php?p=<?php echo $dados[0]['excel'] ?>" class="btn btn-success">Gerar Excel</a>
                <?php

                }
                ?>

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
                <th class="text-center" scope="col">Data</th>
                <th scope="col">Nº Pedido</th>
                <th scope="col">Cliente</th>
                <!-- <th scope="col">Telefone</th> --->
                <th scope="col">Serviço</th>
                <!-- <th scope="col">Tipo de Serviço</th> -->
                <th scope="col">Valor do Serviço</th>
                <th scope="col">Forma de Pagamento</th>
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
                    <th scope="row" style="color: #086c24;" data-bs-toggle="modal"><?php echo date('d/m/Y', strtotime($dados['data'])); ?></th>
                    <th scope="row" style="color: #086c24;" data-bs-toggle="modal"><?php echo $dados['protocolo']; ?></th>
                    <td><?php echo $dados['nome']; ?></td>
                    <!-- <td><?php echo $dados['telefone']; ?></td>-->
                    <td>
                        <?php

                        $obj = $dados['descricao'];
                        print_r($obj->tpservico);

                        ?>

                    </td>
                    <th scope="row" style="color: #086c24;" data-bs-toggle="modal"><?php if (!empty($dados['valor'])) {

                                                                                        echo $dados['valor'];
                                                                                    } else {

                                                                                        echo "---";
                                                                                    }


                                                                                    ?></th>
                    <th scope="row" class="text-center"><?php
                                                        if (!empty($dados['pagamento'])) {

                                                            echo $dados['pagamento'];
                                                        } else {

                                                            echo "---";
                                                        }

                                                        ?></th>
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
                                        if (!empty($perfil["foto"])) {

                                            echo '<div class="text-center">';
                                            echo ' <img src="../../images/' . $perfil["foto"] . ' "width="100px">';
                                            echo '<br>';
                                            $Star = new ClienteDAO();
                                            $star = $Star->selectStar($perfil["email"]);

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

                                                echo $star = round($star, 2);
                                            }



                                            if ($star >= 1.51 and $star <= 1.99) {
                                            ?>
                                                <img src="../../icons/1.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }


                                            if ($star >= 2.00 and $star <= 2.49) {
                                            ?>
                                                <img src="../../icons/2pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 2.50 and $star <= 2.99) {
                                            ?>
                                                <img src="../../icons/2.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 3.00 and $star <= 3.49) {
                                            ?>
                                                <img src="../../icons/3pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }


                                            if ($star >= 3.50 and $star <= 3.99) {
                                            ?>
                                                <img src="../../icons/3.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 4.00 and $star <= 4.49) {
                                            ?>
                                                <img src="../../icons/4pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 4.50 and $star <= 4.99) {
                                            ?>
                                                <img src="../../icons/4.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }
                                            if ($star == 5) {
                                            ?>
                                                <img src="../../icons/5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }
                                            echo '</div>';
                                        } else {



                                            echo '<div class="text-center">';
                                            echo '<img id="usuario" src="../../images/perfil.png" class="img" width="100px">';
                                            echo "<br>";



                                            $Star = new ClienteDAO();
                                            $star = $Star->selectStar($perfil["telefone"]);

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

                                                echo $star = round($star, 2);
                                            }



                                            if ($star >= 1.51 and $star <= 1.99) {
                                            ?>
                                                <img src="../../icons/1.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }


                                            if ($star >= 2.00 and $star <= 2.49) {
                                            ?>
                                                <img src="../../icons/2pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 2.50 and $star <= 2.99) {
                                            ?>
                                                <img src="../../icons/2.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 3.00 and $star <= 3.49) {
                                            ?>
                                                <img src="../../icons/3pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }


                                            if ($star >= 3.50 and $star <= 3.99) {
                                            ?>
                                                <img src="../../icons/3.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 4.00 and $star <= 4.49) {
                                            ?>
                                                <img src="../../icons/4pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 4.50 and $star <= 4.99) {
                                            ?>
                                                <img src="../../icons/4.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }
                                            if ($star == 5) {
                                            ?>
                                                <img src="../../icons/5pp.png" class="img" width="130">
                                        <?php

                                                echo $star = round($star, 2);
                                            }

                                            echo "</div>";
                                        }
                                        echo '<p style=";margin-top:20px;"><b>Cliente: </b>' . $perfil["nome"] . '</p>';
                                        echo '<p style=""><b>E-mail: </b>' . $perfil["email"] . '</p>';
                                        echo '<p style=""><b>Telefone: </b>' . $perfil["telefone"] . '</p>';
                                        echo '</div>';
                                        echo '<hr>';

                                        echo '<p style=""><b>Endereço: </b>' . $perfil["logradouro"] . ', <b>Nº: </b> ' . $perfil["numero"] . ', <b>Bairro: </b> ' . $perfil["bairro"] . ', <b>CEP: </b>' . $perfil["cep"] . '</p>';
                                        echo '<b>Complemento: </b>' . $perfil["complemento"];
                                        echo '<hr>';


                                        echo '<span style=""><b>Profissional solicitado: </b>' . $obj->tpservico . '</span>';
                                        echo '<br>';


                                        if ($dados['status'] === 'A' or $dados['status'] === 'E' or $dados['status'] === 'F') {

                                            if (isset($obj->categoria)) {
                                                $total = $obj->categoria;

                                                echo '<span style=""><b>Tipo de Serviço:  </b>';
                                                foreach ($total as $total) {

                                                    echo $total . " ";
                                                }


                                                echo '</span>';
                                                echo "<br>";
                                            }

                                            if (isset($obj->descricao)) {

                                                $total  = $obj->descricao;

                                                if (gettype($total) == 'string') {

                                                    echo '<span style=""><b>Descrição:  </b>';
                                                    echo $total . " ";
                                                } else {

                                                    echo '<span style=""><b>Descrição:  </b>';
                                                    foreach ($total as $total) {
                                                        echo $total . " ";
                                                    }
                                                }




                                                echo '</span>';
                                                echo "<br>";
                                            }



                                            if (isset($obj->local)) {
                                                $total = $obj->local;
                                                echo '<span style=""><b>Local:  </b>';
                                                foreach ($total as $total) {

                                                    echo $total . " ";
                                                }
                                                echo '</span>';
                                                echo "<br>";
                                            }


                                            if (isset($obj->serviço)) {
                                                $total = $obj->serviço;

                                                echo '<span style=""><b>Serviço:  </b>';
                                                foreach ($total as $total) {

                                                    echo $total . " ";
                                                }
                                                echo '</span>';
                                                echo "<br>";
                                            }
                                        } elseif ($dados['status'] === 'C') {


                                            if (isset($obj->categoria)) {
                                                $total = $obj->categoria;

                                                echo '<span style=""><b>Tipo de Serviço:  </b>';
                                                foreach ($total as $total) {

                                                    echo $total . " ";
                                                }


                                                echo '</span>';
                                                echo "<br>";
                                            }

                                            if (isset($obj->descricao)) {
                                                $total = $obj->descricao;

                                                if(gettype($total) == 'string'){
                                                    echo '<span style=""><b>Descrição:  </b>';
                                                    echo $total . " ";
                                                }else{

                                                
                                                echo '<span style=""><b>Descrição:  </b>';
                                                foreach ($total as $total) {

                                                    echo $total . " ";
                                                }
                                                }
                                                echo '</span>';
                                                echo "<br>";
                                            }


                                            if (isset($obj->local)) {
                                                $total = $obj->local;

                                                echo '<span style=""><b>Local:  </b>';
                                                foreach ($total as $total) {

                                                    echo $total . " ";
                                                }
                                                echo '</span>';
                                                echo "<br>";
                                            }


                                            if (isset($obj->serviço)) {
                                                $total = $obj->serviço;

                                                echo '<span style=""><b>Serviço:  </b>';
                                                foreach ($total as $total) {

                                                    echo $total . " ";
                                                }
                                                echo '</span>';
                                                echo "<br>";
                                            }
                                        }




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

                                        if ($dados['status'] === 'A') {



                                        ?>

                                            <select class="form-select" name="pessoa" id="pessoa" aria-label="Default select example" required>


                                                <?php

                                                $tamanho = count($dados2);


                                                if ($tamanho > 0) {

                                                    if ($dados['status'] != 'C') {

                                                        if ($dados['status'] != 'F') {

                                                            echo " <option value=''>Selecione o profissional</option>";
                                                            for ($i = 0; $i < $tamanho; $i++) {
                                                                echo "<option value='" . $dados2[$i]['nome'] . " - " . $dados2[$i]['telefone'] . " - " . $dados2[$i]['email'] . "'>" . $dados2[$i]['nome'] . " - " . $dados2[$i]['telefone'] . " - " . $dados2[$i]['email'] . " - Classificação: " . round($dados2[$i]['soma'], 2) . "</option>";
                                                            }
                                                        } else {
                                                            echo "<option value='" . $dados2[$i]['nome'] . "'>Finalizado</option>";
                                                        }
                                                    } else {
                                                        echo "<option>Cliente cancelado!</option>";
                                                    }
                                                } else {
                                                    echo "<option>Não possui profissional para essa demanda!</option>";
                                                }


                                                ?>

                                            </select>

                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p><b>Forma de Pagamento</b><span style="color: red; font-size:16px"> *</span></p>
                                                    <select id="pagamento" name="pagamento" class="form-select form-select-sm" required>
                                                        <option selected></option>
                                                        <option value="Cartão de Crédito">Cartão de Crédito</option>
                                                        <option value="Cartão de Débito">Cartão de Débito</option>
                                                        <option value="PIX">PIX</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <p><b>Valor do Serviço</b><span style="color: red; font-size:16px"> *</span></p>
                                                    <input type="text" class="form-control form-control-sm" name="valor" id="valor" onkeypress="return(moeda(this,'.',',',event))" required>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="mb-3">
                                                    <p><b>Informações adicionais do administrador </b></p>
                                                    <textarea class="form-control" id="text" name="text" rows="3"></textarea>
                                                </div>
                                            </div>
                                        <?php
                                        }


                                        if ($dados['status'] === 'C') {


                                        ?>

                                            <select class="form-select" name="pessoa" aria-label="Default select example" required>


                                                <?php


                                                $tamanho = count($dados2);

                                                if ($tamanho > 0) {

                                                    if ($dados['status'] != 'C') {

                                                        if ($dados['status'] != 'F') {

                                                            echo " <option value=''>Selecione o profissional</option>";
                                                            for ($i = 0; $i < $tamanho; $i++) {
                                                                echo "<option value='" . $dados2[$i]['nome'] . " - " . $dados2[$i]['telefone'] . " - " . $dados2[$i]['email'] . "'>" . $dados2[$i]['nome'] . " - " . $dados2[$i]['telefone'] . " - " . $dados2[$i]['email'] . " - Classificação: " . round($dados2[$i]['soma'], 2) . "</option>";
                                                            }
                                                        } else {
                                                            echo "<option value='" . $dados2[$i]['nome'] . "'>Finalizado</option>";
                                                        }
                                                    } else {
                                                        echo "<option>Cliente cancelado!</option>";
                                                    }
                                                } else {
                                                    echo "<option>Não possui profissional para essa demanda!</option>";
                                                }


                                                ?>

                                            </select>

                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p><b>Forma de Pagamento</b><span style="color: red; font-size:16px"> *</span></p>
                                                    <select id="pagamento" name="pagamento" class="form-select form-select-sm" disabled>
                                                        <option selected></option>
                                                        <option value="Cartão de Crédito">Cartão de Crédito</option>
                                                        <option value="Cartão de Débito">Cartão de Débito</option>
                                                        <option value="PIX">PIX</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <p><b>Valor do Serviço</b><span style="color: red; font-size:16px"> *</span></p>
                                                    <input type="text" class="form-control form-control-sm" name="valor" onkeypress="return(moeda(this,'.',',',event))" disabled>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="mb-3">
                                                    <p><b>Informações adicionais do administrador </b></p>
                                                    <textarea class="form-control" id="text" name="text" rows="3" disabled></textarea>
                                                </div>
                                            </div>
                                        <?php
                                        }

                                        if ($dados['status'] === 'E') {
                                        ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" value="<?php echo $dados3[0]['protocolo']; ?>" name="protocolo">
                                                    <input type="hidden" value="<?php echo $dados3[0]['profissional']; ?>" name="pessoa_finalizado">
                                                    <select class="form-select form-select-sm" aria-label="Default select example" name="profissional">
                                                        <?php


                                                        $tamanho = count($dados2);
                                                        for ($i = 0; $i < $tamanho; $i++) {
                                                            echo "<option value='" . $dados2[$i]['nome'] . " - " . $dados2[$i]['telefone'] . " - " . $dados2[$i]['email'] . "'>" . $dados2[$i]['nome'] . " - " . $dados2[$i]['telefone'] . " - " . $dados2[$i]['email'] . " - Classificação: " . round($dados2[$i]['soma'], 2) . "</option>";
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12" style="margin-top: 20px;">
                                                        <hr>
                                                        <p><b>Profissional que está atendendo</b></p>


                                                        <?php

                                                        $protocolo = $dados3[0]['protocolo'];
                                                        $update = new ServicoDao();
                                                        $dados4 = $update->profissionalAtualizando($protocolo);



                                                        ?>

                                                        <select class="form-select form-select-sm" aria-label="Default select example" disabled>
                                                            <?php



                                                            $tamanho = count($dados4);
                                                            for ($i = 0; $i < $tamanho; $i++) {
                                                                echo "<option value='" . $dados4[$i]['nome'] . " - " . $dados4[$i]['telefone'] . " - " . $dados4[$i]['email'] . "'>" . $dados4[$i]['nome'] . " - " . $dados4[$i]['telefone'] . " - " . $dados4[$i]['email'] . "</option>";
                                                            }
                                                            ?>

                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p><b>Forma de Pagamento</b></p>
                                                    <select id="pagamento" name="pagamento" class="form-select form-select-sm">
                                                        <option <?php echo $dados3[0]['pagamento'] === 'Cartão Crédito' ? 'selected' : ''; ?> value="Cartão Crédito">Cartão Crédito</option>
                                                        <option <?php echo $dados3[0]['pagamento'] === 'Cartão Débito' ? 'selected' : ''; ?> value="Cartão Débito">Cartão Débito</option>
                                                        <option <?php echo $dados3[0]['pagamento'] === 'PIX' ? 'selected' : ''; ?> value="PIX">PIX</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <p><b>Valor do Serviço</b></p>
                                                    <input type="text" class="form-control form-control-sm" value="<?php echo $dados3[0]['valor']; ?>" onkeypress="return(moeda(this,'.',',',event))" name="valor">
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="mb-3">
                                                    <p><b>Informações adicionais do administrador </b></p>
                                                    <textarea class="form-control" id="text" name="text" rows="3"><?php echo $dados3[0]['text']; ?></textarea>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        if ($dados['status'] === 'F') {
                                        ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" value="<?php echo $dados3[0]['profissional']; ?>" name="pessoa_finalizado"><!-- hidden -->
                                                    <select class="form-select form-select-sm" aria-label="Default select example" disabled>
                                                        <option value="<?php echo $dados3[0]['profissional']; ?>"><?php echo $dados3[0]['profissional']; ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p><b>Forma de Pagamento</b></p>
                                                    <select id="pagamento" name="pagamento" class="form-select form-select-sm" disabled>
                                                        <option selected> <?php echo $dados3[0]['pagamento']; ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <p><b>Valor do Serviço</b></p>
                                                    <input type="text" class="form-control form-control-sm" value="<?php echo $dados3[0]['valor']; ?>" onkeypress="return(moeda(this,'.',',',event))" name="valor" disabled>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="mb-3">
                                                    <p><b>Informações adicionais do administrador </b></p>
                                                    <textarea class="form-control" id="text" name="text" rows="3" disabled><?php echo $dados3[0]['text']; ?></textarea>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>



                                        <div class="modal-footer">
                                            <?php

                                            if ($dados['status'] === 'A') {
                                            ?>
                                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
                                                <input type="submit" name="chamado_cancelado" onclick="Cancelado()" class="btn btn-secondary" value="Cancelar" style="color: white;">
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
                                                <input type="submit" name="chamado_atualizado" class="btn btn-success" value="Atualizar" style="color: white;">
                                                <input type="submit" name="chamado_finalizado" class="btn btn-warning" value="Finalizar" style="color: white;">
                                            <?php
                                            }

                                            if ($dados['status'] === 'C') {

                                            ?>
                                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
                                                <!--<input type="submit" name="chamado_ativar" class="btn btn-success" value="Ativar"> -->
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

<script>
    function moeda(a, e, r, t) {
        let n = "",
            h = j = 0,
            u = tamanho2 = 0,
            l = ajd2 = "",
            o = window.Event ? t.which : t.keyCode;
        if (13 == o || 8 == o)
            return !0;
        if (n = String.fromCharCode(o),
            -1 == "0123456789".indexOf(n))
            return !1;
        for (u = a.value.length,
            h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
        for (l = ""; h < u; h++)
            -
            1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
        if (l += n,
            0 == (u = l.length) && (a.value = ""),
            1 == u && (a.value = "0" + r + "0" + l),
            2 == u && (a.value = "0" + r + l),
            u > 2) {
            for (ajd2 = "",
                j = 0,
                h = u - 3; h >= 0; h--)
                3 == j && (ajd2 += e,
                    j = 0),
                ajd2 += l.charAt(h),
                j++;
            for (a.value = "",
                tamanho2 = ajd2.length,
                h = tamanho2 - 1; h >= 0; h--)
                a.value += ajd2.charAt(h);
            a.value += r + l.substr(u - 2, u)
        }
        return !1
    }
</script>


<script>


</script>

<?php
require "../../layout/footer.php";
?>