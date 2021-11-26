<?php
session_start();
include_once "../../layout/heard.php";
include_once "../../dao/CategoriaDAO.php";
include_once "../../class/ClassCategoria.php";
include_once "../../dao/gerarProtocolo.php";


if (empty($_SESSION['user'])) {

    header('location: ../../view/cliente/login.php');
}


if (isset($_POST['diaristafinal'])) {

    if (!empty($_POST['categoria'])) {

        $ClassRequest = new Categoria();
        $ClassRequest->SetNome($_SESSION['user']['nome']);
        $ClassRequest->SetTelefone($_SESSION['user']['telefone']);
        $ClassRequest->SetEmail($_SESSION['user']['email']);
        $ClassRequest->SetCpf($_SESSION['user']['cpf']);
        $ClassRequest->SetCep($_SESSION['user']['cep']);
        $ClassRequest->SetCidade($_SESSION['user']['cidade']);
        $ClassRequest->SetLogradouro($_SESSION['user']['rua']);
        $ClassRequest->SetNumero($_SESSION['user']['numero']);
        $ClassRequest->SetUf($_SESSION['user']['uf']);
        $ClassRequest->SetBairro($_SESSION['user']['bairro']);
        $ClassRequest->SetComplemento($_SESSION['user']['complemento']);
        $ClassRequest->SetProtocolo(Protocolo::gerarProtocolo());

        $dados = array(

            'tpservico' => 'Diarista',
            'categoria' => @$_POST['categoria'],
            'descricao' => @$_POST['descricao'],
            'local' => @$_POST['local'],
            'dependente' => @$_POST['dependente'],
            'serviço' => @$_POST['serviço'],
            'termo' => @$_POST['tipocontratacao']
        );
        $ClassRequest->SetDescricao($dados);


        $Reparos = new CategoriaDAO();
        $Reparos->insertReparos($ClassRequest);
    }
}

