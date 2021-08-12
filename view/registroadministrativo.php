<?php

require "../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

        <img id="logo" src="../images/primazia-branco.png" class="img"><br>
        <div id='titlespecial'>
            <title>ÁREA ADMINISTRATIVA</title>
            <h1>
                <center>ÁREA ADMINISTRATIVA</center>
            </h1>
        </div>
        <div class="container">


            <form action="registroadministrativo.php" method="post">

                <div id="form-row">
                    <div class="row g-3">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nome de Usuário" aria-label="Nome de Usuário">
                        </div>
                        <div class="col">
                            <input type="email" class="form-control" placeholder="E-mail" aria-label="E-mail">
                        </div>
                    </div>
                    <br>
                    <div class="row g-3">
                        <div class="col">
                            <input type="password" class="form-control" placeholder="Senha">
                        </div>
                        <div class="col">
                            <input type="password" class="form-control" placeholder="Confirme a Senha">
                        </div>
                    </div>
                    <br>


                    <div class="row g-6">
                        <div class="col">
                            <center><button id='botaoEnviar' type="button" class="btn btn-primary btn-lg">ENVIAR</button></center>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<div class="conteudo-right">
    <div class="col-md-6">
        <img id='photo' src="../images/administrativo.png" class="img">

    </div>
</div>
</div>
</div>


</form>
<?php
require "../layout/footer.php";
?>