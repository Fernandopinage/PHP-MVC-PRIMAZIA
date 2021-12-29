<?php
include_once "../../layout/heard.php";
include_once "../../class/ClassAdmin.php";
include_once "../../dao/AdminDAO.php";
include_once "../../class/ClassCliente.php";
include_once "../../dao/ClienteDAO.php";
include "../../class/ClassProfissional.php";
require_once "../../dao/ProfissionalDAO.php";

session_start();

if (empty($_SESSION['admin'])) {

    header('location: ../../view/admin/login.php');
}

if (isset($_GET['adm'])) {


    $ClasADM = new Admin();
    $ClasADM->SetId($_GET['adm']);

    $admin = new AdminDAO();
    $admin->delete($ClasADM);
}


if (isset($_GET['pd'])) {


    $ClassProfissional = new Profissional();
    $ClassProfissional->SetId($_GET['pd']);

    $Profissional = new ProfissionalDAO();
    $Profissional->DeleteProfissional($ClassProfissional);
}

if (isset($_GET['cd'])) {

    $ClassCliente = new Cliente();
    $ClassCliente->SetId($_GET['cd']);
    $Cliente = new ClienteDAO();
    $Cliente->deleteCliente($ClassCliente);
}



?>

<link href="../../layout/css/admin_painel2.css" rel="stylesheet">
<div style="margin-left: 50px;">
    <a id="retorne" href="../../view/admin/painel.php" class="btn" style="position: relative; top:50px;background-color:orangered"><img src="../../images/left-arrow.png" width="28px" alt=""></a>
