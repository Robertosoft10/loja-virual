<?php
session_start();
include_once '../Dao/categDao.php';
if(isset($_GET['idCateg'])){

$objetoCateg = new Categ();
$objetoCateg->setIdCateg($_GET['idCateg']);
$objetoCateg->setCategoria($_POST['categoria']);

$dao = new CategDAO();
$dao->updateCateg($objetoCateg);

$_SESSION['categAtualiza'] = "Cadastro atualizado";
    header('location: ../Admin/categorias.php');
}else{
   $_SESSION ['categNaoAtualiza'] = "Falha na atualização";
    header('location: ../Admin/categorias.php');
}

?>
