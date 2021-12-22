<?php

include_once "../../class/ClassCliente.php";
include_once "../../dao/DAO.php";
include_once "../../mail/msg_cliente.php";
require_once __DIR__ . "../../mail/cliente_redefinir.php";

class ClienteDAO extends DAO
{

    public function validarLogin($ClienteClass)
    {

        $query = "SELECT * FROM `star` WHERE star_cli_email =:star_cli_email and 	star_status_cli = 'of'";
        $select = $this->con->prepare($query);
        $select->bindValue(':star_cli_email', $ClienteClass->GetEmail());
        $select->execute();

        // $star = array();
        if ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            
            session_start();
            $_SESSION['star']  = array(

                'cliente' => $row['star_cli_email'],
                'profissional' => $row['star_pro_email'],
                'cliente_status' => $row['star_status_cli'],
                'profissional_status' => $row['star_status_pro'],
                'cliente_note' => $row['star_nota_cli'],
                'profissional_note' => $row['star_nota_pro'],
                'protocolo' => $row['star_protocolo'],


            );

            $sql = "SELECT * FROM `cliente` WHERE CLIENTE_EMAIL = :CLIENTE_EMAIL  and CLIENTE_SENHA = :CLIENTE_SENHA ";
            $select = $this->con->prepare($sql);
            $select->bindValue(':CLIENTE_EMAIL', $ClienteClass->GetEmail());
            $select->bindValue(':CLIENTE_SENHA', md5($ClienteClass->GetSenha()));
            $select->execute();

            $_SESSION['user'] = array();
            if ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                session_start();

                $_SESSION['user'] = array(

                    'id' => $row['CLIENTE_ID'],
                    'nome' => $row['CLIENTE_NOME'],
                    'email' => $row['CLIENTE_EMAIL'],
                    'cpf' => $row['CLIENTE_CPF'],
                    'telefone' => $row['CLIENTE_TELEFONE'],
                    'cep' => $row['CLIENTE_CEP'],
                    'uf' => $row['CLIENTE_UF'],
                    'rua' => $row['CLIENTE_LOGRADOURO'],
                    'numero' => $row['CLIENTE_NUM'],
                    'cidade' => $row['CLIENTE_CIDADE'],
                    'bairro' => $row['CLIENTE_BAIRRO'],
                    'complemento' => $row['CLIENTE_COMPLEMENTO'],
                    'foto' => $row['CLIENTE_FOTO'],
                    'sexo' => $row['CLIENTE_SEXO'],
                    'termo' => $row['CLIENTE_TERMO'],
                    'nascimento' => $row['CLIENTE_NASCIMENTO']
                );
            }

