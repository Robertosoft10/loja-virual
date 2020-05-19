<?php
session_start();
include_once '../Private/conexao.php';
$idItem = $_GET['idItem'];
$sql = "SELECT imagem FROM tb_itens";
$consult = mysqli_query($conexao, $sql);
$result  = mysqli_fetch_assoc($consult);

    if(is_file('../Images/itens/'.$result['imagem'])){
      $sql_img = unlink('../Images/itens/'.$result['imagem']);
      if($sql_img){
        @$sql = "DELETE FROM tb_itens WHERE imagem = '$imagem'";
        $execute = mysqli_query($conexao, $sql);
      }
    }

if($execute == true){
  include_once '../Dao/itemDao.php';
  $itemDAO = new ItemDAO();
  $itemDAO->deleteItem($_REQUEST['idItem']);

  $_SESSION['itemDelete'] = "Item deletado com sucesso!";
      header('location: ../Admin/itens.php');
  }else{
     $_SESSION ['itemDeleteErro'] = "Falha item não deletado";
      header('location: ../Admin/itens.php');
  }
?>
