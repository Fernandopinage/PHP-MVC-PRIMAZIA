<?php
include_once "../../class/ClassSubcategoria.php";
include_once "../../dao/DAO.php";

class SubcategoriaDAO extends DAO
{

    public  function insertSubcategoria($ClassProfissional, $subcategoria)
    {


        $sql = "INSERT INTO `subcategoria`(`subcategoria_id`, `subcategoria_cnpj`, `subcategoria_descricao`) VALUES (null, :subcategoria_cnpj, :subcategoria_descricao)";

        $tamanho = count($subcategoria);

        for ($i = 0; $i < $tamanho; $i++) {

            if ($subcategoria[$i] != null) {

                $insert = $this->con->prepare($sql);
                $insert->bindValue(':subcategoria_cnpj', $ClassProfissional->GetCpf());
                $insert->bindValue(':subcategoria_descricao', $subcategoria[$i]);
                $insert->execute();
            }
        }

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
    }

    public function updateSubcategoria($ClassProfissional, $subcategoria)
    {

        $query = "DELETE  from subcategoria where subcategoria_cnpj = :subcategoria_cnpj;";
        $delete = $this->con->prepare($query);
        $delete->bindValue(':subcategoria_cnpj', $ClassProfissional->GetCpf());
        $delete->execute();


        $sql = "INSERT INTO `subcategoria`(`subcategoria_id`, `subcategoria_cnpj`, `subcategoria_descricao`) VALUES (null, :subcategoria_cnpj, :subcategoria_descricao)";

        $tamanho = count($subcategoria);

        for ($i = 0; $i < $tamanho; $i++) {

            if ($subcategoria[$i] != null) {

                $insert = $this->con->prepare($sql);
                $insert->bindValue(':subcategoria_cnpj', $ClassProfissional->GetCpf());
                $insert->bindValue(':subcategoria_descricao', $subcategoria[$i]);
                $insert->execute();
            }
        }


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
        header('Refresh: 3.4; url=../profissional/editar.php');
        //header('location: ../../view/profissional/editar.php');
    }

    public function selectProfissionalSub($categoria)
    {

    
        $sql = "SELECT * FROM `profissional` WHERE `profissional_servico` = :profissional_servico";
        $select = $this->con->prepare($sql);
        $select->bindValue(':profissional_servico', $categoria);
        $select->execute();
        $array = array();

    


        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {


            $array[] = array(
                'cnpj' => $row['profissional_cpf'],
                'email' => $row['profissional_email'],
                'nome' => $row['profissional_nome'],
                'telefone' => $row['profissional_telefone'],

            );

        }

        return $array;
        
    }

    
}
