<?php

require "../../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

        <img id="logo" src="../../images/primazia.png" class="img"><br>
        <div id='titlespecial'>
        <title>PEDIDO</title>
        <h1>
            <center>QUAL A ÁREA DO IMÓVEL?</center>
        </h1>
        </div>
        <div class="container">


            <form action="pedido.php" method="post">
                
            <div id="form-row">
                
                
                <div class="row g-6">
                    <div class="col">
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
                
                <div class="row g-6">
                    <div class="col">
                        <button id='botaoEnviar' type="button" onclick="window.location = 'local.php';" class="btn btn-primary btn-lg">AVANÇAR</button></center>
                        
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="conteudo-right">
            <div class="col-md-12">
                <img id='image' src="../../images/area.gif" class="img">
                
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