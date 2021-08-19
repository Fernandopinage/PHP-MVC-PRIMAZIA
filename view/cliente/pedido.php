<?php

include_once "../../layout/heard.php";

?>
<link href="../../layout/css/cliente_pedido.css" rel="stylesheet">

<div class="container-fluid">
    <div class="container" id="registro">
        <div class="text-center">
            <img id="logo" src="../../images/primazia.png" class="img"><br>
        </div>

        <div class="title text-center">
            <p>QUAL SERVIÇO VOCÊ <span>PRECISA?</span></p>
        </div>


        <form action="registrocliente.php" method="post">
            <div class="row g-12 ms-3 p-2">
                <div class="col-11 ">
                    <select class="form-select" name="select[]" aria-label="Default select example">
                        <option selected>Selecione sua Profissão</option>
                        <option value="1">Artífice (Pedreiro,Pintor e Hidráulico)</option>
                        <option value="2">Babá</option>
                        <option value="3">Cabelereiro</option>
                        <option value="4">Cuidador(a) de Idoso</option>
                        <option value="5">Dedetização</option>
                        <option value="6">Diarista</option>
                        <option value="4">Lavanderia</option>
                        <option value="5">Manutenção de Ar Condicionado</option>
                        <option value="6">Motoboy</option>
                    </select><br>
                </div>
            </div>
            <div class="row g-6">
                <div class="col text-center">
                   <button id='botaoEnviar' type="button"  class="btn orangered btn-lg">AVANÇAR</button>

                </div>
            </div>
        </form>
    </div>

    <div class="container" id="registro_logo">
        <img id='image' src="../../images/profissional.gif" class="img">
    </div>


</div>

<?php

include_once "../../layout/footer.php";
?>