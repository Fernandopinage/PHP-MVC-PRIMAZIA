<?php
include_once "../../class/ClassSubcategoria.php";


class SubcategoriaDAO extends DAO
{

    public  function insertSubcategoria($ClassProfissional,$subcategoria)
    {


        $sql = "INSERT INTO `subcategoria`(`subcategoria_id`, `subcategoria_cnpj`, `subcategoria_descricao`) VALUES (null, :subcategoria_cnpj, :subcategoria_descricao)";
        
        $tamanho = count($subcategoria);
        
        for($i=0;$i<$tamanho;$i++){
            
            if($subcategoria[$i] != null){

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
}
