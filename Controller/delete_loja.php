<?php
session_start();
include_once '../Dao/lojaDao.php';

if(isset($_GET['idLoja'])){
$lojaDAO = new LojaDAO();
$lojaDAO->deleteLoja($_REQUEST['idLoja']);

    $_SESSION['lojaRemovido'] = "Dados deletados";
    header('location: ../Admin/loja.php');
}else{
    $_SESSION['lojaNaoRemovido'] = "Falha! Dados não deletados";
    header('location: ../Admin/loja.php');
}


?>
