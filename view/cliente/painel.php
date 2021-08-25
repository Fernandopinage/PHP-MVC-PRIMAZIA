<?php
include_once "../../layout/heard.php";

session_start();

if (empty($_SESSION['user'])) {

    header('location: ../../view/cliente/login.php'); 
}

?>
<link href="../../layout/css/cliente_painel.css" rel="stylesheet">
<div id="conteudo-top" class>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a id="logo" class="navbar-brand" href="#">
                <img src="../../images/primazia.png" alt="" width="250" height="190">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <form class="d-flex">
                            <input id="caixalupa" class="form-control" type="search" placeholder="Digite o que você precisa" aria-label="Digite o que você precisa">
                            <button id="lupa" class="btn btn-success" type="submit"><img src="../../images/loupe.png" width="25px"></button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a id="botaoarea" class="btn btn-success" type="submit">Área do Condômino</a>
                    </li>

                    <li class="nav-item" id="profissional">
                        <a id="botaoarea" class="btn btn-success" type="submit">Área do Profissional</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</div>


<div class="container">

    <div class="text-center">
        <img id="usuario" src="../../images/perfil.jpg" class="img"><br><br>
        <h5 style="text-transform: capitalize;"><?php  echo $_SESSION['user']['nome']?></h5><br>
        <img src="../../images/estrela.png" class="img" width="20"> 4,67</img><br>
    </div>

    <hr>
</div>

<div class="container-fluid">

    <nav class="navbar navbar">
        <div class="row g-5">
            <div class="col-md">
                <a class="navbar-brand" href="../cliente/pedido.php">
                    <img src="../../images/encontreumprofissional.png" alt="" width="80" height="80">
                </a>
                <p class="fs-6"> Encontre um Profissional</p>
            </div>
            <div class="col-md">
                <a class="navbar-brand" href="http://primazia.agenciaprogride.com.br/contato-home-resumida/">
                    <img src="../../images/faleconosco.png" alt="" width="80" height="80">
                </a>
                <p class="fs-6"> Fale Conosco </p>

            </div>

            <div class="col-md">
                <a class="navbar-brand" href="http://localhost/primazia/view/profissional/registroprofissional.php">
                    <img src="../../images/cadastresecomoprofissional.png" alt="" width="70" height="70">
                </a>
                <p class="fs-6"> Cadastre-se como Profissional</p>
            </div>

            <div class="col-md">
                <a class="navbar-brand" href="#">
                    <img src="../../images/pedidosquesolicitei.png" alt="" width="70" height="70">
                </a>
                <p class="fs-6"> Pedidos que Solicitei</p>
            </div>
            <div class="col-md">
                <a class="navbar-brand" href="../../view/cliente/logout.php">
                    <img src="../../icons/photo1629906564.jpeg" alt="" width="70" height="70">
                </a>
                <p class="fs-6">Sair</p>
            </div>
        </div>
    </nav>

</div>




<?php
require "../../layout/footer.php";
?>