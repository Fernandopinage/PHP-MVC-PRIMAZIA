<?php
include_once "../../class/ClassSubcategoria.php";
include_once "../../dao/DAO.php";

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

    public function selectProfissionalSub($categoria){

        $categoria = explode(",",$categoria);

        $tamanho = count($categoria);
      
        $lista = array();
        $array = array();
        for($i=0;$i<$tamanho;$i++){

            $sql = "SELECT * FROM `profissional` inner join subcategoria on subcategoria_cnpj = profissional_cpf WHERE subcategoria_descricao=:subcategoria_descricao";
            $select = $this->con->prepare($sql);
            $select->bindValue(':subcategoria_descricao', $categoria[$i]);
            $select->execute();

            while($row = $select->fetch(PDO::FETCH_ASSOC)){

                $array[] = array(
                'cnpj' => $row['profissional_cpf'],
                'email' => $row['profissional_email'],
                'nome' => $row['profissional_nome'],
                'telefone' => $row['profissional_telefone']
                
                );
            }
            
            $lista = $array;
        }
        


        return $lista;
    }

    



}