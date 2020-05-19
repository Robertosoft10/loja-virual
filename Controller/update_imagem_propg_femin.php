<?php
session_start();
include_once '../Private/conexao.php';

$idProFemin = $_GET['idProFemin'];
$imagem_femin = $_FILES['imagem_femin'];
$sql = "SELECT * FROM tb_propaganda_femin WHERE idProFemin='$idProFemin'";
$consult = mysqli_query($conexao, $sql);
while($result = mysqli_fetch_array($consult)){
	$arquivo_db = $result['imagem_femin'];
}
unlink("../Images/femin/$arquivo_db");

if(isset($_FILES['imagem_femin'])){
	$extensao = strtolower(substr($_FILES['imagem_femin']['name'], - 4));
	$novo_nome = sha1(time()) . $extensao;
    $diretorio = "../Images/femin/";
	move_uploaded_file($_FILES['imagem_femin']['tmp_name'], $diretorio.$novo_nome);
	$sql = "UPDATE tb_propaganda_femin SET imagem_femin='$novo_nome' WHERE idProFemin='$idProFemin'";
	$update = mysqli_query($conexao, $sql);

if($update == true){

$_SESSION['imgFaAtualiza'] = "Imagem atualizada";
    header('location: ../Admin/propaganda.php');
}else{
   $_SESSION ['imgFaNaoAtualiza'] = "Falha na atualização";
    header('location: ../Admin/propaganda.php');
}
}
?>
