<?php
session_start();
if (empty($_SESSION['user'])) {

    header('location: ../../primazia_projeto/view/cliente/login.php');
}


if (isset($_POST['diaristafinal'])) {

    $dados = array(

        'categoria' => $_POST['categoria'],
        'area' => $_POST['area'],
        'local' => $_POST['local'],
        'dependente' => $_POST['dependente'],


    );
}

include_once "../../layout/heard.php";
?>
<link href="../../layout/css/cliente_diarista.css" rel="stylesheet">
<div class="container-fluid">
    <div class="container" id="registro">
        <div class="text-center">
            <img id="logo" src="../../images/primazia.png" class="img"><br>
        </div>

        <div class="title text-center">
            <p>DIARISTA</p>

        </div>


        <form action="" method="post">

            <div id="form-row">


                <!--***************************************************************************** --->
                <div id="pergunta01">

                    <div class="row g-12 ms-3 p-2">
                        <label class="fs-3">Que Tipo de Serviço Você Precisa?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="limpezaComercial" name="categoria[]" id="limpezaComercial" title="Limpeza padrão do dia-a-dia voltada para salas comerciais.">
                            <label class="form-check-label" for="limpezaComercial" title="Limpeza padrão do dia-a-dia voltada para salas comerciais.">
                                Limpeza comercial
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="limpezaPadrao" name="categoria[]" id="limpezaPadrao" title="Limpeza padrão do dia-a-dia, limpeza mais superficial, voltada para residências com áreas entre 53m² e 170m². Residências do tipo loft, 01, 02 ou 03 quartos, varanda, 01,02 ou 03 banheiros.">
                            <label class="form-check-label" for="limpezaPadrao" title="Limpeza padrão do dia-a-dia, limpeza mais superficial, voltada para residências com áreas entre 53m² e 170m². Residências do tipo loft, 01, 02 ou 03 quartos, varanda, 01,02 ou 03 banheiros.">
                                Limpeza padrão
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="limpezaPesada" name="categoria[]" id="limpezaPesada" title="Limpeza mais pesada, inclui limpeza embaixo dos móveis, limpeza de móveis, lavagem de louças expostas, limpeza de eletrodomésticos">
                            <label class="form-check-label" for="limpezaPesada" title="Limpeza mais pesada, inclui limpeza embaixo dos móveis, limpeza de móveis, lavagem de louças expostas, limpeza de eletrodomésticos">
                                Limpeza pesada
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="limpezaPosobra" name="categoria[]" id="limpezaPosobra" title="Limpeza realizada para limpeza pós pintura; Limpeza de resíduos de rejunte; retirada de entulhos pós demolição.">
                            <label class="form-check-label" for="limpezaPosobra" title="Limpeza realizada para limpeza pós pintura; Limpeza de resíduos de rejunte; retirada de entulhos pós demolição.">
                                Limpeza pós obra
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="limpezaPremudanca" name="categoria[]" id="limpezaPremudanca" title="Limpeza geral pós instalação de móveis e decoração, deixando o ambiente limpo a mudança do cliente.">
                            <label class="form-check-label" for="limpezaPremudanca" title="Limpeza geral pós instalação de móveis e decoração, deixando o ambiente limpo a mudança do cliente.">
                                Limpeza pré mudança
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="outros" name="categoria[]" id="outros" title="Especificações Extras">
                            <label class="form-check-label" for="outros" title="Outros."> Outros
                            </label>
                            <div id="div_outros">
                                <div class="mb-3">
                                    <label for="outros" class="form-label"></label>
                                    <textarea name="categoria[]" class="form-control" id="outros" rows="3"></textarea>
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
                            <label class="fs-3">Qual a Área Do Imóvel?</label>
                            <select class="form-select" name="area[]" aria-label="Default select example">
                                <option selected>Selecione</option>
                                <option value="53,02m²">53,02m²</option>
                                <option value="56,70m²">56,70m²</option>
                                <option value="78,15m²">78,15m²</option>
                                <option value="89,24m²">89,24m²</option>
                                <option value="92,47m²">92,47m²</option>
                                <option value="92,74m²">92,74m²</option>
                                <option value="101,12m²">101,12m²</option>
                                <option value="106,04m²">106,04m²</option>
                                <option value="111,22m²">111,22m²</option>
                                <option value="113,40m²">113,40m²</option>
                                <option value="170,62m²">170,62m²</option>
                                <option value="175,27m²">175,27m²</option>
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
                            <label class="fs-3">Qual o Local do Serviço?</label>
                            <select class="form-select" name="local[]" aria-label="Default select example">
                                <option selected>Selecione</option>
                                <option value="Apartamento/Casa">Apartamento/Casa</option>
                                <option value="Comercial">Comercial</option>
                                <option value="Lojas">Lojas</option>
                            </select><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta03" onclick="voltando03()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="avanca03" onclick="avançando03()" class="btn orangered btn-lg">AVANÇAR</button>
                        </div>
                    </div>
                </div>
                <!--***************************************************************************** --->

                <!--***************************************************************************** --->
                <div id="pergunta04">
                    <div class="row g-12 ms-2 p-2">
                        <label class="fs-3">Há Criança ou Animal de Estimação no Local?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Crianças" name="dependente[]" id="criancas" title="Há crianças no local.">
                            <label class="form-check-label" for="criancas" title="Há crianças no local.">
                                Crianças
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="animais" name="dependente[]" id="animais" title="Há animais de estimação no local.">
                            <label class="form-check-label" for="animais" title="Há animais de estimação no local.">
                                Animais de estimação
                            </label>
                        </div>

                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta01" onclick="voltando04()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="avanca01" onclick="avançando04()" class="btn orangered btn-lg">AVANÇAR</button>
                        </div>
                    </div>
                </div>
                <!--***************************************************************************** --->

                <!--***************************************************************************** --->
                <div id="pergunta05">
                    <div class="row g-12 ms-2 p-2">
                        <label class="fs-3">Precisa de Serviços Adicionais?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Limpeza interna de armários" name="serviço[]" id="limpezaArmarios" title="Limpeza interna de armários.">
                            <label class="form-check-label" for="limpezaArmarios" title="Limpeza interna de armários">
                                Limpeza interna de armários
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Cozinhar" name="serviço[]" id="cozinhar" title="Cozinhar">
                            <label class="form-check-label" for="cozinhar" title="Cozinhar">
                                Cozinhar
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Limpeza de geladeira" name="serviço[]" id="limpezaGeladeira" title="Limpeza de geladeira.">
                            <label class="form-check-label" for="limpezaGeladeira" title="Limpeza de geladeira.">
                                Limpeza de geladeira
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Lavar roupa" name="serviço[]" id="lavarRoupa" title="Lavar roupa.">
                            <label class="form-check-label" for="lavarRoupa" title="Lavar roupa.">
                                Lavar roupa
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Passar roupa" name="serviço[]" id="passarRoupa" title="Passar roupa.">
                            <label class="form-check-label" for="passarRoupa" title="Passar roupa.">
                                Passar roupa
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Não preciso" name="serviço[]" id="naoPreciso" title="Não preciso.">
                            <label class="form-check-label" for="naoPreciso" title="Não preciso.">
                                Não preciso
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Outros" name="serviço[]" id="divOutros" title="Outros.">
                            <label class="form-check-label" for="divOutros" title="Outros.">
                                Outros
                            </label>
                        </div>
                        <div id="outros_div">
                            <div class="mb-3">
                                <label for="outros" class="form-label"></label>
                                <textarea name="serviço[]" class="form-control" id="divoutros" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta01" onclick="voltando05()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <input id='botaoEnviar' name="diaristafinal" type="submit" value="FINALIZAR" class="btn orangered btn-lg">
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <div class="container" id="registro_logo">
        <img id='photo' src="../../images/diarista.gif" class="img">
    </div>


