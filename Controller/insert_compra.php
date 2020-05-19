<?php
session_start();
include_once '../Private/conexao.php';

$usuario_login = $_GET['usuario_login'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$parcelas = $_POST['parcelas'];
$cpf = $_POST['cpf'];
$nomeCartao = $_POST['nomeCartao'];
$numeroCartao = $_POST['numeroCartao'];

$sql = "INSERT INTO tb_compras(usuario_login, endereco, telefone, cep, parcelas, cpf, nomeCartao, numeroCartao, data_compra)VALUES('$usuario_login', '$endereco', '$telefone', '$cep', '$parcelas', '$cpf', '$nomeCartao', '$numeroCartao', NOW())";
$insert = mysqli_query($conexao, $sql);

if($insert == true){
  $_SESSION['vendaOk'] = "Compra finalizada com sucesso! Acesse seu carrinho de compras";
      header('location: /../loja-virtual/index.php');
  }else{
     $_SESSION ['vendaErro'] = "Falha na venda tente novamente";
  header('location: ../View/order.php');
  }
 ?>
