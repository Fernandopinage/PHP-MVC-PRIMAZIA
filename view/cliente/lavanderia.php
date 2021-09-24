<?php
include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
include_once "../../class/ClassCategoria.php";
include_once "../../dao/gerarProtocolo.php";


session_start();
if (empty($_SESSION['user'])) {

    header('Refresh: 0.1; url=login.php');
}

if (isset($_POST['finalizando'])) {

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
            'tpservico' => 'Lavanderia',
            'categoria' => array_filter($_POST['categoria']),
            'descricao' => isset($_POST['descricao']),
            'quantidade' =>  array_filter($_POST['quantidade'])
        );
        $ClassRequest->SetDescricao($dados);

        $Dedetizacao = new CategoriaDAO();
        $Dedetizacao->insertReparos($ClassRequest);
    } else {
    }
}

?>
<link href="../../layout/css/cliente_lavanderia.css" rel="stylesheet">
<div class="container-fluid">
    <a id="retorne" href="../../view/cliente/pedido.php" class="btn" style="position: relative; top:50px;background-color:orangered"><img src="../../images/left-arrow.png" width="28px" alt=""></a>
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
                        <label>Que tipo de serviço você precisa?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Lavagem à água" name="categoria[]" id="lavagemAgua" title="Processo de limpeza dos tecidos através de ação mecânica, temperatura adequada e tempo preciso, em conjunto com o tratamento requerido.">
                            <label class="form-check-label" for="lavagemAgua" title="Processo de limpeza dos tecidos através de ação mecânica, temperatura adequada e tempo preciso, em conjunto com o tratamento requerido.">
                                Lavagem à água
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Lavagem a seco" name="categoria[]" id="lavagemSeco" title="A limpeza a seco é um processo usado em peças que não podem ser lavadas a água, pois o tecido pode encolher, desbotar ou até mesmo perder a forma.">
                            <label class="form-check-label" for="lavagemSeco" title="A limpeza a seco é um processo usado em peças que não podem ser lavadas a água, pois o tecido pode encolher, desbotar ou até mesmo perder a forma. ">
                                Lavagem a seco
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Impermeabilizar" name="categoria[]" id="impermeabilizar" title="Ao impermeabilizar tecidos, eles se tornam menos porosos, formando uma espécie de camada protetora invisível e impermeável, que cobre o tecido e previne a incrustação das manchas ou mesmo as moléculas de água.">
                            <label class="form-check-label" for="impermeabilizar" title="Ao impermeabilizar tecidos, eles se tornam menos porosos, formando uma espécie de camada protetora invisível e impermeável, que cobre o tecido e previne a incrustação das manchas ou mesmo as moléculas de água.">
                                Impermeabilizar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Revitalizar" name="categoria[]" id="revitalizar" title="revitalização das cores do tecido, fazendo com que elas permaneçam impecáveis em todas as circunstâncias e mantenham a flexibilidade.">
                            <label class="form-check-label" for="revitalizar" title="revitalização das cores do tecido, fazendo com que elas permaneçam impecáveis em todas as circunstâncias e mantenham a flexibilidade.">
                                Revitalizar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Alvejar" id="alvejar" name="categoria[]" title="alvejamos suas peças brancas ou coloridas, sem adição de cloro e de forma altamente eficiente na remoção de manchas, revitalizando a cor branca e recuperando as peças.">
                            <label class="form-check-label" for="alvejar" title="alvejamos suas peças brancas ou coloridas, sem adição de cloro e de forma altamente eficiente na remoção de manchas, revitalizando a cor branca e recuperando as peças.">
                                Alvejar
                            </label>
                        </div>
                        <!--
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Bolsas" name="categoria[]" id="bolsas" title="bolsas.">
                            <label class="form-check-label" for="bolsas" title="bolsas.">
                                Bolsas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Sapatos" name="categoria[]" id="sapados" title="sapatos">
                            <label class="form-check-label" for="sapados" title="sapatos.">
                                Sapatos
                            </label>
                        </div>
                        -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Outros" name="categoria[]" id="outros" title="Especificações Extras">
                            <label class="form-check-label" for="outros" title="Outros."> Outros
                            </label>
                            <div id="lista">

                                <div class="mb-3">
                                    <label class="form-label"></label>
                                    <textarea name="categoria[]" class="form-control" id="outros2" rows="3"></textarea>
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
                        <label>Qual/Quais as peças e quantidade?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tipo de roupa: calça jeans" name="descricao[]" id="calcaJeans" title="calça jeans" onclick="ocultar('calcaJeans','01')">
                            <label class="form-check-label" for="calcaJeans" title="calça jeans">
                                Calça jeans
                            </label>
                        </div>

                        <div id="01" style="margin-left: 20px; margin-top:10px;margin-bottom:10px">
                            <div class="col-sm-2">
                                <input type="number" min="1" name="quantidade[]" class="form-control form-control-sm" id="quantidade" placeholder="quantidade">
                            </div>
                        </div>

                        <div class=" form-check">
                            <input class="form-check-input" type="checkbox" value="Tipo de roupa: calça alfaiataria" name="descricao[]" id="calcaAlfaitaria" title="Calça Alfaitaria." onclick="ocultar('calcaAlfaitaria','02')">
                            <label class="form-check-label" for="calcaAlfaitaria" title="Calça Alfaitaria">
                                Calça alfaiataria
                            </label>
                        </div>
                        <div id="02" style="margin-left: 20px; margin-top:10px;margin-bottom:10px">
                            <div class="col-sm-2">
                                <input type="number" min="1" name="quantidade[]" class="form-control form-control-sm" id="quantidade" placeholder="quantidade">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tipo de roupa: calça legging" name="descricao[]" id="calcaLegging" title="Calça Legging" onclick="ocultar('calcaLegging','03')">
                            <label class="form-check-label" for="calcaLegging" title="Calça Legging">
                                Calça legging
                            </label>
                        </div>
                        <div id="03" style="margin-left: 20px; margin-top:10px;margin-bottom:10px">
                            <div class="col-sm-2">
                                <input type="number" min="1" name="quantidade[]" class="form-control form-control-sm" id="quantidade" placeholder="quantidade">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tipo de roupa: camisa" name="descricao[]" id="camisa" title="camisa" onclick="ocultar('camisa','04')">
                            <label class="form-check-label" for="camisa" title="camisa.">
                                Camisa
                            </label>
                        </div>
                        <div id="04" style="margin-left: 20px; margin-top:10px;margin-bottom:10px">
                            <div class="col-sm-2">
                                <input type="number" min="1" name="quantidade[]" class="form-control form-control-sm" id="quantidade" placeholder="quantidade">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tipo de roupa: camiseta" id="camiseta" name="descricao[]" title="camiseta." onclick="ocultar('camiseta','05')">
                            <label class="form-check-label" for="camiseta" title="camiseta.">
                                Camiseta
                            </label>
                        </div>
                        <div id="05" style="margin-left: 20px; margin-top:10px;margin-bottom:10px">
                            <div class="col-sm-2">
                                <input type="number" min="1" name="quantidade[]" class="form-control form-control-sm" id="quantidade" placeholder="quantidade">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tipo de roupa: regata" name="descricao[]" id="regata" title="regata." onclick="ocultar('regata','06')">
                            <label class="form-check-label" for="regata" title="regata.">
                                Regata
                            </label>
                        </div>
                        <div id="06" style="margin-left: 20px; margin-top:10px;margin-bottom:10px">
                            <div class="col-sm-2">
                                <input type="number" min="1" name="quantidade[]" class="form-control form-control-sm" id="quantidade" placeholder="quantidade">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tipo de roupa: bermudas" id="bermudas" name="descricao[]" title="bermudas" onclick="ocultar('bermudas','07')">
                            <label class="form-check-label" for="bermudas" title="bermudas.">
                                Bermudas
                            </label>
                        </div>
                        <div id="07" style="margin-left: 20px; margin-top:10px;margin-bottom:10px">
                            <div class="col-sm-2">
                                <input type="number" min="1" name="quantidade[]" class="form-control form-control-sm" id="quantidade" placeholder="quantidade">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tipo de roupa: shorts" name="descricao[]" id="shorts" title="Shorts" onclick="ocultar('shorts','08')">
                            <label class="form-check-label" for="shorts" title="Shorts">
                                Shorts
                            </label>
                        </div>
                        <div id="08" style="margin-left: 20px; margin-top:10px;margin-bottom:10px">
                            <div class="col-sm-2">
                                <input type="number" min="1" name="quantidade[]" class="form-control form-control-sm" id="quantidade" placeholder="quantidade">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tipo de roupa: vestidos" name="descricao[]" id="vestido" title="vestido" onclick="ocultar('vestido','09')">
                            <label class="form-check-label" for="vestido" title="vestido.">
                                Vestidos
                            </label>
                        </div>
                        <div id="09" style="margin-left: 20px; margin-top:10px;margin-bottom:10px">
                            <div class="col-sm-2">
                                <input type="number" min="1" name="quantidade[]" class="form-control form-control-sm" id="quantidade" placeholder="quantidade">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tipo de roupa: saias" id="saias" name="descricao[]" title="saias." onclick="ocultar('saias','10')">
                            <label class="form-check-label" for="saias" title="saias.">
                                Saias
                            </label>
                        </div>
                        <div id="10" style="margin-left: 20px; margin-top:10px;margin-bottom:10px">
                            <div class="col-sm-2">
                                <input type="number" min="1" name="quantidade[]" class="form-control form-control-sm" id="quantidade" placeholder="quantidade">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tipo de roupa: jogo lençol de cama" name="descricao[]" id="lencolCama" title="Jogo lençol de cama." onclick="ocultar('lencolCama','11')">
                            <label class="form-check-label" for="lencolCama" title="Jogo lençol de cama.">
                                Jogo lençol de cama
                            </label>
                        </div>
                        <div id="11" style="margin-left: 20px; margin-top:10px;margin-bottom:10px">
                            <div class="col-sm-2">
                                <input type="number" min="1" name="quantidade[]" class="form-control form-control-sm" id="quantidade" placeholder="quantidade">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tipo de roupa: edredom" id="edredom" name="descricao[]" title="edredom" onclick="ocultar('edredom','12')">
                            <label class="form-check-label" for="edredom" title="edredom.">
                                Edredom
                            </label>
                        </div>
                        <div id="12" style="margin-left: 20px; margin-top:10px;margin-bottom:10px">
                            <div class="col-sm-2">
                                <input type="number" min="1" name="quantidade[]" class="form-control form-control-sm" id="quantidade" placeholder="quantidade">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tipo de roupa: toalhas de corpo" name="descricao[]" id="toalhaCorpo" title="Toalha de Corpo" onclick="ocultar('toalhaCorpo','13')">
                            <label class="form-check-label" for="toalhaCorpo" title="Toalha de Corpo.">
                                Toalhas de corpo
                            </label>
                        </div>
                        <div id="13" style="margin-left: 20px; margin-top:10px;margin-bottom:10px">
                            <div class="col-sm-2">
                                <input type="number" min="1" name="quantidade[]" class="form-control form-control-sm" id="quantidade" placeholder="quantidade">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tipo de roupa: toalhas de rosto" id="toalhaRosto" name="descricao[]" title="Toalha de rosto." onclick="ocultar('toalhaRosto','14')">
                            <label class="form-check-label" for="toalhaRosto" title="Toalha de rosto.">
                                Toalhas de rosto
                            </label>
                        </div>
                        <div id="14" style="margin-left: 20px; margin-top:10px;margin-bottom:10px">
                            <div class="col-sm-2">
                                <input type="number" min="1" name="quantidade[]" class="form-control form-control-sm" id="quantidade" placeholder="quantidade">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tipo de roupa: outros" name="descricao[]" id="divoutros" title="Especificações Extras" onclick="ocultar('divoutros','14')">
                            <label class="form-check-label" for="divoutros" title="Outros."> Outros
                            </label>
                            <div id="lista2">

                                <div class="mb-3">
                                    <label for="outros" class="form-label"></label>
                                    <textarea name="categoria[]" class="form-control" id="" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta01" onclick="voltando02()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <input id='botaoEnviar' type="submit" name="finalizando" value="FINALIZAR" class="btn orangered btn-lg">
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


        var check01 = document.getElementById('lavagemAgua');
        var check02 = document.getElementById('lavagemSeco');
        var check03 = document.getElementById('impermeabilizar');
        var check04 = document.getElementById('revitalizar');
        var check05 = document.getElementById('alvejar');
        var check06 = document.getElementById('bolsas');
        var check07 = document.getElementById('sapados');
        var check08 = document.getElementById('outros');

        if (check01.checked || check02.checked || check03.checked || check04.checked || check05.checked || check06.checked || check07.checked || check08.checked) {

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

    function avançando02() {
        document.getElementById('pergunta02').style.display = 'none';
        document.getElementById('pergunta03').style.display = 'block';

    }
</script>


<script>
    $("#lista").hide();
    $("#lista2").hide();

    $('#outros').click(function() {

        var outros = document.getElementById('outros');

        if (outros.checked) {

            $("#lista").show();

        } else {


            $("#lista").hide();

        }

    });

    $('#divoutros').click(function() {

        var outros = document.getElementById('divoutros');

        if (outros.checked) {

            $("#lista2").show();

        } else {


            $("#lista2").hide();

        }

    });
</script>

<script>
    document.getElementById('01').style.display = 'none';
    document.getElementById('02').style.display = 'none';
    document.getElementById('03').style.display = 'none';
    document.getElementById('04').style.display = 'none';
    document.getElementById('05').style.display = 'none';
    document.getElementById('06').style.display = 'none';
    document.getElementById('07').style.display = 'none';
    document.getElementById('08').style.display = 'none';
    document.getElementById('09').style.display = 'none';
    document.getElementById('10').style.display = 'none';
    document.getElementById('11').style.display = 'none';
    document.getElementById('12').style.display = 'none';
    document.getElementById('13').style.display = 'none';
    document.getElementById('14').style.display = 'none';
  

    function ocultar(id, div) {
        let checkbox = document.getElementById(id);
        if (checkbox.checked) {
            document.getElementById(div).style.display = 'block';
        } else {
            document.getElementById(div).style.display = 'none';
        }
        
    }
</script>

<?php
include_once "../../layout/footer.php";
?>