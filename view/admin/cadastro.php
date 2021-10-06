<?php

include_once "../../layout/heard.php";
include_once "../../class/ClassAdmin.php";
include_once "../../dao/AdminDAO.php";
session_start();

if (empty($_SESSION['admin'])) {

    header('location: ../../view/admin/login.php');
}

if (isset($_POST['salvarAdmin'])) {


    if (!empty($_POST['admnome']) and !empty($_POST['admcpf']) and !empty($_POST['admsenha']) and !empty($_POST['admconfirmar']) and !empty($_POST['admemail'])) {

        if ($_POST['admsenha'] === $_POST['admconfirmar']) {


            $ClassAdmin = new Admin();
            $ClassAdmin->SetNome($_POST['admnome']);
            $ClassAdmin->SetCpf($_POST['admcpf']);
            $ClassAdmin->SetSenha($_POST['admsenha']);
            $ClassAdmin->SetEmail($_POST['admemail']);
            $ClassAdmin->SetTelefone($_POST['admtel']);

            $Admin = new AdminDAO();
            $Admin->AdminInsert($ClassAdmin);
        }
    } else {

?>

        <script>
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Senhas Não Coincidem',
                showConfirmButton: false,
                timer: 3500
            })
        </script>


        <?php
    }
}

if (isset($_POST['salvarProfissional'])) {


    if (!empty($_POST['Pnome']) and !empty($_POST['Psenha']) and !empty($_POST['Pcpf']) and !empty($_POST['Pcep']) and !empty($_POST['Ptelefone']) and !empty($_POST['Pemail'])) {

        if ($_POST['Psenha'] === $_POST['Pconfirmar']) {


            $ClassProfissional = new Profissional();

            $ClassProfissional->SetOpcao($_POST['Popt']);
            $ClassProfissional->SetRazao($_POST['Prazao']);
            $ClassProfissional->SetNome($_POST['Pnome']);
            $ClassProfissional->SetSenha($_POST['Psenha']);
            $ClassProfissional->SetCpf($_POST['Pcpf']);
            $ClassProfissional->SetCep($_POST['Pcep']);
            $ClassProfissional->SetUf($_POST['Puf']);
            $ClassProfissional->SetCidade($_POST['Pcidade']);
            $ClassProfissional->SetLogradouro($_POST['Plogradouro']);
            $ClassProfissional->SetNumero($_POST['Pnumerp']);
            $ClassProfissional->SetBairro($_POST['Pbairro']);
            $ClassProfissional->SetComplemento($_POST['Pcomplemento']);
            $ClassProfissional->SetTelefone($_POST['Ptelefone']);
            $ClassProfissional->SetEmail($_POST['Pemail']);
            $ClassProfissional->SetServico($_POST['Pservico']);


            $Profissional = new ProfissionalDAO();
            $Profissional->AdminInserirProfissional($ClassProfissional);
        } else {

        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Senhas Não Coincidem',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>


        <?php

        }
    } else {
        ?>

        <script>
            Swal.fire({
                position: 'center',
                icon: 'info',
                title: 'Preencha Todos os Campos',
                showConfirmButton: false,
                timer: 3500
            })
        </script>


        <?php

    }
}

if (isset($_POST['salvarCliente'])) {


    if (!empty($_POST['nome']) and !empty($_POST['senha']) and !empty($_POST['cpf']) and !empty($_POST['cep']) and !empty($_POST['telefone']) and !empty($_POST['email'])) {

        if ($_POST['senha'] === $_POST['confirmar']) {


            $ClassCliente = new Cliente();
            $ClassCliente->SetOpcao($_POST['opt']);
            $ClassCliente->SetRazao($_POST['razao']);
            $ClassCliente->SetNome($_POST['nome']);
            $ClassCliente->SetSenha($_POST['senha']);
            $ClassCliente->SetCpf($_POST['cpf']);
            $ClassCliente->SetCep($_POST['cep']);
            $ClassCliente->SetUf($_POST['uf']);
            $ClassCliente->SetCidade($_POST['cidade']);
            $ClassCliente->SetLogradouro($_POST['logradouro']);
            $ClassCliente->SetNumero($_POST['numerp']);
            $ClassCliente->SetBairro($_POST['bairro']);
            $ClassCliente->SetComplemento($_POST['complemento']);
            $ClassCliente->SetTelefone($_POST['telefone']);
            $ClassCliente->SetEmail($_POST['email']);




            $Cliente = new ClienteDAO();
            $Cliente->AdminInsertCliente($ClassCliente);
        } else {

        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Senhas Não Coincidem',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>


        <?php

        }
    } else {
        ?>

        <script>
            Swal.fire({
                position: 'center',
                icon: 'info',
                title: 'Preencha Todos os Campos',
                showConfirmButton: false,
                timer: 3500
            })
        </script>


<?php

    }
}



