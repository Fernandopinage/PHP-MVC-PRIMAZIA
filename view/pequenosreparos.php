<?php

require "../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

        <img id="logo" src="../images/primazia-branco.png" class="img"><br>
        <div id='titlespecial'>
            <title>PEQUENOS REPAROS</title>
            <h1>
                <center>PEQUENOS REPAROS</center>
            </h1>
        </div>
        <div class="container">


            <form action="pequenosreparos.php" method="post">

                <div id="form-row">

                    <label>Que tipo de Serviço você oferece?</label>
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
                    <center><button id='botaoEnviar' type="button" class="btn btn-primary btn-lg">ENVIAR</button></center>
                </div>
        </div>
    </div>
</div>
<div class="conteudo-right">
    <div class="col-md-6">
        <img id='photo' src="../images/pequenosreparos.png" class="img">

    </div>
</div>
</div>
</div>


</form>
<?php
require "../layout/footer.php";
?>