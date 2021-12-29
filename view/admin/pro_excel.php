<?php

include_once "../../dao/AdminDAO.php";

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

        $sql = $_GET['p'];
        $ClassPedido = new AdminDAO();
        $dados = $ClassPedido->excelPro($sql);

    }


    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=\"profissional.xls\"" );


    ?>
        
    <table border="1">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">CPF/CNPJ</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">Tipo de Serviço</th>

            </tr>
        </thead>
        <tbody>
        <?php 
            
            foreach($dados as $dados){
                ?>
                <tr>
                <th scope="col"><?php echo $dados['nome'];?></th>
                <th scope="col"><?php echo $dados['cpf'];?></th>
                <th scope="col"><?php echo $dados['email'];?></th>
                <th scope="col"><?php echo $dados['telefone'];?></th>
                <th scope="col"><?php echo $dados['opt'];?></th>
                </tr>
                
                <?php
            }
            
            
            ?>
        </tbody>
    </table>
        
 
</body>

</html>