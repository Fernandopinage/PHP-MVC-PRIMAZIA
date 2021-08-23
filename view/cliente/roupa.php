<?php

require "../../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

        <img id="logo" src="../../images/primazia.png" class="img"><br>
        <div id='titlespecial'>
            <title>LAVANDERIA</title>
            <h1>
                <center>LAVANDERIA</center>
            </h1>
        </div>
        <div class="container">


            <form action="lavanderia.php" method="post">

                <div id="form-row">

                    <label>Qual/Quais as peças?</label>
                    <br><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="calcaJeans" id="calcaJeans" title="calça jeans">
                        <label class="form-check-label" for="calcaJeans" title="calça jeans"">
                            Calça jeans
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="calcaAlfaitaria" id="calcaAlfaitaria" title="Calça Alfaitaria.">
                        <label class="form-check-label" for="calcaAlfaitaria" title="Calça Alfaitaria">
                            Calça alfaiataria 
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="calcaLegging" id="calcaLegging" title="Calça Legging">
                        <label class="form-check-label" for="calcaLegging" title="Calça Legging">
                            Calça legging
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="camisa" id="camisa" title="camisa">
                        <label class="form-check-label" for="camisa" title="camisa.">
                            Camisa
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="camiseta" title="camiseta.">
                        <label class="form-check-label" for="camiseta" title="camiseta.">
                            Camiseta
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="regata" id="regata" title="regata.">
                        <label class="form-check-label" for="regata" title="regata.">
                            Regata
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="bermudas" title="bermudas">
                        <label class="form-check-label" for="bermudas" title="bermudas.">
                            Bermudas
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="shorts" id="shorts" title="Shorts">
                        <label class="form-check-label" for="shorts" title="Shorts">
                            Shorts
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="vestido" id="vestido" title="vestido">
                        <label class="form-check-label" for="vestido" title="vestido.">
                            Vestidos
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="saias" title="saias.">
                        <label class="form-check-label" for="saias" title="saias.">
                            Saias
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="lencolCama" id="lencolCama" title="Jogo lençol de cama.">
                        <label class="form-check-label" for="lencolCama" title="Jogo lençol de cama.">
                            Jogo lençol de cama
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="edredom" title="edredom">
                        <label class="form-check-label" for="edredom" title="edredom.">
                            Edredom
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="toalhaCorpo" id="toalhaCorpo" title="Toalha de Corpo">
                        <label class="form-check-label" for="toalhaCorpo" title="Toalha de Corpo.">
                            Toalhas de corpo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="toalhaRosto" title="Toalha de rosto.">
                        <label class="form-check-label" for="toalhaRosto" title="Toalha de rosto.">
                            Toalhas de rosto
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
        <img id='photo' src="../../images/lavanderia.gif" class="img">

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