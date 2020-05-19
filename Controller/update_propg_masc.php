<?php
session_start();
include_once '../Dao/propagDaoMasc.php';
if(!empty($_GET['idProMasc'])){

$objetoPropgMasc = new PropgMasc();

$objetoPropgMasc->setIdProMasc($_GET['idProMasc']);
$objetoPropgMasc->setTitulo($_POST['titulo']);

$dao = new PropgMascDAO();
$dao->updatePropgMasc($objetoPropgMasc);

$_SESSION['propMAtualiza'] = "Cadastro atualizado";
    header('location: ../Admin/propaganda.php');

}else{
   $_SESSION ['propMNaoAtualiza'] = "Falha! Registro não atualizou";
    header('location: ../Admin/propaganda.php');
}
?>
