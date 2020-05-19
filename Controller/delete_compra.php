<?php
session_start();
include_once '../Private/conexao.php';
$usuario_login = $_GET['usuario_login'];
$sql = "DELETE FROM tb_compras WHERE usuario_login = '$usuario_login'";
$execute = mysqli_query($conexao, $sql);

if($execute == true){
  $user = $_GET['usuario_login'];
  $sql = "DELETE FROM tb_pedidos WHERE user = '$user'";
  $exec = mysqli_query($conexao, $sql);

  $_SESSION['compraDelete'] = "Compra  deletada com sucesso!";
      header('location: ../Admin/pedidos.php');
  }else{
     $_SESSION ['compraDeleteErro'] = "Falha Compra não deletada";
      header('location: ../Admin/pedidos.php');
  }
?>
