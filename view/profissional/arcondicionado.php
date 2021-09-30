<?php

require "../../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

    <a href="https://primazia.agenciaprogride.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
        <div id='titlespecial'>
            <title>MANUNTENÇÃO DE AR-CONDICIONADO</title>
            <h1>
                <center>MANUNTENÇÃO DE <br>AR-CONDICIONADO</center>
            </h1>
        </div>
        <div class="container">


            <form action="arcondicionado.php" method="post">

                <div id="form-row">

                    <label>Que tipo de Serviço você oferece?</label>
                    <br><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="instalacao" id="instalacao" title="Instalação de aparelhos splits e multisplits de diferentes BTU´s com infraestrutura pronta.">
                        <label class="form-check-label" for="instalacao" title="Instalação de aparelhos splits e multisplits de diferentes BTU´s com infraestrutura pronta.">
                            Instalação
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="limpeza" id="limpeza" title="Lavagem de evaporadora e condensadora de aparelhos splits e multisplits de diferentes BTU´s.">
                        <label class="form-check-label" for="limpeza" title="Lavagem de evaporadora e condensadora de aparelhos splits e multisplits de diferentes BTU´s.">
                            Limpeza
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="recargaGas" id="recargaGas" title="Recarga de gás refrigerante em aparelhos splits e multisplits de diferentes BTU´s.">
                        <label class="form-check-label" for="recargaGas" title="Recarga de gás refrigerante em aparelhos splits e multisplits de diferentes BTU´s.">
                            Recarga de Gás
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="outros" id="outros" title="Especificações Extras">
                        <label class="form-check-label" for="outros" title="Outros."> Outros
                        </label>
                        <div id="lista">
                            <div class="mb-3">
                                <label for="outros" class="form-label"></label>
                                <textarea class="form-control" id="outros" rows="3"></textarea>
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
        <img id='photo' src="../../images/arcondicionado.gif" class="img">

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