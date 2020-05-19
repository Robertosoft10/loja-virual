<?php
session_start();
require 'conexao.php';
$user_email = $_POST['user_email'];
$password =  $_POST['password'];
$descrypt = sha1($password);
if (empty($user_email) || empty($password)){
  $_SESSION['loginVazio'] = "Informe e-mail e senha";
  header('location: ../View/login_register.php');
    exit;
}
$sql = "SELECT * FROM tb_login WHERE user_email='$user_email' AND password='$descrypt' LIMIT 1";
$executa = $conexao->query($sql);
$result = $executa->fetch_assoc();

if(empty($result)) {

  $_SESSION['loginIncorreto'] = "Usuário  ou senha invalidos!";
  header('location: ../View/login_register.php');
}else{
  $_SESSION['user_email'] = $result['user_email'];
  $_SESSION['password'] = $result['password'];
  $_SESSION['username'] = $result['username'];
  $_SESSION['idUser'] = $result['idUser'];

header('Location: /../loja-virtual/index.php');
}
?>
