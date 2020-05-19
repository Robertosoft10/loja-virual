<?php
session_start();
$user = $_GET['usuario'];

 if(count($_SESSION['carrinho']) == 0){
    }else{
    require_once '../Private/conexao.php';
    $somaValorItem = 0;
    foreach($_SESSION['carrinho'] as $idItem => $quantidade){
    $sql   = mysqli_query($conexao, "SELECT * FROM tb_itens WHERE idItem= '$idItem'");
    $item    = mysqli_fetch_assoc($sql);
    $subTotal = $item['preco'] * $quantidade;
    $somaValorItem += $item['preco'] * $quantidade;
		}
	}
	 foreach($_SESSION['carrinho'] as $idItem => $quantidade){
		 $sql = "INSERT INTO tb_pedidos(user, item, quantidade, valor_pedido, data_pedido)
					VALUES('$user', '$idItem', '$quantidade', '$somaValorItem', NOW())";
		$insert = mysqli_query($conexao, $sql);
					
		$_SESSION['pedOk'] = "Pedido realizado com sucesso! Finalize sua compra";
		header('location: ../View/order.php');
					
	 }

?>