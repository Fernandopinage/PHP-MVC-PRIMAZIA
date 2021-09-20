<?php
session_start();

include_once "../../layout/heard.php";

include_once  "../../class/ClassProfissional.php";
include_once "../../dao/ProfissionalDAO.php";


if (isset($_POST['salvarProfissional'])) {


    if (!empty($_POST['nome']) and !empty($_POST['senha']) and !empty($_POST['cpf']) and !empty($_POST['cep']) and !empty($_POST['telefone']) and !empty($_POST['email'])) {

        if ($_POST['senha'] === $_POST['confirmar']) {


            if(isset($_FILES['imagem']['name'])){
                $imagem = $_FILES['imagem']['name'];
                $diretorio = '../../images/';
                //$diretorioPDF = '../pdf/';
                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $imagem);
            }
            
            $ClassProfissional = new Profissional();
            $ClassProfissional->SetFoto($imagem);
            $ClassProfissional->SetOpcao($_POST['opt']);
            $ClassProfissional->SetRazao($_POST['razao']);
            $ClassProfissional->SetNome($_POST['nome']);
            $ClassProfissional->SetSenha($_POST['senha']);
            $ClassProfissional->SetCpf($_POST['cpf']);
            $ClassProfissional->SetCep($_POST['cep']);
            $ClassProfissional->SetUf($_POST['uf']);
            $ClassProfissional->SetCidade($_POST['cidade']);
            $ClassProfissional->SetLogradouro($_POST['logradouro']);
            $ClassProfissional->SetNumero($_POST['numerp']);
            $ClassProfissional->SetBairro($_POST['bairro']);
            $ClassProfissional->SetComplemento($_POST['complemento']);
            $ClassProfissional->SetTelefone($_POST['telefone']);
            $ClassProfissional->SetEmail($_POST['email']);
            $ClassProfissional->SetServico($_POST['servico']);

           
            $Profissional = new ProfissionalDAO();
            $Profissional->insertProfissional($ClassProfissional);
          

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
<link href="../../layout/css/profissional_registro.css" rel="stylesheet">
<div class="container-fluid">
    <div class="container" id="registro">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="text-center">
                <img id="logo" src="../../images/primazia.png" class="img"><br>
            </div>

            <div class="title text-center">
                <p>REGISTRO PROFISSIONAL</p>
            </div>


            <div id="form-row">
                <div class="row" style="padding: 40px;">
                    <div class="text-center">
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><img id="editarusuario" src="../../images/usuario.png" class="img" width="150" style="border-radius: 50%;"></label>
                            <input class="form-control" type="file" name="imagem" id="formFile" style="display:none" accept=".png, .jpg, .jpeg" placeholder="">
                        </div>
                        
                    </div>
                </div>
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
        </form>
    </div>

    <div class="container" id="registro_logo">
        <img src="../../images/cliente.gif">
    </div>


</div>

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

$('#editarusuario').click(function(){
    formFile.executar();
});

$('#formFile').change(function(){

   const file = $(this)[0].files[0];
   const fileReader = new FileReader()
   fileReader.onloadend = function(){
    $('#editarusuario').attr('src',fileReader.result)
   }
   fileReader.readAsDataURL(file)
});

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<?php
include_once "../../layout/footer.php";
?>