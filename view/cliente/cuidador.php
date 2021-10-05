<?php

include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
include_once "../../class/ClassCategoria.php";
include_once "../../dao/gerarProtocolo.php";

session_start();
if (empty($_SESSION['user'])) {

    header('location: ../../view/cliente/login.php');
}

if (isset($_POST['salvaBaba'])) {

    if (!empty($_POST['categoria'])) {


        $ClassRequest = new Categoria();
        $ClassRequest->SetNome($_SESSION['user']['nome']);
        $ClassRequest->SetTelefone($_SESSION['user']['telefone']);
        $ClassRequest->SetEmail($_SESSION['user']['email']);
        $ClassRequest->SetCpf($_SESSION['user']['cpf']);
        $ClassRequest->SetCep($_SESSION['user']['cep']);
        $ClassRequest->SetCidade($_SESSION['user']['cidade']);
        $ClassRequest->SetLogradouro($_SESSION['user']['rua']);
        $ClassRequest->SetNumero($_SESSION['user']['numero']);
        $ClassRequest->SetUf($_SESSION['user']['uf']);
        $ClassRequest->SetBairro($_SESSION['user']['bairro']);
        $ClassRequest->SetComplemento($_SESSION['user']['complemento']);
        $ClassRequest->SetProtocolo(Protocolo::gerarProtocolo());

        $dados = array(

            'tpservico' => 'Cuidador de pessoas',
            'categoria' => $_POST['categoria'],
            'descricao' => $_POST['descricao'],


        );


        $ClassRequest->SetDescricao($dados);
        $Dedetizacao = new CategoriaDAO();
        $Dedetizacao->insertReparos($ClassRequest);
    }
}

?>
<link href="../../layout/css/cliente_baba.css" rel="stylesheet">
<div class="container-fluid">
    <a id="retorne" href="../../view/cliente/pedido.php" class="btn" style="position: relative; top:50px;background-color:orangered"><img src="../../images/left-arrow.png" width="28px" alt=""></a>
    <div class="container" id="registro">
        <div class="text-center">
            <a href="https://primazia.agenciaprogride.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
        </div>

        <div class="title text-center">
            <p>Cuidador de pessoas</p>

        </div>


        <form action="" method="post">

            <div id="form-row">


                <!--***************************************************************************** --->
                <div id="pergunta01">

                    <div class="row g-12 ms-3 p-2">
                        <label class="fs-3">Qual serviços você procura?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Acompanhamento em saídas (supermercado, Shopping, etc)" name="categoria[]" id="saídas" title="">
                            <label class="form-check-label" for="saídas" title="">
                                Acompanhamento em saídas (supermercado, Shopping, etc)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Acompanhamento terapêutico (consultas, pós operatório, etc)" name="categoria[]" id="terapêutico" title="">
                            <label class="form-check-label" for="terapêutico" title="">
                                Acompanhamento terapêutico (consultas, pós operatório, etc)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Administração de medicamentos" name="categoria[]" id="medicamentos" title="">
                            <label class="form-check-label" for="medicamentos" title="">
                                Administração de medicamentos
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Administração de refeições" name="categoria[]" id="refeições" title="">
                            <label class="form-check-label" for="refeições" title="">
                                Administração de refeições
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Banho" name="categoria[]" id="Banho" title="">
                            <label class="form-check-label" for="Banho" title="">
                                Banho
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Companhia" name="categoria[]" id="Companhia" title="">
                            <label class="form-check-label" for="Companhia" title="">
                                Companhia
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Transporte" name="categoria[]" id="Transporte" title="">
                            <label class="form-check-label" for="Transporte" title="">
                                Transporte
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Outros" name="categoria[]" id="Outros" title="">
                            <label class="form-check-label" for="Outros" title="">
                                Outros
                            </label>
                            <div id="lista2">

                                <div class="mb-3">
                                    <label for="outros" class="form-label"></label>
                                    <textarea name="categoria[]" class="form-control" id="" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="avanca01" onclick="avançando01()" class="btn orangered btn-lg">AVANÇAR</button>
                        </div>
                    </div>
                </div>
                <!--***************************************************************************** --->

                <!--***************************************************************************** --->
                <div id="pergunta02">
                    <div class="row g-5">
                        <div class="col">
                            <label class="fs-3">O paciente é?</label>
                            <br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Adulto com limitações" name="descricao[]" id="Adulto" title="">
                                <label class="form-check-label" for="Adulto" title="">
                                    Adulto com limitações
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Criança com limitações" name="descricao[]" id="Criança" title="">
                                <label class="form-check-label" for="Criança" title="">
                                    Criança com limitações
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Idoso" name="descricao[]" id="Idoso" title="">
                                <label class="form-check-label" for="Idoso" title="">
                                    Idoso
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Gestante" name="descricao[]" id="Gestante" title="">
                                <label class="form-check-label" for="Gestante" title="">
                                    Gestante
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top: 20px;">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta01" onclick="voltando02()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <input id='botaoEnviar' type="submit" name="salvaBaba" value="FINALIZAR" class="btn orangered btn-lg">
                        </div>
                    </div>
                </div>
                <!--***************************************************************************** --->



            </div>
        </form>
    </div>

    <div class="container" id="registro_logo">
        <img id='photo' src="../../images/baba.gif" class="img">
    </div>


</div>

<script>
    document.getElementById('pergunta02').style.display = 'none';
    document.getElementById('lista2').style.display = 'none';
    $('#Outros').click(function() {

        if (document.getElementById('Outros').checked) {
            document.getElementById('lista2').style.display = 'block';
        } else {
            document.getElementById('lista2').style.display = 'none';
        }
    });


    function avançando01() {

        var check01 = document.getElementById('saídas');
        var check02 = document.getElementById('terapêutico');
        var check03 = document.getElementById('medicamentos');
        var check04 = document.getElementById('refeições');
        var check05 = document.getElementById('Banho');
        var check06 = document.getElementById('Companhia');
        var check07 = document.getElementById('Transporte');
        var check08 = document.getElementById('Outros');


        if (check01.checked || check02.checked || check03.checked || check04.checked || check05.checked || check06.checked || check07.checked || check08.checked) {

            document.getElementById('pergunta01').style.display = 'none';
            document.getElementById('pergunta02').style.display = 'block';
        } else {
            Swal.fire({
                position: 'top-center',
                icon: 'info',
                text: 'PREENCHA COM PELO MENOS UMA OPÇÃO',
                showConfirmButton: false,
                timer: 4500
            })
        }

    }

    function voltando02() {
        document.getElementById('pergunta01').style.display = 'block';
        document.getElementById('pergunta02').style.display = 'none';
    }
</script>

<?php
include_once "../../layout/footer.php";
?>