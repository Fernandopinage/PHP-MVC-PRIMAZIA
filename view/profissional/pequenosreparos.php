<?php

require "../../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

    <a href="https://gotoservice.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
        <div id='titlespecial'>
            <title>PEQUENOS REPAROS</title>
            <h1>
                <center>PEQUENOS REPAROS</center>
            </h1>
        </div>
        <div class="container">


            <form action="pequenosreparos.php" method="post">

                <div id="form-row">

                    <label>Que Tipo de Serviço Você Oferece?</label>
                    <br><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="hidraulica" id="hidraulica" title="Serviços de instalação e limpeza de torneiras, chuveiros, duchas, bebedouros; desentupimento de ralos e sifões; reparos em vazamentos.">
                        <label class="form-check-label" for="hidraulica" title="Serviços de instalação e limpeza de torneiras, chuveiros, duchas, bebedouros; desentupimento de ralos e sifões; reparos em vazamentos.">
                            Hidráulica
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="eletrica" id="eletrica" title="Instalação de luminárias; substituição de interruptores; instalação de interruptor paralelo.">
                        <label class="form-check-label" for="eletrica" title="Instalação de luminárias; substituição de interruptores; instalação de interruptor paralelo.">
                            Elétrica
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="gesso" id="gesso" title="Instalação de cortineiro; Rebaixo para iluminação indireta; Sancas.">
                        <label class="form-check-label" for="gesso" title="Instalação de cortineiro; Rebaixo para iluminação indireta; Sancas.">
                            Gesso
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="pintura" id="pintura" title="Emassamento; Pintura; Aplicação de textura">
                        <label class="form-check-label" for="pintura" title="Emassamento; Pintura; Aplicação de textura">
                            Pintura
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="pedreiro" id="pedreiro" title="">
                        <label class="form-check-label" for="pintura" title="">
                            Pedreiro
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="outros" id="outros" title="Especificações Extras">
                        <label class="form-check-label" for="outros" title="Outros."> Outros
                        </label>
                        <div id="lista">
                            <div class="mb-3">
                                <label for="outros" class="form-label"></label>
                                <input type="text-area" class="form-control" id="outros" placeholder="">
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
        <img id='photo' src="../../images/pequenosreparos.gif" class="img">

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