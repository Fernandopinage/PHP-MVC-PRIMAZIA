<?php
session_start();
if (empty($_SESSION['user'])) {

    header('location: ../../primazia_projeto/view/cliente/login.php');
}
include_once "../../layout/heard.php";
?>
<link href="../../layout/css/cliente_lavanderia.css" rel="stylesheet">
<div class="container-fluid">
    <div class="container" id="registro">
        <div class="text-center">
            <img id="logo" src="../../images/primazia.png" class="img"><br>
        </div>

        <div class="title text-center">
            <p>LAVANDERIA</p>

        </div>


        <form action="" method="post">

            <div id="form-row">


                <!--***************************************************************************** --->
                <div id="pergunta01">

                    <div class="row g-12 ms-3 p-2">
                        <label>Que Tipo de Serviço Você Precisa?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="lavagemAgua" id="lavagemAgua" title="Processo de limpeza dos tecidos através de ação mecânica, temperatura adequada e tempo preciso, em conjunto com o tratamento requerido.">
                            <label class="form-check-label" for="lavagemAgua" title="Processo de limpeza dos tecidos através de ação mecânica, temperatura adequada e tempo preciso, em conjunto com o tratamento requerido.">
                                Lavagem à água
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="lavagemASeco" id="lavagemSeco" title="A limpeza a seco é um processo usado em peças que não podem ser lavadas a água, pois o tecido pode encolher, desbotar ou até mesmo perder a forma.">
                            <label class="form-check-label" for="lavagemSeco" title="A limpeza a seco é um processo usado em peças que não podem ser lavadas a água, pois o tecido pode encolher, desbotar ou até mesmo perder a forma. ">
                                Lavagem a seco
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="impermeabilizar" id="impermeabilizar" title="Ao impermeabilizar tecidos, eles se tornam menos porosos, formando uma espécie de camada protetora invisível e impermeável, que cobre o tecido e previne a incrustação das manchas ou mesmo as moléculas de água.">
                            <label class="form-check-label" for="impermeabilizar" title="Ao impermeabilizar tecidos, eles se tornam menos porosos, formando uma espécie de camada protetora invisível e impermeável, que cobre o tecido e previne a incrustação das manchas ou mesmo as moléculas de água.">
                                Impermeabilizar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="revitalizar" id="revitalizar" title="revitalização das cores do tecido, fazendo com que elas permaneçam impecáveis em todas as circunstâncias e mantenham a flexibilidade.">
                            <label class="form-check-label" for="revitalizar" title="revitalização das cores do tecido, fazendo com que elas permaneçam impecáveis em todas as circunstâncias e mantenham a flexibilidade.">
                                Revitalizar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="alvejar" title="alvejamos suas peças brancas ou coloridas, sem adição de cloro e de forma altamente eficiente na remoção de manchas, revitalizando a cor branca e recuperando as peças.">
                            <label class="form-check-label" for="alvejar" title="alvejamos suas peças brancas ou coloridas, sem adição de cloro e de forma altamente eficiente na remoção de manchas, revitalizando a cor branca e recuperando as peças.">
                                Alvejar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="bolsas" id="bolsas" title="bolsas.">
                            <label class="form-check-label" for="bolsas" title="bolsas.">
                                Bolsas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="sapatos" title="sapatos">
                            <label class="form-check-label" for="sapatos" title="sapatos.">
                                Sapatos
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="outros" id="outros" title="Especificações Extras">
                            <label class="form-check-label" for="outros" title="Outros."> Outros
                            </label>
                            <div id="lista">
                                <div class="mb-3">
                                    <label for="outros" class="form-label"></label>
                                    <input type="text" class="form-control" id="outros" placeholder="">
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
                    <div class="row g-12 ms-2 p-2">
                        <label>Qual/Quais as Peças?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="calcaJeans" id="calcaJeans" title="calça jeans">
                            <label class="form-check-label" for="calcaJeans" title="calça jeans"">
                            Calça jeans
                        </label>
                    </div>
                    <div class=" form-check">
                                <input class="form-check-input" type="checkbox" value="" name="calcaAlfaitaria" id="calcaAlfaitaria" title="Calça Alfaitaria.">
                                <label class="form-check-label" for="calcaAlfaitaria" title="Calça Alfaitaria">
                                    Calça alfaiataria
                                </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="calcaLegging" id="calcaLegging" title="Calça Legging">
                            <label class="form-check-label" for="calcaLegging" title="Calça Legging">
                                Calça legging
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="camisa" id="camisa" title="camisa">
                            <label class="form-check-label" for="camisa" title="camisa.">
                                Camisa
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="camiseta" title="camiseta.">
                            <label class="form-check-label" for="camiseta" title="camiseta.">
                                Camiseta
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="regata" id="regata" title="regata.">
                            <label class="form-check-label" for="regata" title="regata.">
                                Regata
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="bermudas" title="bermudas">
                            <label class="form-check-label" for="bermudas" title="bermudas.">
                                Bermudas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="shorts" id="shorts" title="Shorts">
                            <label class="form-check-label" for="shorts" title="Shorts">
                                Shorts
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="vestido" id="vestido" title="vestido">
                            <label class="form-check-label" for="vestido" title="vestido.">
                                Vestidos
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="saias" title="saias.">
                            <label class="form-check-label" for="saias" title="saias.">
                                Saias
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="lencolCama" id="lencolCama" title="Jogo lençol de cama.">
                            <label class="form-check-label" for="lencolCama" title="Jogo lençol de cama.">
                                Jogo lençol de cama
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="edredom" title="edredom">
                            <label class="form-check-label" for="edredom" title="edredom.">
                                Edredom
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="toalhaCorpo" id="toalhaCorpo" title="Toalha de Corpo">
                            <label class="form-check-label" for="toalhaCorpo" title="Toalha de Corpo.">
                                Toalhas de corpo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="toalhaRosto" title="Toalha de rosto.">
                            <label class="form-check-label" for="toalhaRosto" title="Toalha de rosto.">
                                Toalhas de rosto
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="outros" id="outros" title="Especificações Extras">
                            <label class="form-check-label" for="outros" title="Outros."> Outros
                            </label>
                            <div id="lista">
                                <div class="mb-3">
                                    <label for="outros" class="form-label"></label>
                                    <input type="text" class="form-control" id="outros" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta01" onclick="voltando02()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <input id='botaoEnviar' type="submit" value="FINALIZAR" class="btn orangered btn-lg">
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <div class="container" id="registro_logo">
        <img id='photo' src="../../images/lavanderia.gif" class="img">
    </div>


</div>

<script>
    document.getElementById('pergunta02').style.display = 'none';
  


    function voltando01() {
        document.getElementById('pergunta01').style.display = 'block';
        document.getElementById('pergunta02').style.display = 'none';
    }

    function avançando01() {
        document.getElementById('pergunta01').style.display = 'none';
        document.getElementById('pergunta02').style.display = 'block';
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