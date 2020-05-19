<?php 
session_start();
include_once '../Private/conexao.php';
$username = $_POST['username'];
$user_email = $_POST['user_email'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM tb_login WHERE user_email='$user_email'";
$consult = mysqli_query($conexao, $sql);
$result = mysqli_num_rows($consult);
if($result > 0){
    $_SESSION['user_existe'] = "Usuário com esse e-mail já existe!";
    header('location: ../View/register_user.php');
}else{
$sql = "INSERT INTO tb_login(username, user_email, password)VALUES('$username', '$user_email', '$password')";
$insert = mysqli_query($conexao, $sql);
$_SESSION['user_login'] = "Cadastro efetuada com sucesso! Pode fazer login";
header('location: ../View/login.php');
}
?>