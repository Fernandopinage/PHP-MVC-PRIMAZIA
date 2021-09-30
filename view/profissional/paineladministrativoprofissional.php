<?php

require "../../layout/head.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Example</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <script src="http://code.jquery.com/jquery-1.11.3.min.js" charset="utf-8"></script>
    <script src="../../js/rater.js" charset="utf-8"></script>
    <script>
        $(document).ready(function() {
            var options = {
                max_value: 6,
                step_size: 0.5,
                url: 'http://localhost/test.php',
                initial_value: 0,
                update_input_field_name: $("#input2"),
            }
            $(".rate").rate();

            $(".rate2").rate(options);

            $(".rate2").on("change", function(ev, data) {
                console.log(data.from, data.to);
            });



            setTimeout(function() {

                $("#rate6").rate({
                    selected_symbol_type: 'fontawesome_star',
                    max_value: 5,
                    step_size: 0.25,
                });
            }, 2000);


        });
    </script>

    <style>
        body {
            font-size: 35px;
            font-family: sans-serif;
        }

        .rate-base-layer {
            color: #ff7123;
        }

        .rate-hover-layer {
            color: #ff7123;
        }



        #rate5 .rate-base-layer span,
        #rate7 .rate-base-layer span {
            opacity: 0.5;
        }

        hr {
            border: 1px solid #ccc;
        }

        p {
            font-size: 15px;
        }
    </style>
</head>



    <div id="conteudo-top" class>

        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                <a href="https://primazia.agenciaprogride.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
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
                  <body>
                    <div id="rate4"></div>
                    <div id="rate6"></div>
                  </body>
            </center>
            <hr>

            <a href="http://192.168.1.53//primazia/view/cliente/pedido.php"><img id="paineladminbotoes" src="../../images/editarcategoria.png" class="img" display="block" width="100"> Editar minha categoria</img></a><br>
            <a href="http://primazia.agenciaprogride.com.br/contato-home-resumida/"><img id="paineladminbotoes" src="../../images/editarmeuperfilpublico.png" class="img" display="block" width="100"> Editar meu perfil público</img></a>
            <hr><br>
            <a href="http://192.168.1.53/primazia/view/profissional/registroprofissional.php"><img id="paineladminbotoes" src="../../images/pedidosrealizados.png" class="img" display="block" width="100"> Pedidos Realizados</img></a><br>
            <img id="paineladminbotoes" src="../../images/meuspedidos.png" class="img" display="block" width="100"> Meus pedidos</img>
            <hr><br>
            <a href="http://192.168.1.53//primazia/view/cliente/pedido.php"><img id="paineladminbotoes" src="../../images/encontreumprofissional.png" class="img" display="block" width="100"> Encontre um Profissional</img></a><br>
            <a href="http://primazia.agenciaprogride.com.br/contato-home-resumida/"><img id="paineladminbotoes" src="../../images/faleconosco.png" class="img" display="block" width="100"> Fale Conosco</img></a><br>



        </div>

        <div id="conteudo-right" class>
            <div class="col-md-6">

                <p id="paineladmintexto">Pedidos realizados</p>

                <img src="../../images/pedidos.png" class="img" width="600"><br>

            </div>
            <div class="col-md-6">

                <p id="paineladmintexto">Meus pedidos</p>

                <img src="../../images/pedidos.png" class="img" width="600"><br>

            </div>
        </div>

    </div>



    </form>


</html>
<?php
require "../../layout/footer.php";
?>