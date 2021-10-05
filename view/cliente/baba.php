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

            'tpservico' => 'Babá',
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
            <p>Babá</p>

        </div>


        <form action="" method="post">

            <div id="form-row">


                <!--***************************************************************************** --->
                <div id="pergunta01">

                    <div class="row g-12 ms-3 p-2">
                        <label class="fs-3">Quantas crianças estarão sob os cuidados da babá?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1 criança" name="categoria[]" id="1criança" title="">
                            <label class="form-check-label" for="1criança" title="">
                                1 criança
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="2 crianças" name="categoria[]" id="2criança" title="">
                            <label class="form-check-label" for="2criança" title="">
                                2 crianças
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="3 crianças " name="categoria[]" id="3criança" title="">
                            <label class="form-check-label" for="3criança" title="">
                                3 crianças
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="4 crianças" name="categoria[]" id="4criança" title="">
                            <label class="form-check-label" for="4criança" title="">
                                3 crianças
                            </label>
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
                        <label class="fs-3">Qual a idade da (s) criança (s)?</label>
                            <br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="0 a 12 meses" name="descricao[]" id="0a12meses" title="">
                                <label class="form-check-label" for="0a12meses" title="">
                                    0 a 12 meses
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1 a 5 anos" name="descricao[]" id="1a5anos" title="">
                                <label class="form-check-label" for="1a5anos" title="">
                                    1 a 5 anos
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="6 a 10 anos" name="descricao[]" id="36a10anos" title="">
                                <label class="form-check-label" for="36a10anos" title="">
                                    6 a 10 anos
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mais que 10 anos" name="descricao[]" id="Maisque10anos" title="">
                                <label class="form-check-label" for="Maisque10anos" title="">
                                    Mais que 10 anos
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
    function avançando01() {

        var check01 = document.getElementById('1criança');
        var check02 = document.getElementById('2criança');
        var check03 = document.getElementById('3criança');
        var check04 = document.getElementById('4criança');

        if (check01.checked || check02.checked || check03.checked || check04.checked) {

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