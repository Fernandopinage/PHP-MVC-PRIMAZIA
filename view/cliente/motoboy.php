<?php
include_once "../../layout/heard.php";
?>
<link href="../../layout/css/cliente_motoboy.css" rel="stylesheet">
<div class="container-fluid">
    <div class="container" id="registro">
        <div class="text-center">
            <img id="logo" src="../../images/primazia.png" class="img"><br>
        </div>

        <div class="title text-center">
            <p>MOTOBOY</p>

        </div>


        <form action="" method="post">

            <div id="form-row">


                <!--***************************************************************************** --->
                <div id="pergunta01">

                    <div class="row g-12 ms-3 p-2">
                        <label class="fs-3">Que Tipo de Serviço Você Precisa?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="documento" name="documento" id="documento" title="Envio ou captação de documentos em diferentes locais da cidade com data e hora agendados.">
                            <label class="form-check-label" for="documento" title="Envio ou captação de documentos em diferentes locais da cidade com data e hora agendados.">
                                Enviar um documento
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="servico" id="servico" title="Envio e captação de pacotes em diferentes locais da cidade com data e hora agendados.">
                            <label class="form-check-label" for="servico" title="Envio e captação de pacotes em diferentes locais da cidade com data e hora agendados.">
                                Realizar um serviço
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="urgencia" id="urgencia" title="Serviços realizados imediatamente após o contato com o motoboy">
                            <label class="form-check-label" for="urgencia" title="Serviços realizados imediatamente após o contato com o motoboy">
                                Serviço de urgência
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="servicoNL" id="servicoNL" title="Serviço para zona norte e leste">
                            <label class="form-check-label" for="servicoNL" title="Serviço para zona norte e leste">
                                Serviço para zona norte e leste
                            </label>
                        </div>
                        
                        
                    </div>
                    

                    <div class="row" style="margin-top: 20px;">
                        
                        <div class="col text-center">
                            <input id='botaoEnviar' type="submit" value="FINALIZAR" class="btn orangered btn-lg">
                        </div>
                    </div>
                    
                </div>
                <!--***************************************************************************** --->

                <!--***************************************************************************** --->
                

            </div>
        </form>
    </div>

    <div class="container" id="registro_logo">
        <img id='photo' src="../../images/motoboy.gif" class="img">
    </div>


</div>

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