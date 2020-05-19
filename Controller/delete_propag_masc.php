<?php
session_start();
include_once '../Private/conexao.php';
$idProMasc = $_GET['idProMasc'];
$sql = "SELECT imagem_masc FROM tb_propaganda_masc";
$consult = mysqli_query($conexao, $sql);
$result  = mysqli_fetch_assoc($consult);

    if(is_file('../Images/masc/'.$result['imagem_masc'])){
      $sql_img = unlink('../Images/masc/'.$result['imagem_masc']);
      if($sql_img){
        @$sql = "DELETE FROM tb_propaganda_masc WHERE imagem_masc = '$imagem_masc'";
        $execute = mysqli_query($conexao, $sql);
      }
    }
if($execute == true){
include_once '../Dao/propagDaoMasc.php';
$propgMascDAO = new PropgMascDAO();
$propgMascDAO->deletePropgMasc($_REQUEST['idProMasc']);

    $_SESSION['propMRemovido'] = "Dados deletados";
    header('location: ../Admin/propaganda.php');

}else{
    $_SESSION['propMNaoRemovido'] = "Falha! Dados não deletados";
    header('location: ../Admin/propaganda.php');
}

?>
