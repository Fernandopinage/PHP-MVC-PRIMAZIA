<?php

require "../../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

        <img id="logo" src="../../images/primazia.png" class="img"><br>
        <div id='titlespecial'>
            <title>DIARISTA</title>
            <h1>
                <center>DIARISTA</center>
            </h1>
        </div>
        <div class="container">


            <form action="enviaremail.php" method="post">

                <div id="form-row">

                    <label>Que tipo de Serviço você oferece?</label>
                    <br><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="limpezaComercial" id="limpezaComercial" title="Limpeza padrão do dia-a-dia voltada para salas comerciais.">
                        <label class="form-check-label" for="limpezaComercial" title="Limpeza padrão do dia-a-dia voltada para salas comerciais.">
                            Limpeza comercial
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="limpezaPadrao" id="limpezaPadrao" title="Limpeza padrão do dia-a-dia, limpeza mais superficial, voltada para residências com áreas entre 53m² e 170m². Residências do tipo loft, 01, 02 ou 03 quartos, varanda, 01,02 ou 03 banheiros.">
                        <label class="form-check-label" for="limpezaPadrao" title="Limpeza padrão do dia-a-dia, limpeza mais superficial, voltada para residências com áreas entre 53m² e 170m². Residências do tipo loft, 01, 02 ou 03 quartos, varanda, 01,02 ou 03 banheiros.">
                            Limpeza padrão
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="limpezaPesada" id="limpezaPesada" title="Limpeza mais pesada, inclui limpeza embaixo dos móveis, limpeza de móveis, lavagem de louças expostas, limpeza de eletrodomésticos">
                        <label class="form-check-label" for="limpezaPesada" title="Limpeza mais pesada, inclui limpeza embaixo dos móveis, limpeza de móveis, lavagem de louças expostas, limpeza de eletrodomésticos">
                            Limpeza pesada
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="limpezaPosobra" id="limpezaPosobra" title="Limpeza realizada para limpeza pós pintura; Limpeza de resíduos de rejunte; retirada de entulhos pós demolição.">
                        <label class="form-check-label" for="limpezaPosobra" title="Limpeza realizada para limpeza pós pintura; Limpeza de resíduos de rejunte; retirada de entulhos pós demolição.">
                            Limpeza pós obra
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="limpezaPremudanca" id="limpezaPremudanca" title="Limpeza geral pós instalação de móveis e decoração, deixando o ambiente limpo a mudança do cliente.">
                        <label class="form-check-label" for="limpezaPremudanca" title="Limpeza geral pós instalação de móveis e decoração, deixando o ambiente limpo a mudança do cliente.">
                            Limpeza pré mudança
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

                    <center><button id='botaoEnviar' type="button" formaction="enviaremail.php" class="btn btn-primary btn-lg">ENVIAR</button></center>
                </div>
        </div>
    </div>
</div>
<div class="conteudo-right">
    <div class="col-md-6">
        <img id='photo' src="../../images/diarista.gif" class="img">

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