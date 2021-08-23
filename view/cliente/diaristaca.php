<?php

require "../../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

        <img id="logo" src="../../images/primazia.png" class="img"><br>
        <div id='titlespecial'>
        <title>PEDIDO</title>
        <h1>
            <center>HÁ CRIANÇA OU ANIMAL DE <br>ESTIMAÇÃO NO LOCAL?</center>
        </h1>
        </div>
        <div class="container">


            <form action="pedido.php" method="post">
                
            <div id="form-row">
                
                
                <div class="row g-6">
                    <div class="col">
                        <select class="form-select" name="select[]" aria-label="Default select example">
                        <option selected>Selecione</option>
                            <option value="1">Há crianças</option>
                            <option value="2">Há animais de estimação</option>
                            <option value="3">Não há crianças ou animais de estimação</option>
                            <option value="4">há crianças e animais de estimação</option>
                        </select><br>
                    </div>
                </div>
                
                <div class="row g-6">
                    <div class="col">
                        <center><button id='botaoEnviar' type="button" onclick="window.location = 'servicosadicionais.php';" class="btn btn-primary btn-lg">AVANÇAR</button></center>
                        
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="conteudo-right">
            <div class="col-md-12">
                <img id='image' src="../../images/gato.gif" class="img">
                
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