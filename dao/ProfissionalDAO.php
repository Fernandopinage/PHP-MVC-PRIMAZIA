<?php

include_once "../../class/ClassProfissional.php";
include_once "../../dao/DAO.php";

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



        $sql = "INSERT INTO `profissional`(`PROFISSIONAL_ID`, `PROFISSIONAL_NOME`, `PROFISSIONAL_CPF`, `PROFISSIONAL_EMAIL`, `PROFISSIONAL_TELEFONE`, `PROFISSIONAL_CEP`, `PROFISSIONAL_FOTO`, `PROFISSIONAL_SENHA`, `PROFISSIONAL_UF`, `PROFISSIONAL_CIDADE`, `PROFISSIONAL_LOGRADOURO`, `PROFISSIONAL_BAIRRO`, `PROFISSIONAL_COMPLEMENTO`, `PROFISSIONAL_OPCAO`, `PROFISSIONAL_RAZAO`, `PROFISSIONAL_NUM`)
         VALUES (null, :PROFISSIONAL_NOME, :PROFISSIONAL_CPF, :PROFISSIONAL_EMAIL, :PROFISSIONAL_TELEFONE, :PROFISSIONAL_CEP, :PROFISSIONAL_FOTO, :PROFISSIONAL_SENHA, :PROFISSIONAL_UF, :PROFISSIONAL_CIDADE, :PROFISSIONAL_LOGRADOURO, :PROFISSIONAL_BAIRRO, :PROFISSIONAL_COMPLEMENTO, :PROFISSIONAL_OPCAO, :PROFISSIONAL_RAZAO, :PROFISSIONAL_NUM)";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(':PROFISSIONAL_NOME', $ClassProfissional->GetNome());
        $insert->bindValue(':PROFISSIONAL_CPF', $ClassProfissional->GetCpf());
        $insert->bindValue(':PROFISSIONAL_EMAIL', $ClassProfissional->GetEmail());
        $insert->bindValue(':PROFISSIONAL_TELEFONE', $ClassProfissional->GetTelefone());
        $insert->bindValue(':PROFISSIONAL_CEP', $ClassProfissional->GetCep());
        $insert->bindValue(':PROFISSIONAL_FOTO', $ClassProfissional->GetFoto());
        $insert->bindValue(':PROFISSIONAL_SENHA', md5($ClassProfissional->GetSenha()));
        $insert->bindValue(':PROFISSIONAL_UF', $ClassProfissional->GetUf());
        $insert->bindValue(':PROFISSIONAL_CIDADE', $ClassProfissional->GetCidade());
        $insert->bindValue(':PROFISSIONAL_OPCAO', $ClassProfissional->GetOpcao());
        $insert->bindValue(':PROFISSIONAL_RAZAO', $ClassProfissional->GetRazao());
        $insert->bindValue(':PROFISSIONAL_CIDADE', $ClassProfissional->GetCidade());
        $insert->bindValue(':PROFISSIONAL_LOGRADOURO', $ClassProfissional->GetLogradouro());
        $insert->bindValue(':PROFISSIONAL_BAIRRO', $ClassProfissional->GetBairro());
        $insert->bindValue(':PROFISSIONAL_COMPLEMENTO', $ClassProfissional->GetComplemento());
        $insert->bindValue(':PROFISSIONAL_OPCAO', $ClassProfissional->GetOpcao());
        $insert->bindValue(':PROFISSIONAL_RAZAO', $ClassProfissional->GetRazao());
        $insert->bindValue(':PROFISSIONAL_NUM', $ClassProfissional->GetNumero());
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
}



?>