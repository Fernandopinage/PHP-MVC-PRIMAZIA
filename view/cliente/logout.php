<?php
session_start();
include_once "../../dao/ClienteDAO.php";

$dados = $_SESSION['user'];

ClienteDAO::logout($dados);



?>