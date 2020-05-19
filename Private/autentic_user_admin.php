<?php
session_start();
require 'conexao.php';
$email_user = $_POST['email_user'];
$senha_user =  $_POST['senha_user'];
$descrypt = sha1($senha_user);
if (empty($email_user) || empty($senha_user)){
  $_SESSION['loginVazio'] = "Informe e-mail e senha";
header('location: ../Admin/index.php');
    exit;
}
$sql = "SELECT * FROM tb_usuario WHERE email_user='$email_user' AND senha_user='$descrypt' LIMIT 1";
$executa = $conexao->query($sql);
$result = $executa->fetch_assoc();

if(empty($result)) {

  $_SESSION['loginIncorreto'] = "Usuário  ou senha invalidos!";
  header('location: ../Admin/index.php');
}else{
  $_SESSION['email_user'] = $result['email_user'];
  $_SESSION['senha_user'] = $result['senha_user'];
  $_SESSION['nome_user'] = $result['nome_user'];
  $_SESSION['idUser'] = $result['idUser'];

header('Location: ../Admin/itens.php');
}
?>
