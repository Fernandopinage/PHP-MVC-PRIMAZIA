<?php
include_once "../../layout/heard.php";
include_once "../../class/ClassAdmin.php";
include_once "../../dao/AdminDAO.php";


session_start();

if (empty($_SESSION['admin'])) {

    header('Refresh: 0.0; url=login.php');
}

?>
<link href="../../layout/css/admin_painel2.css" rel="stylesheet">
<div id="logo">
    <a href="https://primazia.agenciaprogride.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
</div>

<div class="container">

    <div class="row ms-3 p-2">
        <div class="col-md-5 ">
            <label for="basic-url" class="form-label">Selecione uma opção para editar</label>
            <select class="form-select form-select-sm" id="opcao" aria-label="Default select example" onchange="edit()">
                <option selected value="1">Administrador</option>
                <option value="2">Profissional</option>
                <option value="3">Cliente</option>
            </select><br>
        </div>
    </div>

    <div id="editarAdministrador">

        <?php

        $Admin = new AdminDAO();
        $dadosAdmin = $Admin->ListarAdmins();


        if (isset($_POST['editar_admin'])) {

            if ($_POST['admsenha'] === $_POST['admconfirmar']) {


                $ClassAdmin = new Admin();
                $ClassAdmin->SetId($_POST['admid']);
                $ClassAdmin->SetNome($_POST['admnome']);
                $ClassAdmin->SetCpf($_POST['admcpf']);
                if (!empty($_POST['admsenha'])) {

                    $ClassAdmin->SetSenha($_POST['admsenha']);
                }
                $ClassAdmin->SetEmail($_POST['admemail']);
                $ClassAdmin->SetTelefone($_POST['admtel']);

                $Admin = new AdminDAO();
                $Admin->updateAdmin($ClassAdmin);
            } else {

        ?>


                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Erro',
                        text: 'Senha divergente',
                        showConfirmButton: false,
                        timer: 3500
                    })
                </script>

        <?php
            }
        }



        ?>


        <table class="table table-hover">
            <thead style="background-color: #e9781e; color:white; font-family: 'Montserrat', sans-serif">
                <tr>
                    <th class="text-center" scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($dadosAdmin as $dadosAdmin) {


                ?>

                    <tr data-bs-toggle="modal" data-bs-target="#admin<?php echo $dadosAdmin['id']; ?>">
                        <td class="text-center" scope="col"><?php echo $dadosAdmin['nome']; ?></td>
                        <td scope="col"><?php echo $dadosAdmin['email']; ?></td>
                        <td scope="col"><?php echo $dadosAdmin['telefone']; ?></td>
                    </tr>

                    <div class="modal fade" id="admin<?php echo $dadosAdmin['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel"><?php echo $dadosAdmin['nome']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST">
                                        <div class="mb-3">
                                            <input type="hidden" name="admid" value="<?php echo $dadosAdmin['id']; ?>">
                                            <input type="text" name="admnome" id="admnome" class="form-control" placeholder="Nome" aria-label="Nome do administrador" value="<?php echo $dadosAdmin['nome']; ?>">
                                        </div>
                                        <div class="mb-3">

                                            <input type="text" name="admcpf" id="admcpf" class="form-control cpf-mask" value="<?php echo $dadosAdmin['cpf']; ?>" placeholder="CPF/CNPJ" onkeypress="return somenteNumeros(event)" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);">
                                        </div>
                                        <div class="mb-3">

                                            <input type="password" name="admsenha" id="admsenha" class="form-control" placeholder="Senha" aria-label="">
                                        </div>
                                        <div class="mb-3">

                                            <input type="password" name="admconfirmar" id="admconfirmar" class="form-control cpf-mask" placeholder="Confirmar senha">
                                        </div>
                                        <div class="mb-3">

                                            <input type="text" name="admtel" id="tel" class="form-control" value="<?php echo $dadosAdmin['telefone']; ?>" placeholder="Telefone" aria-label="">
                                        </div>
                                        <div class="mb-3">

                                            <input type="email" name="admemail" id="admemail" class="form-control" value="<?php echo $dadosAdmin['email']; ?>" placeholder="E-mail" aria-label="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <input type="submit" name="editar_admin" class="btn btn-primary" value="Editar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php

                }

                ?>
            </tbody>
        </table>
    </div>
    <div id="editarProfissional">

        <?php

        $Profissional = new AdminDAO();
        $dadosProfissional = $Profissional->ListarProfissional();


        ?>


        <table class="table table-hover">
            <thead style="background-color: #e9781e; color:white; font-family: 'Montserrat', sans-serif">
                <tr>
                    <th class="text-center" scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($dadosProfissional as $dadosProfissional) {


                ?>

                    <tr data-bs-toggle="modal" data-bs-target="#profissional<?php echo $dadosProfissional['id']; ?>">
                        <td class="text-center" scope="col"><?php echo $dadosProfissional['nome']; ?></td>
                        <td scope="col"><?php echo $dadosProfissional['email']; ?></td>
                        <td scope="col"><?php echo $dadosProfissional['telefone']; ?></td>
                    </tr>
                    <div class="modal fade" id="profissional<?php echo $dadosProfissional['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel"><?php echo $dadosProfissional['nome']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST">

                                        <div class="mb-3">
                                            <input type="hidden" name="admid" value="<?php echo $dadosProfissional['id']; ?>">
                                            <input type="text" name="admnome" id="admnome" class="form-control" placeholder="Nome" aria-label="Nome do administrador" value="<?php echo $dadosAdmin['nome']; ?>">
                                        </div>

                                        <?php if ($dadosProfissional['opt'] === 'J') {
                                        ?>

                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="pessoa form-check-input" type="radio" name="Popt" id="j" onclick="juridica()" value="J" CHECKED>
                                                    <label class="form-check-label" for="j" id="j">
                                                        Pessoa Juridica
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="pessoa form-check-input" type="radio" name="Popt" id="f" onclick="fisica()" value="F">
                                                    <label class="form-check-label" for="f" id="f">
                                                        Pessoa Fisica
                                                    </label>
                                                </div>
                                            </div>

                                        <?php

                                        } else {

                                        ?>
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="pessoa form-check-input" type="radio" name="Popt" id="j" onclick="juridica()" value="J">
                                                    <label class="form-check-label" for="j" id="j">
                                                        Pessoa Juridica
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="pessoa form-check-input" type="radio" name="Popt" id="f" onclick="fisica()" value="F" CHECKED>
                                                    <label class="form-check-label" for="f" id="f">
                                                        Pessoa Fisica
                                                    </label>
                                                </div>
                                            </div>





                                        <?php


                                        } ?>


                                        <div id="Pfisica">


                                            <div class="mb-3">
                                                <input type="text" name="Prazao" id="razao" class="form-control" placeholder="Razão Social" aria-label="Nome de Usuário">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="PInscrição Estadual" id="estadual" class="form-control cpf-mask" placeholder="Inscrição Estadual">
                                            </div>

                                        </div>

                                        <div class="mb-3">
                                            <input type="text" name="Pnome" id="nome" class="form-control" placeholder="Nome de Usuário" aria-label="Nome de Usuário">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="Pcpf" id="cpf" class="form-control cpf-mask" placeholder="CPF/CNPJ" onkeypress="return somenteNumeros(event)" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);">
                                        </div>



                                        <div class="mb-3">
                                            <input type="password" name="Psenha" id="senha" class="form-control" placeholder="Senha" aria-label="">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" name="Pconfirmar" id="confirmar" class="form-control cpf-mask" placeholder="Confirmar senha">
                                        </div>




                                        <div class="mb-3">
                                            <input type="text" maxlength="9" name="Pcep" id="cep" class="form-control" placeholder="CEP" onkeypress="$(this).mask('00.000-000')">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="Plogradouro" id="rua" class="form-control" placeholder="Endereço ">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="Pnumerp" id="numero" class="form-control" placeholder="Nº ">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="Puf" id="uf" class="form-control" placeholder="UF">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="Pcidade" id="cidade" class="form-control " placeholder="Cidade">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="Pbairro" id="bairro" class="form-control " placeholder="Bairro">
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" name="Pcomplemento" id="complemento" class="form-control " placeholder="Complemento">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="Ptelefone" id="telefone" class="form-control phone-ddd-mask" placeholder="Telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" name="Pemail" id="email" class="form-control" placeholder="E-mail" aria-label="E-mail">
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-select" name="Pservico">
                                                <option selected>Tipo de Serviço</option>
                                                <option value="Artífice (Pedreiro,Pintor e Hidráulico)">Artífice (Pedreiro,Pintor e Hidráulico)</option>
                                                <option value="Babá">Babá</option>
                                                <option value="Cabelereiro">Cabelereiro</option>
                                                <option value="Cuidador(a) de Idoso">Cuidador(a) de Idoso</option>
                                                <option value="Dedetização">Dedetização</option>
                                                <option value="Diarista">Diarista</option>
                                                <option value="Lavanderia">Lavanderia</option>
                                                <option value="Manutenção de Ar Condicionado">Manutenção de Ar Condicionado</option>
                                                <option value="Motoboy">Motoboy</option>
                                            </select>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <input type="submit" name="editar_admin_profissional" class="btn btn-primary" value="Editar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }

                ?>
            </tbody>
        </table>
    </div>
    <div id="editarCliente">

        <?php

        $Cliente = new AdminDAO();
        $dadosCliente = $Cliente->ListarCliente();

        ?>


        <table class="table table-hover">
            <thead style="background-color: #e9781e; color:white; font-family: 'Montserrat', sans-serif">
                <tr>
                    <th class="text-center" scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($dadosCliente as $dadosCliente) {
                ?>

                    <tr>
                        <td class="text-center" scope="col"><?php echo $dadosCliente['nome']; ?></td>
                        <td scope="col"><?php echo $dadosCliente['email']; ?></td>
                        <td scope="col"><?php echo $dadosCliente['telefone']; ?></td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>
    </div>

</div>

<script>
    var administrador = document.getElementById('editarAdministrador').style.display = 'block';
    var profissional = document.getElementById('editarProfissional').style.display = 'none';
    var cliente = document.getElementById('editarCliente').style.display = 'none';


    $(document).ready(function() {
        var administrador = document.getElementById('editarAdministrador').style.display = 'block';
        var profissional = document.getElementById('editarProfissional').style.display = 'none';
        var cliente = document.getElementById('editarCliente').style.display = 'none';

    });

    function edit() {

        var select = document.getElementById('opcao').value;

        if (select === '1') {

            var administrador = document.getElementById('editarAdministrador').style.display = 'block';
            var profissional = document.getElementById('editarProfissional').style.display = 'none';
            var cliente = document.getElementById('editarCliente').style.display = 'none';
        }

        if (select === '2') {
            var administrador = document.getElementById('editarAdministrador').style.display = 'none';
            var profissional = document.getElementById('editarProfissional').style.display = 'block';
            var cliente = document.getElementById('editarCliente').style.display = 'none';
        }

        if (select === '3') {
            var administrador = document.getElementById('editarAdministrador').style.display = 'none';
            var profissional = document.getElementById('editarProfissional').style.display = 'none';
            var cliente = document.getElementById('editarCliente').style.display = 'block';
        }

    }
</script>

<script>
    $(document).ready(function() {

        $("#div_outros").hide();
        $("#lista").hide();
        $("#lista3").hide();
        $("#lista4").hide();

        $("#pergunta01").hide();
        $('#pergunta02').hide();
        $('#pergunta03').hide();
        $('#pergunta04').hide();
        $('#pergunta05').hide();
        $('#pergunta06').hide();
    });

    $("#div_outros").hide();
    $("#lista").hide();
    $("#lista3").hide();
    $("#lista4").hide();

    $("#pergunta01").hide();
    $('#pergunta02').hide();
    $('#pergunta03').hide();
    $('#pergunta04').hide();
    $('#pergunta05').hide();
    $('#pergunta06').hide();

    function change() {
        var select = document.getElementById('servico');
        var value = select.options[select.selectedIndex].value;


        if (value === 'Diarista') {

            $("#pergunta01").show();
        } else {
            $("#pergunta01").hide();
        }
        if (value === 'Dedetização') {
            $("#pergunta02").show();
        } else {
            $("#pergunta02").hide();
        }
        if (value === 'Manutenção de Ar Condicionado') {
            $("#pergunta03").show();
        } else {
            $("#pergunta03").hide();
        }
        if (value === 'Lavanderia') {
            $('#pergunta04').show();
        } else {
            $('#pergunta04').hide();
        }
        if (value === 'Motoboy') {
            $('#pergunta05').show();
        } else {
            $('#pergunta05').hide();
        }

        if (value === 'Artífice (Pedreiro,Pintor e Hidráulico)') {
            $('#pergunta06').show();
        } else {
            $('#pergunta06').hide();
        }


    }



    $('#outros').click(function() {

        var outros = document.getElementById('outros');

        if (outros.checked) {

            $("#div_outros").show();

        } else {


            $("#div_outros").hide();

        }

    });

    $('#outros2').click(function() {

        var outros = document.getElementById('outros2');

        if (outros.checked) {

            $("#lista").show();

        } else {


            $("#lista").hide();

        }

    });

    $('#outros3').click(function() {

        var outros = document.getElementById('outros3');

        if (outros.checked) {

            $("#lista3").show();

        } else {


            $("#lista3").hide();

        }

    });

    $('#outros4').click(function() {

        var outros = document.getElementById('outros4');

        if (outros.checked) {

            $("#lista4").show();

        } else {


            $("#lista4").hide();

        }

    });
</script>

<script>
    function juridica() {

        var Pfisica = document.getElementById('Pfisica').style.display = "block";


    }

    function fisica() {

        var Pfisica = document.getElementById('Pfisica').style.display = "none";


    }
</script>



<script>
    function formatarCampo(campoTexto) {
        if (campoTexto.value.length <= 11) {
            campoTexto.value = mascaraCpf(campoTexto.value);
        } else {
            campoTexto.value = mascaraCnpj(campoTexto.value);
        }
    }

    function retirarFormatacao(campoTexto) {
        campoTexto.value = campoTexto.value.replace(/(\.|\/|\-)/g, "");
    }

    function mascaraCpf(valor) {
        return valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g, "\$1.\$2.\$3\-\$4");
    }

    function somenteNumeros(e) {
        var charCode = e.charCode ? e.charCode : e.keyCode;
        // charCode 8 = backspace   
        // charCode 9 = tab
        if (charCode != 8 && charCode != 9) {
            // charCode 48 equivale a 0   
            // charCode 57 equivale a 9
            if (charCode < 48 || charCode > 57) {
                return false;
            }
        }
    }
</script>

<script>
    $('#editarusuario').click(function() {
        formFile.executar();
    });

    $('#formFile').change(function() {

        const file = $(this)[0].files[0];
        const fileReader = new FileReader()
        fileReader.onloadend = function() {
            $('#editarusuario').attr('src', fileReader.result)
        }
        fileReader.readAsDataURL(file)
    });
</script>

<?php
require "../../layout/footer.php";
?>