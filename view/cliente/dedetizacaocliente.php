<?php

require "../../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

        <img id="logo" src="../../images/primazia.png" class="img"><br>
        <div id='titlespecial'>
            <title>DEDETIZAÇÃO</title>
            <h1>
                <center>DEDETIZAÇÃO</center>
            </h1>
        </div>
        <div class="container">


            <form action="dedetizacao.php" method="post">

                <div id="form-row">

                    <label>Que tipo de Serviço você precisa?</label>
                    <br><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="desinsetizacao" id="desinsetizacao" title="Combate e controle das diferentes infestações de pragas urbanas, tais como: Baratas, formiga, aranhas, moscas, gorgulhos de cereais, pulgas, carrapatos, insetos alados, pernilongos, traças e caramujos.">
                        <label class="form-check-label" for="desinsetizacao" title="Combate e controle das diferentes infestações de pragas urbanas, tais como: Baratas, formiga, aranhas, moscas, gorgulhos de cereais, pulgas, carrapatos, insetos alados, pernilongos, traças e caramujos.">
                            Desinsetização
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="controleroedores" id="controleroedores" title="Combate e controle de ratos.">
                        <label class="form-check-label" for="controleroedores" title="Combate e controle de ratos.">
                            Controle de roedores
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="sanitizacao" id="sanitizacao" title="Higienização e desinfecção de ambientes e superfícies para prevenção de proliferação de vírus.">
                        <label class="form-check-label" for="sanitizacao" title="Higienização e desinfecção de ambientes e superfícies para prevenção de proliferação de vírus.">
                            Sanitização 
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
        <img id='photo' src="../../images/dedetizacao.gif" class="img">

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