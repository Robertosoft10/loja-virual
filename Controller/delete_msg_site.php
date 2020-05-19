<?php
session_start();
include_once '../Private/conexao.php';
$idMensag = $_GET['idMensag'];
$sql = "DELETE FROM tb_mensagens_user WHERE idMensag='$idMensag'";
$execute = mysqli_query($conexao , $sql);
if($execute == true){

$_SESSION['msgDelete'] = "Mensagem deletada";
    header('location: ../Admin/mensagens.php');

}else{
   $_SESSION ['msgNaoDelete'] = "Falha! Mensagem não deletada";
    header('location: ../Admin/mensagens.php');
}
?>
