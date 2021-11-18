<?php
session_start();

include_once "../../layout/heard.php";

include_once  "../../class/ClassProfissional.php";
include_once "../../dao/ProfissionalDAO.php";


if (isset($_POST['salvarProfissional'])) {


    if (!empty($_POST['nome']) and !empty($_POST['senha']) and !empty($_POST['cpf']) and !empty($_POST['cep']) and !empty($_POST['telefone']) and !empty($_POST['email'])) {

        if ($_POST['senha'] === $_POST['confirmar']) {


            if (isset($_FILES['imagem']['name'])) {
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

            $ClassProfissional->SetSexo($_POST['sexo']);
            $ClassProfissional->SetNascimento($_POST['data_nascimento']);
            $ClassProfissional->SetTermo($_POST['termo']);

            $subcategoria = $_POST['categoria'];

            $Profissional = new ProfissionalDAO();
            $Profissional->insertProfissional($ClassProfissional, $subcategoria);

            
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
                <a href="https://gotoservice.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
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
                            <label>Razão Social<span style="color: red;">*</span></label>
                            <input type="text" name="razao" id="razao" class="form-control form-control-sm" aria-label="Nome de Usuário" >
                        </div>
                        <div class="col-md-6">
                            <label>Inscrição Estadual <span style="color: red;">*</span></label>
                            <input type="text" name="Inscrição Estadual" id="estadual" class="form-control form-control-sm cpf-mask">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <label>Nome de Usuário <span style="color: red;">*</span></label>
                        <input type="text" name="nome" id="nome" class="form-control form-control-sm" aria-label="Nome de Usuário">
                    </div>
                    <div class="col-md-6">
                        <label>CPF/CNPJ <span style="color: red;">*</span></label>
                        <input type="text" name="cpf" id="cpf" class="form-control form-control-sm cpf-mask" onkeypress="return somenteNumeros(event)" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);">
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <label>Senha <span style="color: red;">*</span></label>
                        <input type="password" name="senha" id="senha" class="form-control form-control-sm" aria-label="" required>
                    </div>
                    <div class="col-md-6">
                        <label>Confirme sua senha <span style="color: red;">*</span></label>
                        <input type="password" name="confirmar" id="confirmar" class="form-control form-control-sm cpf-mask" required>
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <label>Data de Nascimento <span style="color: red;">*</span></label>
                        <input type="date" name="data_nascimento" id="data_nascimento" value="" class="form-control form-control-sm" aria-label="Data de Nascimento" required>
                    </div>
                    <div class="col-md-6">
                        <label>Gênero <span style="color: red;">*</span></label>
                        <select class="form-select form-select-sm" name="sexo" id="sexo" required>

                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>
                </div>


                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <label>CEP <span style="color: red;">*</span></label>
                        <input type="text" maxlength="9" name="cep" id="cep" class="form-control form-control-sm" onkeypress="$(this).mask('00.000-000')" required>
                    </div>
                    <div class="col-md-6">
                        <label>Endereço <span style="color: red;">*</span></label>
                        <input type="text" name="logradouro" id="rua" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-3">
                        <label>Nº <span style="color: red;">*</span></label>
                        <input type="text" name="numerp" id="numero" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-3">
                        <label>UF <span style="color: red;">*</span></label>
                        <input type="text" name="uf" id="uf" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-6">
                        <label>Cidade <span style="color: red;">*</span></label>
                        <input type="text" name="cidade" id="cidade" class="form-control form-control-sm " placeholder="Cidade" required>
                    </div>
                    <div class="col-md-6">
                        <label>Bairro <span style="color: red;">*</span></label>
                        <input type="text" name="bairro" id="bairro" class="form-control form-control-sm " placeholder="Bairro" required>
                    </div>

                    <div class="col-md-6">
                        <label>Complemento</label>
                        <input type="text" name="complemento" id="complemento" class="form-control form-control-sm ">
                    </div>
                    <div class="col-md-6">
                        <label>Telefone <span style="color: red;">*</span></label>
                        <input type="text" name="telefone" id="telefone" class="form-control form-control-sm phone-ddd-mask" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);"required>
                    </div>
                    <div class="col-md-6">
                        <label>E-mail<span style="color: red;">*</span></label>
                        <input type="email" name="email" id="email" class="form-control form-control-sm" aria-label="E-mail" required>
                    </div>

                    <div class="col-md-12">
                        <select class="form-select form-select-sm" name="servico" id="servico" onchange="change()">
                            <option selected>Tipo de Serviço</option>
                            <option value="Artífice (Eletricista, Pintor e Hidráulico)">Artífice (Eletricista, Pintor e Hidráulico)</option>
                            <option value="Babá">Babá</option>
                            <option value="Cabeleireiro">Cabeleireiro</option>
                            <option value="Cuidador(a) de Pessoas">Cuidador(a) de Pessoas</option>
                            <option value="Dedetização">Dedetização</option>
                            <option value="Diarista">Diarista</option>
                            <option value="Lavanderia">Lavanderia</option>
                            <option value="Manutenção de Ar Condicionado">Manutenção de Ar Condicionado</option>
                            <option value="Motoboy">Motoboy</option>
                            <option value="Manicure e Pedicure">Manicure e Pedicure</option>
                        </select>
                    </div>
                    <div id="pergunta01">

                        <div class="row g-12 ms-3 p-2">
                            <samp style="color: red; font-size:20px; font-family: inherit;">Selecione uma ou mais opções:</samp>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Limpeza comercial" name="categoria[]" id="limpezaComercial" title="Limpeza padrão do dia-a-dia voltada para salas comerciais.">
                                <label style="font-size:18px;" class="form-check-label" for="limpezaComercial" title="Limpeza padrão do dia-a-dia voltada para salas comerciais.">
                                    Limpeza comercial
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Limpeza padrão" name="categoria[]" id="limpezaPadrao" title="Limpeza padrão do dia-a-dia, limpeza mais superficial, voltada para residências com áreas entre 53m² e 170m². Residências do tipo loft, 01, 02 ou 03 quartos, varanda, 01,02 ou 03 banheiros.">
                                <label style="font-size:18px;" class="form-check-label" for="limpezaPadrao" title="Limpeza padrão do dia-a-dia, limpeza mais superficial, voltada para residências com áreas entre 53m² e 170m². Residências do tipo loft, 01, 02 ou 03 quartos, varanda, 01,02 ou 03 banheiros.">
                                    Limpeza padrão
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Limpeza pesada" name="categoria[]" id="limpezaPesada" title="Limpeza mais pesada, inclui limpeza embaixo dos móveis, limpeza de móveis, lavagem de louças expostas, limpeza de eletrodomésticos">
                                <label style="font-size:18px;" class="form-check-label" for="limpezaPesada" title="Limpeza mais pesada, inclui limpeza embaixo dos móveis, limpeza de móveis, lavagem de louças expostas, limpeza de eletrodomésticos">
                                    Limpeza pesada
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Limpeza pós obra" name="categoria[]" id="limpezaPosobra" title="Limpeza realizada para limpeza pós pintura; Limpeza de resíduos de rejunte; retirada de entulhos pós demolição.">
                                <label style="font-size:18px;" class="form-check-label" for="limpezaPosobra" title="Limpeza realizada para limpeza pós pintura; Limpeza de resíduos de rejunte; retirada de entulhos pós demolição.">
                                    Limpeza pós obra
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Limpeza pré mudança" name="categoria[]" id="limpezaPremudanca" title="Limpeza geral pós instalação de móveis e decoração, deixando o ambiente limpo a mudança do cliente.">
                                <label style="font-size:18px;" class="form-check-label" for="limpezaPremudanca" title="Limpeza geral pós instalação de móveis e decoração, deixando o ambiente limpo a mudança do cliente.">
                                    Limpeza pré mudança
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Outros" name="categoria[]" id="outros" title="Especificações Extras">
                                <label style="font-size:18px;" class="form-check-label" for="outros" title="Outros."> Outros
                                </label>
                                <div id="div_outros">
                                    <div class="mb-3">
                                        <label for="outros" class="form-label"></label>
                                        <textarea name="categoria[]" class="form-control" id="outros" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="pergunta02">

                        <div class="row g-12 ms-3 p-2">
                            <samp style="color: red; font-size:20px;">Selecione uma ou mais opções:</samp>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Desintetização" name="categoria[]" id="desintetizacao" title="">
                                <label style="font-size:18px;" class="form-check-label" for="desintetizacao" title="Combate e controle das diferentes infestações de pragas urbanas, tais como: Baratas, formiga, aranhas, moscas, gorgulhos de cereais, pulgas, carrapatos, insetos alados, pernilongos, traças e caramujos.">
                                    Desintetização
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Controle de Pragas" name="categoria[]" id="controleRoedores" title="Combate e controle de ratos.">
                                <label style="font-size:18px;" class="form-check-label" for="controleRoedores" title="">
                                    Controle de Pragas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Sanitização" name="categoria[]" id="sanitizacao" title="Higienização e desinfecção de ambientes e superfícies para prevenção de proliferação de vírus.">
                                <label style="font-size:18px;" class="form-check-label" for="sanitizacao" title="">
                                    Sanitização
                                </label>
                            </div>

                        </div>
                    </div>

                    <div id="pergunta03">
                        <samp style="color: red; font-size:20px;">Selecione uma ou mais opções:</samp>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Instalação" name="categoria[]" id="Instalação" title="">
                            <label style="font-size:18px;" class="form-check-label" for="Instalação" title="Instalação de aparelhos splits e multisplits de diferentes BTU´s com infraestrutura pronta.">
                                Instalação
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Limpeza" name="categoria[]" id="Limpeza" title="">
                            <label style="font-size:18px;" class="form-check-label" for="Limpeza" title="Lavagem de evaporadora e condensadora de aparelhos splits e multisplits de diferentes BTU´s">
                                Limpeza
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Recarga de gás" name="categoria[]" id="Recarga de gás" title="">
                            <label style="font-size:18px;" class="form-check-label" for="Recarga de gás" title="Recarga de gás refrigerante em aparelhos splits e multisplits de diferentes BTU´s.">
                                Recarga de gás
                            </label>
                        </div>

                    </div>
                    <div id="pergunta04">
                        <div class="row g-12 ms-3 p-2">
                            <samp style="color: red; font-size:20px;">Selecione uma ou mais opções:</samp>
                            <br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Lavagem à água" name="categoria[]" id="lavagemAgua" title="Processo de limpeza dos tecidos através de ação mecânica, temperatura adequada e tempo preciso, em conjunto com o tratamento requerido.">
                                <label style="font-size:18px;" class="form-check-label" for="lavagemAgua" title="Processo de limpeza dos tecidos através de ação mecânica, temperatura adequada e tempo preciso, em conjunto com o tratamento requerido.">
                                    Lavagem à água
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Lavagem a seco" name="categoria[]" id="lavagemSeco" title="A limpeza a seco é um processo usado em peças que não podem ser lavadas a água, pois o tecido pode encolher, desbotar ou até mesmo perder a forma.">
                                <label style="font-size:18px;" class="form-check-label" for="lavagemSeco" title="A limpeza a seco é um processo usado em peças que não podem ser lavadas a água, pois o tecido pode encolher, desbotar ou até mesmo perder a forma. ">
                                    Lavagem a seco
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Impermeabilizar" name="categoria[]" id="impermeabilizar" title="Ao impermeabilizar tecidos, eles se tornam menos porosos, formando uma espécie de camada protetora invisível e impermeável, que cobre o tecido e previne a incrustação das manchas ou mesmo as moléculas de água.">
                                <label style="font-size:18px;" class="form-check-label" for="impermeabilizar" title="Ao impermeabilizar tecidos, eles se tornam menos porosos, formando uma espécie de camada protetora invisível e impermeável, que cobre o tecido e previne a incrustação das manchas ou mesmo as moléculas de água.">
                                    Impermeabilizar
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Revitalizar" name="categoria[]" id="revitalizar" title="revitalização das cores do tecido, fazendo com que elas permaneçam impecáveis em todas as circunstâncias e mantenham a flexibilidade.">
                                <label style="font-size:18px;" class="form-check-label" for="revitalizar" title="revitalização das cores do tecido, fazendo com que elas permaneçam impecáveis em todas as circunstâncias e mantenham a flexibilidade.">
                                    Revitalizar
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Alvejar" id="alvejar" name="categoria[]" title="alvejamos suas peças brancas ou coloridas, sem adição de cloro e de forma altamente eficiente na remoção de manchas, revitalizando a cor branca e recuperando as peças.">
                                <label style="font-size:18px;" class="form-check-label" for="alvejar" title="alvejamos suas peças brancas ou coloridas, sem adição de cloro e de forma altamente eficiente na remoção de manchas, revitalizando a cor branca e recuperando as peças.">
                                    Alvejar
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Bolsas" name="categoria[]" id="bolsas" title="bolsas.">
                                <label style="font-size:18px;" class="form-check-label" for="bolsas" title="bolsas.">
                                    Bolsas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Sapatos" name="categoria[]" id="sapados" title="sapatos">
                                <label style="font-size:18px;" class="form-check-label" for="sapados" title="sapatos.">
                                    Sapatos
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Outros" name="categoria[]" id="outros3" title="Especificações Extras">
                                <label style="font-size:18px;" class="form-check-label" for="outros" title="Outros."> Outros
                                </label>
                                <div id="lista3">

                                    <div class="mb-3">
                                        <label class="form-label"></label>
                                        <textarea name="categoria[]" class="form-control" id="outros2" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="pergunta05">

                        <div class="row g-12 ms-3 p-2">
                            <samp style="color: red; font-size:20px;">Selecione uma ou mais opções:</samp>
                            <br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Enviar um documento" name="categoria[]" id="documento" title="Envio ou captação de documentos em diferentes locais da cidade com data e hora agendados.">
                                <label style="font-size:18px;" class="form-check-label" for="documento" title="Envio ou captação de documentos em diferentes locais da cidade com data e hora agendados.">
                                    Enviar um documento
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Enviar um pacote" name="categoria[]" id="servico" title="Envio e captação de pacotes em diferentes locais da cidade com data e hora agendados.">
                                <label style="font-size:18px;" class="form-check-label" for="servico" title="Envio e captação de pacotes em diferentes locais da cidade com data e hora agendados.">
                                    Enviar um pacote
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Serviço de urgência" name="categoria[]" id="urgencia" title="Serviços realizados imediatamente após o contato com o motoboy">
                                <label style="font-size:18px;" class="form-check-label" for="urgencia" title="Serviços realizados imediatamente após o contato com o motoboy">
                                    Serviço de urgência
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Outros" name="categoria[]" id="outros4" title="Especificações Extras">
                                <label style="font-size:18px;" class="form-check-label" for="outros" title="Outros."> Outros
                                </label>
                                <div id="lista4">

                                    <div class="mb-3">
                                        <label class="form-label"></label>
                                        <textarea name="categoria[]" class="form-control" id="outros4" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="pergunta06">
                        <div class="row g-12 ms-3 p-2">
                            <samp style="color: red; font-size:20px;">Selecione uma ou mais opções:</samp>
                            <br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="hidraulica" name="categoria[]" id="hidraulica" title="Serviços de instalação e limpeza de torneiras, chuveiros, duchas, bebedouros; desentupimento de ralos e sifões; reparos em vazamentos.">
                                <label style="font-size:18px;" class="form-check-label" for="hidraulica" title="Serviços de instalação e limpeza de torneiras, chuveiros, duchas, bebedouros; desentupimento de ralos e sifões; reparos em vazamentos.">
                                    Hidráulica
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="eletrica" name="categoria[]" id="eletrica" title="Instalação de luminárias; substituição de interruptores; instalação de interruptor paralelo.">
                                <label style="font-size:18px;" class="form-check-label" for="eletrica" title="Instalação de luminárias; substituição de interruptores; instalação de interruptor paralelo.">
                                    Elétrica
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="gesso" name="categoria[]" id="gesso" title="Instalação de cortineiro; Rebaixo para iluminação indireta; Sancas.">
                                <label style="font-size:18px;" class="form-check-label" for="gesso" title="Instalação de cortineiro; Rebaixo para iluminação indireta; Sancas.">
                                    Gesso
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="pintura" name="categoria[]" id="pintura" title="Emassamento; Pintura; Aplicação de textura">
                                <label style="font-size:18px;" class="form-check-label" for="pintura" title="Emassamento; Pintura; Aplicação de textura">
                                    Pintura
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="pedreiro" name="categoria[]" id="pedreiro" title="">
                                <label style="font-size:18px;" class="form-check-label" for="pedreiro" title="">
                                    Pedreiro
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="pergunta07">
                        <div class="row g-12 ms-3 p-2">
                            <samp style="color: red; font-size:20px;">Selecione uma ou mais opções:</samp>
                            <br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1 criança" name="categoria[]" id="1criança" title="">
                                <label class="form-check-label" for="1criança" title="">
                                    1 criança
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="2 crianças" name="categoria[]" id="2criança" title="">
                                <label class="form-check-label" for="2criança" title="">
                                    2 crianças
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="3 crianças " name="categoria[]" id="3criança" title="">
                                <label class="form-check-label" for="3criança" title="">
                                    3 crianças
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="4 crianças" name="categoria[]" id="4criança" title="">
                                <label class="form-check-label" for="4criança" title="">
                                    4 crianças
                                </label>
                            </div>

                        </div>
                    </div>

                    <div id="pergunta08">
                        <div class="row g-12 ms-3 p-2">
                            <samp style="color: red; font-size:20px;">Selecione uma ou mais opções:</samp>
                            <br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Alongamento de unhas" name="categoria[]" id="Alongamentodeunhas" title="">
                                <label class="form-check-label" for="Alongamentodeunhas" title="">
                                    Alongamento de unhas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Manicure" name="categoria[]" id="Manicure" title="">
                                <label class="form-check-label" for="Manicure" title="">
                                    Manicure
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Manutenção de alongamento" name="categoria[]" id="Manutençãodealongamento" title="">
                                <label class="form-check-label" for="Manutençãodealongamento" title="">
                                    Manutenção de alongamento
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Pedicure" name="categoria[]" id="Pedicure" title="">
                                <label class="form-check-label" for="Pedicure" title="">
                                    Pedicure
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Spa dos pés" name="categoria[]" id="Spadospés" title="">
                                <label class="form-check-label" for="Spadospés" title="">
                                    Spa dos pés
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Remoção de calosidade" name="categoria[]" id="Remoçãodecalosidade" title="">
                                <label class="form-check-label" for="Remoçãodecalosidade" title="">
                                    Remoção de calosidade
                                </label>
                            </div>

                        </div>
                    </div>

                    <div id="pergunta09">
                        <div class="row g-12 ms-3 p-2">
                            <samp style="color: red; font-size:20px;">Selecione uma ou mais opções:</samp>
                            <br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Cauterização" name="categoria[]" id="Cauterização" title="">
                                <label class="form-check-label" for="Cauterização" title="">
                                    Cauterização
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Coloração" name="categoria[]" id="Coloração" title="">
                                <label class="form-check-label" for="Coloração" title="">
                                    Coloração
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Corte" name="categoria[]" id="Corte" title="">
                                <label class="form-check-label" for="Corte" title="">
                                    Corte
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Escova Progressiva ou Definitiva" name="categoria[]" id="EscovaProgressivaouDefinitiva" title="">
                                <label class="form-check-label" for="EscovaProgressivaouDefinitiva" title="">
                                    Escova Progressiva ou Definitiva
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Escova, babyliss ou chapinha" name="categoria[]" id="Escovababylissouchapinha" title="">
                                <label class="form-check-label" for="Escovababylissouchapinha" title="">
                                    Escova, babyliss ou chapinha
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Hidratação, Nutrição ou Reconstrução" name="categoria[]" id="HidrataçãoNutriçãoouReconstrução" title="">
                                <label class="form-check-label" for="HidrataçãoNutriçãoouReconstrução" title="">
                                    Hidratação, Nutrição ou Reconstrução
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Luzes ou Mechas" name="categoria[]" id="LuzesouMechas" title="">
                                <label class="form-check-label" for="LuzesouMechas" title="">
                                    Luzes ou Mechas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Penteado" name="categoria[]" id="Penteado" title="">
                                <label class="form-check-label" for="Penteado" title="">
                                    Penteado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Outros" name="categoria[]" id="Outros1" title="">
                                <label class="form-check-label" for="Outros1" title="">
                                    Outros
                                </label>
                                <div id="lista1">

                                    <div class="mb-3">
                                        <label for="outros" class="form-label"></label>
                                        <textarea name="categoria[]" class="form-control" id="" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="pergunta10">
                        <div class="row g-12 ms-3 p-2">
                            <samp style="color: red; font-size:20px;">Selecione uma ou mais opções:</samp>
                            <br><br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Acompanhamento em saídas (supermercado, Shopping, etc)" name="categoria[]" id="saídas" title="">
                                <label class="form-check-label" for="saídas" title="">
                                    Acompanhamento em saídas (supermercado, Shopping, etc)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Acompanhamento terapêutico (consultas, pós operatório, etc)" name="categoria[]" id="terapêutico" title="">
                                <label class="form-check-label" for="terapêutico" title="">
                                    Acompanhamento terapêutico (consultas, pós operatório, etc)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Administração de medicamentos" name="categoria[]" id="medicamentos" title="">
                                <label class="form-check-label" for="medicamentos" title="">
                                    Administração de medicamentos
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Administração de refeições" name="categoria[]" id="refeições" title="">
                                <label class="form-check-label" for="refeições" title="">
                                    Administração de refeições
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Banho" name="categoria[]" id="Banho" title="">
                                <label class="form-check-label" for="Banho" title="">
                                    Banho
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Companhia" name="categoria[]" id="Companhia" title="">
                                <label class="form-check-label" for="Companhia" title="">
                                    Companhia
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Transporte" name="categoria[]" id="Transporte" title="">
                                <label class="form-check-label" for="Transporte" title="">
                                    Transporte
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Outros" name="categoria[]" id="Outros2" title="">
                                <label class="form-check-label" for="Outros2" title="">
                                    Outros
                                </label>
                                <div id="lista2">

                                    <div class="mb-3">
                                        <label for="outros" class="form-label"></label>
                                        <textarea name="categoria[]" class="form-control" id="" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <label class="form-check-label" for="">
                            Eu li e concordo com os <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">termos</a> de uso
                        </label>
                        <input class="form-check-input" name="termo" type="checkbox" id="flexCheckDefault" required>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Termo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="d-grid gap-2 col-3 mx-auto mt-5">
                            <button type="submit" name="salvarProfissional" class="btn btn-lg orangered">CADASTRAR</button>
                        </div>
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
        $('#pergunta07').hide();
        $('#pergunta08').hide();
        $('#pergunta09').hide();
        $('#pergunta10').hide();

        $('#lista1').hide();
        $('#lista2').hide();
    });

    $('#Outros1').click(function() {

        if (document.getElementById('Outros1').checked) {

            $('#lista1').show();

        } else {
            $('#lista1').hide();

        }

    });

    $('#Outros2').click(function() {

        if (document.getElementById('Outros2').checked) {

            $('#lista2').show();

        } else {
            $('#lista2').hide();

        }

    });

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

        if (value === 'Artífice (Eletricista, Pintor e Hidráulico)') {
            $('#pergunta06').show();
        } else {
            $('#pergunta06').hide();
        }


        if (value === 'Babá') {
            $('#pergunta07').show();
        } else {
            $('#pergunta07').hide();
        }

        if (value === 'Manicure e Pedicure') {
            $('#pergunta08').show();
        } else {
            $('#pergunta08').hide();
        }

        if (value === 'Cabeleireiro') {
            $('#pergunta09').show();
        } else {
            $('#pergunta09').hide();
        }

        if (value === 'Cuidador(a) de Pessoas') {
            $('#pergunta10').show();
        } else {
            $('#pergunta10').hide();
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<?php
include_once "../../layout/footer.php";
?>