</div>
<div class="text-center">
    <a href="https://gotoservice.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
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



        if (isset($_POST['editar_admin'])) {


            if (isset($_FILES['imagemADM']['name'])) {

                $imagem = $_FILES['imagemADM']['name'];
                $diretorio = '../../images/';
                //$diretorioPDF = '../pdf/';
                move_uploaded_file($_FILES['imagemADM']['tmp_name'], $diretorio . $imagem);
            }



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
                $ClassAdmin->SetFoto($imagem);

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



        if (isset($_POST['editar_admin_profissional'])) {



            if (isset($_FILES['imagemPRO']['name'])) {

                $imagem = $_FILES['imagemPRO']['name'];
                $diretorio = '../../images/';
                //$diretorioPDF = '../pdf/';
                move_uploaded_file($_FILES['imagemPRO']['tmp_name'], $diretorio . $imagem);
            }

            if ($_POST['senha'] === $_POST['confirmar']) {




                $ClassProfissional = new Profissional();
                $ClassProfissional->SetId($_POST['admid']);
                $ClassProfissional->SetOpcao($_POST['opt']);
                $ClassProfissional->SetNome($_POST['nome']);
                $ClassProfissional->SetCpf($_POST['cpf']);
                $ClassProfissional->SetSenha($_POST['senha']);
                $ClassProfissional->SetCep($_POST['cep']);
                $ClassProfissional->SetLogradouro($_POST['logradouro']);
                $ClassProfissional->SetNumero($_POST['numerp']);
                $ClassProfissional->SetUf($_POST['uf']);
                $ClassProfissional->SetCidade($_POST['cidade']);
                $ClassProfissional->SetBairro($_POST['bairro']);
                $ClassProfissional->SetComplemento($_POST['complemento']);
                $ClassProfissional->SetTelefone($_POST['telefone']);
                //$ClassProfissional->SetEmail($_POST['email']);
                $ClassProfissional->SetServico($_POST['servico']);
                $ClassProfissional->SetFoto($imagem);


                $Profissional = new ProfissionalDAO();
                $Profissional->updateProfissionalModal($ClassProfissional);
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


        if (isset($_POST['editarCliente'])) {

            if (isset($_FILES['imagem']['name'])) {
                $imagem = $_FILES['imagem']['name'];
                $diretorio = '../../images/';
                //$diretorioPDF = '../pdf/';
                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $imagem);
            }

            if (isset($_POST['clisenha']) === isset($_POST['cliconfirmar'])) {

                $ClassCliente = new Cliente();
                $ClassCliente->SetID($_POST['cliID']);
                $ClassCliente->SetOpcao($_POST['cliopt']);
                $ClassCliente->SetRazao($_POST['clirazao']);
                //$ClassCliente->SetID($_POST['cliInscrição']);
                $ClassCliente->SetNome($_POST['clinome']);
                $ClassCliente->SetCpf($_POST['clicpf']);
                $ClassCliente->SetSenha($_POST['clisenha']);

                $ClassCliente->SetCep($_POST['clicep']);
                $ClassCliente->SetLogradouro($_POST['clilogradouro']);
                $ClassCliente->SetNumero($_POST['clinumer']);
                $ClassCliente->SetUf($_POST['cliuf']);
                $ClassCliente->SetCidade($_POST['clicidade']);
                $ClassCliente->SetBairro($_POST['clibairro']);
                $ClassCliente->SetComplemento($_POST['clicomplemento']);
                $ClassCliente->SetTelefone($_POST['clitelefone']);
                $ClassCliente->SetEmail($_POST['cliemail']);
                $ClassCliente->SetFoto($imagem);
                $ClienteDao = new ClienteDAO();
                $ClienteDao->updateCliente($ClassCliente);
            }
        }

        ?>

        <?php

        if (isset($_POST['filtror_adm'])) {


            if (!empty($_POST['adm_name'])  or !empty($_POST['adm_email']) or !empty($_POST['adm_cpf'])) {


                $nome = $_POST['adm_name'];
                $email = $_POST['adm_email'];
                $cpf = $_POST['adm_cpf'];


                $Admin = new AdminDAO();
                $dadosAdmin = $Admin->ListarAdminsFiltro($nome, $email, $cpf);
            } else {



                $Admin = new AdminDAO();
                $dadosAdmin = $Admin->ListarAdmins();
            }
        } else {


            $Admin = new AdminDAO();
            $dadosAdmin = $Admin->ListarAdmins();
        }


        /************************* */

        if (isset($_POST['filtror_profissional'])) {



            if (!empty($_POST['profissinal_name'])  or !empty($_POST['profissinal_email']) or !empty($_POST['profissinal_cpf'])) {


                $nome = $_POST['profissinal_name'];
                $email = $_POST['profissinal_email'];
                $cpf = $_POST['profissinal_cpf'];

                $Profissional = new AdminDAO();
                $dadosProfissional = $Profissional->ListarProfissionalFiltro($nome, $email, $cpf);
        ?>
                <script>
                    elt = document.getElementById('opcao');
                    var opt = elt.getElementsByTagName("option");
                    elt.value = 2;
                </script>

            <?php
            } else {

                $Profissional = new AdminDAO();
                $dadosProfissional = $Profissional->ListarProfissional();
            ?>
                <script>
                    elt = document.getElementById('opcao');
                    var opt = elt.getElementsByTagName("option");
                    elt.value = 2;
                </script>

            <?php
            }
        } else {
            $Profissional = new AdminDAO();
            $dadosProfissional = $Profissional->ListarProfissional();
        }


        /************************* */



        if (isset($_POST['filtror_cliente'])) {

            if (!empty($_POST['cliente_name']) or !empty($_POST['cliente_email']) or !empty($_POST['cliente_cpf'])) {

                $nome = $_POST['cliente_name'];
                $email = $_POST['cliente_email'];
                $cpf = $_POST['cliente_cpf'];

                $Cliente = new AdminDAO();
                $dadosCliente = $Cliente->ListarClienteFiltro($nome, $email, $cpf);

            ?>
                <script>
                    elt = document.getElementById('opcao');
                    var opt = elt.getElementsByTagName("option");
                    elt.value = 3;
                </script>

            <?php

            } else {

                $Cliente = new AdminDAO();
                $dadosCliente = $Cliente->ListarCliente();
            ?>
                <script>
                    elt = document.getElementById('opcao');
                    var opt = elt.getElementsByTagName("option");
                    elt.value = 3;
                </script>

        <?php
            }
        } else {

            $Cliente = new AdminDAO();
            $dadosCliente = $Cliente->ListarCliente();
        }


        ?>

        <form method="POST">
            <div id="admin" class="row ms-3 p-2">

                <div class="col-md-3">
                    <label for="validationServer01" class="form-label">Nome</label>
                    <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="adm_name">

                </div>
                <div class="col-md-3">
                    <label for="validationServer01" class="form-label">E-mail</label>
                    <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="adm_email">

                </div>
                <div class="col-md-3">
                    <label for="validationServer01" class="form-label">CPF/CNPJ</label>
                    <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="adm_cpf" onkeypress="return somenteNumeros(event)" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);">

                </div>
                <div class="col-md-1" style="margin-top: 31px;">
                    <input type="submit" name="filtror_adm" class="btn btn-secondary" value="Filtrar">

                </div>
                <?php
                if (isset($dadosAdmin)) {

                ?>
                    <div class="col-md-1" style="margin-top: 31px;">
                        <a href="../admin/adm_excel.php?p=<?php echo $dadosAdmin[0]['excel']; ?>" name="gerarexcell" class="btn btn-success">Excel</a>
                    </div>
                <?php
                }
                ?>

        </form>

    </div>
    <br>

    <table class="table table-hover">
        <thead style="background-color: #e9781e; color:white; font-family: 'Montserrat', sans-serif">
            <tr style="font-size:12px">
                <th class="text-center" scope="col">Nome</th>
                <th class="text-center">CPF/CNPJ</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php



            foreach ($dadosAdmin as $dadosAdmin) {


            ?>

                <tr style="font-size:12px">
                    <td class="text-left" scope="col"><?php echo $dadosAdmin['nome']; ?></td>
                    <td class="text-center" scope="col"><?php echo $dadosAdmin['cpf']; ?></td>
                    <td scope="col"><?php echo $dadosAdmin['email']; ?></td>
                    <td scope="col"><?php echo $dadosAdmin['telefone']; ?></td>
                    <td scope="col">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#admin<?php echo $dadosAdmin['id']; ?>" ><img src="../../icons/view.png" width="22"></button>
                        <button type="button" class="btn btn-primary"><img src="../../icons/pencil.png" width="22"></button>
                        <a href="../admin/editar.php?adm=<?php echo $dadosAdmin['id']; ?>" class="btn btn-danger"><img src="../../icons/delete.png" width="22"></a>
                    </td>
                </tr>

                <div class="modal fade" id="admin<?php echo $dadosAdmin['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel"><?php echo $dadosAdmin['nome']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="text-center">


                                    <?php
                                    if (!empty($dadosAdmin['foto'])) {
                                    ?>
                                        <div style="margin-bottom: 50px;">

                                            <div class="">
                                                <label for="formFileADM<?php echo $dadosAdmin['id']; ?>" class="form-label"><img id="editaradmin<?php echo $dadosAdmin['id']; ?>" src="../../images/<?php echo $dadosAdmin['foto']; ?>" onclick="FormADM(<?php echo $dadosAdmin['id']; ?>)" class="img" width="150" style="border-radius: 7%;"></label>
                                                <input class="form-control" type="file" name="imagemADM" id="formFileADM<?php echo $dadosAdmin['id']; ?>" style="display:none" accept=".png, .jpg, .jpeg">
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>

                                        <div style="margin-bottom: 50px;">

                                            <div class="">

                                                <label for="formFileADM<?php echo $dadosAdmin['id']; ?>" class="form-label"><img id="editaradmin<?php echo $dadosAdmin['id']; ?>" src="../../images/usuario.png" onclick="FormADM(<?php echo $dadosAdmin['id']; ?>)" class="img" width="150" style="border-radius: 7%;"></label>
                                                <input class="form-control" type="file" name="imagemADM" id="formFileADM<?php echo $dadosAdmin['id']; ?>" style="display:none" accept=".png, .jpg, .jpeg">
                                            </div>
                                        </div>

                                    <?php
                                    }

                                    ?>


                                </div>

                                <form method="POST" enctype="multipart/form-data">


                                    <div class="mb-3">
                                        <input type="hidden" name="admid" value="<?php echo $dadosAdmin['id']; ?>">
                                        <label for="floatingInput">Nome de Usuário</label>
                                        <input type="text" name="admnome" id="admnome" class="form-control form-control-sm" placeholder="Nome" aria-label="Nome do administrador" value="<?php echo $dadosAdmin['nome']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="floatingInput">CPF/CNPJ</label>
                                        <input type="text" name="admcpf" id="admcpf" class="form-control form-control-sm cpf-mask" value="<?php echo $dadosAdmin['cpf']; ?>" placeholder="CPF/CNPJ" onkeypress="return somenteNumeros(event)" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingInput">Senha</label>
                                        <input type="password" name="admsenha" id="admsenha" class="form-control form-control-sm" placeholder="Senha" aria-label="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingInput">Confirmar senha</label>
                                        <input type="password" name="admconfirmar" id="admconfirmar" class="form-control form-control-sm cpf-mask" placeholder="Confirmar senha">
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingInput">Telefone</label>
                                        <input type="text" name="admtel" id="tel" class="form-control form-control-sm" value="<?php echo $dadosAdmin['telefone']; ?>" placeholder="Telefone" aria-label="" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingInput">E-mail</label>
                                        <input type="email" name="admemail" id="admemail" class="form-control form-control-sm" value="<?php echo $dadosAdmin['email']; ?>" placeholder="E-mail" aria-label="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
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

    <form method="POST">

        <div id="profissional" class="row ms-3 p-2">

            <div class="col-md-3">
                <label for="validationServer01" class="form-label">Nome</label>
                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="profissinal_name">

            </div>
            <div class="col-md-3">
                <label for="validationServer01" class="form-label">E-mail</label>
                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="profissinal_email">

            </div>
            <div class="col-md-3">
                <label for="validationServer01" class="form-label">CPF/CNPJ</label>
                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="profissinal_cpf" onkeypress="return somenteNumeros(event)" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);">

            </div>
            <div class="col-md-1" style="margin-top: 31px;">
                <input id="filtror_profissional" type="submit" name="filtror_profissional" class="btn btn-secondary" value="Filtrar">

            </div>
            <?php
            if (isset($dadosProfissional)) {

            ?>
                <div class="col-md-1" style="margin-top: 31px;">
                    <a href="../admin/pro_excel.php?p=<?php echo $dadosProfissional[0]['excel']; ?>" name="gerarexcell" class="btn btn-success">Excel</a>
                </div>
            <?php
            }
            ?>

        </div>
    </form>
    <br>

    <table class="table table-hover">
        <thead style="background-color: #e9781e; color:white; font-family: 'Montserrat', sans-serif">
            <tr style="font-size:12px">
                <th class="text-center" scope="col">Nome</th>
                <th class="text-center">CPF/CNPJ</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($dadosProfissional as $dadosProfissional) {



            ?>

                <tr style="font-size:12px">
                    <td class="text-left" scope="col"><?php echo $dadosProfissional['nome']; ?></td>
                    <td class="text-center"><?php echo $dadosProfissional['cpf']; ?></td>
                    <td scope="col"><?php echo $dadosProfissional['email']; ?></td>
                    <td scope="col"><?php echo $dadosProfissional['telefone']; ?></td>
                    <td scope="col">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#profissional<?php echo $dadosProfissional['id']; ?>" ><img src="../../icons/view.png" width="22"></button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profissional<?php echo $dadosProfissional['id']; ?>" ><img src="../../icons/pencil.png" width="22"></button>
                        <a class="btn btn-danger" onclick="excluirProfissional(<?php echo $dadosProfissional['id']; ?>)"><img src="../../icons/delete.png" width="22"></a> <!-- ../admin/editar.php?pd=<?php echo $dadosProfissional['id']; ?> -->
                    </td>
                </tr>
                <div class="modal fade" id="profissional<?php echo $dadosProfissional['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel"><?php echo $dadosProfissional['nome']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">


                                <div class="text-center" style="margin-bottom: 50px;">

                                    <?php

                                    if (!empty($dadosProfissional['foto'])) {
                                    ?>
                                        <div>

                                            <div>
                                                <label for="formFilePro<?php echo $dadosProfissional['id']; ?>" class="form-label"><img id="editarusprofissional<?php echo $dadosProfissional['id']; ?>" src="../../images/<?php echo $dadosProfissional['foto']; ?>" onclick="FormPRO(<?php echo $dadosProfissional['id']; ?>)" class="img" width="150" style="border-radius: 7%;"></label>
                                                <input class="form-control" type="file" name="imagemPRO" id="formFilePro<?php echo $dadosProfissional['id']; ?>" style="display:none" accept=".png, .jpg, .jpeg">
                                            </div>
                                        </div>
                                        <?php

                                        $Star = new ProfissionalDAO();
                                        $star = $Star->selectStar($dadosProfissional['email']);
                                        if ($star ==  0.00) {

                                        ?>
                                            <img src="../../icons/5pp.png" class="img" width="130">
                                        <?php

                                            echo 5;
                                        }


                                        if ($star >=  1.00 and $star <=  1.5) {
                                        ?>
                                            <img src="../../icons/1pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }



                                        if ($star >= 1.51 and $star <= 1.99) {
                                        ?>
                                            <img src="../../icons/1.5pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }


                                        if ($star >= 2.00 and $star <= 2.49) {
                                        ?>
                                            <img src="../../icons/2pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }

                                        if ($star >= 2.50 and $star <= 2.99) {
                                        ?>
                                            <img src="../../icons/2.5pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }

                                        if ($star >= 3.00 and $star <= 3.49) {
                                        ?>
                                            <img src="../../icons/3pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }


                                        if ($star >= 3.50 and $star <= 3.99) {
                                        ?>
                                            <img src="../../icons/3.5pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }

                                        if ($star >= 4.00 and $star <= 4.49) {
                                        ?>
                                            <img src="../../icons/4pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }

                                        if ($star >= 4.50 and $star <= 4.99) {
                                        ?>
                                            <img src="../../icons/4.5pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }
                                        if ($star == 5) {
                                        ?>
                                            <img src="../../icons/5pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }
                                    } else {

                                        ?>

                                        <div>

                                            <div>

                                                <label for="formFilePro<?php echo $dadosProfissional['id']; ?>" class="form-label"><img id="editarusprofissional<?php echo $dadosProfissional['id']; ?>" src="../../images/usuario.png" onclick="FormPRO(<?php echo $dadosProfissional['id']; ?>)" class="img" width="150" style="border-radius: 7%;"></label>
                                                <input class="form-control" type="file" name="imagemPRO" id="formFilePro<?php echo $dadosProfissional['id']; ?>" style="display:none" accept=".png, .jpg, .jpeg">
                                            </div>
                                        </div>

                                        <?php
                                        $Star = new ProfissionalDAO();
                                        $star = $Star->selectStar($dadosProfissional['email']);
                                        if ($star ==  0.00) {

                                        ?>
                                            <img src="../../icons/5pp.png" class="img" width="130">
                                        <?php

                                            echo 5;
                                        }


                                        if ($star >=  1.00 and $star <=  1.5) {
                                        ?>
                                            <img src="../../icons/1pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }



                                        if ($star >= 1.51 and $star <= 1.99) {
                                        ?>
                                            <img src="../../icons/1.5pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }


                                        if ($star >= 2.00 and $star <= 2.49) {
                                        ?>
                                            <img src="../../icons/2pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }

                                        if ($star >= 2.50 and $star <= 2.99) {
                                        ?>
                                            <img src="../../icons/2.5pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }

                                        if ($star >= 3.00 and $star <= 3.49) {
                                        ?>
                                            <img src="../../icons/3pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }


                                        if ($star >= 3.50 and $star <= 3.99) {
                                        ?>
                                            <img src="../../icons/3.5pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }

                                        if ($star >= 4.00 and $star <= 4.49) {
                                        ?>
                                            <img src="../../icons/4pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }

                                        if ($star >= 4.50 and $star <= 4.99) {
                                        ?>
                                            <img src="../../icons/4.5pp.png" class="img" width="130">
                                        <?php

                                            echo $star = round($star, 2);
                                        }
                                        if ($star == 5) {
                                        ?>
                                            <img src="../../icons/5pp.png" class="img" width="130">
                                    <?php

                                            echo $star = round($star, 2);
                                        }
                                    }

                                    ?>


                                </div>



                                <form method="POST" id="editaProfissionalModal" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <input type="hidden" name="admid" value="<?php echo $dadosProfissional['id']; ?>">

                                    </div>

                                    <?php

                                    if ($dadosProfissional['opt'] === 'J') {

                                    ?>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="pessoa form-check-input" type="radio" name="opt" id="j" onclick="juridica()" value="J" CHECKED>
                                                <label class="form-check-label" for="pessoa" id="j">
                                                    Pessoa Juridica
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="pessoa form-check-input" type="radio" name="opt" id="f" onclick="fisica()" value="F">
                                                <label class="form-check-label" for="pessoa" id="f">
                                                    Pessoa Fisica
                                                </label>
                                            </div>
                                        </div>
                                        <div id="Pfisica">


                                            <div class="mb-3">
                                                <label for="floatingInput">Razão Social</label>
                                                <input type="text" name="razao" id="razao" class="form-control  form-control-sm" value="<?php echo $dadosProfissional['razao'] ?>" placeholder="Razão Social" aria-label="Nome de Usuário">
                                            </div>
                                            <div class="mb-3">
                                                <label for="floatingInput">Inscrição Estadual</label>
                                                <input type="text" name="Inscrição Estadual" id="estadual" class="form-control  form-control-sm cpf-mask" placeholder="Inscrição Estadual">
                                            </div>

                                        </div>


                                    <?php
                                    } else {

                                    ?>

                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="pessoa form-check-input" type="radio" name="opt" id="j" onclick="juridica()" value="J">
                                                <label class="form-check-label" for="pessoa" id="j">
                                                    Pessoa Juridica
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="pessoa form-check-input" type="radio" name="opt" id="f" onclick="fisica()" value="F" CHECKED>
                                                <label class="form-check-label" for="pessoa" id="f">
                                                    Pessoa Fisica
                                                </label>
                                            </div>
                                        </div>

                                    <?php


                                    }

                                    ?>

                                    <div class="mb-3">

                                        <label for="floatingInput">Nome de Usuário</label>
                                        <input type="text" name="nome" id="nome" value="<?php echo $dadosProfissional['nome'] ?>" class="form-control  form-control-sm" placeholder="Nome de Usuário" aria-label="Nome de Usuário">
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingInput">CPF/CNPJ</label>
                                        <input type="text" name="cpf" id="cpf" value="<?php echo $dadosProfissional['cpf'] ?>" class="form-control  form-control-sm cpf-mask" placeholder="CPF/CNPJ" onkeypress="return somenteNumeros(event)" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);">
                                    </div>



                                    <div class="mb-3">
                                        <label for="floatingInput">Senha</label>
                                        <input type="password" name="senha" id="senha" class="form-control  form-control-sm" placeholder="Senha" aria-label="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingInput">Confirmar senha</label>
                                        <input type="password" name="confirmar" id="confirmar" class="form-control  form-control-sm" placeholder="Confirmar senha">
                                    </div>

                                    <div class="mb-3">
                                        <label for="floatingInput">Cep</label>
                                        <input type="text" maxlength="9" name="cep" id="cep" value="<?php echo $dadosProfissional['cep'] ?>" class="form-control  form-control-sm" placeholder="CEP" onkeypress="$(this).mask('00.000-000')">
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingInput">Endereço</label>
                                        <input type="text" name="logradouro" id="rua" value="<?php echo $dadosProfissional['rua'] ?>" class="form-control  form-control-sm" placeholder="Endereço ">
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingInput">Nº</label>
                                        <input type="text" name="numerp" id="numero" value="<?php echo $dadosProfissional['numero'] ?>" class="form-control  form-control-sm" placeholder="Nº ">
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingInput">UF</label>
                                        <input type="text" name="uf" id="uf" value="<?php echo $dadosProfissional['uf'] ?>" class="form-control  form-control-sm" placeholder="UF">
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingInput">Cidade</label>
                                        <input type="text" name="cidade" id="cidade" value="<?php echo $dadosProfissional['cidade'] ?>" class="form-control  form-control-sm " placeholder="Cidade">
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingInput">Bairro</label>
                                        <input type="text" name="bairro" id="bairro" value="<?php echo $dadosProfissional['bairro'] ?>" class="form-control  form-control-sm" placeholder="Bairro">
                                    </div>

                                    <div class="mb-3">
                                        <label for="floatingInput">Complemento</label>
                                        <input type="text" name="complemento" id="complemento" value="<?php echo $dadosProfissional['complemento'] ?>" class="form-control  form-control-sm" placeholder="Complemento">
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingInput">Telefone</label>
                                        <input type="text" name="telefone" id="telefone" value="<?php echo $dadosProfissional['telefone'] ?>" class="form-control  form-control-sm phone-ddd-mask" placeholder="Telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingInput">E-mail</label>
                                        <input type="email" name="email" id="email" value="<?php echo $dadosProfissional['email'] ?>" class="form-control  form-control-sm" placeholder="E-mail" aria-label="E-mail" readonly>
                                    </div>
                                    <div class="mb-3">

                                        <input type="text" value="<?php echo $dadosProfissional['opt'] ?>" class="form-control" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" name="servico" id="servico" onchange="change()">

                                            <option value="Artífice (Eletricista,Pintor e Hidráulico)">Artífice (Eletricista, Pintor e Hidráulico)</option>
                                            <option value="Babá">Babá</option>
                                            <option value="Cabeleireiro">Cabeleireiro</option>
                                            <option value="Cuidador(a) de Idoso">Cuidador(a) de Idoso</option>
                                            <option value="Dedetização">Dedetização</option>
                                            <option value="Diarista">Diarista</option>
                                            <option value="Lavanderia">Lavanderia</option>
                                            <option value="Manutenção de Ar Condicionado">Manutenção de Ar Condicionado</option>
                                            <option value="Motoboy">Motoboy</option>
                                        </select>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
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


    ?>

    <form method="POST">

        <div id="cliente" class="row ms-3 p-2">
            <div class="col-md-3">
                <label for="validationServer01" class="form-label">Nome</label>
                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="cliente_name">

            </div>
            <div class="col-md-3">
                <label for="validationServer01" class="form-label">E-mail</label>
                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="cliente_email">

            </div>
            <div class="col-md-3">
                <label for="validationServer01" class="form-label">CPF/CNPJ</label>
                <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1" name="cliente_cpf" onkeypress="return somenteNumeros(event)" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);">

            </div>
            <div class="col-md-1" style="margin-top: 31px;">
                <input type="submit" name="filtror_cliente" class="btn btn-secondary" value="Filtrar">

            </div>
            <?php

            if (isset($dadosCliente)) {

            ?>
                <div class="col-md-1" style="margin-top: 31px;">
                    <a href="../admin/cli_excel.php?p=<?php echo $dadosCliente[0]['excel']; ?>" name="gerarexcell" class="btn btn-success">Excel</a>
                </div>
            <?php
            }

            ?>
        </div>
    </form>
    <br>

    <table class="table table-hover">
        <thead style="background-color: #e9781e; color:white; font-family: 'Montserrat', sans-serif;">
            <tr  style="font-size:12px">
                <th class="text-center" scope="col">Nome</th>
                <th class="text-center">CPF/CNPJ</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col"></th>
            </tr>


        </thead>
        <tbody>
            <?php

            foreach ($dadosCliente as $dadosCliente) {
            ?>

                <tr  style="font-size:12px">
                    <td class="text-left" scope="col"><?php echo $dadosCliente['nome']; ?></td>
                    <td class="text-center"><?php echo $dadosCliente['cpf']; ?></td>
                    <td scope="col"><?php echo $dadosCliente['email']; ?></td>
                    <td scope="col"><?php echo $dadosCliente['telefone']; ?></td>
                    <td scope="col">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cliente<?php echo $dadosCliente['id']; ?>" ><img src="../../icons/view.png" width="22"></button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cliente<?php echo $dadosCliente['id']; ?>" ><img src="../../icons/pencil.png" width="22"></button>
                        <a class="btn btn-danger" onclick="excluirCliente(<?php echo $dadosCliente['id']; ?>)"><img src="../../icons/delete.png" width="22"></a> <!-- ../admin/editar.php?pd=<?php echo $dadosCliente['id']; ?> -->

                    </td>
                </tr>
                <div class="modal fade" id="cliente<?php echo $dadosCliente['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $dadosCliente['nome']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" enctype="multipart/form-data">

                                    <div class="text-center" style="margin-bottom: 20px;">
                                        <?php

                                        if (!empty($dadosCliente['foto'])) {
                                        ?>
                                            <div>

                                                <div>
                                                    <label for="formFile<?php echo $dadosCliente['id']; ?>" class="form-label"><img id="editarusuario<?php echo $dadosCliente['id']; ?>" src="../../images/<?php echo $dadosCliente['foto']; ?>" onclick="FormCLI(<?php echo $dadosCliente['id']; ?>)" class="img" width="150" style="border-radius: 7%;"></label>
                                                    <input class="form-control" type="file" name="imagem" id="formFile<?php echo $dadosCliente['id']; ?>" style="display:none" accept=".png, .jpg, .jpeg">
                                                </div>
                                            </div>

                                            <?php

                                            $Star = new ClienteDAO();
                                            $star = $Star->selectStar($dadosCliente['email']);

                                            if ($star ==  0.00) {

                                            ?>
                                                <img src="../../icons/5pp.png" class="img" width="130">
                                            <?php

                                                echo 5;
                                            }


                                            if ($star >=  1.00 and $star <=  1.5) {
                                            ?>
                                                <img src="../../icons/1pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }



                                            if ($star >= 1.51 and $star <= 1.99) {
                                            ?>
                                                <img src="../../icons/1.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }


                                            if ($star >= 2.00 and $star <= 2.49) {
                                            ?>
                                                <img src="../../icons/2pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 2.50 and $star <= 2.99) {
                                            ?>
                                                <img src="../../icons/2.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 3.00 and $star <= 3.49) {
                                            ?>
                                                <img src="../../icons/3pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }


                                            if ($star >= 3.50 and $star <= 3.99) {
                                            ?>
                                                <img src="../../icons/3.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 4.00 and $star <= 4.49) {
                                            ?>
                                                <img src="../../icons/4pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 4.50 and $star <= 4.99) {
                                            ?>
                                                <img src="../../icons/4.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }
                                            if ($star == 5) {
                                            ?>
                                                <img src="../../icons/5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }
                                        } else {
                                            ?>

                                            <div style="margin-bottom: 50px;">

                                                <div>

                                                    <label for="formFile<?php echo $dadosCliente['id']; ?>" class="form-label"><img id="editarusuario<?php echo $dadosCliente['id']; ?>" src="../../images/usuario.png" class="img" width="150" onclick="FormCLI(<?php echo $dadosCliente['id']; ?>)" style="border-radius: 7%;"></label>
                                                    <input class="form-control" type="file" name="imagem" id="formFile<?php echo $dadosCliente['id']; ?>" style="display:none" accept=".png, .jpg, .jpeg">
                                                </div>
                                            </div>

                                            <?php

                                            $Star = new ClienteDAO();
                                            $star = $Star->selectStar($dadosCliente['email']);

                                            if ($star ==  0.00) {

                                            ?>
                                                <img src="../../icons/5pp.png" class="img" width="130">
                                            <?php

                                                echo 5;
                                            }


                                            if ($star >=  1.00 and $star <=  1.5) {
                                            ?>
                                                <img src="../../icons/1pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }



                                            if ($star >= 1.51 and $star <= 1.99) {
                                            ?>
                                                <img src="../../icons/1.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }


                                            if ($star >= 2.00 and $star <= 2.49) {
                                            ?>
                                                <img src="../../icons/2pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 2.50 and $star <= 2.99) {
                                            ?>
                                                <img src="../../icons/2.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 3.00 and $star <= 3.49) {
                                            ?>
                                                <img src="../../icons/3pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }


                                            if ($star >= 3.50 and $star <= 3.99) {
                                            ?>
                                                <img src="../../icons/3.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 4.00 and $star <= 4.49) {
                                            ?>
                                                <img src="../../icons/4pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }

                                            if ($star >= 4.50 and $star <= 4.99) {
                                            ?>
                                                <img src="../../icons/4.5pp.png" class="img" width="130">
                                            <?php

                                                echo $star = round($star, 2);
                                            }
                                            if ($star == 5) {
                                            ?>
                                                <img src="../../icons/5pp.png" class="img" width="130">
                                        <?php

                                                echo $star = round($star, 2);
                                            }
                                        }

                                        ?>



                                    </div>

                                    <input type="hidden" name="cliID" value="<?php echo $dadosCliente['id']; ?>">


                                    <?php

                                    if ($dadosCliente['opcao'] === 'J') {

                                    ?>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="pessoa form-check-input" type="radio" name="cliopt" id="j" onclick="juridica()" value="J" CHECKED>
                                                <label class="form-check-label" for="pessoa" id="j">
                                                    Pessoa juridica
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="pessoa form-check-input" type="radio" name="cliopt" id="f" onclick="fisica()" value="F">
                                                <label class="form-check-label" for="pessoa" id="f">
                                                    Pessoa Fisica
                                                </label>
                                            </div>
                                        </div>

                                    <?php

                                    } else {
                                    ?>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="pessoa form-check-input" type="radio" name="cliopt" id="j" onclick="juridica()" value="J">
                                                <label class="form-check-label" for="pessoa" id="j">
                                                    Pessoa juridica
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="pessoa form-check-input" type="radio" name="cliopt" id="f" onclick="fisica()" value="F" CHECKED>
                                                <label class="form-check-label" for="pessoa" id="f">
                                                    Pessoa Fisica
                                                </label>
                                            </div>
                                        </div>


                                    <?php

                                    }
                                    ?>
                                    <div id="Pfisica">


                                        <div class="mb-3">
                                            <input type="text" name="clirazao" id="razao" value="<?php echo $dadosCliente['razao']; ?>" class="form-control" placeholder="Razão Social" aria-label="Nome de Usuário">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="cliInscrição" id="estadual" class="form-control cpf-mask" placeholder="Inscrição Estadual">
                                        </div>

                                    </div>

                                    <div class="mb-3">
                                        <input type="text" name="clinome" id="nome" value="<?php echo $dadosCliente['nome']; ?>" class="form-control" placeholder="Nome de Usuário" aria-label="Nome de Usuário">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="clicpf" id="cpf" value="<?php echo $dadosCliente['cpf']; ?>" class="form-control cpf-mask" placeholder="CPF/CNPJ" onkeypress="return somenteNumeros(event)" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);">
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="clisenha" id="senha" class="form-control" placeholder="Senha" aria-label="">
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="cliconfirmar" id="confirmar" class="form-control cpf-mask" placeholder="Confirmar senha">
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" maxlength="9" name="clicep" value="<?php echo $dadosCliente['cep']; ?>" id="cep2" class="form-control" placeholder="CEP">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="clilogradouro" value="<?php echo $dadosCliente['logradouro']; ?>" id="rua2" class="form-control" placeholder="Endereço ">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="clinumer" id="numero2" value="<?php echo $dadosCliente['numero']; ?>" class="form-control" placeholder="Nº ">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="cliuf" id="uf2" value="<?php echo $dadosCliente['uf']; ?>" class="form-control" placeholder="UF">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="clicidade" value="<?php echo $dadosCliente['cidade']; ?>" id="cidade2" class="form-control " placeholder="Cidade">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="clibairro" value="<?php echo $dadosCliente['bairro']; ?>" id="bairro2" class="form-control " placeholder="Bairro">
                                    </div>

                                    <div class="mb-3">
                                        <input type="text" name="clicomplemento" value="<?php echo $dadosCliente['complemento']; ?>" id="complemento2" class="form-control " placeholder="Complemento">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="clitelefone" id="telefone2" value="<?php echo $dadosCliente['telefone']; ?>" class="form-control phone-ddd-mask" placeholder="Telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" name="cliemail" id="email" value="<?php echo $dadosCliente['email']; ?>" class="form-control" placeholder="E-mail" aria-label="E-mail">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <input type="submit" name="editarCliente" class="btn btn-primary" value="Editar">
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

</div>

<script>
    var select = document.getElementById('opcao').value;
    if (select === '1') {
        $(document).ready(function() {
            var administrador = document.getElementById('editarAdministrador').style.display = 'block';
            var profissional = document.getElementById('editarProfissional').style.display = 'none';
            var cliente = document.getElementById('editarCliente').style.display = 'none';

        });
    }
    if (select === '2') {
        $(document).ready(function() {
            var administrador = document.getElementById('editarAdministrador').style.display = 'none';
            var profissional = document.getElementById('editarProfissional').style.display = 'block';
            var cliente = document.getElementById('editarCliente').style.display = 'none';

        });
    }
    if (select === '3') {
        $(document).ready(function() {
            var administrador = document.getElementById('editarAdministrador').style.display = 'none';
            var profissional = document.getElementById('editarProfissional').style.display = 'none';
            var cliente = document.getElementById('editarCliente').style.display = 'block';

        });
    }



    function DivProfissional() {
        var administrador = document.getElementById('editarAdministrador').style.display = 'none';
        var profissional = document.getElementById('editarProfissional').style.display = 'block';
        var cliente = document.getElementById('editarCliente').style.display = 'none';
    }

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


        $cheched = document.querySelector('input[name=opt]:checked').value;

        if ($cheched === 'J') {
            var Pfisica = document.getElementById('Pfisica').style.display = "block";
        }

        if ($cheched === 'F') {
            var Pfisica = document.getElementById('Pfisica').style.display = "none";
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
    function FormADM(id) {

        //alert(id)

        $('#editaradmin' + id).click(function() {

            formFileADM + id.executar();
        });

        $('#formFileADM' + id).change(function() {

            const file = $(this)[0].files[0];
            const fileReader = new FileReader()
            fileReader.onloadend = function() {
                $('#editaradmin' + id).attr('src', fileReader.result)
            }
            fileReader.readAsDataURL(file)
        });

    }
</script>


<script>
    function FormPRO(id) {

        $('#editarusprofissional' + id).click(function() {
            formFilePro + id.executar();

        });

        $('#formFilePro' + id).change(function() {

            const file = $(this)[0].files[0];
            const fileReader = new FileReader()
            fileReader.onloadend = function() {
                $('#editarusprofissional' + id).attr('src', fileReader.result)
            }
            fileReader.readAsDataURL(file)
        });

    }
</script>


<script>
    function FormCLI(id) {

        $('#editarusuario' + id).click(function() {
            formFile + id.executar();
        });

        $('#formFile' + id).change(function() {

            const file = $(this)[0].files[0];
            const fileReader = new FileReader()
            fileReader.onloadend = function() {
                $('#editarusuario' + id).attr('src', fileReader.result)
            }
            fileReader.readAsDataURL(file)
        });
    }
</script>


<script>

    document.getElementsByClassName('swal2-actions').style.margin = '20px'
    
    function excluirProfissional(id){

       

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Você deseja',
            text: "Excluir esse registro ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                document.location.href = 'editar.php?pd='+id;

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                
            }
        })

    }

    function excluirCliente(id){

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Você deseja',
            text: "Excluir esse registro ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                document.location.href = 'editar.php?cd='+id;
                //document.location.href = 'editar.php?cd='+id;

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                
            }
        })

    }
   


</script>



<?php
include_once "../../layout/footer.php";
?>