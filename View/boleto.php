<?php 
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
$usuario = $_SESSION['idUser'];
include_once '../Private/conexao.php';
$sql = "SELECT * FROM tb_loja";
$consulta = mysqli_query($conexao, $sql);
$rows = mysqli_fetch_assoc($consulta);

$usuario_login = $_GET['usuario'];
$sql = "SELECT * FROM tb_compras T_C JOIN tb_login T_L ON  T_C.usuario_login = T_L.idUser WHERE usuario_login = '$usuario_login'";
$consulta = mysqli_query($conexao, $sql);
$rows_comp = mysqli_fetch_assoc($consulta);

$user = $_GET['usuario'];
$sql = "SELECT * FROM tb_pedidos T_P JOIN tb_itens T_I ON T_P.item = T_I.idItem WHERE user='$user'";
$consulta = mysqli_query($conexao, $sql);
$rows_pedido = mysqli_fetch_array($consulta);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title><?= $rows['razao'];?></title>
    <link rel="stylesheet" href="../Components/style.css" type="text/css">
</head>
<body>
  <table class="boleto" border="1">
    <tr>
      <td><b><?= $rows['razao'];?></b></td>
      <td><b><?= $rows_comp['idCompra'];?></b></td>
      <td><b>0000 00000 0000 <?= $rows_comp['idCompra'];?></b></td>
    </tr>
    <tr>
      <td colspan="2"><b>CNPJ: <?= $rows['cnpj'];?></b></td>
      <td>Data Pedido:<br><?= date('d/m/Y', strtotime($rows_pedido['data_pedido']));?></td>
    </tr>
      <tr>
      <td colspan="2">Cliente:<br><?= $rows_comp['username'];?></td>
       <td>Data Compra: <br><?= date('d/m/Y', strtotime($rows_comp['data_compra']));?></td>
    </tr>
     <tr>
      <td colspan="2">E-mail: <br><?= $rows_comp['user_email'];?></td>
     <td>Data Vencimento:<br><?= date('d/m/Y', strtotime('+30 days', strtotime($rows_pedido['data_pedido'])));?></td>
    </tr>
    <tr>
      <td colspan="2">Endereço<br><?= $rows_comp['endereco'];?><br>
        <?php
        $num_cep = $rows_comp['cep'];
        $um     = substr($num_cep, 0, 2);
        $dois   = substr($num_cep, 2, 3);
        $tres   = substr($num_cep, 5, 3);
        $cep = "$um.$dois.$tres";
        ?>
        Cep:<br><?= $cep;?> </td>
      <?php
       $num_cpf = $rows_comp['cpf'];
       $um     = substr($num_cpf, 0, 3);
       $dois   = substr($num_cpf, 3, 3);
       $tres   = substr($num_cpf, 6, 3);
       $quatro = substr($num_cpf, 9, 2);
       $cpf = "$um.$dois.$tres-$quatro";
       ?>
      <td>Cpf:<br><?= $cpf ;?></td>
    </tr>
     <tr>
      <td>Item:</td>
      <td>Preço:</td>
      <td>Qtd:</td>
    </tr>
    <?php
    $user = $_GET['usuario'];
    $sql = "SELECT * FROM tb_pedidos T_P JOIN tb_itens T_I ON T_P.item = T_I.idItem WHERE user='$user'";
    $consulta = mysqli_query($conexao, $sql);
    while($rows_ped = mysqli_fetch_array($consulta)){?>
      <tr>
      <td><?= $rows_ped['nome_item'];?></td>
      <td>R$ <?= number_format($rows_ped['preco'], 2, ',', '.');?></td>
      <td><?= $rows_ped['quantidade'];?></td>
      <?php } ?>
    </tr>
    <tr>
      <td colspan="2">
        Endereço: <?= $rows['endereco'];?><br>
        E-mail: <?= $rows['email'];?><br>
        Contato: <?= $rows['fone'];?><br>
      </td>
      <td>
      <?php
        $valor = ($rows_pedido['valor_pedido'] /  $rows_comp['parcelas']);?>
       Valor Parcela:<br><b>R$ <?= number_format($valor, 2, ',', '.');?></b>
      </td>
    </tr>
    <tr>
      <td colspan="3">
        ||||| ||||||||||| ||||||| |||| |||| ||||||||||||||||||
      </td>
    </tr>
  </table>  
  <hr>
  <button id="btn-imprimir" onClick="window.print()">Imprimir</button>     
</form>           
</body>
</html>