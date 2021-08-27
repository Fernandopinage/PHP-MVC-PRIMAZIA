<?php

include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
include_once "../../class/ClassCategoria.php";

session_start();
if (empty($_SESSION['user'])) {

    header('Refresh: 0.1; url=login.php');
}

if(isset($_POST['salvadedetiza'])){

   $ClassRequest = new Categoria();
   $ClassRequest->SetNome($_SESSION['user']['nome']);
   $ClassRequest->SetTelefone($_SESSION['user']['telefone']);
   $ClassRequest->SetEmail($_SESSION['user']['email']);
   $ClassRequest->SetCpf($_SESSION['user']['cpf']);
   $ClassRequest->SetCep($_SESSION['user']['cep']);
   
   $dados = array(

    'categoria' => $_POST['categoria'],
    'descricao' => $_POST['descricao']

    );
    $ClassRequest->SetDescricao($dados);

    $Dedetizacao = new CategoriaDAO();
    $Dedetizacao->insertReparos($ClassRequest);
   
}


?>
<link href="../../layout/css/cliente_dedetizacao.css" rel="stylesheet">
<div class="container-fluid">
<a id="retorne" href="../../view/cliente/pedido.php" class="btn" style="position: relative; top:50px;background-color:orangered"><img src="../../images/left-arrow.png" width="28px" alt=""></a>
    <div class="container" id="registro">
        <div class="text-center">
            <img id="logo" src="../../images/primazia.png" class="img"><br>
        </div>

        <div class="title text-center">
            <p>DEDETIZAÇÃO</p>

        </div>


        <form action="" method="post">

            <div id="form-row">


                <!--***************************************************************************** --->
                <div id="pergunta01">

                    <div class="row g-12 ms-3 p-2">
                        <label class="fs-3">Que tipo de serviço você precisa?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Desintetização" name="categoria[]" id="desintetizacao" title="">
                            <label class="form-check-label" for="desintetizacao" title="">
                                Desintetização
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Controle de Roedores" name="categoria[]" id="controleRoedores" title="">
                            <label class="form-check-label" for="controleRoedores" title="">
                                Controle de Roedores
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Sanitização" name="categoria[]" id="sanitizacao" title="">
                            <label class="form-check-label" for="sanitizacao" title="">
                                Sanitização
                            </label>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="avanca01" onclick="avançando01()" class="btn orangered btn-lg">AVANÇAR</button>
                        </div>
                    </div>
                </div>
                <!--***************************************************************************** --->

                <!--***************************************************************************** --->
                <div id="pergunta02">
                    <div class="row g-5">
                        <div class="col">
                            <label class="fs-3">Qual a área do imóvel?</label>
                            <select class="form-select" name="descricao" aria-label="Default select example">
                                <option selected>Selecione</option>
                                <option value="Qual a área do imóvel? 53,02m²">53,02m²</option>
                                <option value="Qual a área do imóvel? 56,70m²">56,70m²</option>
                                <option value="Qual a área do imóvel? 78,15m²">78,15m²</option>
                                <option value="Qual a área do imóvel? 89,24m²">89,24m²</option>
                                <option value="Qual a área do imóvel? 92,47m²">92,47m²</option>
                                <option value="Qual a área do imóvel? 92,74m²">92,74m²</option>
                                <option value="Qual a área do imóvel? 101,12m²">101,12m²</option>
                                <option value="Qual a área do imóvel? 106,04m²">106,04m²</option>
                                <option value="Qual a área do imóvel? 111,22m²">111,22m²</option>
                                <option value="Qual a área do imóvel? 113,40m²">113,40m²</option>
                                <option value="Qual a área do imóvel? 170,62m²">170,62m²</option>
                                <option value="Qual a área do imóvel? 175,27m²">175,27m²</option>
                            </select><br>
                        </div>
                    </div>

                    
                    <div class="row" style="margin-top: 20px;">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta01" onclick="voltando02()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <input id='botaoEnviar' type="submit" name="salvadedetiza" value="FINALIZAR" class="btn orangered btn-lg">
                        </div>
                    </div>
                </div>
                <!--***************************************************************************** --->



            </div>
        </form>
    </div>

    <div class="container" id="registro_logo">
        <img id='photo' src="../../images/dedetizacao.gif" class="img">
    </div>


</div>

<script>
    document.getElementById('pergunta02').style.display = 'none';



    function voltando01() {
        document.getElementById('pergunta01').style.display = 'block';
        document.getElementById('pergunta02').style.display = 'none';
    }

    function avançando01() {
        
        var check01 = document.getElementById('desintetizacao');
        var check02 = document.getElementById('controleRoedores');
        var check03 = document.getElementById('sanitizacao');
        
        if(check01.checked || check02.checked  || check03.checked){
            
            document.getElementById('pergunta01').style.display = 'none';
            document.getElementById('pergunta02').style.display = 'block';
        }else{
            Swal.fire({
                    position: 'top-center',
                    icon: 'info',
                    text: 'PREENCHA COM PELO MENOS UMA OPÇÃO',
                    showConfirmButton: false,
                    timer: 4500
                })
        }

    }

    function voltando02() {
        document.getElementById('pergunta01').style.display = 'block';
        document.getElementById('pergunta02').style.display = 'none';
    }

    function avançando02() {
        document.getElementById('pergunta02').style.display = 'none';
        document.getElementById('pergunta03').style.display = 'block';

    }
</script>


<script>
    $("#lista").hide();
    $('#outros').click(function() {

        var outros = document.getElementById('outros');

        if (outros.checked) {

            $("#lista").show();

        } else {


            $("#lista").hide();

        }

    });
</script>

<?php
include_once "../../layout/footer.php";
?>