<?php
session_start();
include_once '../Dao/propagDao.php';
if(!empty($_POST['mensagem']) && !empty($_POST['propaganda']) && !empty($_FILES['imagem_site'])){

$objetoPropg = new Propg();

$objetoPropg->setMensagem($_POST['mensagem']);
$objetoPropg->setPropaganda($_POST['propaganda']);
$objetoPropg->setDesconto($_POST['desconto']);
$objetoPropg->setImagem_site($_FILES['imagem_site']);

$dao = new PropgDAO();
$dao->insertPropg($objetoPropg);

$_SESSION['propSalvo'] = "Cadastro efetuado";
    header('location: ../Admin/propaganda.php');

}else{
   $_SESSION ['propNaoSalvo'] = "Falha no cadastro! Campos obrigatórios *";
    header('location: ../Admin/propaganda.php');
}
?>