?>
<link href="../../layout/css/cliente_registro.css" rel="stylesheet">

<div class="text-center">
    <a href="https://primazia.agenciaprogride.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
</div>

<div class="title text-center">
    <p>ADICIONAR NOVO REGISTRO</p>
</div>
<div class="container">

    <div class="row ms-3 p-2">
        <div class="col-md-5 ">
            <label for="basic-url" class="form-label">Selecione uma opção para cadastrar</label>
            <select class="form-select form-select-sm" id="opcao" aria-label="Default select example" onchange="addNew()">
                <option selected value="0"></option>
                <option value="1">Administrador</option>
                <option value="2">Profissional</option>
                <option value="3">Cliente</option>
            </select><br>
        </div>
    </div>

    <div class="row ms-3 p-2">
        <form method="POST">

            <div id="administrador">
              

                    <div class="row g-3 mt-1">
                        <div class="col-md-6">
                            <input type="text" name="admnome" id="admnome" class="form-control" placeholder="Nome" aria-label="Nome do administrador">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="admcpf" id="admcpf" class="form-control cpf-mask" placeholder="CPF/CNPJ" onkeypress="return somenteNumeros(event)" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);">
                        </div>
                    </div>
               
                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <input type="password" name="admsenha" id="admsenha" class="form-control" placeholder="Senha" aria-label="">
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="admconfirmar" id="admconfirmar" class="form-control cpf-mask" placeholder="Confirmar senha">
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <input type="text" name="admtel" id="tel" class="form-control" placeholder="Telefone" aria-label="">
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="admemail" id="admemail" class="form-control" placeholder="E-mail" aria-label="">
                    </div>
                </div>
                <div class="row">

                    <div class="d-grid gap-2 col-3 mx-auto mt-5">
                        <button type="submit" name="salvarAdmin" class="btn btn-lg orangered">CADASTRAR</button>
                    </div>
                </div>
            </div>
            <div id="profissional">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="pessoa form-check-input" type="radio" name="Popt" id="j" onclick="juridicaP()" value="J" CHECKED>
                        <label class="form-check-label" for="j" id="j">
                            Pessoa Juridica
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="pessoa form-check-input" type="radio" name="Popt" id="f" onclick="fisicaP()" value="F">
                        <label class="form-check-label" for="f" id="f">
                            Pessoa Fisica
                        </label>
                    </div>
                </div>
                <div id="Pfisica">

                    <div class="row g-3 mt-1">
                        <div class="col-md-6">
                            <input type="text" name="Prazao" id="razao" class="form-control" placeholder="Razão Social" aria-label="Nome de Usuário">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="PInscrição Estadual" id="estadual" class="form-control cpf-mask" placeholder="Inscrição Estadual">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <input type="text" name="Pnome" id="nome" class="form-control" placeholder="Nome de Usuário" aria-label="Nome de Usuário">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="Pcpf" id="cpf" class="form-control cpf-mask" placeholder="CPF/CNPJ" onkeypress="return somenteNumeros(event)" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);">
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <input type="password" name="Psenha" id="senha" class="form-control" placeholder="Senha" aria-label="">
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="Pconfirmar" id="confirmar" class="form-control cpf-mask" placeholder="Confirmar senha">
                    </div>
                </div>


                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <input type="text" maxlength="9" name="Pcep" id="cep" class="form-control" placeholder="CEP" onkeypress="$(this).mask('00.000-000')">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="Plogradouro" id="rua" class="form-control" placeholder="Endereço ">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="Pnumerp" id="numero" class="form-control" placeholder="Nº ">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="Puf" id="uf" class="form-control" placeholder="UF">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="Pcidade" id="cidade" class="form-control " placeholder="Cidade">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="Pbairro" id="bairro" class="form-control " placeholder="Bairro">
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="Pcomplemento" id="complemento" class="form-control " placeholder="Complemento">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="Ptelefone" id="telefone" class="form-control phone-ddd-mask" placeholder="Telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="Pemail" id="email" class="form-control" placeholder="E-mail" aria-label="E-mail">
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="Pservico">
                            <option selected>Tipo de Serviço</option>
                            <option value="Artífice (Pedreiro,Pintor e Hidráulico)">Artífice (Pedreiro,Pintor e Hidráulico)</option>
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
                </div>


                <div class="row">

                    <div class="d-grid gap-2 col-3 mx-auto mt-5">
                        <button type="submit" name="salvarProfissional" class="btn btn-lg orangered">CADASTRAR</button>
                    </div>
                </div>
            </div>
            <div id="cliente">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="pessoa form-check-input" type="radio" name="opt" id="jc" onclick="juridicaC()" value="J" CHECKED>
                        <label class="form-check-label" for="jc" id="jc">
                            Pessoa juridica
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="pessoa form-check-input" type="radio" name="opt" id="fc" onclick="fisicaC()" value="F">
                        <label class="form-check-label" for="fc" id="fc">
                            Pessoa Fisica
                        </label>
                    </div>
                </div>
                <div id="Cfisica">

                    <div class="row g-3 mt-1">
                        <div class="col-md-6">
                            <input type="text" name="razao" id="razao" class="form-control" placeholder="Razão Social" aria-label="Nome de Usuário">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="Inscrição Estadual" id="estadual" class="form-control cpf-mask" placeholder="Inscrição Estadual">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome de Usuário" aria-label="Nome de Usuário">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="cpf" id="cpf" class="form-control cpf-mask" placeholder="CPF/CNPJ" onkeypress="return somenteNumeros(event)" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);">
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" aria-label="">
                    </div>
                    <div class="col-md-6">
                        <input type="password" name="confirmar" id="confirmar" class="form-control cpf-mask" placeholder="Confirmar senha">
                    </div>
                </div>


                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <input type="text" maxlength="9" name="cep" id="cep" class="form-control" placeholder="CEP" onkeypress="$(this).mask('00.000-000')">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="logradouro" id="rua" class="form-control" placeholder="Endereço ">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="numerp" id="numero" class="form-control" placeholder="Nº ">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="uf" id="uf" class="form-control" placeholder="UF">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="cidade" id="cidade" class="form-control " placeholder="Cidade">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="bairro" id="bairro" class="form-control " placeholder="Bairro">
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="complemento" id="complemento" class="form-control " placeholder="Complemento">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="telefone" id="telefone" class="form-control phone-ddd-mask" placeholder="Telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" aria-label="E-mail">
                    </div>
                </div>


                <div class="row">

                    <div class="d-grid gap-2 col-3 mx-auto mt-5">
                        <button type="submit" name="salvarCliente" class="btn btn-lg orangered">CADASTRAR</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    document.getElementById('administrador').style.display = 'none';
    document.getElementById('profissional').style.display = 'none';
    document.getElementById('cliente').style.display = 'none';

    function addNew() {
        var opcao = document.getElementById('opcao').value;

        if (opcao === '0') {
            document.getElementById('administrador').style.display = 'none';
            document.getElementById('profissional').style.display = 'none';
            document.getElementById('cliente').style.display = 'none';
        }

        if (opcao === '1') {
            document.getElementById('administrador').style.display = 'block';
            document.getElementById('profissional').style.display = 'none';
            document.getElementById('cliente').style.display = 'none';
        }
        if (opcao === '2') {
            document.getElementById('administrador').style.display = 'none';
            document.getElementById('profissional').style.display = 'block';
            document.getElementById('cliente').style.display = 'none';
        }
        if (opcao === '3') {
            document.getElementById('administrador').style.display = 'none';
            document.getElementById('profissional').style.display = 'none';
            document.getElementById('cliente').style.display = 'block';
        }

    }
</script>

<script>
    function juridicaP() {
        
        var Pfisica = document.getElementById('Pfisica').style.display = "block";


    }

    function fisicaP() {

    
        var Pfisica = document.getElementById('Pfisica').style.display = "none";


    }

    function juridicaC() {

        var Cfisica = document.getElementById('Cfisica').style.display = "block";


    }

    function fisicaC() {

        var Cfisica = document.getElementById('Cfisica').style.display = "none";


    }
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<?php
include_once "../../layout/footer.php";
?>