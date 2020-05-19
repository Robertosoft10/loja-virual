<?php
session_start();
include_once '../Private/conexao.php';

$idProMasc = $_GET['idProMasc'];
$imagem_masc = $_FILES['imagem_masc'];
$sql = "SELECT * FROM tb_propaganda_masc WHERE idProMasc='$idProMasc'";
$consult = mysqli_query($conexao, $sql);
while($result = mysqli_fetch_array($consult)){
	$arquivo_db = $result['imagem_masc'];
}
unlink("../Images/masc/$arquivo_db");

if(isset($_FILES['imagem_masc'])){
	$extensao = strtolower(substr($_FILES['imagem_masc']['name'], - 4));
	$novo_nome = sha1(time()) . $extensao;
    $diretorio = "../Images/masc/";
	move_uploaded_file($_FILES['imagem_masc']['tmp_name'], $diretorio.$novo_nome);
	$sql = "UPDATE tb_propaganda_masc SET imagem_masc='$novo_nome' WHERE idProMasc='$idProMasc'";
	$update = mysqli_query($conexao, $sql);

if($update == true){

$_SESSION['imgMascAtualiza'] = "Imagem atualizada";
    header('location: ../Admin/propaganda.php');
}else{
   $_SESSION ['imgMascNaoAtualiza'] = "Falha na atualização";
    header('location: ../Admin/propaganda.php');
}
}
?>
