<?php

require "../layout/head.php";
?>


<div id="desktop">
    <div id="conteudo-left">

        <img id="logo" src="../images/primazia-branco.png" class="img"><br>
        <div id='titlespecial'>
            <title>LAVANDERIA</title>
            <h1>
                <center>LAVANDERIA</center>
            </h1>
        </div>
        <div class="container">


            <form action="lavanderia.php" method="post">

                <div id="form-row">

                    <label>Que tipo de Serviço você oferece?</label>
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
                    <center><button id='botaoEnviar' type="button" class="btn btn-primary btn-lg">ENVIAR</button></center>
                </div>
        </div>
    </div>
</div>
<div class="conteudo-right">
    <div class="col-md-6">
        <img id='photo' src="../images/lavanderia.png" class="img">

    </div>
</div>
</div>
</div>


</form>
<?php
require "../layout/footer.php";
?>