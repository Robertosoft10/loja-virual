<?php
session_start();
include_once '../Dao/propagDaoMasc.php';
if(!empty($_POST['titulo']) && !empty($_FILES['imagem_masc'])){

$objetoPropgMasc = new PropgMasc();

$objetoPropgMasc->setTitulo($_POST['titulo']);
$objetoPropgMasc->setImagem_masc($_FILES['imagem_masc']);

$dao = new PropgMascDAO();
$dao->insertPropgMasc($objetoPropgMasc);

$_SESSION['propMSalvo'] = "Cadastro efetuado";
    header('location: ../Admin/propaganda.php');

}else{
   $_SESSION ['propMNaoSalvo'] = "Falha no cadastro! Campos obrigatórios *";
    header('location: ../Admin/propaganda.php');
}
?>
