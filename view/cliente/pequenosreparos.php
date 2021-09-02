<?php
session_start();
if (empty($_SESSION['user'])) {

    header('Refresh: 0.1; url=login.php');
}

include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
include_once "../../class/ClassCategoria.php";
include_once "../../dao/gerarProtocolo.php";

if (isset($_POST['pequenosreparos'])) {

    if(!empty($_POST['categoria'])){
       
        
       
      
        $ClassRequest = new Categoria();
        $ClassRequest->SetNome($_SESSION['user']['nome']);
        $ClassRequest->SetTelefone($_SESSION['user']['telefone']);
        $ClassRequest->SetEmail($_SESSION['user']['email']);
        $ClassRequest->SetCpf($_SESSION['user']['cpf']);
        $ClassRequest->SetCep($_SESSION['user']['cep']);
        $ClassRequest->SetCidade($_SESSION['user']['cidade']);
        $ClassRequest->SetLogradouro($_SESSION['user']['rua']);
        $ClassRequest->SetUf($_SESSION['user']['uf']);
        $ClassRequest->SetBairro($_SESSION['user']['bairro']);
        $ClassRequest->SetComplemento($_SESSION['user']['complemento']);
        $ClassRequest->SetProtocolo(Protocolo::gerarProtocolo());
        $dados = array(
            'tpservico' => 'Artífice (Pedreiro,Pintor e Hidráulico)',
            'categoria' => $_POST['categoria'],
            'descricao' => $_POST['descricao'],

        );
        $ClassRequest->SetDescricao($dados);

        $Reparos = new CategoriaDAO();
        $Reparos->insertReparos($ClassRequest);
        
    }else{
       
    }

    
}

?>
<link href="../../layout/css/cliente_pequenosreparos.css" rel="stylesheet">
<div class="container-fluid">
<a id="retorne" href="../../view/cliente/pedido.php" class="btn " style="position: relative; top:50px;background-color:orangered"><img  src="../../images/left-arrow.png" width="28px" alt=""></a>
    <div class="container" id="registro">
        <div class="text-center">
            <img id="logo" src="../../images/primazia.png" class="img"><br>
        </div>

        <div class="title text-center">
            <p>PEQUENOS REPAROS</p>

        </div>


        <form method="post">

            <div id="form-row">


                <!--***************************************************************************** --->
                <div id="pergunta01">

                    <div class="row g-12 ms-3 p-2">
                        <label>Que tipo de serviço você precisa?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="hidraulica" name="categoria[]" id="hidraulica" title="Serviços de instalação e limpeza de torneiras, chuveiros, duchas, bebedouros; desentupimento de ralos e sifões; reparos em vazamentos.">
                            <label class="form-check-label" for="hidraulica" title="Serviços de instalação e limpeza de torneiras, chuveiros, duchas, bebedouros; desentupimento de ralos e sifões; reparos em vazamentos.">
                                Hidráulica
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="eletrica" name="categoria[]" id="eletrica" title="Instalação de luminárias; substituição de interruptores; instalação de interruptor paralelo.">
                            <label class="form-check-label" for="eletrica" title="Instalação de luminárias; substituição de interruptores; instalação de interruptor paralelo.">
                                Elétrica
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="gesso" name="categoria[]" id="gesso" title="Instalação de cortineiro; Rebaixo para iluminação indireta; Sancas.">
                            <label class="form-check-label" for="gesso" title="Instalação de cortineiro; Rebaixo para iluminação indireta; Sancas.">
                                Gesso
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="pintura" name="categoria[]" id="pintura" title="Emassamento; Pintura; Aplicação de textura">
                            <label class="form-check-label" for="pintura" title="Emassamento; Pintura; Aplicação de textura">
                                Pintura
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="pedreiro" name="categoria[]" id="pedreiro" title="">
                            <label class="form-check-label" for="pedreiro" title="">
                                Pedreiro
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
                    <label>Me faça uma breve descrição do serviço a ser realizado</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" name="descricao" id="descricao" style="height: 100px"></textarea>
                        <label for="descricao">Digite aqui...</label>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta01" onclick="voltando02()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <input id='botaoEnviar' name="pequenosreparos" type="submit" value="FINALIZAR" class="btn orangered btn-lg">
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <div class="container" id="registro_logo">
        <img id='photo' src="../../images/pequenosreparos.gif" class="img">
    </div>


</div>

<script>
    document.getElementById('pergunta02').style.display = 'none';


    function voltando01() {
        document.getElementById('pergunta01').style.display = 'block';
        document.getElementById('pergunta02').style.display = 'none';
    }

    function avançando01() {

        var check01 = document.getElementById('hidraulica');
        var check02 = document.getElementById('eletrica');
        var check03 = document.getElementById('gesso');
        var check04 = document.getElementById('pintura');
        var check05 = document.getElementById('pedreiro');

        if(check01.checked || check02.checked  || check03.checked  || check04.checked  || check05.checked){
           
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