<?php
session_start();
include_once '../Private/conexao.php';

$idProp = $_GET['idProp'];
$imagem_site = $_FILES['imagem_site'];
$sql = "SELECT * FROM tb_propaganda WHERE idProp='$idProp'";
$consult = mysqli_query($conexao, $sql);
while($result = mysqli_fetch_array($consult)){
	$arquivo_db = $result['imagem_site'];
}
unlink("../Images/loja/$arquivo_db");

if(isset($_FILES['imagem_site'])){
	$extensao = strtolower(substr($_FILES['imagem_site']['name'], - 4));
	$novo_nome = sha1(time()) . $extensao;
    $diretorio = "../Images/loja/";
	move_uploaded_file($_FILES['imagem_site']['tmp_name'], $diretorio.$novo_nome);
	$sql = "UPDATE tb_propaganda SET imagem_site='$novo_nome' WHERE idProp='$idProp'";
	$update = mysqli_query($conexao, $sql);

if($update == true){
    $_SESSION['fotoAlterada'] = "Imagem atualizada!";
    header('location: ../Admin/propaganda.php');
}else{
    $_SESSION['fotoNaoAlterada'] = "Imagem atualizada!";
    header('location: ../Admin/propaganda.php');
}
}
?>
