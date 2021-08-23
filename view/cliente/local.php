<?php

require "../../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

        <img id="logo" src="../../images/primazia.png" class="img"><br>
        <div id='titlespecial'>
        <title>PEDIDO</title>
        <h1>
            <center>QUAL O LOCAL DO SERVIÇO?</center>
        </h1>
        </div>
        <div class="container">


            <form action="pedido.php" method="post">
                
            <div id="form-row">
                
                
                <div class="row g-6">
                    <div class="col">
                        <select class="form-select" name="select[]" aria-label="Default select example">
                        <option selected>Selecione</option>
                            <option value="1">Apartamento/Casa</option>
                            <option value="2">Comercial</option>
                            <option value="3">Lojas</option>
                        </select><br>
                    </div>
                </div>
                
                <div class="row g-6">
                    <div class="col">
                        <center><button id='botaoEnviar' type="button" onclick="window.location = 'diaristaca.php';" class="btn btn-primary btn-lg">AVANÇAR</button></center>
                        
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="conteudo-right">
            <div class="col-md-12">
                <img id='image' src="../../images/local.gif" class="img">
                
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