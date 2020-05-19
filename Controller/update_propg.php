<?php
session_start();
include_once '../Dao/propagDao.php';

if(isset($_GET['idProp'])){
$objetoPropg = new Propg();

$objetoPropg->setIdProp($_GET['idProp']);
$objetoPropg->setMensagem($_POST['mensagem']);
$objetoPropg->setPropaganda($_POST['propaganda']);
$objetoPropg->setDesconto($_POST['desconto']);

$dao = new PropgDAO();
$dao->updatePropg($objetoPropg);

$_SESSION['propAtualizado'] = "Cadastro atualizado";
    header('location: ../Admin/propaganda.php');

}else{
   $_SESSION ['propoNaoAtualizado'] = "Falha! Cadastro não atualizado";
    header('location: ../Admin/propaganda.php');
}
?>