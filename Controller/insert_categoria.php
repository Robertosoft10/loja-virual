<?php
session_start();
include_once '../Dao/categDao.php';

if(!empty($_POST['categoria'])){

$objetoCateg = new Categ();
$objetoCateg->setCategoria($_POST['categoria']);

$dao = new CategDAO();
$dao->insertCateg($objetoCateg);

$_SESSION['categSalvo'] = "Cadastro efetuado";
    header('location: ../Admin/categorias.php');

}else{
   $_SESSION ['categNaoSalvo'] = "Falha no cadastro! Campos obrigatórios *";
    header('location: ../Admin/categorias.php');
}
?>
