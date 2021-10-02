<?php

include_once "../../class/ClassProfissional.php";
include_once "../../dao/DAO.php";
include_once "../../dao/Subcategoria.php";
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

        $_SESSION['profissional'] = array();


        if ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            session_start();

            $_SESSION['profissional'] = array(

                'id' => $row['profissional_id'],
                'nome' => $row['profissional_nome'],
                'email' => $row['profissional_email'],
                'cpf' => $row['profissional_cpf'],
                'telefone' => $row['profissional_telefone'],
                'cep' => $row['profissional_cep'],
                'uf' => $row['profissional_uf'],
                'rua' => $row['profissional_logradouro'],
                'numero' => $row['profissional_num'],
                'cidade' => $row['profissional_cidade'],
                'bairro' => $row['profissional_bairro'],
                'complemento' => $row['profissional_complemento'],
                'foto' => $row['profissional_foto']
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


    public function updateSenha($novaSenha, $id, $email, $senha)
    {


        $sql = "SELECT * FROM `profissional` WHERE profissional_id = :profissional_id and profissional_email = :profissional_email and profissional_senha = :profissional_senha";
        $select = $this->con->prepare($sql);
        $select->bindValue(':profissional_id', $id);
        $select->bindValue(':profissional_email', $email);
        $select->bindValue(':profissional_id', $id);
        $select->bindValue(':profissional_senha', $senha);
        $select->execute();


        if ($select->fetch(PDO::FETCH_ASSOC)) {

            $new =  md5($novaSenha);


            $sql2 = "UPDATE `profissional` SET `profissional_senha`= :profissional_senha WHERE `profissional_id`= :profissional_id";
            $update = $this->con->prepare($sql2);
            $update->bindValue(':profissional_id', $id);
            $update->bindValue(':profissional_senha', $new);
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

            header('Refresh: 5.0; url=../profissional/login.php');
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

    public  function updateProfissionalModal($ClassProfissional){
       
        if(!empty($ClassProfissional->GetSenha())){
            $sql = "UPDATE `profissional` SET `profissional_nome`=:profissional_nome ,`profissional_option`=:profissional_option ,`profissional_razao`=:profissional_razao,`profissional_email`=:profissional_email,`profissional_cpf`=:profissional_cpf,`profissional_telefone`=:profissional_telefone,`profissional_cep`=:profissional_cep,`profissional_uf`=:profissional_uf,`profissional_logradouro`=:profissional_logradouro,`profissional_num`=:profissional_num,`profissional_cidade`=:profissional_cidade,`profissional_bairro`=:profissional_bairro,`profissional_complemento`=:profissional_complemento,`profissional_senha`=:profissional_senha,`profissional_servico`=:profissional_servico WHERE `profissional_servico`=:profissional_servico";
        }else{
            $sql = "UPDATE `profissional` SET `profissional_nome`=:profissional_nome ,`profissional_option`=:profissional_option ,`profissional_razao`=:profissional_razao,`profissional_email`=:profissional_email,`profissional_cpf`=:profissional_cpf,`profissional_telefone`=:profissional_telefone,`profissional_cep`=:profissional_cep,`profissional_uf`=:profissional_uf,`profissional_logradouro`=:profissional_logradouro,`profissional_num`=:profissional_num,`profissional_cidade`=:profissional_cidade,`profissional_bairro`=:profissional_bairro,`profissional_complemento`=:profissional_complemento,`profissional_servico`=:profissional_servico WHERE `profissional_servico`=:profissional_servico";
        }

        
        $update = $this->con->prepare($sql);
        $update->bindValue(':profissional_nome', $ClassProfissional->GetNome());
        $update->bindValue(':profissional_option', $ClassProfissional->GetOpcao());
        $update->bindValue(':profissional_razao', $ClassProfissional->GetRazao());
        $update->bindValue(':profissional_email', $ClassProfissional->GetEmail());
        $update->bindValue(':profissional_cpf', $ClassProfissional->GetCpf());
        $update->bindValue(':profissional_telefone', $ClassProfissional->GetTelefone());
        $update->bindValue(':profissional_cep', $ClassProfissional->GetCep());
        $update->bindValue(':profissional_logradouro', $ClassProfissional->GetLogradouro());
        $update->bindValue(':profissional_num', $ClassProfissional->GetNumero());
        $update->bindValue(':profissional_cidade', $ClassProfissional->GetCidade());
        $update->bindValue(':profissional_bairro', $ClassProfissional->GetBairro());
        $update->bindValue(':profissional_complemento', $ClassProfissional->GetComplemento());
 
        if(!empty($ClassProfissional->GetSenha())){
            $update->bindValue(':profissional_senha', md5($ClassProfissional->GetSenha()));
        }
        $update->bindValue(':profissional_servico', $ClassProfissional->GetServico());
        $update->bindValue(':profissional_uf', $ClassProfissional->GetUf());
        

       try {
        $update->execute();
        ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Cadastro alterado com Sucesso',
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
                title: 'Error',
                text:'Por favor entre em contato com administração!',
                showConfirmButton: false,
                timer: 3500
            })
        </script>

    <?php

       }

    }

    public function AdminInserirProfissional($ClassProfissional)
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
        $insert->bindValue(':profissional_foto', '');
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

    public function insertProfissional($ClassProfissional, $subcategoria)
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
            $subcat = new SubcategoriaDAO();
            $subcat->insertSubcategoria($ClassProfissional, $subcategoria);
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
            $senha = base64_encode($senha);

            $sql = "UPDATE `profissional` SET `profissional_senha`= :profissional_senha where `profissional_email` =:profissional_email";
            $update = $this->con->prepare($sql);
            $update->bindValue(':profissional_email', $ClassProfissional->GetEmail());
            $update->bindValue(':profissional_senha', $senha);
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

                RedefinirProfissional::Senha($email, $senha, $id, $nome);
                //echo $email."<br>". $senha."<br>".$id."<br>".$nome;


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
                    text: 'Informe um e-mail valido',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

<?php
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