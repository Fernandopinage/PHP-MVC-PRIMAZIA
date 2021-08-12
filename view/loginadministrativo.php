<?php

require "../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

        <img id="logo" src="../images/primazia-branco.png" class="img"><br>
        <div id='titlespecial'>
        <title>ÁREA RESTRITA</title>
        <h1>
            <center>ÁREA RESTRITA</center>
        </h1>
        </div>
        <div class="container">


            <form action="loginadministrativo.php" method="post">
                
            <div id="form-row">
                <div class="row g-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="E-mail" aria-label="E-mail">
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Senha" aria-label="Senha">
                    </div>
                </div>

                
                <br>
                
                
                <div class="row g-6">
                    <div class="col">
                        <center><button id='botaoEnviar' type="button" class="btn btn-primary btn-lg">ENTRAR</button></center>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="conteudo-right">
            <div class="col-md-6">
                <img id='imagem' src="../images/administrativo.png" class="img">
                
            </div>
            
    </div>
</div>


</form>
<?php
require "../layout/footer.php";
?>