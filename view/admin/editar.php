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