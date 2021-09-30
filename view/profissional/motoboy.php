<?php

require "../../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

    <a href="https://primazia.agenciaprogride.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
        <div id='titlespecial'>
            <title>MOTOBOY</title>
            <h1>
                <center>MOTOBOY</center>
            </h1>
        </div>
        <div class="container">


            <form action="motoboy.php" method="post">

                <div id="form-row">

                    <label>Que Tipo de Serviço Você Oferece?</label>
                    <br><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="documento" name="documento" id="documento" title="Envio ou captação de documentos em diferentes locais da cidade com data e hora agendados.">
                         <label class="form-check-label" for="documento" title="Envio ou captação de documentos em diferentes locais da cidade com data e hora agendados.">
                            Documento
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="servico" id="servico" title="Envio e captação de pacotes em diferentes locais da cidade com data e hora agendados.">
                        <label class="form-check-label" for="servico" title="Envio e captação de pacotes em diferentes locais da cidade com data e hora agendados.">
                            Serviço
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="urgencia" id="urgencia" title="Serviços realizados imediatamente após o contato com o motoboy">
                        <label class="form-check-label" for="urgencia" title="Serviços realizados imediatamente após o contato com o motoboy">
                            Urgência
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="outros" id="outros" title="Especificações Extras">
                        <label class="form-check-label" for="outros" title="Outros."> Outros
                        </label>
                        <div id="lista">
                            <div class="mb-3">
                                <label for="outros" class="form-label"></label>
                                <input type="text" class="form-control" id="outros" placeholder="">
                            </div>
                        </div>
                    </div>
                    <center><button id='botaoEnviar' type="button" class="btn btn-primary btn-lg">ENVIAR</button></center>
                </div>
        </div>
    </div>
</div>
<div class="conteudo-right">
    <div class="col-md-6">
        <img id='photo' src="../../images/motoboy.gif" class="img">

    </div>
</div>
</div>
</div>


</form>
<?php
require "../../layout/footer.php";
?>


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