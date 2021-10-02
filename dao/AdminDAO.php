<?php

include_once "../../class/ClassAdmin.php";
include_once "../../dao/DAO.php";
require_once __DIR__ . "../../mail/admin_redefinir.php";
class AdminDAO extends DAO
{


    public function AdminInsert($ClassAdmin){

        $sql = "INSERT INTO `admin`(`admin_id`, `admin_nome`, `admin_senha`, `admin_email`, `admin_foto` , `admin_telefone`, `admin_cfp`) 
        VALUES (null, :admin_nome, :admin_senha, :admin_email, :admin_foto, :admin_telefone,:admin_cfp)";
   
        $insert = $this->con->prepare($sql);
        $insert->bindValue(':admin_nome', $ClassAdmin->GetNome());
        $insert->bindValue(':admin_senha', md5($ClassAdmin->GetSenha()));
        $insert->bindValue(':admin_email', $ClassAdmin->GetEmail());
        $insert->bindValue(':admin_telefone', $ClassAdmin->GetTelefone());
        $insert->bindValue(':admin_cfp', $ClassAdmin->GetCpf());
        $insert->bindValue(':admin_foto', '');
        
        
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
           
   
           } catch (\Throwable $th) {
               echo $th;
               ?>
   
               <script>
                   Swal.fire({
                       position: 'center',
                       icon: 'error',
                       title: 'Registro Inválido',
                       text:'algo deu errado entre em contato com os administradores',
                       showConfirmButton: false,
                       timer: 3500
                   })
               </script>
   
               <?php
           }
    }



    public function insertAdmin($ClassAdmin){

     $sql = "INSERT INTO `admin`(`admin_id`, `admin_nome`, `admin_senha`, `admin_email`, `admin_foto` , `admin_telefone`, `admin_cfp`) 
     VALUES (null, :admin_nome, :admin_senha, :admin_email, :admin_foto, :admin_telefone,:admin_cfp)";

     $insert = $this->con->prepare($sql);
     $insert->bindValue(':admin_nome', $ClassAdmin->GetNome());
     $insert->bindValue(':admin_senha', md5($ClassAdmin->GetSenha()));
     $insert->bindValue(':admin_email', $ClassAdmin->GetEmail());
     $insert->bindValue(':admin_telefone', $ClassAdmin->GetTelefone());
     $insert->bindValue(':admin_cfp', $ClassAdmin->GetCpf());
     $insert->bindValue(':admin_foto', $ClassAdmin->GetFoto());
     
     
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
        header('location: ../../view/admin/login.php');

        } catch (\Throwable $th) {
            ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Registro Inválido',
                    text:'algo deu errado entre em contato com os administradores',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

            <?php
        }

    }


    public function validarLogin($AdiminClass){


        $sql = "SELECT * FROM `admin` WHERE `admin_email` =:admin_email and `admin_senha` =:admin_senha";
        $select = $this->con->prepare($sql);
        $select->bindValue(':admin_email', $AdiminClass->GetEmail());
        $select->bindValue(':admin_senha', md5($AdiminClass->GetSenha()));
        $select->execute();

        $_SESSION['user'] = array();

        
        if($row = $select->fetch(PDO::FETCH_ASSOC)){
            session_start();

            $_SESSION['admin'] = array(

                'id' => $row['admin_id'],
                'nome' => $row['admin_nome'],
                'email' => $row['admin_email'],
                'foto' => $row['admin_foto'],
                'administrador' => $row['administrador']
                

            );
            header('location: ../../view/admin/painel.php');
        }else{

            ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Dados inválidos',
                    text:'E-mail ou senha invalidos',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>


        <?php
            
        }
    }

    public function updateSenha($novaSenha,$id,$email,$senha){

        $sql = "SELECT * FROM `admin` WHERE admin_id = :admin_id and admin_email = :admin_email and admin_senha = :admin_senha";
        $select = $this->con->prepare($sql);
        $select->bindValue(':admin_id', $id);
        $select->bindValue(':admin_email', $email);
        $select->bindValue(':admin_senha', $senha);
        $select->execute();

        if($select->fetch(PDO::FETCH_ASSOC)){
            $new =  md5($novaSenha);

            $sql2 = "UPDATE `admin` SET `admin_senha`=:admin_senha where admin_id = :admin_id";
            $update = $this->con->prepare($sql2);
            $update->bindValue(':admin_id', $id);
            $update->bindValue(':admin_senha', $new);
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
        header('Refresh: 5.0; url=../admin/login.php');
        }else{
            ?>

            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Erro',
                    text:'ao tentar alterar senha por favor entre em contato com os administradores',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>


        <?php
        }
    
    }

    public function updateAdmin($ClassAdmin){

        $senha = $ClassAdmin->GetSenha();

        if(!empty($ClassAdmin->GetSenha())){

            $sql = "UPDATE `admin` SET `admin_nome`=:admin_nome, `admin_senha`=:admin_senha, `admin_telefone`=:admin_telefone,`admin_cfp`=:admin_cfp  WHERE admin_id = :admin_id";
        }else{
            $sql = "UPDATE `admin` SET `admin_nome`=:admin_nome, `admin_telefone`=:admin_telefone,`admin_cfp`=:admin_cfp  WHERE admin_id = :admin_id";
        }
        $update = $this->con->prepare($sql);
        $update->bindValue(':admin_id', $ClassAdmin->GetId());
        $update->bindValue(':admin_nome', $ClassAdmin->GetNome());
        if(!empty($senha)){

            $update->bindValue(':admin_senha', md5($ClassAdmin->GetSenha()));
        }
        $update->bindValue(':admin_telefone', $ClassAdmin->GetTelefone());
        $update->bindValue(':admin_cfp', $ClassAdmin->GetCpf());

        try {
            
            $update->execute();
            ?>


            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registro',
                    text: 'Alterado com sucesso',
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
                    title: 'Erro',
                    text: 'Por favor entre em contato com administração!',
                    showConfirmButton: false,
                    timer: 3500
                })
            </script>

        <?php
        }

    }

    public function redefinirSenha($ClassAdmin){

        $sql = "SELECT * FROM `admin` WHERE `admin_email` = :admin_email";
        $select = $this->con->prepare($sql);
        $select->bindValue(':admin_email', $ClassAdmin->GetEmail());
        $select->execute();

        if($row = $select->fetch(PDO::FETCH_ASSOC)){

            $id = $row['admin_id'];
            $nome = $row['admin_nome'];
            $email = $ClassAdmin->GetEmail();
            $senha = AdminDAO::RandonSenha();
            $senha = base64_encode($senha);

            $sql2 = "UPDATE `admin` SET `admin_senha`= :admin_senha WHERE admin_id=:admin_id and admin_email=:admin_email";
            $update = $this->con->prepare($sql2);
            $update->bindValue(':admin_id', $id);
            $update->bindValue(':admin_email', $ClassAdmin->GetEmail());
            $update->bindValue(':admin_senha', $senha);
            
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

                  Redefinir::Senha($email, $senha,$id,$nome);
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


        }else{
            ?>


            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Por favor',
                    text: 'informe um e-mail válido',
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


    public function ListarAdmins(){

        $sql = "SELECT * FROM `admin`";
        $select = $this->con->prepare($sql);
        $select->execute();
        $array = array();


        while($row = $select->fetch(PDO::FETCH_ASSOC)){

            $array[] = array(

                'id' => $row['admin_id'],
                'nome' => $row['admin_nome'],
                'email' => $row['admin_email'],
                'foto' => $row['admin_foto'],
                'telefone' => $row['admin_telefone'],
                'cpf' => $row['admin_cfp'],
                'senha' => $row['admin_senha']

            );

        }

        return $array;

    }
    public function ListarAdminsFiltro($nome,$email){

        $sql = "SELECT * FROM `admin` WHERE `admin_nome` = :admin_nome or `admin_email` = :admin_email";
        $select = $this->con->prepare($sql);
        $select->bindValue(':admin_nome', $nome);
        $select->bindValue(':admin_email', $email);
        $select->execute();
        $array = array();


        while($row = $select->fetch(PDO::FETCH_ASSOC)){

            $array[] = array(

                'id' => $row['admin_id'],
                'nome' => $row['admin_nome'],
                'email' => $row['admin_email'],
                'foto' => $row['admin_foto'],
                'telefone' => $row['admin_telefone'],
                'cpf' => $row['admin_cfp'],
                'senha' => $row['admin_senha']

            );

        }

        return $array;

    }

    public function ListarProfissional(){

        $sql = "SELECT * FROM `profissional`";
        $select = $this->con->prepare($sql);
        $select->execute();
        $array = array();

        while($row = $select->fetch(PDO::FETCH_ASSOC)){

            $array[] = array(
                
                'id' => $row['profissional_id'],
                'nome' => $row['profissional_nome'],
                'razao' => $row['profissional_razao'],
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
                'foto' => $row['profissional_foto'],
                'opt' => $row['profissional_servico']

            );
        }

         return $array;
    }

    public function ListarProfissionalFiltro($nome, $email){

        $sql = "SELECT * FROM `profissional` where profissional_nome = :profissional_nome  or  profissional_email = :profissional_email ";
        $select = $this->con->prepare($sql);
        $select->bindValue(':profissional_nome', $nome);
        $select->bindValue(':profissional_email', $email);
        $select->execute();
        $array = array();

        while($row = $select->fetch(PDO::FETCH_ASSOC)){

            $array[] = array(
                
                'id' => $row['profissional_id'],
                'nome' => $row['profissional_nome'],
                'razao' => $row['profissional_razao'],
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
                'foto' => $row['profissional_foto'],
                'opt' => $row['profissional_servico']

            );
        }

         return $array;
    }

    public function ListarCliente(){

        $sql = "SELECT * FROM `cliente`";
        $select = $this->con->prepare($sql);
        $select->execute();
        $array = array();

        while($row = $select->fetch(PDO::FETCH_ASSOC)){

            $array[] = array(
                
                'id' => $row['CLIENTE_ID'],
                'nome' => $row['CLIENTE_NOME'],
                'cpf' => $row['CLIENTE_CPF'],
                'email' => $row['CLIENTE_EMAIL'],
                'telefone' => $row['CLIENTE_TELEFONE'],
                'cep' => $row['CLIENTE_CEP'],
                'foto' => $row['CLIENTE_FOTO'],
                'senha' => $row['CLIENTE_SENHA'],
                'uf' => $row['CLIENTE_UF'],
                'cidade' => $row['CLIENTE_CIDADE'],
                'logradouro' => $row['CLIENTE_LOGRADOURO'],
                'bairro' => $row['CLIENTE_BAIRRO'],
                'complemento' => $row['CLIENTE_COMPLEMENTO'],
                'opcao' => $row['CLIENTE_OPCAO'],
                'razao' => $row['CLIENTE_RAZAO'],
                'numero' => $row['CLIENTE_NUM'],

            );
        }

         return $array;
    }

    public function ListarClienteFiltro($nome,$email){

        $sql = "SELECT * FROM `cliente` where CLIENTE_NOME =:CLIENTE_NOME or CLIENTE_EMAIL = :CLIENTE_EMAIL";
        $select = $this->con->prepare($sql);
        $select->bindValue(':CLIENTE_NOME', $nome);
        $select->bindValue(':CLIENTE_EMAIL', $email);
        $select->execute();
        $array = array();

        while($row = $select->fetch(PDO::FETCH_ASSOC)){

            $array[] = array(
                
                'id' => $row['CLIENTE_ID'],
                'nome' => $row['CLIENTE_NOME'],
                'cpf' => $row['CLIENTE_CPF'],
                'email' => $row['CLIENTE_EMAIL'],
                'telefone' => $row['CLIENTE_TELEFONE'],
                'cep' => $row['CLIENTE_CEP'],
                'foto' => $row['CLIENTE_FOTO'],
                'senha' => $row['CLIENTE_SENHA'],
                'uf' => $row['CLIENTE_UF'],
                'cidade' => $row['CLIENTE_CIDADE'],
                'logradouro' => $row['CLIENTE_LOGRADOURO'],
                'bairro' => $row['CLIENTE_BAIRRO'],
                'complemento' => $row['CLIENTE_COMPLEMENTO'],
                'opcao' => $row['CLIENTE_OPCAO'],
                'razao' => $row['CLIENTE_RAZAO'],
                'numero' => $row['CLIENTE_NUM'],

            );
        }

         return $array;

    }


}

?>