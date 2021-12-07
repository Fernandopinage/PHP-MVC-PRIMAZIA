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
        
    }

        header ("Content-type: application/x-msexcel");
        header ("Content-Disposition: attachment; filename=\"nome_arquivo.xls\"" );



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
                <th scope="col">Forma de Pagamento</th>
                <th scope="col">Valor do Serviço</th>

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
            </tr>
                
                <?php
            }
            
            
            ?>
        </tbody>
    </table>

</body>

</html>