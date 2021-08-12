<?php

require "../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

        <img id="logo" src="../images/primazia-branco.png" class="img"><br>
        <div id='titlespecial'>
            <title>MOTOBOY</title>
            <h1>
                <center>MOTOBOY</center>
            </h1>
        </div>
        <div class="container">


            <form action="motoboy.php" method="post">

                <div id="form-row">

                    <label>Que tipo de Serviço você oferece?</label>
                    <br><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="documento" name="documento" id="documento" title="Envio ou captação de documentos em diferentes locais da cidade com data e hora agendados.">
                         <label class="form-check-label" for="documento" title="Envio ou captação de documentos em diferentes locais da cidade com data e hora agendados.">
                            Documento
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="servico" id="servico" title="Envio e captação de pacotes em diferentes locais da cidade com data e hora agendados.">
                        <label class="form-check-label" for="servico" title="Envio e captação de pacotes em diferentes locais da cidade com data e hora agendados.">
                            Serviço
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="urgencia" id="urgencia" title="Serviços realizados imediatamente após o contato com o motoboy">
                        <label class="form-check-label" for="urgencia" title="Serviços realizados imediatamente após o contato com o motoboy">
                            Urgência
                        </label>
                    </div>
                    <center><button id='botaoEnviar' type="button" class="btn btn-primary btn-lg">ENVIAR</button></center>
                </div>
        </div>
    </div>
</div>
<div class="conteudo-right">
    <div class="col-md-6">
        <img id='photo' src="../images/motoboy.png" class="img">

    </div>
</div>
</div>
</div>


</form>
<?php
require "../layout/footer.php";
?>