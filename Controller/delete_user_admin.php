<?php
session_start();
include_once '../Dao/usuarioDao.php';

if(isset($_GET['idUser'])){
$usuarioDAO = new UsuarioDAO();
$usuarioDAO->deleteUsuario($_REQUEST['idUser']);

    $_SESSION['userRemovido'] = "Dados deletados";
    header('location: ../Admin/usuarios.php');
}else{
    $_SESSION['userNaoRemovido'] = "Falha! Dados não deletados";
    header('location: ../Admin/usuarios.php');
}
?>
