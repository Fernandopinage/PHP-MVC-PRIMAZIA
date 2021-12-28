<?php

include_once "../../dao/CategoriaDAO.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    if(isset($_GET['p'])){

        $excel = $_GET['p'];
        $ClassPedido = new CategoriaDAO();
        $dados = $ClassPedido->gerarExcel($excel);

        echo "<pre>";
        var_dump($dados['pedido_descricao']);
        echo "</pre>";
        
    }

        //header ("Content-type: application/x-msexcel");
        //header ("Content-Disposition: attachment; filename=\"nome_arquivo.xls\"" );



    ?>

    <table border="1">
        <thead>
            <tr>
                <th scope="col">Status</th>
                <th scope="col">Data Início</th>
                <th scope="col">Data Final</th>
                <th scope="col">Nº Pedido</th>
                <th scope="col">Cliente</th>
                <th scope="col">Serviço</th>
                <th scope="col">Profissional</th>
                <th scope="col">Descrição do Pedido</th>
                <th scope="col">Forma de Pagamento</th>
                <th scope="col">Valor do Serviço</th>
                <th scope="col">Informações adicionais</th>

            </tr>
        </thead>
        <tbody>
            <?php 
            
            foreach($dados as $dados){
                ?>
                <tr>
                <th scope="col"><?php 
                    if($dados['status'] === 'A'){
                        echo "EM ABERTO";
                    }
                    if($dados['status'] === 'E'){
                        echo "Em Atendimento";
                    }
                    if($dados['status'] === 'F'){
                        echo "Finalizado";
                    }
                    if($dados['status'] === 'C'){
                        echo "Cancelado";
                    }
                
                ?></th>
                <th scope="col"><?php echo $dados['data'];?></th>
                <th scope="col"><?php echo $dados['data_final'];?></th>
                <th scope="col"><?php echo $dados['protocolo'];?></th>
                <th scope="col"><?php echo $dados['nome'];?></th>
                <th scope="col"><?php

                            $obj = $dados['descricao'];
                            print_r($obj->tpservico);

                            ?></th>

                <th scope="col">
                    <?php echo $dados['profissional_nome'];?></th>

                <th scope="col">
                    <?php 
                    $obj = $dados['pedido_descricao'];
                    
                    echo "<pre>";
                    var_dump($obj);
                    echo "</pre>";
                     
                    if(!empty($obj->categoria)){

                        $categoria =  $obj->categoria;
                        echo "CATEGORIA: ";
                        foreach($categoria as $categoria){

                            echo $categoria." ";
                        }
                        echo "<br>";
                    }


                    if(!empty($obj->descricao)){
                        
                        $descricao =  $obj->descricao;

                        if(gettype($descricao) == 'string'){
                            echo "DESCRIÇÃO: ";
                            echo $descricao." ";
                        }else{

                            
                            echo "DESCRIÇÃO: ";
                            foreach($descricao as $descricao){
                                
                                echo $descricao." ";
                            }
                        }

                        echo "<br>";
                    }

                    ?>
                </th>


                <th scope="col">
                    <?php
                    
                    if(isset($dados['pagamento'])){

                        echo $dados['pagamento'];
                    }else{
                        echo "---";
                    }
                    ?>
                
                </th>
                <th scope="col">
                    <?php
                    if(isset($dados['valor'])){
                        echo $dados['valor'];
                    }else{
                        echo  "---";
                    }
                     ?></th>

                <th scope="col"><?php echo $dados['text'];?></th>
            </tr>
                
                <?php
            }
            
            
            ?>
        </tbody>
    </table>

</body>

</html>