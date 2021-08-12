<?php

require "../../layout/head.php";
?>



    <div id="conteudo-top" class>

        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../../images/primazia.png" alt="" width="250" height="190">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <form class="d-flex">
                                <input id="caixalupa" class="form-control me-2" type="search" placeholder="Digite o que você precisa" aria-label="Digite o que você precisa">
                                <button id="lupa" class="btn btn-success" type="submit"><img src="../../images/loupe.png" width="25px"></button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <button id="ola" class="btn btn-success" type="submit">Olá, admin</button>
                        </li>

                        <li class="nav-item">
                            <button id="botaoarea" class="btn btn-success" type="submit">Área <br>do Condômino</button>
                        </li>

                        <li class="nav-item">
                            <button id="botaoarea" class="btn btn-success" type="submit">Área <br>do Profissional</button>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        
        <div id="conteudo-left" class>

            <br><br>
            <center>
                <img id="usuario" src="../../images/mulher.png" class="img"><br><br>
                <a>Alexandra Silveira</a><br>
                <img src="../../images/estrela.png" class="img" width="20"> 4,67</img><br>
            </center>
            <hr>

            

            <br><br><a href="http://192.168.1.53//primazia/view/cliente/pedido.php"><img id="paineladminbotoes" src="../../images/encontreumprofissional.png" class="img" display="block" width="100"> Encontre um Profissional</img></a><br>
            <a href="http://primazia.agenciaprogride.com.br/contato-home-resumida/"><img id="paineladminbotoes" src="../../images/faleconosco.png" class="img" display="block" width="100"> Fale Conosco</img></a><br>
            <a href="http://192.168.1.53/primazia/view/profissional/registroprofissional.php"><img id="paineladminbotoes" src="../../images/cadastresecomoprofissional.png" class="img" display="block" width="100"> Cadastre-se como Profissional</img></a><br>
            <img id="paineladminbotoes" src="../../images/pedidosquesolicitei.png" class="img" display="block" width="100"> Pedidos que Solicitei</img><br>



        </div>
    
        <div id="conteudo-right" class>
            <div  class="col-md-6">
                
                <p id="paineladmintexto" >Histórico de Pedidos</p>
                
                <img src="../../images/pedidos.png" class="img" width="600"><br>

            </div>
        </div>
    
    </div>



</form>

<?php
require "../../layout/footer.php";
?>