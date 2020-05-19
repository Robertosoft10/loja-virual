<?php
session_start();
include_once '../Dao/itemDao.php';
if(isset($_GET['idItem'])){

$objetoItem = new Item();
$objetoItem->setIdItem($_GET['idItem']);
$objetoItem->setNome_item($_POST['nome_item']);
$objetoItem->setPreco($_POST['preco']);
$objetoItem->setValor($_POST['valor']);
$objetoItem->setCodigo($_POST['codigo']);
$objetoItem->setSexo($_POST['sexo']);
$objetoItem->setCateg_item($_POST['categ_item']);
$objetoItem->setDescricao($_POST['descricao']);

$dao = new ItemDAO();
$dao->updateItem($objetoItem);

$_SESSION['itemAtualiza'] = "Cadastro atualizado";
    header('location: ../Admin/itens.php');
}else{
   $_SESSION ['itemNaoAtualiza'] = "Falha na atualização";
    header('location: ../Admin/itens.php');
}
?>
