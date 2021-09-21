<?php

include_once "../../class/ClassAdmin.php";
include_once "../../dao/DAO.php";

class AdminDAO extends DAO
{

    public function insertAdmin($ClassAdmin){

     $sql = "INSERT INTO `admin`(`admin_id`, `admin_nome`, `admin_senha`, `admin_email`, `admin_foto`) 
     VALUES (null, :admin_nome, :admin_senha, :admin_email, :admin_foto)";

     $insert = $this->con->prepare($sql);
     $insert->bindValue(':admin_nome', $ClassAdmin->GetNome());
     $insert->bindValue(':admin_senha', $ClassAdmin->GetSenha());
     $insert->bindValue(':admin_email', $ClassAdmin->GetEmail());
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


}

?>