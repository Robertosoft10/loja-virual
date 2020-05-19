<?php
session_start();
include_once '../Private/conexao.php';

if(!empty($_POST['nome_user']) && !empty($_POST['email_user']) && !empty($_POST['mensage_user'])){
$nome_user = $_POST['nome_user'];
$email_user = $_POST['email_user'];
$mensage_user = $_POST['mensage_user'];

$sql = "INSERT INTO tb_mensagens_user(nome_user, email_user, mensage_user, data_mensge)VALUES('$nome_user', '$email_user', '$mensage_user', NOW())";
$insert = mysqli_query($conexao, $sql);

$_SESSION['msgOk'] = "Mensagem enviada com sucesso!";
header('location: ../View/contact.php');
}else{
$_SESSION['msgErro'] = "Falh ao enviar mensagem! Tente novamente";
header('location: ../View/contact.php');
}
?>
