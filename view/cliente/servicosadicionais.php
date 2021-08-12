<?php

require "../../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

        <img id="logo" src="../../images/primazia.png" class="img"><br>
        <div id='titlespecial'>
        <title>PEDIDO</title>
        <h1>
            <center>PRECISA DE SERVIÇOS <br>ADICIONAIS?</center>
        </h1>
        </div>
        <div class="container">


            <form action="pedido.php" method="post">
                
            <div id="form-row">
                
            <label>Que tipo de Serviço você precisa?</label>
                    <br><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="limpezaArmario" id="limpezaArmario" title="Limpeza interna de armários.">
                        <label class="form-check-label" for="limpezaArmario" title="Limpeza interna de armários.">
                            Limpeza interna de armários
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="cozinhar" id="cozinhar" title="Cozinhar">
                        <label class="form-check-label" for="cozinhar" title="Cozinhar.">
                            Cozinhar
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="limpezaGeladeira" id="limpezaGeladeira" title="Limpeza de geladeira">
                        <label class="form-check-label" for="limpezaGeladeira" title="Limpeza de geladeira">
                            Limpeza de geladeira
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="lavarRoupa" id="lavarRoupa" title="Lavar roupa">
                        <label class="form-check-label" for="lavarRoupa" title="Lavar roupa">
                            Lavar roupa
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="limpezaFrigobar" id="limpezaFrigobar" title="Limpeza de frigobar">
                        <label class="form-check-label" for="limpezaFrigobar" title="Limpeza de frigobar">
                            Limpeza de frigobar
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="limpezaMesas" id="limpezaMesas" title="Limpeza de mesas">
                        <label class="form-check-label" for="limpezaMesas" title="Limpeza de mesas">
                            Limpeza de mesas
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="limpezaVidro" id="limpezaVidro" title="Limpezas de divisórias em vidro">
                        <label class="form-check-label" for="limpezaVidro" title="Limpezas de divisórias em vidro">
                            Limpezas de divisórias em vidro
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="limpezaJanela" id="limpezaJanela" title="Limpezas de portas e janelas de vidro">
                        <label class="form-check-label" for="limpezaJanela" title="Limpezas de portas e janelas de vidro">
                            Limpezas de portas e janelas de vidro
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="naoPreciso" id="naoPreciso" title="Não preciso.">
                        <label class="form-check-label" for="naoPreciso" title="Não preciso.">
                            Não preciso
                        </label>
                    </div>
                <div class="row g-6">
                    <div class="col">
        
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
                            
                        </select><br>
                    </div>
                </div>
                
                <div class="row g-6">
                    <div class="col">
                        <center><button id='botaoEnviar' type="button" onclick="window.location = 'paineladministrativocliente.php';" class="btn btn-primary btn-lg">AVANÇAR</button></center>
                        
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="conteudo-right">
            <div class="col-md-12">
                <img id='image' src="../../images/diarista.gif" class="img">
                
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