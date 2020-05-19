<?php
session_start();
include_once '../Dao/lojaDao.php';

if(isset($_GET['idLoja'])){

$objetoLoja = new Loja();

$objetoLoja->setIdLoja($_GET['idLoja']);
$objetoLoja->setRazao($_POST['razao']);
$objetoLoja->setCnpj($_POST['cnpj']);
$objetoLoja->setFone($_POST['fone']);
$objetoLoja->setEmail($_POST['email']);
$objetoLoja->setEndereco($_POST['endereco']);

$dao = new LojaDAO();
$dao->updateLoja($objetoLoja);

$_SESSION['lojaAtualiza'] = "Dados  atualizados";
    header('location: ../Admin/loja.php');
}else{
   $_SESSION ['lojaNaoAtualiza'] = "Falha na atualização";
    header('location: ../Admin/loja.php');
}

?>
