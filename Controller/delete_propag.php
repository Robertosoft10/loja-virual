<?php
session_start();
include_once '../Private/conexao.php';
$idProp = $_GET['idProp'];
$sql = "SELECT imagem_site FROM tb_propaganda";
$consult = mysqli_query($conexao, $sql);
$result  = mysqli_fetch_assoc($consult);

    if(is_file('../Images/loja/'.$result['imagem_site'])){
      $sql_img = unlink('../Images/loja/'.$result['imagem_site']);
      if($sql_img){
        @$sql = "DELETE FROM tb_propaganda WHERE imagem_site = '$imagem_site'";
        $execute = mysqli_query($conexao, $sql);
      }
    }
if($execute == true){
include_once '../Dao/propagDao.php';
$propgDAO = new PropgDAO();
$propgDAO->deletePropg($_REQUEST['idProp']);

    $_SESSION['propRemovido'] = "Dados deletados";
    header('location: ../Admin/propaganda.php');

}else{
    $_SESSION['propNaoRemovido'] = "Falha! Dados não deletados";
    header('location: ../Admin/propaganda.php');
}

?>
