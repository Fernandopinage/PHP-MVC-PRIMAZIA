<?php
include_once "../../layout/heard.php";
?>
<link href="../../layout/css/painel.css" rel="stylesheet">
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
</div>


<div class="container">

    <div class="text-center">
        <img id="usuario" src="../../images/mulher.png" class="img"><br><br>
        <h5>Alexandra Silveira</h5><br>
        <img src="../../images/estrela.png" class="img" width="20"> 4,67</img><br>
    </div>

    <hr>
</div>

<div class="container-sm text-center">

    <nav class="navbar navbar-light bg-light">
        <div class="row align-items-center" style="margin-left: 14%;"> 
            <div class="col-3">
                <a class="navbar-brand" href="http://localhost//primazia/view/cliente/pedido.php">
                    <img src="../../images/encontreumprofissional.png" alt="" width="70" height="70">
                </a>
                <label> Encontre um Profissional</label>
            </div>
            <div class="col-2">
                <a class="navbar-brand" href="http://primazia.agenciaprogride.com.br/contato-home-resumida/">
                    <img src="../../images/faleconosco.png" alt="" width="75" height="75">
                </a>
                <label> Fale Conosco </label>

            </div>

            <div class="col-3">
                <a class="navbar-brand" href="http://localhost/primazia/view/profissional/registroprofissional.php">
                    <img src="../../images/cadastresecomoprofissional.png" alt="" width="70" height="70">
                </a>
                <label> Cadastre-se como Profissional</label>
            </div>

            <div class="col-2">
                <a class="navbar-brand" href="#">
                    <img src="../../images/pedidosquesolicitei.png" alt="" width="70" height="70">
                </a>
                <label> Pedidos que Solicitei</label>
            </div>
        </div>
    </nav>

</div>



<?php
require "../../layout/footer.php";
?>