?>
<link href="../../layout/css/cliente_diarista.css" rel="stylesheet">
<div class="container-fluid">
    <a id="retorne" href="../../view/cliente/pedido.php" class="btn" style="position: relative; top:50px;background-color:orangered"><img src="../../images/left-arrow.png" width="28px" alt=""></a>
    <div class="container" id="registro">
        <div class="text-center">
            <a href="https://gotoservice.com.br/"><img src="../../images/primazia.png" alt="" width="250" height="190"></a>
        </div>

        <div class="title text-center">
            <p>DIARISTA</p>

        </div>


        <form action="" method="post">

            <div id="form-row">


                <!--***************************************************************************** --->
                <div id="pergunta01">

                    <div class="row">
                        <label class="fs-3">Que tipo de serviço você precisa?</label>
                        <br><br>
                        <samp style="color: red; font-family: 'Montserrat';">Campo obrigatório</samp>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Limpeza comercial" name="categoria[]" id="limpezaComercial" title="Limpeza padrão do dia-a-dia voltada para salas comerciais.">
                            <label class="form-check-label" for="limpezaComercial" title="Limpeza padrão do dia-a-dia voltada para salas comerciais.">
                                Limpeza comercial
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Limpeza padrão" name="categoria[]" id="limpezaPadrao" title="Limpeza padrão do dia-a-dia, limpeza mais superficial, voltada para residências com áreas entre 53m² e 170m². Residências do tipo loft, 01, 02 ou 03 quartos, varanda, 01,02 ou 03 banheiros.">
                            <label class="form-check-label" for="limpezaPadrao" title="Limpeza padrão do dia-a-dia, limpeza mais superficial, voltada para residências com áreas entre 53m² e 170m². Residências do tipo loft, 01, 02 ou 03 quartos, varanda, 01,02 ou 03 banheiros.">
                                Limpeza padrão
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Limpeza pesada" name="categoria[]" id="limpezaPesada" title="Limpeza mais pesada, inclui limpeza embaixo dos móveis, limpeza de móveis, lavagem de louças expostas, limpeza de eletrodomésticos">
                            <label class="form-check-label" for="limpezaPesada" title="Limpeza mais pesada, inclui limpeza embaixo dos móveis, limpeza de móveis, lavagem de louças expostas, limpeza de eletrodomésticos">
                                Limpeza pesada
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Limpeza pós obra" name="categoria[]" id="limpezaPosobra" title="Limpeza realizada para limpeza pós pintura; Limpeza de resíduos de rejunte; retirada de entulhos pós demolição.">
                            <label class="form-check-label" for="limpezaPosobra" title="Limpeza realizada para limpeza pós pintura; Limpeza de resíduos de rejunte; retirada de entulhos pós demolição.">
                                Limpeza pós obra
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Limpeza pré mudança" name="categoria[]" id="limpezaPremudanca" title="Limpeza geral pós instalação de móveis e decoração, deixando o ambiente limpo a mudança do cliente.">
                            <label class="form-check-label" for="limpezaPremudanca" title="Limpeza geral pós instalação de móveis e decoração, deixando o ambiente limpo a mudança do cliente.">
                                Limpeza pré mudança
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Outros" name="categoria[]" id="outros" title="Especificações Extras">
                            <label class="form-check-label" for="outros" title="Outros."> Outros
                            </label>
                            <div id="div_outros">
                                <div class="mb-3">
                                    <label for="outros" class="form-label"></label>
                                    <textarea name="categoria[]" class="form-control" id="outros" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="avanca01" onclick="avançando01()" class="btn orangered btn-lg">AVANÇAR</button>
                        </div>
                    </div>
                </div>
                <!--***************************************************************************** --->

                <!--***************************************************************************** --->
                <div id="pergunta02">
                    <div class="row g-5">
                        <div class="col">
                            <label class="fs-3">Qual a área do imóvel?</label>
                            <select class="form-select" name="descricao[]" aria-label="Default select example">
                                <option selected>Selecione</option>
                                <option value="Qual a área do imóvel? 53,02m²">53,02m²</option>
                                <option value="Qual a área do imóvel? 56,70m²">56,70m²</option>
                                <option value="Qual a área do imóvel? 78,15m²">78,15m²</option>
                                <option value="Qual a área do imóvel? 89,24m²">89,24m²</option>
                                <option value="Qual a área do imóvel? 92,47m²">92,47m²</option>
                                <option value="Qual a área do imóvel? 92,74m²">92,74m²</option>
                                <option value="Qual a área do imóvel? 101,12m²">101,12m²</option>
                                <option value="Qual a área do imóvel? 106,04m²">106,04m²</option>
                                <option value="Qual a área do imóvel? 111,22m²">111,22m²</option>
                                <option value="Qual a área do imóvel? 113,40m²">113,40m²</option>
                                <option value="Qual a área do imóvel? 170,62m²">170,62m²</option>
                                <option value="Qual a área do imóvel? 175,27m²">175,27m²</option>
                            </select><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta02" onclick="voltando02()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="avanca02" onclick="avançando02()" class="btn orangered btn-lg">AVANÇAR</button>
                        </div>
                    </div>
                </div>
                <!--***************************************************************************** --->

                <!--***************************************************************************** --->
                <div id="pergunta03">
                    <div class="row g-6">
                        <div class="col">
                            <label class="fs-3">Qual o local do serviço?</label>
                            <select class="form-select" name="local[]" aria-label="Default select example">
                                <option selected>Selecione</option>
                                <option value="Qual o local do serviço? Apartamento/Casa">Apartamento/Casa</option>
                                <option value="Qual o local do serviço? Comercial">Comercial</option>
                                <option value="Qual o local do serviço? Lojas">Lojas</option>
                            </select><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta03" onclick="voltando03()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="avanca03" onclick="avançando03()" class="btn orangered btn-lg">AVANÇAR</button>
                        </div>
                    </div>
                </div>
                <!--***************************************************************************** --->

                <!--***************************************************************************** --->
                <div id="pergunta04">
                    <div class="row g-12 ms-2 p-2">
                        <label class="fs-3">Há criança ou animal de estimação no local?</label>
                        <select class="form-select" name="dependente[]" aria-label="Default select example">
                            <option selected>Selecione</option>
                            <option value="Crianças<">Crianças</option>
                            <option value="Animais de estimação">Animais de estimação</option>
                            <option value="Há crianças e animais de estimação">Há crianças e animais de estimação</option>
                            <option value="Não Existe">Não Existe</option>

                        </select>

                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta01" onclick="voltando04()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="avanca01" onclick="avançando04()" class="btn orangered btn-lg">AVANÇAR</button>
                        </div>
                    </div>
                </div>
                <!--***************************************************************************** --->

                <!--***************************************************************************** --->
                <div id="pergunta05">
                    <div class="row g-12 ms-2 p-2">
                        <label class="fs-3">Precisa de serviços adicionais?</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Precisa de serviços adicionais? Limpeza interna de armários" name="serviço[]" id="limpezaArmarios" title="Limpeza interna de armários.">
                            <label class="form-check-label" for="limpezaArmarios" title="Limpeza interna de armários">
                                Limpeza interna de armários
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Precisa de serviços adicionais? Cozinhar" name="serviço[]" id="cozinhar" title="Cozinhar">
                            <label class="form-check-label" for="cozinhar" title="Cozinhar">
                                Cozinhar
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Precisa de serviços adicionais? Limpeza de geladeira" name="serviço[]" id="limpezaGeladeira" title="Limpeza de geladeira.">
                            <label class="form-check-label" for="limpezaGeladeira" title="Limpeza de geladeira.">
                                Limpeza de geladeira
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Precisa de serviços adicionais? Lavar roupa" name="serviço[]" id="lavarRoupa" title="Lavar roupa.">
                            <label class="form-check-label" for="lavarRoupa" title="Lavar roupa.">
                                Lavar roupa
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Precisa de serviços adicionais? Passar roupa" name="serviço[]" id="passarRoupa" title="Passar roupa.">
                            <label class="form-check-label" for="passarRoupa" title="Passar roupa.">
                                Passar roupa
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Precisa de serviços adicionais? Não preciso" name="serviço[]" id="naoPreciso" title="Não preciso.">
                            <label class="form-check-label" for="naoPreciso" title="Não preciso.">
                                Não preciso
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Precisa de serviços adicionais? Outros" name="serviço[]" id="divOutros" title="Outros.">
                            <label class="form-check-label" for="divOutros" title="Outros.">
                                Outros
                            </label>
                        </div>
                        <div id="outros_div">
                            <div class="mb-3">
                                <label for="outros" class="form-label"></label>
                                <textarea name="serviço[]" class="form-control" id="divoutros" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="volta01" onclick="voltando05()" class="btn azulprima btn-lg">VOLTAR</button>
                        </div>
                        <div class="col text-center">
                            <button id='botaoEnviar' type="button" id="avanca01" onclick="avançando06()" class="btn orangered btn-lg">AVANÇAR</button>
                        </div>
                    </div>
                </div>
                <div id="pergunta06">
                    <div class="row">
                        <label class="fs-3">Tipo da Contratação</label>
                        <br><br>
                        <samp style="color: red;font-family: 'Montserrat';">Campo obrigatório</samp>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipocontratacao" id="avulso" value="avulso" onclick="Mensal('avulso')">
                            <label class="form-check-label" for="avulso">
                                Serviço Avulso
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipocontratacao" data-bs-toggle="modal" data-bs-target="#exampleModal" id="mensal" value="mensal" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <label class="form-check-label" for="mensal">
                                Serviço Mensal
                            </label>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">TERMO</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-signin">


                                            <style>
                                                .texto {
                                                    max-height: 500px;
                                                    overflow-y: auto;
                                                    justify-content: center;
                                                }
                                            </style>

                                            <div class="texto">
                                                <p style="text-align: center;margin-top:10px"><b style="font-size: 20px">MINUTA DE CONTRATO DE PRESTAÇÃO DE SERVIÇOS DE PAY-PER-USE</b></p>
                                                <p style="text-align: center"><b style="font-size: 18px">PAGUE PELO USO – LIMPEZA E CONSERVAÇÃO</b></p>
                                                <p><b>DAS PARTES</b></p>

                                                <p><b>1. CONTRATANTE:</b></p>
                                                <p><b>2. CONTRATADA:</b></p>
                                                <br>

                                                <p><b>DO OBJETO DO CONTRATO</b></p>

                                                <p style="margin-left: 30px"><b>3</b>. O objeto do presente instrumento é a prestação de serviço de Pay-per-use (pague
                                                    pelo uso), compreendendo limpeza e conservação, que deverá acontecer de acordo
                                                    com o solicitado.</p>


                                                <p style="margin-left: 30px"><b>4</b>. O local desta prestação de serviços será no espaço especificado pelo CONTRATANTE</p>

                                                <p style="margin-left: 30px"><b>5</b>. A CONTRATADA designará um colaborador para realizar o serviço nos moldes
                                                    contratados, devidamente uniformizado e identificado com crachá.</p>



                                                <p style="margin-left: 30px"><b>6</b>. Estão contemplados no Objeto deste instrumento os serviços de acordo com o
                                                    solicitado..</p>

                                                <p><b>ÁREAS E SERVIÇOS EXCLUSOS</b></p>

                                                <p style="margin-left: 30px"><b>7</b>. Não estão contemplados no Objeto deste contrato a realização dos seguintes
                                                    serviços ou fornecimento dos seguintes materiais/insumos:</p>

                                                <p><b style="margin-left: 25px; padding-right:20px"> a. </b>Limpeza de fachada;</p>
                                                <p><b style="margin-left: 25px; padding-right:20px"> b. </b>Lavagem de carpetes, cadeiras, poltronas, tapetes, cortinas e persianas;</p>
                                                <p><b style="margin-left: 25px; padding-right:20px"> c. </b>Tratamento de piso;</p>
                                                <p><b style="margin-left: 25px; padding-right:20px"> d. </b>Fornecimento de insumos de copa;</p>
                                                <p><b style="margin-left: 25px; padding-right:20px"> e. </b>Fornecimento de descartáveis (papel toalha, papel higiênico, álcool gel,
                                                    sacos de lixo);</p>
                                                <p><b style="margin-left: 25px; padding-right:20px"> f. </b>Fornecimento de desodorizadores e pedras sanitárias;</p>
                                                <p><b style="margin-left: 25px; padding-right:20px"> g. </b>Fornecimento de insumos de jardinagem</p>
                                                <p><b style="margin-left: 25px; padding-right:20px"> h. </b>Serviços de jardinagem;</p>
                                                <p><b style="margin-left: 25px; padding-right:20px"> i. </b>Fornecimento de descartáveis e higiênicos; </p>
                                                <p><b style="margin-left: 25px; padding-right:20px"> j. </b>Gerenciamento de resíduos;</p>
                                                <p><b style="margin-left: 25px; padding-right:20px"> k. </b>. Limpeza de luminárias energizadas;</p>

                                                <p><b style="margin-left: 25px; padding-right:20px"> l. </b>Limpeza de equipamentos eletrônicos (computadores, notebooks e similares)
                                                    e Equipamentos médico hospitalares</p>
                                                <p><b style="margin-left: 25px; padding-right:20px"> m. </b>Limpeza interna de geladeiras e frigobar;</p>
                                                <p><b style="margin-left: 25px; padding-right:20px"> n. </b> Serviços de copa.</p>

                                                <p><b>DO PREÇO</b></p>
                                                <p style="margin-left: 30px"><b>8</b>. O CONTRATANTE pagará mensalmente em moeda corrente pelos serviços ora
                                                    contratados conforme será informado na proposta de prestação de serviço.
                                                </p>


                                                <p><b>FORMA DE REAJUSTE</b></p>
                                                <p style="margin-left: 30px"><b>9</b>. O preço mensal será reajustado, automaticamente, sempre que ocorrer alteração
                                                    do piso da categoria, criação e/ou majoração dos benefícios ou qualquer outra
                                                    condição prevista na proposta comercial, mas não limitado a vale refeição,
                                                    alimentação, transporte, cesta básica, convênio médico e outros, decorrente de Lei,
                                                    Dissídio, Convenção Coletiva, Acordo Coletivo, Resoluções, Súmulas, Orientação
                                                    Jurisprudencial do Tribunal Regional do Trabalho e/ou Tribunal Superior do Trabalho
                                                    e/ou qualquer outra norma com força legal, no mesmo percentual/valor de sua
                                                    majoração, visando a manutenção do equilíbrio financeiro do contrato.
                                                </p>

                                                <p><b>CONDIÇÕES DE PAGAMENTO</b></p>
                                                <p style="margin-left: 30px"><b>10</b>. Até o dia 30 de cada mês a CONTRATADA receberá o valor correspondente à
                                                    execução dos serviços contratados, através do cartão de crédito, débito ou PIX e
                                                    apresentará o comprovante da operação à CONTRATADA
                                                </p>
                                                <p style="margin-left: 30px"><b>11</b>. Havendo atraso nos pagamentos, por parte da CONTRATANTE, haverá
                                                    acréscimo sobre o saldo em aberto, sendo: 5% (cinco por cento) de multa contratual
                                                    no mês e 1% (um por cento) de juros de mora ao mês, além de correção monetária
                                                </p>
                                                <p style="margin-left: 30px"><b>12</b>. O não pagamento das faturas após 30 (trinta) dias de seus vencimentos, sujeita o
                                                    Contrato à rescisão, devendo a CONTRATANTE ressarcir os valores em aberto
                                                </p>

                                                <p><b>DO PRAZO</b></p>
                                                <p style="margin-left: 30px"><b>13</b>. Este contrato tem prazo indeterminado de vigência a partir da data de sua
                                                    assinatura, podendo ser rescindo a qualquer tempo, desde que haja comunicação
                                                    entre as partes com 07 (sete) dias de antecedência.

                                                </p>

                                                <p><b>OBRIGAÇÕES DA CONTRATADA</b></p>
                                                <p style="margin-left: 30px"><b>14</b>. Nos casos de faltas eventuais de colaboradores e na impossibilidade de sua
                                                    substituição imediata, as atividades serão reprogramadas pela CONTRATADA de
                                                    modo que as prioridades sejam atendidas, conforme as necessidades do cliente.
                                                    Entenda-se por faltas eventuais, todo evento de ausência do colaborador, fora do
                                                    controle ou previsão da CONTRATADA
                                                </p>

                                                <p style="margin-left: 30px"><b>15</b>. A CONTRATADA responderá por todos os ônus decorrentes da Legislação do
                                                    Trabalho, Previdência Social e Acidente, de acordo com as Leis vigentes, no que se
                                                    refere a todo pessoal que empregar na execução dos serviços ora contratados, não
                                                    havendo qualquer relação entre este pessoal e a CONTRATANTE, nem ônus desta
                                                    para com eles.
                                                </p>

                                                <p><b>OBRIGAÇÕES DA CONTRATANTE</b></p>
                                                <p style="margin-left: 30px"><b>16</b>. A CONTRATANTE não poderá utilizar-se dos colaboradores da CONTRATADA
                                                    para qualquer atividade administrativa, técnica ou de outra espécie, que não aquelas
                                                    compreendidas no escopo dos serviços ora contratados. Em caso de solicitação de
                                                    serviço fora do escopo, horas extras solicitadas sem a autorização e ciência da
                                                    CONTRATADA ou situação semelhante, a CONTRATANTE ficará responsável única
                                                    e exclusivamente por atos danosos praticados, devendo esta reparar diretamente o
                                                    prejuízo causado, bem como, responder por demandas judiciais cíveis ou trabalhistas
                                                    que surgirem em virtude da situação explanada.
                                                </p>

                                                <p><b>RESCISÃO</b></p>
                                                <p style="margin-left: 30px"><b>17</b>. O prazo deste contrato é por tempo indeterminado e poderá ser rescindido por
                                                    qualquer uma das partes, sem qualquer direito a indenização, em qualquer momento,
                                                    sem que haja qualquer tipo de motivo relevante, não obstante a outra parte deverá ser
                                                    avisada previamente por escrito, no prazo de 07 (sete) dias
                                                </p>

                                                <p><b>DISPOSIÇÕES FINAIS</b></p>
                                                <p style="margin-left: 30px"><b>18</b>. Se durante a vigência deste Contrato ocorrer a criação ou majoração dos tributos,
                                                    das alíquotas, dos benefícios ou encargos, benefícios e/ou extinção ou redução dos
                                                    mesmos, que comprovadamente venha a majorar ou diminuir o ônus das partes
                                                    contratantes, os preços serão revistos na primeira oportunidade, para adequá-lo às
                                                    modificações havidas, visando o equilíbrio financeiro e a função social do contrato,
                                                    mediante prévio aviso pela CONTRATADA.

                                                </p>

                                                <p style="margin-left: 30px"><b>19</b>. Quando houver aumento nas frequências de limpeza ou demais operações, em
                                                    razão de novas áreas ou mesmo alterações das superfícies a serem limpas, ou ainda
                                                    devido a mudanças de layout das áreas onde os serviços serão prestados, a
                                                    CONTRATADA poderá solicitar revisão do contrato para adequação dos custos
                                                    correspondentes.
                                                </p>

                                                <p style="margin-left: 30px"><b>20</b>. Fica eleito o Foro da Comarca de Manaus, Estado de Amazonas, recusando-se
                                                    qualquer outro, por mais privilegiado que seja, para todas e quaisquer questões
                                                    oriundas deste Contrato, correndo a cargo da parte vencida, custas e despesas
                                                    judiciais, inclusive os honorários advocatícios.
                                                </p>

                                                <p style="margin-left: 30px"><b>21</b>. E, por estarem assim ajustados e contratados, firmam o presente em 2 (duas) vias
                                                    de igual teor e forma, juntamente com 2 (duas) testemunhas, para o devido fim legal.
                                                </p>
                                                <div class="modal-body">
                                                    <div class="form-check" style="margin-top: 20px">
                                                        <input class="form-check-input" type="checkbox" name="termo" id="termo" onclick="Mensal('mensal')" required>
                                                        <label class="form-check-label" for="flexCheckChecked" style="color: #0d6efd">
                                                            Li e aceito os Termos da Política de Dados do Site<span><strong></strong></span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col text-center">
                                <button id='botaoEnviar' type="button" id="volta01" onclick="voltando06()" class="btn azulprima btn-lg">VOLTAR</button>
                            </div>

                            <div class="col text-center" id="divFinalizar">
                                <input id='botaoEnviar' name="diaristafinal" type="submit" value="FINALIZAR" class="btn orangered btn-lg">
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </form>


    </div>

    <div class="container" id="registro_logo">
        <img id='photo' src="../../images/diarista.gif" class="img">
    </div>


