<?php
session_start();
include_once '../Dao/lojaDao.php';
if(!empty($_POST['razao']) && !empty($_POST['cnpj']) && !empty($_POST['fone']) && !empty($_POST['email']) && !empty($_POST['endereco'])){

$objetoLoja = new Loja();

$objetoLoja->setRazao($_POST['razao']);
$objetoLoja->setCnpj($_POST['cnpj']);
$objetoLoja->setFone($_POST['fone']);
$objetoLoja->setEmail($_POST['email']);
$objetoLoja->setEndereco($_POST['endereco']);

$dao = new LojaDAO();
$dao->insertLoja($objetoLoja);

$_SESSION['lojaSalvo'] = "Cadastro efetuado";
    header('location: ../Admin/loja.php');

}else{
   $_SESSION ['lojaNaoSalvo'] = "Falha no cadastro! Campos obrigatórios *";
    header('location: ../Admin/loja.php');
}
?>
