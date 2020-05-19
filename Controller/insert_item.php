<?php
session_start();
include_once '../Dao/itemDao.php';

if(!empty($_POST['nome_item']) && !empty($_POST['preco']) && !empty($_POST['codigo']) && !empty($_POST['sexo'])  && !empty($_POST['categ_item']) && !empty($_FILES['imagem'])){

$objetoItem = new Item();

$objetoItem->setNome_item($_POST['nome_item']);
$objetoItem->setPreco($_POST['preco']);
$objetoItem->setValor($_POST['valor']);
$objetoItem->setCodigo($_POST['codigo']);
$objetoItem->setSexo($_POST['sexo']);
$objetoItem->setCateg_item($_POST['categ_item']);
$objetoItem->setImagem($_FILES['imagem']);
$objetoItem->setDescricao($_POST['descricao']);


$dao = new ItemDAO();
$dao->insertItem($objetoItem);

$_SESSION['itemSalvo'] = "Cadastro efetuado";
    header('location: ../Admin/itens.php');

}else{
   $_SESSION ['itemNaoSalvo'] = "Falha no cadastro! Campos obrigatórios *";
    header('location: ../Admin/itens.php');
}
?>
