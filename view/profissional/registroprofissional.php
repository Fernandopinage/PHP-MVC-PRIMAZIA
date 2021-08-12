<?php

require "../../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

        <img id="logo" src="../../images/primazia.png" class="img"><br>
        <div id='titlespecial'>
        <title>ÁREA DO PROFISSIONAL</title>
        <h1>
            <center>REGISTRO PROFISSIONAL</center>
        </h1>
        </div>
        <div class="container">


            <form action="registroprofissional.php" method="post">
            
            <center><img id="editarusuario" src="../../images/usuario.png" class="img" width="100"></center>
            <div id="form-row">
                <div class="row g-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Nome de Usuário" aria-label="Nome de Usuário">
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" placeholder="E-mail" aria-label="E-mail">
                    </div>
                </div>
                <BR>
                <div class="row g-3">
                    <div class="col">
                        <input type="text" class="form-control cpf-mask" placeholder="CPF">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control cep-mask" placeholder="CEP">
                    </div>
                </div>
                <br>
                <div class="row g-3">
                    <div class="col">
                        <input type="text" class="form-control date-time-mask" placeholder="Data de Nascimento"><br>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control phone-ddd-mask" placeholder="Telefone">
                    </div>
                </div>
                
                <div class="row g-6">
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
                
                <div class="row g-6">
                    <div class="col">
                        <center><button id='botaoEnviar' type="button" onclick="window.location = 'diaristaprofissional.php';" class="btn btn-primary btn-lg">ENVIAR</button></center>
                        
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