<?php

include_once "../../class/ClassCliente.php";
include_once "../../dao/DAO.php";

class ClienteDAO extends DAO
{

    public function validarLogin($ClienteClass)
    {

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
                'cep' => $row['CLIENTE_CEP']

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

    public function insertCliente($ClassCliente)
    {



        $sql = "INSERT INTO `cliente`(`CLIENTE_ID`, `CLIENTE_NOME`, `CLIENTE_CPF`, `CLIENTE_EMAIL`, `CLIENTE_TELEFONE`, `CLIENTE_CEP`, `CLIENTE_FOTO`, `CLIENTE_SENHA`) VALUES (null, :CLIENTE_NOME, :CLIENTE_CPF, :CLIENTE_EMAIL, :CLIENTE_TELEFONE, :CLIENTE_CEP, :CLIENTE_FOTO, :CLIENTE_SENHA)";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(':CLIENTE_NOME', $ClassCliente->GetNome());
        $insert->bindValue(':CLIENTE_CPF', $ClassCliente->GetCpf());
        $insert->bindValue(':CLIENTE_EMAIL', $ClassCliente->GetEmail());
        $insert->bindValue(':CLIENTE_TELEFONE', $ClassCliente->GetTelefone());
        $insert->bindValue(':CLIENTE_CEP', $ClassCliente->GetCep());
        $insert->bindValue(':CLIENTE_FOTO', '');
        $insert->bindValue(':CLIENTE_SENHA', md5($ClassCliente->GetSenha()));

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

        header('location: ../../view/cliente/login.php');
    }
}



?>