</div>

<script>
    $("#div_outros").hide();
    $("#outros_div").hide();
    $('#outros').click(function() {

        var outros = document.getElementById('outros');

        if (outros.checked) {

            $("#div_outros").show();

        } else {


            $("#div_outros").hide();

        }

    });

    $('#divOutros').click(function() {

        var outrosdiv = document.getElementById('divOutros');

        if (outrosdiv.checked) {

            $("#outros_div").show();

        } else {


            $("#outros_div").hide();

        }

    });
</script>

<script>
    $(document).ready(function() {

        document.getElementById('divFinalizar').style.display = 'none';
    });



    $('#termo').click(function() {

        if (document.getElementById('termo').checked) {

            document.getElementById('divFinalizar').style.display = 'block';
        } else {
            document.getElementById('divFinalizar').style.display = 'none';
        }
    });

    function Mensal($id) {


        if ($id === 'avulso') {
            document.getElementById('divFinalizar').style.display = 'block';
        }


    }
</script>

<script>
    document.getElementById('pergunta02').style.display = 'none';
    document.getElementById('pergunta03').style.display = 'none';
    document.getElementById('pergunta04').style.display = 'none';
    document.getElementById('pergunta05').style.display = 'none';
    document.getElementById('pergunta06').style.display = 'none';

    function voltando01() {
        document.getElementById('pergunta01').style.display = 'block';
        document.getElementById('pergunta02').style.display = 'none';
    }

    function avançando01() {

        var check01 = document.getElementById('limpezaComercial');
        var check02 = document.getElementById('limpezaPadrao');
        var check03 = document.getElementById('limpezaPesada');
        var check04 = document.getElementById('limpezaPosobra');
        var check05 = document.getElementById('limpezaPremudanca');
        var check06 = document.getElementById('outros');

        if (check01.checked || check02.checked || check03.checked || check04.checked || check05.checked || check06.checked) {

            document.getElementById('pergunta01').style.display = 'none';
            document.getElementById('pergunta02').style.display = 'block';
        } else {
            Swal.fire({
                position: 'top-center',
                icon: 'info',
                text: 'PREENCHA COM PELO MENOS UMA OPÇÃO',
                showConfirmButton: false,
                timer: 4500
            })
        }




    }

    function voltando02() {
        document.getElementById('pergunta01').style.display = 'block';
        document.getElementById('pergunta02').style.display = 'none';
    }

    function avançando02() {
        document.getElementById('pergunta02').style.display = 'none';
        document.getElementById('pergunta03').style.display = 'block';

    }

    function voltando03() {
        document.getElementById('pergunta02').style.display = 'block';
        document.getElementById('pergunta03').style.display = 'none';
    }

    function avançando03() {
        document.getElementById('pergunta03').style.display = 'none';
        document.getElementById('pergunta04').style.display = 'block';

    }

    function voltando04() {
        document.getElementById('pergunta03').style.display = 'block';
        document.getElementById('pergunta04').style.display = 'none';
    }

    function avançando04() {
        document.getElementById('pergunta04').style.display = 'none';
        document.getElementById('pergunta05').style.display = 'block';

    }

    function voltando05() {
        document.getElementById('pergunta04').style.display = 'block';
        document.getElementById('pergunta05').style.display = 'none';
    }

    function avançando05() {
        document.getElementById('pergunta04').style.display = 'none';
        document.getElementById('pergunta05').style.display = 'block';

    }

    function voltando06() {

        document.getElementById('pergunta06').style.display = 'none';
        document.getElementById('pergunta05').style.display = 'block';

    }

    function avançando06() {
        document.getElementById('pergunta05').style.display = 'none';
        document.getElementById('pergunta06').style.display = 'block';

    }
</script>


<script>
    $("#lista").hide();
    $('#outros').click(function() {

        var outros = document.getElementById('outros');

        if (outros.checked) {

            $("#lista").show();

        } else {


            $("#lista").hide();

        }

    });
</script>

<?php
include_once "../../layout/footer.php";
?>