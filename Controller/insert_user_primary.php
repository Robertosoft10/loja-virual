<?php 
session_start();
include_once '../Private/conexao.php';
$nome_user = $_POST['nome_user'];
$email_user = $_POST['email_user'];
$senha_user = sha1($_POST['senha_user']);
$nivel_user = $_POST['nivel_user'];

$sql = "INSERT INTO tb_usuario(nome_user, email_user, senha_user, nivel_user)VALUES('$nome_user', '$email_user', '$senha_user', '$nivel_user')";
$insert = mysqli_query($conexao, $sql);
if($insert == true){
$_SESSION['userCdastro'] = "Cadastro efetuada com sucesso! Pode fazer login";
header('location: ../Admin/index.php');
}else{
    $_SESSION['userCdastroErro'] = "Erro no cadastro";
    header('location: /../loja-virtual/config.php');   
}
?>