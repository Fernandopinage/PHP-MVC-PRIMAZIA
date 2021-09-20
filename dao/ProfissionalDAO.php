<?php

include_once "../../class/ClassProfissional.php";
include_once "../../dao/DAO.php";
require_once __DIR__ . "../../mail/profissional_redefinir.php";

class ProfissionalDAO extends DAO
{

    public function validarLogin($ProfissionalClass)
    {

        $sql = "SELECT * FROM `profissional` WHERE PROFISSIONAL_EMAIL = :PROFISSIONAL_EMAIL  and PROFISSIONAL_SENHA = :PROFISSIONAL_SENHA ";
        $select = $this->con->prepare($sql);
        $select->bindValue(':PROFISSIONAL_EMAIL', $ProfissionalClass->GetEmail());
        $select->bindValue(':PROFISSIONAL_SENHA', md5($ProfissionalClass->GetSenha()));
        $select->execute();

        $_SESSION['user'] = array();
        if ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            session_start();

            $_SESSION['user'] = array(

                'id' => $row['PROFISSIONAL_ID'],
                'nome' => $row['PROFISSIONAL_NOME'],
                'email' => $row['PROFISSIONAL_EMAIL'],
                'cpf' => $row['PROFISSIONAL_CPF'],
                'telefone' => $row['PROFISSIONAL_TELEFONE'],
                'cep' => $row['PROFISSIONAL_CEP'],
                'uf' => $row['PROFISSIONAL_UF'],
                'rua' => $row['PROFISSIONAL_LOGRADOURO'],
                'numero' => $row['PROFISSIONAL_NUM'],
                'cidade' => $row['PROFISSIONAL_CIDADE'],
                'bairro' => $row['PROFISSIONAL_BAIRRO'],
                'complemento' => $row['PROFISSIONAL_COMPLEMENTO'],
                'foto' => $row['PROFISSIONAL_FOTO']
            );

            header('location: ../../view/profissional/painel.php');
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

    public function insertProfissional($ClassProfissional)
    {

        $sql = "INSERT INTO `profissional`(`profissional_id`, `profissional_nome`, `profissional_option`, `profissional_razao`, `profissional_email`, `profissional_cpf`, `profissional_telefone`, `profissional_cep`, `profissional_uf`, `profissional_logradouro`, `profissional_num`, `profissional_cidade`, `profissional_bairro`, `profissional_complemento`, `profissional_foto`, `profissional_senha`, `profissional_servico`) 
        VALUES (null, :profissional_nome, :profissional_option, :profissional_razao, :profissional_email, :profissional_cpf, :profissional_telefone, :profissional_cep, :profissional_uf, :profissional_logradouro, :profissional_num, :profissional_cidade, :profissional_bairro, :profissional_complemento, :profissional_foto, :profissional_senha, :profissional_servico)";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(':profissional_nome', $ClassProfissional->GetNome());
        $insert->bindValue(':profissional_option', $ClassProfissional->GetOpcao());
        $insert->bindValue(':profissional_razao', $ClassProfissional->GetRazao());
        $insert->bindValue(':profissional_email', $ClassProfissional->GetEmail());
        $insert->bindValue(':profissional_cpf', $ClassProfissional->GetCpf());
        $insert->bindValue(':profissional_telefone', $ClassProfissional->GetTelefone());
        $insert->bindValue(':profissional_cep', $ClassProfissional->GetCep());
        $insert->bindValue(':profissional_logradouro', $ClassProfissional->GetLogradouro());
        $insert->bindValue(':profissional_num', $ClassProfissional->GetNumero());
        $insert->bindValue(':profissional_cidade', $ClassProfissional->GetCidade());
        $insert->bindValue(':profissional_bairro', $ClassProfissional->GetBairro());
        $insert->bindValue(':profissional_complemento', $ClassProfissional->GetComplemento());
        $insert->bindValue(':profissional_foto', $ClassProfissional->GetFoto());
        $insert->bindValue(':profissional_senha', md5($ClassProfissional->GetSenha()));
        $insert->bindValue(':profissional_servico', $ClassProfissional->GetServico());
        $insert->bindValue(':profissional_uf', $ClassProfissional->GetUf());
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
            header('location: ../../view/profissional/login.php');
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

    public static function logout($dados)
    {

        session_destroy();

        header('location: http://primazia.agenciaprogride.com.br/home-resumida-cdaivpysmvvotjwotzxbvm/');
    }


    public function redefinirSenha($ClassProfissional)
    {

        $verificar = "SELECT * FROM `profissional` WHERE profissional_email = :profissional_email";
        $select = $this->con->prepare($verificar);
        $select->bindValue(':profissional_email', $ClassProfissional->GetEmail());
        $select->execute();


        if ($row = $select->fetch(PDO::FETCH_ASSOC)) {

            $id = $row['profissional_id'];
            $nome = $row['profissional_nome'];



            $email = $ClassProfissional->GetEmail();
            $senha = ProfissionalDAO::RandonSenha();

            $sql = "UPDATE `profissional` SET `profissional_senha`= :profissional_senha where `profissional_email` =:profissional_email";
            $update = $this->con->prepare($sql);
            $update->bindValue(':profissional_email', $ClassProfissional->GetEmail());
            $update->bindValue(':profissional_senha', md5($senha));
            try {

                $update->execute();

            ?>


                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Sua senh foi redefinidar',
                        text: 'Por favor verifique seu e-mail',
                        showConfirmButton: false,
                        timer: 3500
                    })
                </script>

<?php

                  Redefinir::Senha($email, $senha,$id,$nome);
            } catch (\Throwable $th) {
            }
        }
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
}



?>