            header('location: ../../view/cliente/avaliar.php');
        } else {

          

            $sql = "SELECT * FROM `cliente` WHERE CLIENTE_EMAIL = :CLIENTE_EMAIL  and CLIENTE_SENHA = :CLIENTE_SENHA ";
            $select = $this->con->prepare($sql);
            $select->bindValue(':CLIENTE_EMAIL', $ClienteClass->GetEmail());
            $select->bindValue(':CLIENTE_SENHA', md5($ClienteClass->GetSenha()));
            $select->execute();

            $_SESSION['user'] = array();
            if ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                session_start();

                $_SESSION['user'] = array(

                    'id' => $row['CLIENTE_ID'],
                    'nome' => $row['CLIENTE_NOME'],
                    'email' => $row['CLIENTE_EMAIL'],
                    'cpf' => $row['CLIENTE_CPF'],
                    'telefone' => $row['CLIENTE_TELEFONE'],
                    'cep' => $row['CLIENTE_CEP'],
                    'uf' => $row['CLIENTE_UF'],
                    'rua' => $row['CLIENTE_LOGRADOURO'],
                    'numero' => $row['CLIENTE_NUM'],
                    'cidade' => $row['CLIENTE_CIDADE'],
                    'bairro' => $row['CLIENTE_BAIRRO'],
                    'complemento' => $row['CLIENTE_COMPLEMENTO'],
                    'foto' => $row['CLIENTE_FOTO'],
                    'sexo' => $row['CLIENTE_SEXO'],
                    'termo' => $row['CLIENTE_TERMO'],
                    'nascimento' => $row['CLIENTE_NASCIMENTO']
                );

                header('location: ../../view/cliente/painel.php');
            } else {
?>

                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Dados inválidos',
                        showConfirmButton: false,
                        timer: 3500
                    })
                </script>


            <?php
            }
        }

    }


    public function listarCliente($ClassCLiente)
    {

        $sql = "SELECT * FROM `cliente` WHERE CLIENTE_ID = :CLIENTE_ID";
        $select = $this->con->prepare($sql);
        $select->bindValue(':CLIENTE_ID', $ClassCLiente->GetId());

        $select->execute();

        $array = array();
        if ($row = $select->fetch(PDO::FETCH_ASSOC)) {


            $array = array(

                'id' => $row['CLIENTE_ID'],
                'nome' => $row['CLIENTE_NOME'],
                'cpf' => $row['CLIENTE_CPF'],
                'email' => $row['CLIENTE_EMAIL'],
                'telefone' => $row['CLIENTE_TELEFONE'],
                'cep' => $row['CLIENTE_CEP'],
                'foto' => $row['CLIENTE_FOTO'],
                'uf' => $row['CLIENTE_UF'],
                'cidade' => $row['CLIENTE_CIDADE'],
                'rua' => $row['CLIENTE_LOGRADOURO'],
                'bairro' => $row['CLIENTE_BAIRRO'],
                'complemento' => $row['CLIENTE_COMPLEMENTO'],
                'numero' => $row['CLIENTE_NUM'],
                'opt' => $row['CLIENTE_OPCAO'],
                'razao' => $row['CLIENTE_RAZAO'],
                'sexo' => $row['CLIENTE_SEXO'],
                'termo' => $row['CLIENTE_TERMO'],
                'nascimento' => $row['CLIENTE_NASCIMENTO']
            );
        }
        return $array;
    }

    public function updateSenha($novaSenha, $id, $email, $senha)
    {


        $sql = "SELECT * FROM `cliente` WHERE CLIENTE_EMAIL=:CLIENTE_EMAIL and CLIENTE_ID =:CLIENTE_ID";
        $select = $this->con->prepare($sql);
        $select->bindValue(':CLIENTE_EMAIL', $email);
        $select->bindValue(':CLIENTE_ID', $id);
        $select->execute();

        if ($select->fetch(PDO::FETCH_ASSOC)) {
            $new =  md5($novaSenha);
            $sql2 = "UPDATE `cliente` SET CLIENTE_SENHA=:CLIENTE_SENHA where CLIENTE_ID=:CLIENTE_ID";
            $update = $this->con->prepare($sql2);
            $update->bindValue(':CLIENTE_ID', $id);
            $update->bindValue(':CLIENTE_SENHA', $new);
            $update->execute();

            ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Senha alterada com sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>


        <?php
            header('Refresh: 3.5; url=../cliente/login.php');
        } else {

        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Erro',
                    text: 'ao tentar alterar senha por favor entre em contato com os administradores',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>


        <?php

        }
    }

    public function deleteCliente($ClassCliente){

        $query = "DELETE FROM `cliente` WHERE `CLIENTE_ID` =:CLIENTE_ID";
        $delete = $this->con->prepare($query);
        $delete->bindValue(':CLIENTE_ID', $ClassCliente->GetId());
        try {
            $delete->execute();
            ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registro deletado com sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>



        <?php
         header('Refresh: 3.4; url=../admin/editar.php');
        } catch (\Throwable $th) {
    
            ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Erro ao deletar registro',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

        <?php
        }
    }

    public function updateCliente($ClassCliente)
    {

        if (!empty($ClassCliente->GetSenha())) {

            $sql = "UPDATE `cliente` SET `CLIENTE_NOME`=:CLIENTE_NOME,`CLIENTE_CPF`=:CLIENTE_CPF,`CLIENTE_EMAIL`=:CLIENTE_EMAIL,`CLIENTE_TELEFONE`=:CLIENTE_TELEFONE,`CLIENTE_CEP`=:CLIENTE_CEP,`CLIENTE_FOTO`=:CLIENTE_FOTO,`CLIENTE_SENHA`=:CLIENTE_SENHA,`CLIENTE_UF`=:CLIENTE_UF,`CLIENTE_CIDADE`=:CLIENTE_CIDADE,`CLIENTE_LOGRADOURO`=:CLIENTE_LOGRADOURO,`CLIENTE_BAIRRO`=:CLIENTE_BAIRRO,`CLIENTE_COMPLEMENTO`=:CLIENTE_COMPLEMENTO,`CLIENTE_OPCAO`=:CLIENTE_OPCAO,`CLIENTE_RAZAO`=:CLIENTE_RAZAO,`CLIENTE_NUM`=:CLIENTE_NUM, `CLIENTE_TERMO`=:CLIENTE_TERMO, `CLIENTE_SEXO`=:CLIENTE_SEXO,  `CLIENTE_NASCIMENTO`=:CLIENTE_NASCIMENTO ,  `CLIENTE_FOTO`=:CLIENTE_FOTO WHERE `CLIENTE_ID`=:CLIENTE_ID";
        } else {
            $sql = "UPDATE `cliente` SET `CLIENTE_NOME`=:CLIENTE_NOME,`CLIENTE_CPF`=:CLIENTE_CPF,`CLIENTE_EMAIL`=:CLIENTE_EMAIL,`CLIENTE_TELEFONE`=:CLIENTE_TELEFONE,`CLIENTE_CEP`=:CLIENTE_CEP,`CLIENTE_FOTO`=:CLIENTE_FOTO,`CLIENTE_UF`=:CLIENTE_UF,`CLIENTE_CIDADE`=:CLIENTE_CIDADE,`CLIENTE_LOGRADOURO`=:CLIENTE_LOGRADOURO,`CLIENTE_BAIRRO`=:CLIENTE_BAIRRO,`CLIENTE_COMPLEMENTO`=:CLIENTE_COMPLEMENTO,`CLIENTE_OPCAO`=:CLIENTE_OPCAO,`CLIENTE_RAZAO`=:CLIENTE_RAZAO,`CLIENTE_NUM`=:CLIENTE_NUM, `CLIENTE_TERMO`=:CLIENTE_TERMO, `CLIENTE_SEXO`=:CLIENTE_SEXO,  `CLIENTE_NASCIMENTO`=:CLIENTE_NASCIMENTO,  `CLIENTE_FOTO`=:CLIENTE_FOTO WHERE `CLIENTE_ID`=:CLIENTE_ID";
        }

        $update = $this->con->prepare($sql);
        $update->bindValue(':CLIENTE_ID', $ClassCliente->GetId());
        $update->bindValue(':CLIENTE_NOME', $ClassCliente->GetNome());
        $update->bindValue(':CLIENTE_CPF', $ClassCliente->GetCpf());
        $update->bindValue(':CLIENTE_EMAIL', $ClassCliente->GetEmail());
        $update->bindValue(':CLIENTE_TELEFONE', $ClassCliente->GetTelefone());
        $update->bindValue(':CLIENTE_CEP', $ClassCliente->GetCep());

        if (!empty($ClassCliente->GetSenha())) {

            $update->bindValue(':CLIENTE_SENHA', md5($ClassCliente->GetSenha()));
        }

        $update->bindValue(':CLIENTE_UF', $ClassCliente->GetUf());
        $update->bindValue(':CLIENTE_LOGRADOURO', $ClassCliente->GetLogradouro());
        $update->bindValue(':CLIENTE_CIDADE', $ClassCliente->GetCidade());
        $update->bindValue(':CLIENTE_OPCAO', $ClassCliente->GetOpcao());
        $update->bindValue(':CLIENTE_RAZAO', $ClassCliente->GetRazao());
        $update->bindValue(':CLIENTE_BAIRRO', $ClassCliente->GetBairro());
        $update->bindValue(':CLIENTE_COMPLEMENTO', $ClassCliente->GetComplemento());
        $update->bindValue(':CLIENTE_OPCAO', $ClassCliente->GetOpcao());
        $update->bindValue(':CLIENTE_RAZAO', $ClassCliente->GetRazao());
        $update->bindValue(':CLIENTE_NUM', $ClassCliente->GetNumero());
        $update->bindValue(':CLIENTE_TERMO', $ClassCliente->GetTermo());
        $update->bindValue(':CLIENTE_SEXO', $ClassCliente->GetSexo());
        $update->bindValue(':CLIENTE_NASCIMENTO', $ClassCliente->GetNascimento());
        $update->bindValue(':CLIENTE_FOTO', $ClassCliente->GetFoto());
        /*
        */
        try {
            $update->execute();
        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registro alterado com sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>


        <?php
        } catch (\Throwable $th) {

            echo $th;
        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Erro',
                    text: 'Por favor entre em contato com administração!',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>


            <?php
        }
    }

    public function redefinirSenha($ClassCliente)
    {

        $sql = "SELECT * FROM `cliente` WHERE `CLIENTE_EMAIL` = :CLIENTE_EMAIL";
        $select = $this->con->prepare($sql);
        $select->bindValue(':CLIENTE_EMAIL', $ClassCliente->GetEmail());
        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_ASSOC)) {

            $id =  $row['CLIENTE_ID'];
            $nome = $row['CLIENTE_NOME'];
            $email = $ClassCliente->GetEmail();
            $senha = ClienteDAO::RandonSenha();
            $senha = base64_encode($senha);


            $sql2 = "UPDATE `cliente` SET  CLIENTE_SENHA = :CLIENTE_SENHA where CLIENTE_ID = :CLIENTE_ID and CLIENTE_EMAIL = :CLIENTE_EMAIL";
            $update = $this->con->prepare($sql2);
            $update->bindValue(':CLIENTE_EMAIL', $ClassCliente->GetEmail());
            $update->bindValue(':CLIENTE_ID', $id);
            $update->bindValue(':CLIENTE_SENHA', $senha);

            try {
                $update->execute();


            ?>


                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Sua senha foi redefinidar',
                        text: 'Por favor verifique seu e-mail',
                        showConfirmButton: false,
                        timer: 3500
                    })
                </script>

            <?php

                RedefinirCliente::Senha($email, $senha, $id, $nome);
            } catch (\Throwable $th) {
            ?>


                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Erro',
                        text: 'Por favor entre em contato com administração!',
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
                    icon: 'error',
                    title: 'Por favor ',
                    text: 'Informe um e-mail válido',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

        <?php
        }
    }

    public function AdminInsertCliente($ClassCliente)
    {



        $sql = "INSERT INTO `cliente`(`CLIENTE_ID`, `CLIENTE_NOME`, `CLIENTE_CPF`, `CLIENTE_EMAIL`, `CLIENTE_TELEFONE`, `CLIENTE_CEP`, `CLIENTE_FOTO`, `CLIENTE_SENHA`, `CLIENTE_UF`, `CLIENTE_CIDADE`, `CLIENTE_LOGRADOURO`, `CLIENTE_BAIRRO`, `CLIENTE_COMPLEMENTO`, `CLIENTE_OPCAO`, `CLIENTE_RAZAO`, `CLIENTE_NUM`, `CLIENTE_TERMO`, `CLIENTE_SEXO`, `CLIENTE_NASCIMENTO`)
         VALUES (null, :CLIENTE_NOME, :CLIENTE_CPF, :CLIENTE_EMAIL, :CLIENTE_TELEFONE, :CLIENTE_CEP, :CLIENTE_FOTO, :CLIENTE_SENHA, :CLIENTE_UF, :CLIENTE_CIDADE, :CLIENTE_LOGRADOURO, :CLIENTE_BAIRRO, :CLIENTE_COMPLEMENTO, :CLIENTE_OPCAO, :CLIENTE_RAZAO, :CLIENTE_NUM, :CLIENTE_TERMO, :CLIENTE_SEXO, :CLIENTE_NASCIMENTO)";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(':CLIENTE_NOME', $ClassCliente->GetNome());
        $insert->bindValue(':CLIENTE_CPF', $ClassCliente->GetCpf());
        $insert->bindValue(':CLIENTE_EMAIL', $ClassCliente->GetEmail());
        $insert->bindValue(':CLIENTE_TELEFONE', $ClassCliente->GetTelefone());
        $insert->bindValue(':CLIENTE_CEP', $ClassCliente->GetCep());
        $insert->bindValue(':CLIENTE_FOTO', '');
        $insert->bindValue(':CLIENTE_SENHA', md5($ClassCliente->GetSenha()));
        $insert->bindValue(':CLIENTE_UF', $ClassCliente->GetUf());
        $insert->bindValue(':CLIENTE_CIDADE', $ClassCliente->GetCidade());
        $insert->bindValue(':CLIENTE_OPCAO', $ClassCliente->GetOpcao());
        $insert->bindValue(':CLIENTE_RAZAO', $ClassCliente->GetRazao());
        $insert->bindValue(':CLIENTE_CIDADE', $ClassCliente->GetCidade());
        $insert->bindValue(':CLIENTE_LOGRADOURO', $ClassCliente->GetLogradouro());
        $insert->bindValue(':CLIENTE_BAIRRO', $ClassCliente->GetBairro());
        $insert->bindValue(':CLIENTE_COMPLEMENTO', $ClassCliente->GetComplemento());
        $insert->bindValue(':CLIENTE_OPCAO', $ClassCliente->GetOpcao());
        $insert->bindValue(':CLIENTE_RAZAO', $ClassCliente->GetRazao());
        $insert->bindValue(':CLIENTE_NUM', $ClassCliente->GetNumero());
        $insert->bindValue(':CLIENTE_TERMO', $ClassCliente->GetTermo());
        $insert->bindValue(':CLIENTE_SEXO', $ClassCliente->GetSexo());
        $insert->bindValue(':CLIENTE_NASCIMENTO', $ClassCliente->GetNascimento());
        try {
            $insert->execute();
        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Cadastro Realizado com Sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>


        <?php

        } catch (PDOException $e) {

            //echo $e;
        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Registro Inválido',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

        <?php


        }
    }

    public function editarCliente($ClassCliente)
    {

        if (!empty($ClassCliente->GetSenha())) {



            $sql = "UPDATE `cliente` SET `CLIENTE_NOME`=:CLIENTE_NOME,`CLIENTE_CPF`=:CLIENTE_CPF,`CLIENTE_EMAIL`=:CLIENTE_EMAIL,`CLIENTE_TELEFONE`=:CLIENTE_TELEFONE,`CLIENTE_CEP`=:CLIENTE_CEP,`CLIENTE_FOTO`=:CLIENTE_FOTO,`CLIENTE_SENHA`=:CLIENTE_SENHA,`CLIENTE_UF`=:CLIENTE_UF,`CLIENTE_CIDADE`=:CLIENTE_CIDADE,`CLIENTE_LOGRADOURO`=:CLIENTE_LOGRADOURO,`CLIENTE_BAIRRO`=:CLIENTE_BAIRRO,`CLIENTE_COMPLEMENTO`=:CLIENTE_COMPLEMENTO,`CLIENTE_OPCAO`=:CLIENTE_OPCAO,`CLIENTE_RAZAO`=:CLIENTE_RAZAO,`CLIENTE_NUM`=:CLIENTE_NUM,`CLIENTE_TERMO`=:CLIENTE_TERMO,`CLIENTE_SEXO`=:CLIENTE_SEXO,`CLIENTE_NASCIMENTO`=:CLIENTE_NASCIMENTO  WHERE `CLIENTE_ID`=:CLIENTE_ID";
        } else {
            $sql = "UPDATE `cliente` SET `CLIENTE_NOME`=:CLIENTE_NOME,`CLIENTE_CPF`=:CLIENTE_CPF,`CLIENTE_EMAIL`=:CLIENTE_EMAIL,`CLIENTE_TELEFONE`=:CLIENTE_TELEFONE,`CLIENTE_CEP`=:CLIENTE_CEP,`CLIENTE_FOTO`=:CLIENTE_FOTO,`CLIENTE_UF`=:CLIENTE_UF,`CLIENTE_CIDADE`=:CLIENTE_CIDADE,`CLIENTE_LOGRADOURO`=:CLIENTE_LOGRADOURO,`CLIENTE_BAIRRO`=:CLIENTE_BAIRRO,`CLIENTE_COMPLEMENTO`=:CLIENTE_COMPLEMENTO,`CLIENTE_OPCAO`=:CLIENTE_OPCAO,`CLIENTE_RAZAO`=:CLIENTE_RAZAO,`CLIENTE_NUM`=:CLIENTE_NUM,`CLIENTE_TERMO`=:CLIENTE_TERMO,`CLIENTE_SEXO`=:CLIENTE_SEXO,`CLIENTE_NASCIMENTO`=:CLIENTE_NASCIMENTO WHERE `CLIENTE_ID`=:CLIENTE_ID";
        }

        if (empty($ClassCliente->GetFoto())) {
            $sql = "UPDATE `cliente` SET `CLIENTE_NOME`=:CLIENTE_NOME,`CLIENTE_CPF`=:CLIENTE_CPF,`CLIENTE_EMAIL`=:CLIENTE_EMAIL,`CLIENTE_TELEFONE`=:CLIENTE_TELEFONE,`CLIENTE_CEP`=:CLIENTE_CEP,`CLIENTE_SENHA`=:CLIENTE_SENHA,`CLIENTE_UF`=:CLIENTE_UF,`CLIENTE_CIDADE`=:CLIENTE_CIDADE,`CLIENTE_LOGRADOURO`=:CLIENTE_LOGRADOURO,`CLIENTE_BAIRRO`=:CLIENTE_BAIRRO,`CLIENTE_COMPLEMENTO`=:CLIENTE_COMPLEMENTO,`CLIENTE_OPCAO`=:CLIENTE_OPCAO,`CLIENTE_RAZAO`=:CLIENTE_RAZAO,`CLIENTE_NUM`=:CLIENTE_NUM,`CLIENTE_TERMO`=:CLIENTE_TERMO,`CLIENTE_SEXO`=:CLIENTE_SEXO,`CLIENTE_NASCIMENTO`=:CLIENTE_NASCIMENTO  WHERE `CLIENTE_ID`=:CLIENTE_ID";
        }

        if (empty($ClassCliente->GetFoto()) and empty($ClassCliente->GetSenha())) {

            $sql = "UPDATE `cliente` SET `CLIENTE_NOME`=:CLIENTE_NOME,`CLIENTE_CPF`=:CLIENTE_CPF,`CLIENTE_EMAIL`=:CLIENTE_EMAIL,`CLIENTE_TELEFONE`=:CLIENTE_TELEFONE,`CLIENTE_CEP`=:CLIENTE_CEP, `CLIENTE_UF`=:CLIENTE_UF,`CLIENTE_CIDADE`=:CLIENTE_CIDADE,`CLIENTE_LOGRADOURO`=:CLIENTE_LOGRADOURO,`CLIENTE_BAIRRO`=:CLIENTE_BAIRRO,`CLIENTE_COMPLEMENTO`=:CLIENTE_COMPLEMENTO,`CLIENTE_OPCAO`=:CLIENTE_OPCAO,`CLIENTE_RAZAO`=:CLIENTE_RAZAO,`CLIENTE_NUM`=:CLIENTE_NUM,`CLIENTE_TERMO`=:CLIENTE_TERMO,`CLIENTE_SEXO`=:CLIENTE_SEXO,`CLIENTE_NASCIMENTO`=:CLIENTE_NASCIMENTO  WHERE `CLIENTE_ID`=:CLIENTE_ID";
        }

        $update = $this->con->prepare($sql);
        $update->bindValue(':CLIENTE_ID', $ClassCliente->GetId());
        $update->bindValue(':CLIENTE_NOME', $ClassCliente->GetNome());
        $update->bindValue(':CLIENTE_CPF', $ClassCliente->GetCpf());
        $update->bindValue(':CLIENTE_EMAIL', $ClassCliente->GetEmail());
        $update->bindValue(':CLIENTE_TELEFONE', $ClassCliente->GetTelefone());
        $update->bindValue(':CLIENTE_CEP', $ClassCliente->GetCep());
        if (!empty($ClassCliente->GetFoto())) {

            $update->bindValue(':CLIENTE_FOTO', $ClassCliente->GetFoto());
        }
        if (!empty($ClassCliente->GetSenha())) {
            $update->bindValue(':CLIENTE_SENHA', md5($ClassCliente->GetSenha()));
        }
        $update->bindValue(':CLIENTE_UF', $ClassCliente->GetUf());
        $update->bindValue(':CLIENTE_CIDADE', $ClassCliente->GetCidade());
        $update->bindValue(':CLIENTE_LOGRADOURO', $ClassCliente->GetLogradouro());
        $update->bindValue(':CLIENTE_BAIRRO', $ClassCliente->GetBairro());
        $update->bindValue(':CLIENTE_COMPLEMENTO', $ClassCliente->GetComplemento());
        $update->bindValue(':CLIENTE_OPCAO', $ClassCliente->GetOpcao());
        $update->bindValue(':CLIENTE_RAZAO', $ClassCliente->GetRazao());
        $update->bindValue(':CLIENTE_NUM', $ClassCliente->GetNumero());
        $update->bindValue(':CLIENTE_TERMO', $ClassCliente->GetTermo());
        $update->bindValue(':CLIENTE_SEXO', $ClassCliente->GetSexo());
        $update->bindValue(':CLIENTE_NASCIMENTO', $ClassCliente->GetNascimento());

        try {

            $update->execute();
            $_SESSION['user'] = array(

                'id' => $ClassCliente->GetId(),
                'nome' => $ClassCliente->GetNome(),
                'email' => $ClassCliente->GetEmail(),
                'cpf' => $ClassCliente->GetCpf(),
                'telefone' => $ClassCliente->GetTelefone(),
                'cep' => $ClassCliente->GetCep(),
                'uf' => $ClassCliente->GetUf(),
                'rua' => $ClassCliente->GetLogradouro(),
                'numero' => $ClassCliente->GetNumero(),
                'cidade' => $ClassCliente->GetCidade(),
                'bairro' => $ClassCliente->GetBairro(),
                'complemento' => $ClassCliente->GetComplemento(),
                'foto' => $ClassCliente->GetFoto(),
                'sexo' => $ClassCliente->GetSexo(),
                'termo' => $ClassCliente->GetTermo(),
                'nascimento' => $ClassCliente->GetNascimento()
            );


            $MSG = new ClienteMSG();
            $MSG->__mensagem($ClassCliente);


        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Cadastro atualizado com Sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>


        <?php
                header('Refresh: 3.5; url=../cliente/painel.php');
            // header('location: ../../view/cliente/editar.php');


        } catch (PDOException $e) {
        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Registro Inválido',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>
        <?php
        }
    }

    public function insertCliente($ClassCliente)
    {


        $sql = "INSERT INTO `cliente`(`CLIENTE_ID`, `CLIENTE_NOME`, `CLIENTE_CPF`, `CLIENTE_EMAIL`, `CLIENTE_TELEFONE`, `CLIENTE_CEP`, `CLIENTE_FOTO`, `CLIENTE_SENHA`, `CLIENTE_UF`, `CLIENTE_CIDADE`, `CLIENTE_LOGRADOURO`, `CLIENTE_BAIRRO`, `CLIENTE_COMPLEMENTO`, `CLIENTE_OPCAO`, `CLIENTE_RAZAO`, `CLIENTE_NUM`, `CLIENTE_TERMO`, `CLIENTE_SEXO`, `CLIENTE_NASCIMENTO`) VALUES (null, :CLIENTE_NOME, :CLIENTE_CPF, :CLIENTE_EMAIL, :CLIENTE_TELEFONE, :CLIENTE_CEP, :CLIENTE_FOTO, :CLIENTE_SENHA, :CLIENTE_UF, :CLIENTE_CIDADE, :CLIENTE_LOGRADOURO, :CLIENTE_BAIRRO, :CLIENTE_COMPLEMENTO, :CLIENTE_OPCAO, :CLIENTE_RAZAO, :CLIENTE_NUM, :CLIENTE_TERMO, :CLIENTE_SEXO, :CLIENTE_NASCIMENTO)";

        $insert = $this->con->prepare($sql);
        $insert->bindValue(':CLIENTE_NOME', $ClassCliente->GetNome());
        $insert->bindValue(':CLIENTE_CPF', $ClassCliente->GetCpf());
        $insert->bindValue(':CLIENTE_EMAIL', $ClassCliente->GetEmail());
        $insert->bindValue(':CLIENTE_TELEFONE', $ClassCliente->GetTelefone());
        $insert->bindValue(':CLIENTE_CEP', $ClassCliente->GetCep());
        $insert->bindValue(':CLIENTE_FOTO', $ClassCliente->GetFoto());
        $insert->bindValue(':CLIENTE_SENHA', md5($ClassCliente->GetSenha()));
        $insert->bindValue(':CLIENTE_UF', $ClassCliente->GetUf());
        $insert->bindValue(':CLIENTE_CIDADE', $ClassCliente->GetCidade());
        $insert->bindValue(':CLIENTE_LOGRADOURO', $ClassCliente->GetLogradouro());
        $insert->bindValue(':CLIENTE_BAIRRO', $ClassCliente->GetBairro());
        $insert->bindValue(':CLIENTE_COMPLEMENTO', $ClassCliente->GetComplemento());
        $insert->bindValue(':CLIENTE_OPCAO', $ClassCliente->GetOpcao());
        $insert->bindValue(':CLIENTE_RAZAO', $ClassCliente->GetRazao());
        $insert->bindValue(':CLIENTE_NUM', $ClassCliente->GetNumero());
        $insert->bindValue(':CLIENTE_TERMO', $ClassCliente->GetTermo());
        $insert->bindValue(':CLIENTE_SEXO', $ClassCliente->GetSexo());
        $insert->bindValue(':CLIENTE_NASCIMENTO', $ClassCliente->GetNascimento());

        try {
            $insert->execute();
        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Cadastro Realizado com Sucesso',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>


        <?php
            header('Refresh: 3.5; url=../cliente/login.php');
            //header('location: ../../view/cliente/login.php');
        } catch (PDOException $e) {
            
           

            if($e->errorInfo[2] == "Duplicate entry '".$ClassCliente->GetEmail()."' for key 'CLIENTE_EMAIL'"){
                ?>

                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Registro Inválido',
                        text:'E-mail Duplicado por favor entre em contato com os administradores',
                        showConfirmButton: false,
                        timer: 3500
                    })
                </script>
    
            <?php
            } else{
               
        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Registro Inválido',
                    text:'CPF/CNPJ Duplicado por favor entre em contato com os administradores',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

        <?php
            } 
          


        }
    }

    public static function logout($dados)
    {

        session_destroy();

        header('location: https://gotoservice.com.br/');
    }

    public static function RandonSenha($length = 7)
    {

        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet);

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }

        return $token;
    }

    public function selectStar($email){

        $sql = "SELECT COUNT(star_nota_cli) as quantidade, sum(star_nota_cli) as soma FROM `star` WHERE star_cli_email =:star_cli_email and  star_nota_cli != 0 ";
        $select = $this->con->prepare($sql);
        $select->bindValue(':star_cli_email',$email);
        $select->execute();

        if($row = $select->fetch(PDO::FETCH_ASSOC)){

            $quantidade = $row['quantidade'];
            $soma = $row['soma'];

            if(!empty($quantidade) and !empty($soma)){

                $rest = (($soma/$quantidade)*100)*0.01;
            }else{
                $rest = 5.0;
            }
        }

        return $rest;
    }



}



?>