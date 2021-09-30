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

                    <tr>
                        <td class="text-center" scope="col"><?php echo $dadosAdmin['nome']; ?></td>
                        <td scope="col"><?php echo $dadosAdmin['email']; ?></td>
                        <td scope="col"><?php echo $dadosAdmin['telefone']; ?></td>
                    </tr>
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

                    <tr>
                        <td class="text-center" scope="col"><?php echo $dadosProfissional['nome']; ?></td>
                        <td scope="col"><?php echo $dadosProfissional['email']; ?></td>
                        <td scope="col"><?php echo $dadosProfissional['telefone']; ?></td>
                    </tr>
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
                        <td scope="col"><?php echo $dadosCliente['email'];?></td>
                        <td scope="col"><?php echo $dadosCliente['telefone'];?></td>
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