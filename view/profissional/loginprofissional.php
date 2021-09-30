<?php

require "../../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

    <a href="https://primazia.agenciaprogride.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
        <div id='titlespecial'>
        <title>ÁREA DO PROFISSIONAL</title>
        <h1>
            <center>ÁREA DO PROFISSIONAL</center>
        </h1>
        </div>
        <div class="container">


            <form action="loginprofissional.php" method="post">
                
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
                        <center><button id='botaoEnviar' type="button" onclick=" window.location = 'paineladministrativoprofissional.php';" class="btn btn-primary btn-lg">ENTRAR</button></center>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="conteudo-right">
            <div class="col-md-6">
                <img id='imagem' src="../../images/profissional.jpg" class="img">
                
            </div>
            
    </div>
</div>


</form>
<?php
require "../../layout/footer.php";
?>