</div>

<script>
    $("#div_outros").hide();
    $("#outros_div").hide();
    $('#outros').click(function() {

        var outros = document.getElementById('outros');

        if (outros.checked) {

            $("#div_outros").show();

        } else {


            $("#div_outros").hide();

        }

    });

    $('#divOutros').click(function() {

        var outrosdiv = document.getElementById('divOutros');

        if (outrosdiv.checked) {

            $("#outros_div").show();

        } else {


            $("#outros_div").hide();

        }

    });
</script>

<script>
    document.getElementById('pergunta02').style.display = 'none';
    document.getElementById('pergunta03').style.display = 'none';
    document.getElementById('pergunta04').style.display = 'none';
    document.getElementById('pergunta05').style.display = 'none';


    function voltando01() {
        document.getElementById('pergunta01').style.display = 'block';
        document.getElementById('pergunta02').style.display = 'none';
    }

    function avançando01() {
        document.getElementById('pergunta01').style.display = 'none';
        document.getElementById('pergunta02').style.display = 'block';
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

    function voltando04() {
        document.getElementById('pergunta03').style.display = 'block';
        document.getElementById('pergunta04').style.display = 'none';
    }

    function avançando04() {
        document.getElementById('pergunta04').style.display = 'none';
        document.getElementById('pergunta05').style.display = 'block';

    }

    function voltando05() {
        document.getElementById('pergunta04').style.display = 'block';
        document.getElementById('pergunta05').style.display = 'none';
    }

    function avançando05() {
        document.getElementById('pergunta04').style.display = 'none';
        document.getElementById('pergunta05').style.display = 'block';

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