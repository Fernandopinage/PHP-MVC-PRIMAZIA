<?php

include_once "../../class/ClassStar.php";
include_once "../../dao/DAO.php";


class StarDAO extends Dao{



    public function insertStar(){


        $sql = "INSERT INTO `star`(`star_id`, `star_cli_id`, `star_pro_id`, `star_status_cli`, `star_status_pro`, `star_nota_cli`, `star_nota_pro`)
         VALUES (null, :star_cli_id, :star_pro_id, :star_status_cli, :star_status_pro, :star_nota_cli, :star_nota_pro)";
        $select = $this->con->prepare();
        $select->bindValue(':star_cli_id',);
        $select->bindValue(':star_pro_id',);
        $select->bindValue(':star_status_cli',);
        $select->bindValue(':star_status_pro',);
        $select->bindValue(':star_nota_cli',);
        $select->bindValue(':star_nota_pro',);
        $select->execute();

    }


}

?>