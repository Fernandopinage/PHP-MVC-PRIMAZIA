<?php
session_start();
include_once "../../layout/heard.php";
?>
<link href="../../layout/css/cliente_registro.css" rel="stylesheet">

<div class="text-center">
    <img id="logo" src="../../images/primazia.png" class="img"><br>
</div>

<div class="title text-center">
    <p>ADICIONAR NOVO REGISTRO</p>
</div>
<div class="container">

    <div class="row ms-3 p-2">
        <div class="col-md-5 ">
            <label for="basic-url" class="form-label">Selecione uma opção para cadastrar</label>
            <select class="form-select form-select-sm" id="opcao" aria-label="Default select example" onchange="addNew()">
                <option selected value="0" ></option>
                <option value="1">administrador</option>
                <option value="2">Profissional</option>
                <option value="3">Cliente</option>
            </select><br>
        </div>
    </div>

    <div class="row ms-3 p-2">
        <form action="">

            <div id="administrador">
                <div id="Pfisica">

                    <div class="row g-3 mt-1">
                        <div class="col-md-6">
                            <input type="text" name="admnome" id="admnome" class="form-control" placeholder="Nome" aria-label="Nome do administrador">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="admcpf" id="admcpf" class="form-control cpf-mask" placeholder="CPF" onkeypress="return somenteNumeros(event)" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);">
                        </div>
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
                    <div class="col-md-12">
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
                    <div class="col-md-12">
                        <select class="form-select" name="servico">
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
                        <input class="pessoa form-check-input" type="radio" name="opt" id="j" onclick="juridica()" value="J" CHECKED>
                        <label class="form-check-label" for="pessoa" id="j">
                            Pessoa juridica
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<?php
include_once "../../layout/footer.php";
?>