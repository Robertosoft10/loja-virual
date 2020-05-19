<?php
session_start();
include_once '../Private/conexao.php';

$idItem = $_GET['idItem'];
$imagem = $_FILES['imagem'];
$sql = "SELECT * FROM tb_itens WHERE idItem='$idItem'";
$consult = mysqli_query($conexao, $sql);
while($result = mysqli_fetch_array($consult)){
	$arquivo_db = $result['imagem'];
}
unlink("../Images/itens/$arquivo_db");

if(isset($_FILES['imagem'])){
	$extensao = strtolower(substr($_FILES['imagem']['name'], - 4));
	$novo_nome = sha1(time()) . $extensao;
    $diretorio = "../Images/itens/";
	move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome);
	$sql = "UPDATE tb_itens SET imagem='$novo_nome' WHERE idItem='$idItem'";
	$update = mysqli_query($conexao, $sql);

if($update == true){

$_SESSION['itemAtualiza'] = "Cadastro atualizado";
    header('location: ../Admin/itens.php');
}else{
   $_SESSION ['itemNaoAtualiza'] = "Falha na atualização";
    header('location: ../Admin/itens.php');
}
}
?>
