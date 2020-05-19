<?php
session_start();
include_once '../Private/conexao.php';
$nome_user = $_POST['nome_user'];

$sql = "SELECT * FROM tb_usuario WHERE nome_user='$nome_user'";
$consult = mysqli_query($conexao, $sql);
$result = mysqli_num_rows($consult);
if($result > 0){
    $_SESSION['user_Admin_existe'] = "Usuário com esse endereço ja estar cadastrado!";
    header('location: ../Admin/usuarios.php');
}else{
include_once '../Dao/usuarioDao.php';

$objetoUsuario = new Usuario();

$objetoUsuario->setNome_user($_POST['nome_user']);
$objetoUsuario->setEmail_user($_POST['email_user']);
$objetoUsuario->setSenha_user(sha1($_POST['senha_user']));
$objetoUsuario->setNivel_user($_POST['nivel_user']);

$dao = new UsuarioDAO();
$dao->insertUsuario($objetoUsuario);

$_SESSION['userSalvo'] = "Cadastro efetuado";
    header('location: ../Admin/usuarios.php');
}
?>
