<?php

include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
include_once "../../class/ClassCategoria.php";
include_once "../../dao/gerarProtocolo.php";

session_start();
if (empty($_SESSION['user'])) {

    header('location: ../../view/cliente/login.php');
}

if (isset($_POST['salvaBaba'])) {

    if (!empty($_POST['categoria'])) {


        $ClassRequest = new Categoria();
        $ClassRequest->SetNome($_SESSION['user']['nome']);
        $ClassRequest->SetTelefone($_SESSION['user']['telefone']);
        $ClassRequest->SetEmail($_SESSION['user']['email']);
        $ClassRequest->SetCpf($_SESSION['user']['cpf']);
        $ClassRequest->SetCep($_SESSION['user']['cep']);
        $ClassRequest->SetCidade($_SESSION['user']['cidade']);
        $ClassRequest->SetLogradouro($_SESSION['user']['rua']);
        $ClassRequest->SetNumero($_SESSION['user']['numero']);
        $ClassRequest->SetUf($_SESSION['user']['uf']);
        $ClassRequest->SetBairro($_SESSION['user']['bairro']);
        $ClassRequest->SetComplemento($_SESSION['user']['complemento']);
        $ClassRequest->SetProtocolo(Protocolo::gerarProtocolo());

        $dados = array(

            'tpservico' => 'Cabeleireiro',
            'categoria' => $_POST['categoria'],
            'descricao' => $_POST['descricao'],


        );


        $ClassRequest->SetDescricao($dados);
        $Dedetizacao = new CategoriaDAO();
        $Dedetizacao->insertReparos($ClassRequest);
    }
}

?>
<link href="../../layout/css/cliente_baba.css" rel="stylesheet">
<div class="container-fluid">
    <a id="retorne" href="../../view/cliente/pedido.php" class="btn" style="position: relative; top:50px;background-color:orangered"><img src="../../images/left-arrow.png" width="28px" alt=""></a>
    <div class="container" id="registro">
        <div class="text-center">
            <a href="https://gotoservice.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
        </div>

        <div class="title text-center">
            <p>Cabeleireiro</p>

        </div>


        <form action="" method="post">

            <div id="form-row">


                <!--***************************************************************************** --->
                <div id="pergunta01">

                    <div class="row g-12 ms-3 p-2">
                        <label class="fs-3">Qual serviço você procura?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Cauterização" name="categoria[]" id="Cauterização" title="">
                            <label class="form-check-label" for="Cauterização" title="">
                                Cauterização
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Coloração" name="categoria[]" id="Coloração" title="">
                            <label class="form-check-label" for="Coloração" title="">
                                Coloração
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Corte" name="categoria[]" id="Corte" title="">
                            <label class="form-check-label" for="Corte" title="">
                                Corte
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Escova Progressiva ou Definitiva" name="categoria[]" id="EscovaProgressivaouDefinitiva" title="">
                            <label class="form-check-label" for="EscovaProgressivaouDefinitiva" title="">
                                Escova Progressiva ou Definitiva
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Escova, babyliss ou chapinha" name="categoria[]" id="Escovababylissouchapinha" title="">
                            <label class="form-check-label" for="Escovababylissouchapinha" title="">
                                Escova, babyliss ou chapinha
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Hidratação, Nutrição ou Reconstrução" name="categoria[]" id="HidrataçãoNutriçãoouReconstrução" title="">
                            <label class="form-check-label" for="HidrataçãoNutriçãoouReconstrução" title="">
                                Hidratação, Nutrição ou Reconstrução
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Luzes ou Mechas" name="categoria[]" id="LuzesouMechas" title="">
                            <label class="form-check-label" for="LuzesouMechas" title="">
                                Luzes ou Mechas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Penteado" name="categoria[]" id="Penteado" title="">
                            <label class="form-check-label" for="Penteado" title="">
                                Penteado
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Outros" name="categoria[]" id="Outros" title="">
                            <label class="form-check-label" for="Outros" title="">
                                Outros
                            </label>
                            <div id="lista2">

                                <div class="mb-3">
                                    <label for="outros" class="form-label"></label>
                                    <textarea name="categoria[]" class="form-control" id="" rows="3"></textarea>
                                </div>
                            </div>
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
                            <label class="fs-3">Qual a idade da (s) criança (s)?</label>
                            <br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Em casa" name="descricao[]" id="Emcasa" title="">
                                <label class="form-check-label" for="Emcasa" title="">
                                    Em casa
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Em um salão de beleza" name="descricao[]" id="Emumsalãodebeleza" title="">
                                <label class="form-check-label" for="Emumsalãodebeleza" title="">
                                    Em um salão de beleza
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Sem preferência" name="descricao[]" id="Sempreferência" title="">
                                <label class="form-check-label" for="Sempreferência" title="">
                                    Sem preferência
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top: 20px;">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta01" onclick="voltando02()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <input id='botaoEnviar' type="submit" name="salvaBaba" value="FINALIZAR" class="btn orangered btn-lg">
                        </div>
                    </div>
                </div>
                <!--***************************************************************************** --->



            </div>
        </form>
    </div>

    <div class="container" id="registro_logo">
        <img id='photo' src="../../images/cabeleireiro.gif" class="img">
    </div>


</div>

<script>
    
    document.getElementById('pergunta02').style.display = 'none';
    document.getElementById('lista2').style.display = 'none';

    $('#Outros').click(function(){

        if(document.getElementById('Outros').checked){
            document.getElementById('lista2').style.display = 'block';
        }else{
            document.getElementById('lista2').style.display = 'none';
        }
    });

    function avançando01() {

        var check01 = document.getElementById('Cauterização');
        var check02 = document.getElementById('Coloração');
        var check03 = document.getElementById('Corte');
        var check04 = document.getElementById('EscovaProgressivaouDefinitiva');
        var check05 = document.getElementById('Escovababylissouchapinha');
        var check06 = document.getElementById('HidrataçãoNutriçãoouReconstrução');
        var check07 = document.getElementById('LuzesouMechas');
        var check08 = document.getElementById('Penteado');
        var check09 = document.getElementById('Outros');


        if (check01.checked || check02.checked || check03.checked || check04.checked || check05.checked || check06.checked || check07.checked || check08.checked || check09.checked) {

            document.getElementById('pergunta01').style.display = 'none';
            document.getElementById('pergunta02').style.display = 'block';
            

        } else {
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
</script>

<?php
include_once "../../layout/footer.php";
?>