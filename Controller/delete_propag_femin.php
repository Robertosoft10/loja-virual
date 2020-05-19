<?php
session_start();
include_once '../Private/conexao.php';
$idProFemin = $_GET['idProFemin'];
$sql = "SELECT imagem_femin FROM tb_propaganda_femin";
$consult = mysqli_query($conexao, $sql);
$result  = mysqli_fetch_assoc($consult);

    if(is_file('../Images/femin/'.$result['imagem_femin'])){
      $sql_img = unlink('../Images/femin/'.$result['imagem_femin']);
      if($sql_img){
        @$sql = "DELETE FROM tb_propaganda_femin WHERE imagem_femin = '$imagem_femin'";
        $execute = mysqli_query($conexao, $sql);
      }
    }
if($execute == true){
include_once '../Dao/propagDaoFemin.php';
$propgFeminDAO = new PropgFeminDAO();
$propgFeminDAO->deletePropgFemin($_REQUEST['idProFemin']);

    $_SESSION['propFRemovido'] = "Dados deletados";
    header('location: ../Admin/propaganda.php');

}else{
    $_SESSION['propFNaoRemovido'] = "Falha! Dados não deletados";
    header('location: ../Admin/propaganda.php');
}

?>
