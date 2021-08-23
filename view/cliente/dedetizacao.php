<?php
include_once "../../layout/heard.php";
?>
<link href="../../layout/css/cliente_dedetizacao.css" rel="stylesheet">
<div class="container-fluid">
    <div class="container" id="registro">
        <div class="text-center">
            <img id="logo" src="../../images/primazia.png" class="img"><br>
        </div>

        <div class="title text-center">
            <p>DEDETIZAÇÃO</p>

        </div>


        <form action="" method="post">

            <div id="form-row">


                <!--***************************************************************************** --->
                <div id="pergunta01">

                    <div class="row g-12 ms-3 p-2">
                        <label class="fs-3">Que Tipo de Serviço Você Precisa?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="desintetizacao" name="servico[]" id="desintetizacao" title="">
                            <label class="form-check-label" for="desintetizacao" title="">
                                Desintetização
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="controleRoedores" name="servico[]" id="controleRoedores" title="">
                            <label class="form-check-label" for="controleRoedores" title="">
                                Controle de roedores
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="sanitizacao" name="servico[]" id="sanitizacao" title="">
                            <label class="form-check-label" for="sanitizacao" title="">
                                Sanitização
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
                            <label class="fs-3">Qual a Área Do Imóvel?</label>
                            <select class="form-select" name="select[]" aria-label="Default select example">
                                <option selected>Selecione</option>
                                <option value="1">53,02m²</option>
                                <option value="2">56,70m²</option>
                                <option value="3">78,15m²</option>
                                <option value="4">89,24m²</option>
                                <option value="5">92,47m²</option>
                                <option value="6">92,74m²</option>
                                <option value="7">101,12m²</option>
                                <option value="8">106,04m²</option>
                                <option value="9">111,22m²</option>
                                <option value="10">113,40m²</option>
                                <option value="11">170,62m²</option>
                                <option value="12">175,27m²</option>
                            </select><br>
                        </div>
                    </div>

                    
                    <div class="row" style="margin-top: 20px;">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta01" onclick="voltando02()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <input id='botaoEnviar' type="submit" value="FINALIZAR" class="btn orangered btn-lg">
                        </div>
                    </div>
                </div>
                <!--***************************************************************************** --->



            </div>
        </form>
    </div>

    <div class="container" id="registro_logo">
        <img id='photo' src="../../images/dedetizacao.gif" class="img">
    </div>


</div>

<script>
    document.getElementById('pergunta02').style.display = 'none';



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