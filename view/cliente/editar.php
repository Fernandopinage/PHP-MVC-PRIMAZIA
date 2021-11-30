<?php
session_start();

if (empty($_SESSION['user'])) {


    header('location: ../../view/cliente/login.php');
}



include_once "../../layout/heard.php";
include_once  "../../class/ClassCliente.php";
include_once "../../dao/ClienteDAO.php";

$ClassCLiente = new Cliente();
$ClassCLiente->SetId($_SESSION['user']['id']);

$Cliente = new ClienteDAO();
$dados = $Cliente->listarCliente($ClassCLiente);


if (isset($_POST['salvarCliente'])) {


    if (!empty($_POST['nome'])  and !empty($_POST['cpf']) and !empty($_POST['cep']) and !empty($_POST['telefone']) and !empty($_POST['email'])) {

        if ($_POST['senha'] === $_POST['confirmar']) {


            if (isset($_FILES['imagem']['name'])) {
                $imagem = $_FILES['imagem']['name'];
                $diretorio = '../../images/';
                //$diretorioPDF = '../pdf/';
                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $imagem);
            }

            $ClassCliente = new Cliente();
            $ClassCliente->SetId($_POST['id']);
            $ClassCliente->SetFoto($imagem);
            @$ClassCliente->SetOpcao($_POST['opt']);
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

            $ClassCliente->SetSexo($_POST['sexo']);
            $ClassCliente->SetNascimento($_POST['data_nascimento']);
            if(!empty($_POST['termo'])){
                $ClassCliente->SetTermo($_POST['termo']);
            }


       


            $Cliente = new ClienteDAO();
            $Cliente->editarCliente($ClassCliente);
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
<div class="container-fluid">
    <div class="container" id="registro">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="text-center">
                <a href="https://gotoservice.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
            </div>

            <div class="title text-center">
                <p>EDITAR PERFIL</p>
            </div>


            <div id="form-row">
                <div class="row" style="padding: 40px;">
                    <div class="text-center">
                        <div class="mb-3">
                            <?php
                            if (!empty($dados['foto'])) {

                            ?>
                                <label for="formFile" class="form-label"><img id="editarusuario" src="../../images/<?php echo $dados['foto']; ?>" class="img" width="150" style="border-radius: 50%;"></label>
                                <input class="form-control" type="file" name="imagem" value="<?php echo $dados['foto'] ?>" id="formFile" style="display:none" accept=".png, .jpg, .jpeg" >

                            <?php
                            } else {
                            ?>

                                <label for="formFile" class="form-label"><img id="editarusuario" src="../../images/usuario.png" class="img" width="150" style="border-radius: 50%;"></label>
                                <input class="form-control" type="file" name="imagem" id="formFile" style="display:none" accept=".png, .jpg, .jpeg" >

                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>

                <?php

                if ($dados['razao'] === 'F') {

                ?>

                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="pessoa form-check-input" type="radio" name="opt" id="j" onclick="juridica()" value="J" CHECKED disabled>
                            <label class="form-check-label" for="pessoa" id="j">
                            Pessoa Jurídica
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="pessoa form-check-input" type="radio" name="opt" id="f" onclick="fisica()" value="F" disabled>
                            <label class="form-check-label" for="pessoa" id="f">
                            Pessoa Física
                            </label>
                        </div>
                    </div>


                <?php

                } else {


                ?>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="pessoa form-check-input" type="radio" name="opt" id="j" onclick="juridica()" value="J" disabled>
                            <label class="form-check-label" for="pessoa" id="j">
                            Pessoa Jurídica
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="pessoa form-check-input" type="radio" name="opt" id="f" onclick="fisica()" value="F" CHECKED disabled>
                            <label class="form-check-label" for="pessoa" id="f">
                            Pessoa Física
                            </label>
                        </div>
                    </div>


                <?php

                }

                ?>

                <div id="Pfisica">

                    <div class="row g-3 mt-1">
                        <div class="col-md-6">
                            <label>Razão Social<span style="color: red;">*</span></label>
                            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                            <input type="text" name="razao" value="<?php echo $dados['razao']; ?>" id="razao" class="form-control form-control-sm" aria-label="Nome de Usuário">
                        </div>
                        <div class="col-md-6">
                            <label>Inscrição Estadual<span style="color: red;">*</span></label>
                            <input type="text" name="Inscrição Estadual" id="estadual" class="form-control form-control-sm cpf-mask" >
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <label>Nome de Usuário<span style="color: red;">*</span></label>
                        <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>" class="form-control form-control-sm"  aria-label="Nome de Usuário">
                    </div>
                    <div class="col-md-6">
                        <label>CPF/CNPJ<span style="color: red;">*</span></label>
                        <input type="text" name="cpf" id="cpf" value="<?php echo $dados['cpf']; ?>" class="form-control form-control-sm cpf-mask" onkeypress="return somenteNumeros(event)" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);" readonly>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                    <label>Alterar Senha<span style="color: red;">*</span></label>
                        <input type="password" name="senha" id="senha" class="form-control form-control-sm"  aria-label="">
                    </div>
                    <div class="col-md-6">
                    <label>Confirme sua senha<span style="color: red;">*</span></label>
                        <input type="password" name="confirmar" id="confirmar" class="form-control form-control-sm cpf-mask" >
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <label>Data de Nascimento<span style="color: red;">*</span></label>
                        <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $dados['nascimento'];?>" class="form-control form-control-sm"  aria-label="Data de Nascimento">
                    </div>
                    <div class="col-md-6">
                    <label>Gênero<span style="color: red;">*</span></label>
                        <select class="form-select form-select-sm" name="sexo" id="sexo">
                        
                        <option  <?php echo $dados['sexo'] =='masculino'?'selected':'' ; ?> value="masculino" >Masculino</option>
                        <option  <?php echo $dados['sexo'] =='feminino'?'selected':'' ; ?> value="feminino">Feminino</option>
                        <option  <?php echo $dados['sexo'] =='outros'?'selected':'' ; ?> value="outros">Outros</option>
                        </select>
                    </div>
                </div>



                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <label>CEP<span style="color: red;">*</span></label>
                        <input type="text" maxlength="9" name="cep" id="cep" value="<?php echo $dados['cep']; ?>" class="form-control form-control-sm"  onkeypress="$(this).mask('00.000-000')">
                    </div>
                    <div class="col-md-6">
                        <label>Endereço<span style="color: red;">*</span></label>
                        <input type="text" name="logradouro" id="rua" value="<?php echo $dados['rua']; ?>" class="form-control form-control-sm" >
                    </div>
                    <div class="col-md-3">
                        <label>Nº<span style="color: red;">*</span></label>
                        <input type="text" name="numerp" id="numero" value="<?php echo $dados['numero']; ?>" class="form-control form-control-sm" >
                    </div>
                    <div class="col-md-3">
                        <label>UF<span style="color: red;">*</span></label>
                        <input type="text" name="uf" id="uf" value="<?php echo $dados['uf']; ?>" class="form-control form-control-sm" >
                    </div>
                    <div class="col-md-6">
                    <label>Cidade<span style="color: red;">*</span></label>
                        <input type="text" name="cidade" id="cidade" value="<?php echo $dados['cidade']; ?>" class="form-control form-control-sm " >
                    </div>
                    <div class="col-md-6">
                    <label>Bairro<span style="color: red;">*</span></label>
                        <input type="text" name="bairro" value="<?php echo $dados['bairro']; ?>" id="bairro" class="form-control form-control-sm " >
                    </div>

                    <div class="col-md-6">
                    <label>Complemento<span style="color: red;">*</span></label>
                        <input type="text" name="complemento" id="complemento" value="<?php echo $dados['complemento']; ?>" class="form-control form-control-sm" >
                    </div>
                    <div class="col-md-6">
                    <label>Telefone<span style="color: red;">*</span></label>
                        <input type="text" name="telefone" id="telefone" value="<?php echo $dados['telefone']; ?>" class="form-control form-control-sm phone-ddd-mask"  onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">
                    </div>
                    <div class="col-md-6">
                    <label>E-mail<span style="color: red;">*</span></label>
                        <input type="email" name="email" id="email" value="<?php echo $dados['email']; ?>" class="form-control form-control-sm"  aria-label="E-mail" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-check-label" for="">
                        Eu li e concordo com os <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" >termos</a>  de uso
                        </label>
                        <input class="form-check-input" name="termo" type="checkbox" <?php echo $dados['termo']== 'on'? 'checked':''  ?> id="flexCheckDefault">
                    </div>
                </div>

                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Termo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                <div class="text-center" style="margin-bottom: 50px;">
                                    <h2><b>Política de Privacidade</b></h2>
                                </div>
                                <div style="margin-bottom: 50px;">
                                    <p>A sua privacidade é importante para nós. É política do respeitar a sua privacidade em relação a qualquer informação sua que possamos coletar no site , e outros sites que possuímos e operamos.</p>
                                    <p>Solicitamos informações pessoais apenas quando realmente precisamos delas para lhe fornecer um serviço. Fazemo-lo por meios justos e legais, com o seu conhecimento e consentimento. Também informamos por que estamos coletando e como será usado.</p>
                                    <p>Apenas retemos as informações coletadas pelo tempo necessário para fornecer o serviço solicitado. Quando armazenamos dados, protegemos dentro de meios comercialmente aceitáveis ​​para evitar perdas e roubos, bem como acesso, divulgação, cópia, uso ou modificação não autorizados.</p>
                                    <p>Não compartilhamos informações de identificação pessoal publicamente ou com terceiros, exceto quando exigido por lei.</p>
                                    <p>O nosso site pode ter links para sites externos que não são operados por nós. Esteja ciente de que não temos controle sobre o conteúdo e práticas desses sites e não podemos aceitar responsabilidade por suas respectivas políticas de privacidade.</p>
                                    <p>Você é livre para recusar a nossa solicitação de informações pessoais, entendendo que talvez não possamos fornecer alguns dos serviços desejados.</p>
                                    <p>O uso continuado de nosso site será considerado como aceitação de nossas práticas em torno de privacidade e informações pessoais. Se você tiver alguma dúvida sobre como lidamos com dados do usuário e informações pessoais, entre em contacto connosco.</p>

                                </div>

                                <div style="margin-bottom: 50px;">
                                    <h4 style="margin-bottom: 20px;"><b>Política de Cookies</b></h4>
                                    <h6><b>O que são cookies?</b></h6>
                                    <p>Como é prática comum em quase todos os sites profissionais, este site usa cookies, que são pequenos arquivos baixados no seu computador, para melhorar sua experiência. Esta página descreve quais informações eles coletam, como as usamos e por que às vezes precisamos armazenar esses cookies. Também compartilharemos como você pode impedir que esses cookies sejam armazenados, no entanto, isso pode fazer o downgrade ou ‘quebrar’ certos elementos da funcionalidade do site.</p>
                                   
                                    <h6><b>Como usamos os cookies?</b></h6>
                                    <p>Utilizamos cookies por vários motivos, detalhados abaixo. Infelizmente, na maioria dos casos, não existem opções padrão do setor para desativar os cookies sem desativar completamente a funcionalidade e os recursos que eles adicionam a este site. É recomendável que você deixe todos os cookies se não tiver certeza se precisa ou não deles, caso sejam usados ​​para fornecer um serviço que você usa.</p>
                                    <h6><b>Cookies que definimos</b></h6>

                                    <p>
                                        <li>Cookies relacionados à conta</li>
                                    </p>
                                    <p>Se você criar uma conta connosco, usaremos cookies para o gerenciamento do processo de inscrição e administração geral. Esses cookies geralmente serão excluídos quando você sair do sistema, porém, em alguns casos, eles poderão permanecer posteriormente para lembrar as preferências do seu site ao sair.</p>

                                    <p>
                                        <li>Cookies relacionados ao login</li>
                                    </p>
                                    <p>Utilizamos cookies quando você está logado, para que possamos lembrar dessa ação. Isso evita que você precise fazer login sempre que visitar uma nova página. Esses cookies são normalmente removidos ou limpos quando você efetua logout para garantir que você possa acessar apenas a recursos e áreas restritas ao efetuar login.</p>

                                    <p>
                                        <li>Cookies relacionados a boletins por e-mail</li>
                                    </p>
                                    <p>Este site oferece serviços de assinatura de boletim informativo ou e-mail e os cookies podem ser usados ​​para lembrar se você já está registrado e se deve mostrar determinadas notificações válidas apenas para usuários inscritos / não inscritos.</p>

                                    <p>
                                        <li>Pedidos processando cookies relacionados</li>
                                    </p>
                                    <p>Este site oferece facilidades de comércio eletrônico ou pagamento e alguns cookies são essenciais para garantir que seu pedido seja lembrado entre as páginas, para que possamos processá-lo adequadamente.</p>


                                    <p>
                                        <li>Cookies relacionados a formulários</li>
                                    </p>
                                    <p>Quando você envia dados por meio de um formulário como os encontrados nas páginas de contacto ou nos formulários de comentários, os cookies podem ser configurados para lembrar os detalhes do usuário para correspondência futura.</p>

                                    <p>
                                        <li>Cookies de preferências do site</li>
                                    </p>
                                    <p>Para proporcionar uma ótima experiência neste site, fornecemos a funcionalidade para definir suas preferências de como esse site é executado quando você o usa. Para lembrar suas preferências, precisamos definir cookies para que essas informações possam ser chamadas sempre que você interagir com uma página for afetada por suas preferências.</p>

                                </div>

                                <div style="margin-bottom: 50px;">
                                    <h4><b>Cookies de Terceiros</b></h4>
                                    <p>Em alguns casos especiais, também usamos cookies fornecidos por terceiros confiáveis. A seção a seguir detalha quais cookies de terceiros você pode encontrar através deste site.</p>
                                    <p>
                                        <li>Este site usa o Google Analytics, que é uma das soluções de análise mais difundidas e confiáveis ​​da Web, para nos ajudar a entender como você usa o site e como podemos melhorar sua experiência. Esses cookies podem rastrear itens como quanto tempo você gasta no site e as páginas visitadas, para que possamos continuar produzindo conteúdo atraente.</li>
                                    </p>
                                    <p>Para mais informações sobre cookies do Google Analytics, consulte a página oficial do Google Analytics.</p>
                                    <p>
                                        <li>As análises de terceiros são usadas para rastrear e medir o uso deste site, para que possamos continuar produzindo conteúdo atrativo. Esses cookies podem rastrear itens como o tempo que você passa no site ou as páginas visitadas, o que nos ajuda a entender como podemos melhorar o site para você.</li>
                                    </p>
                                    <p>
                                        <li>Periodicamente, testamos novos recursos e fazemos alterações subtis na maneira como o site se apresenta. Quando ainda estamos testando novos recursos, esses cookies podem ser usados ​​para garantir que você receba uma experiência consistente enquanto estiver no site, enquanto entendemos quais otimizações os nossos usuários mais apreciam.</li>
                                    </p>
                                    <p>
                                        <li>À medida que vendemos produtos, é importante entendermos as estatísticas sobre quantos visitantes de nosso site realmente compram e, portanto, esse é o tipo de dados que esses cookies rastrearão. Isso é importante para você, pois significa que podemos fazer previsões de negócios com precisão que nos permitem analizar nossos custos de publicidade e produtos para garantir o melhor preço possível.</li>
                                    </p>

                                </div>

                                <div>
                                    <h4><b>Compromisso do Usuário</b></h4>
                                    <p>O usuário se compromete a fazer uso adequado dos conteúdos e da informação que o oferece no site e com caráter enunciativo, mas não limitativo:</p>
                                    <p>
                                        <li>A) Não se envolver em atividades que sejam ilegais ou contrárias à boa fé a à ordem pública;</li>
                                    </p>
                                    <p>
                                        <li>B) Não difundir propaganda ou conteúdo de natureza racista, xenofóbica, ou salmao, casas de apostas (ex.: Betway), jogos de sorte e azar, qualquer tipo de pornografia ilegal, de apologia ao terrorismo ou contra os direitos humanos;</li>
                                    </p>
                                    <p>
                                        <li>C) Não causar danos aos sistemas físicos (hardwares) e lógicos (softwares) do , de seus fornecedores ou terceiros, para introduzir ou disseminar vírus informáticos ou quaisquer outros sistemas de hardware ou software que sejam capazes de causar danos anteriormente mencionados.</li>
                                    </p>

                                </div>

                            </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                   


                <div class="row">

                    <div class="d-grid gap-2 col-3 mx-auto mt-5">
                        <button type="submit" name="salvarCliente" class="btn btn-lg orangered">SALVAR</button>
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
    $(document).ready(function() {

        if (document.getElementById("j").checked) {

            var Pfisica = document.getElementById('Pfisica').style.display = "block";

        } else {
            var Pfisica = document.getElementById('Pfisica').style.display = "none";
        }



    });

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<?php
include_once "../../layout/footer.php";
?>