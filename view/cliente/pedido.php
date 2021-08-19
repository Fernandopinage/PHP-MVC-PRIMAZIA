<?php

require "../../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

        <img id="logo" src="../../images/primazia.png" class="img"><br>
        <div id='titlespecial'>
        <title>PEDIDO</title>
        <h1>
            <center>QUAL SERVIÇO VOCÊ <br>PRECISA?</center>
        </h1>
        </div>
        <div class="container">


            <form action="pedido.php" method="post">
                
            <div id="form-row">
                
                
                <div class="row g-6 text-center">
                    <div class="col">
                        <select class="form-select" name="select[]" aria-label="Default select example">
                            <option selected>Selecione sua Profissão</option>
                            <option value="1">Artífice (Pedreiro,Pintor e Hidráulico)</option>
                            <option value="2">Babá</option>
                            <option value="3">Cabelereiro</option>
                            <option value="4">Cuidador(a) de Idoso</option>
                            <option value="5">Dedetização</option>
                            <option value="6">Diarista</option>
                            <option value="4">Lavanderia</option>
                            <option value="5">Manutenção de Ar Condicionado</option>
                            <option value="6">Motoboy</option>
                        </select><br>
                    </div>
                </div>
                <div class="row g-6 ">
                    <div class="col">
                       <button id='botaoEnviar' type="button" onclick="window.location = 'diaristacliente.php';" class="btn btn-primary btn-lg">AVANÇAR</button>
                        
                    </div>
                </div>
                
            </div>
            </div>
        </div>
        <div class="conteudo-right">
            <div class="col-md-12">
                <img id='image' src="../../images/profissional.gif" class="img">
                
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