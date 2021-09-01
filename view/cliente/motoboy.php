<?php
include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
include_once "../../class/ClassCategoria.php";

session_start();
if (empty($_SESSION['user'])) {

    header('Refresh: 0.1; url=login.php');
}

if(isset($_POST['motoboy'])){


    if(!empty($_POST['categoria'])){

        
        $ClassRequest = new Categoria();
        $ClassRequest->SetNome($_SESSION['user']['nome']);
        $ClassRequest->SetTelefone($_SESSION['user']['telefone']);
        $ClassRequest->SetEmail($_SESSION['user']['email']);
        $ClassRequest->SetCpf($_SESSION['user']['cpf']);
        $ClassRequest->SetCep($_SESSION['user']['cep']);
        
        $dados = array(
            'tpservico' => 'Motoboy',
            'categoria' => $_POST['categoria'],
            
            
        );
        $ClassRequest->SetDescricao($dados);
        $Dedetizacao = new CategoriaDAO();
        $Dedetizacao->insertReparos($ClassRequest);
    }

}




?>
<link href="../../layout/css/cliente_motoboy.css" rel="stylesheet">
<div class="container-fluid">
<a id="retorne" href="../../view/cliente/pedido.php" class="btn" style="position: relative; top:50px;background-color:orangered"><img src="../../images/left-arrow.png" width="28px" alt=""></a>
    <div class="container" id="registro">
        <div class="text-center">
            <img id="logo" src="../../images/primazia.png" class="img"><br>
        </div>

        <div class="title text-center">
            <p>MOTOBOY</p>

        </div>


        <form action="" method="post">

            <div id="form-row">


                <!--***************************************************************************** --->
                <div id="pergunta01">

                    <div class="row g-12 ms-3 p-2">
                        <label class="fs-3">Que tipo de serviço você precisa?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Enviar um documento" name="categoria[]" id="documento" title="Envio ou captação de documentos em diferentes locais da cidade com data e hora agendados.">
                            <label class="form-check-label" for="documento" title="Envio ou captação de documentos em diferentes locais da cidade com data e hora agendados.">
                                Enviar um documento
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Enviar um pacote" name="categoria[]" id="servico" title="Envio e captação de pacotes em diferentes locais da cidade com data e hora agendados.">
                            <label class="form-check-label" for="servico" title="Envio e captação de pacotes em diferentes locais da cidade com data e hora agendados.">
                                Enviar um pacote
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Serviço de urgência" name="categoria[]" id="urgencia" title="Serviços realizados imediatamente após o contato com o motoboy">
                            <label class="form-check-label" for="urgencia" title="Serviços realizados imediatamente após o contato com o motoboy">
                                Serviço de urgência
                            </label>
                        </div>
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
                    

                    <div class="row" style="margin-top: 20px;">
                        
                        <div class="col text-center">
                            <input id='botaoEnviar' type="submit" name="motoboy" onclick="avançando01()" value="FINALIZAR" class="btn orangered btn-lg">
                        </div>
                    </div>
                    
                </div>
                <!--***************************************************************************** --->

                <!--***************************************************************************** --->
                

            </div>
        </form>
    </div>

    <div class="container" id="registro_logo">
        <img id='photo' src="../../images/motoboy.gif" class="img">
    </div>


</div>

<script>




    function avançando01() {


        var check01 = document.getElementById('documento');
        var check02 = document.getElementById('servico');
        var check03 = document.getElementById('urgencia');
        var check04 = document.getElementById('zona');


        if(check01.checked || check02.checked  || check03.checked || check04.checked){
            
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