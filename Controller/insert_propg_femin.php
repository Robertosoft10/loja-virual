<?php
session_start();
include_once '../Dao/propagDaoFemin.php';
if(!empty($_POST['titulo']) && !empty($_FILES['imagem_femin'])){

$objetoPropgFemin = new PropgFemin();

$objetoPropgFemin->setTitulo($_POST['titulo']);
$objetoPropgFemin->setImagem_femin($_FILES['imagem_femin']);

$dao = new PropgFeminDAO();
$dao->insertPropgFemin($objetoPropgFemin);

$_SESSION['propFSalvo'] = "Cadastro efetuado";
    header('location: ../Admin/propaganda.php');

}else{
   $_SESSION ['propFNaoSalvo'] = "Falha no cadastro! Campos obrigatórios *";
    header('location: ../Admin/propaganda.php');
}
?>
