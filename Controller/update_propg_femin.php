<?php
session_start();
include_once '../Dao/propagDaoFemin.php';
if(!empty($_GET['idProFemin'])){

$objetoPropgFemin = new PropgFemin();

$objetoPropgFemin->setIdProFemin($_GET['idProFemin']);
$objetoPropgFemin->setTitulo($_POST['titulo']);

$dao = new PropgFeminDAO();
$dao->updatePropgFemin($objetoPropgFemin);

$_SESSION['propFAtualiza'] = "Cadastro atualizado";
    header('location: ../Admin/propaganda.php');

}else{
   $_SESSION ['propFNaoAtualiza'] = "Falha! Registro não atualizou";
    header('location: ../Admin/propaganda.php');
}
?>
