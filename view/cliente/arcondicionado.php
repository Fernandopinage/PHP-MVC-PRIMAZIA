<?php
session_start();
include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
include_once "../../class/ClassCategoria.php";


if (empty($_SESSION['user'])) {

    header('Refresh: 0.1; url=login.php');
}

if (isset($_POST['arcodicionado'])) {

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

            'tpservico' => 'Manutenção de Ar Condicionado',
            'categoria' => $_POST['categoria'],
            'descricao' => $_POST['descricao'],
            'opcao' => $_POST['opcao'],

        );
        $ClassRequest->SetDescricao($dados);
        $Dedetizacao = new CategoriaDAO();
        $Dedetizacao->insertReparos($ClassRequest);
    }
}

?>
<link href="../../layout/css/cliente_arcondicionado.css" rel="stylesheet">
<div class="container-fluid">
    <a id="retorne" href="../../view/cliente/pedido.php" class="btn" style="position: relative; top:50px;background-color:orangered"><img src="../../images/left-arrow.png" width="28px" alt=""></a>
    <div class="container" id="registro">
        <div class="text-center">
            <img id="logo" src="../../images/primazia.png" class="img"><br>
        </div>

        <div class="title text-center">
            <p>AR-CONDICIONADO</p>

        </div>


        <form action="" method="post">

            <div id="form-row">


                <!--***************************************************************************** --->
                <div id="pergunta01">
                    <label class="fs-3">Quantos btus possui a sua máquina?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="7000btus à 12000btus" name="categoria[]" id="7000_12000_btu" title="">
                        <label class="form-check-label" for="7000_12000_btu" title="">
                            7000btus à 12000btus (janela)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="9000btus à 12000btus" name="categoria[]" id="9000_12000_btu_janela" title="">
                        <label class="form-check-label" for="9000_12000_btu_janela" title="">
                            9000btus à 12000btus
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="18000btus à 24000btus" name="categoria[]" id="18000_24000_btu" title="">
                        <label class="form-check-label" for="18000_24000_btu" title="">
                            18000btus à 24000btus
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Outros" name="categoria[]" id="outros" title="Especificações Extras">
                        <label class="form-check-label" for="outros" title="Outros."> Outros
                        </label>
                        <div id="lista">

                            <div class="mb-3">
                                <label class="form-label"></label>
                                <textarea name="categoria[]" class="form-control" id="outros2" rows="3"></textarea>
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
                            <label class="fs-3">Possui acesso à condensadora?</label>
                            <select class="form-select" name="descricao[]" aria-label="Default select example">
                                <option selected>Selecione</option>
                                <option value="Possui acesso à condensadora? Sim">Sim</option>
                                <option value="Possui acesso à condensadora? Não">Não</option>

                            </select><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta02" onclick="voltando02()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="avanca02" onclick="avançando02()" class="btn orangered btn-lg">AVANÇAR</button>
                        </div>
                    </div>
                </div>

                <!--***************************************************************************** --->

                <!--***************************************************************************** --->
                <div id="pergunta03">
                    <div class="row g-6">
                        <div class="col">
                            <label class="fs-3">É possível remover a evaporadora?</label>
                            <select class="form-select" name="opcao[]" aria-label="Default select example">
                                <option selected>Selecione</option>
                                <option value="É possível remover a evaporadora? Sim">Sim</option>
                                <option value="É possível remover a evaporadora? Não">Não</option>
                            </select><br>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta01" onclick="voltando03()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <input id='botaoEnviar' type="submit" name="arcodicionado" value="FINALIZAR" class="btn orangered btn-lg">
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <div class="container" id="registro_logo">
        <img id='photo' src="../../images/arcondicionado.gif" class="img">
    </div>


</div>

<script>
    document.getElementById('pergunta02').style.display = 'none';
    document.getElementById('pergunta03').style.display = 'none';



    function voltando01() {
        document.getElementById('pergunta01').style.display = 'block';
        document.getElementById('pergunta02').style.display = 'none';
    }

    function avançando01() {


        var check01 = document.getElementById('7000_12000_btu');
        var check02 = document.getElementById('9000_12000_btu_janela');
        var check03 = document.getElementById('18000_24000_btu');
        var check04 = document.getElementById('outros');


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

    function avançando02() {
        document.getElementById('pergunta02').style.display = 'none';
        document.getElementById('pergunta03').style.display = 'block';

    }

    function voltando03() {
        document.getElementById('pergunta02').style.display = 'block';
        document.getElementById('pergunta03').style.display = 'none';
    }

    function avançando03() {
        document.getElementById('pergunta03').style.display = 'none';
        document.getElementById('pergunta04').style.display = 'block';

    }
</script>


<script>
    $("#lista").hide();
    $('#outros').click(function() {

        var outros = document.getElementById('outros');

        if (outros.checked) {

            $("#lista").show();

        } else {


            $("#lista").hide();

        }

    });
</script>

<?php
include_once "../../layout/footer.php";
?>