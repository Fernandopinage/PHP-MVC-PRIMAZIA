<?php
include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
session_start();

if (empty($_SESSION['user'])) {

    header('Refresh: 0.1; url=login.php');
}

$ClassPedido = new CategoriaDAO();
$dados = $ClassPedido->pedidos();


echo "<pre>";
var_dump($dados);
echo "</pre>";


?>
<link href="../../layout/css/cliente_painel.css" rel="stylesheet">
<div id="logo">
    <img src="../../images/primazia.png" alt="" width="250" height="190">
</div>

<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Categoria</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
        foreach($dados as $dados){

            
            ?>
            <tr>
            <th scope="col"><?php echo $dados['nome']; ?></th>
            <th scope="col"><?php echo $dados['telefone']; ?></th>
            <th scope="col">
            <?php 
            
            
            $obj =  $dados['descricao'];

            foreach($obj as $obj =>$key){

                echo $obj[$key];
            }
            
            
            ?></th>
            <th scope="col"><?php echo $dados['nome']; ?></th>
            
            <?php

        }
    
    ?>
  </tbody>
</table>


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
                <a class="navbar-brand" href="http://primazia.agenciaprogride.com.br/login-registro-profissional/">
                    <img src="../../images/cadastresecomoprofissional.png" alt="" width="70" height="70">
                </a>
                <p class="fs-6"> Cadastre-se como Profissional</p>
            </div>

            <div class="col-md">
                <a class="navbar-brand" href="../cliente/meu_pedidos.php">
                    <img src="../../images/pedidosquesolicitei.png" alt="" width="70" height="70">
                </a>
                <p class="fs-6"> Meus Pedidos</p>
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