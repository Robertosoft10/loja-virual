<?php
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
include_once '../Private/secury.php';
include_once '../Private/conexao.php';
$user = $_GET['user'];
$sql = "SELECT * FROM tb_pedidos T_P JOIN tb_login T_L ON T_P.user = T_L.idUser WHERE user='$user'";
$consulta = mysqli_query($conexao, $sql);
$rows = mysqli_fetch_array($consulta);

 $usuario_login = $_GET['user'];
$sql = "SELECT * FROM tb_compras T_C JOIN tb_login T_L ON  T_C.usuario_login = T_L.idUser WHERE usuario_login = '$usuario_login'";
$consulta = mysqli_query($conexao, $sql);
$rows_comp = mysqli_fetch_assoc($consulta);
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">


        <title>Adminstrativo</title>
        <!-- Principal CSS do Bootstrap -->
            <link href="Css/style.css" rel="stylesheet">
            <link href="Css/estilo.css" rel="stylesheet">
    <!-- Estilos customizados para esse template -->
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="">Adminstrativo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a id="link-top" class="nav-link" href="itens.php">Itens</a>
            </li>
            <li class="nav-item active">
              <a id="link-top" class="nav-link" href="usuarios.php">Usuários</a>
            </li>
            <li class="nav-item">
              <a id="link-top" class="nav-link" href="loja.php">Loja</a>
            </li>
            <li class="nav-item">
              <a id="link-top" class="nav-link" href="propaganda.php">Propaganda</a>
            </li>
            <li class="nav-item">
              <a id="link-top" class="nav-link" href="pedidos.php">Pedidos</a>
            </li>
            <li class="nav-item">
              <a id="link-top" class="nav-link" href="clientes.php">Clientes</a>
            </li>
            <li class="nav-item">
              <a id="link-top" class="nav-link" href="mensagens.php">Msg Site</a>
            </li>
          </ul>
		   <div class="form-inline mt-2 mt-md-0"   id="user-logado">
           Olá:  <?= $_SESSION['nome_user'];?> <a id="link-top" class="nav-link disabled"  href="../Private/logout_admin.php">Sair</a>
          </div>
        </div>
      </nav>
    </header>
    <main role="main">
	<br><br>
     <hr>
      <div class="container marketing">
              <div class="row">
                <h2>Detalhe do Pedido</h2>
      		  <div class="col-md-12 order-md-1">
                <div class="table-responsive">
                  <table class="table table-striped table-sm col-md-12">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>E-mail</th>
                        <th>Data Pedido</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= $rows['idUser']?></td>
                        <td><?= $rows['username']?></td>
                        <td><?= $rows['user_email']?></td>
                        <td><?= $rows['data_pedido']?></td>
                      </tr>
                      <tr>
                        <th>Item</th>
                        <th>Valor</th>
                        <th>Qtd</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                     $user = $_GET['user'];
                     $sql = "SELECT * FROM tb_pedidos T_P JOIN tb_itens T_I ON T_P.item = T_I.idItem WHERE user='$user'";
                     $consulta = mysqli_query($conexao, $sql);
                     while($rows_ped = mysqli_fetch_array($consulta)){
                    ?>
                    <tr>
                        <td><?= $rows_ped['nome_item']?></td>
                        <td>R$ <?= number_format($rows_ped['preco'], 2, ',', '.')?></td>
                        <td><?= $rows_ped['quantidade']?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <h2>Detalhe da Compra</h2>
            <div class="col-md-12 order-md-1">
                <div class="table-responsive">
                  <table class="table table-striped table-sm col-md-12">
                    <thead>
                      <tr>
                        <th>Venda</th>
                        <th>Cep</th>
                        <th>Cpf</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= $rows_comp['idCompra']?></td>
                        <?php 
                         $num_cep = $rows_comp['cep'];
                          $um     = substr($num_cep, 0, 2);
                          $dois   = substr($num_cep, 2, 3);
                          $tres   = substr($num_cep, 5, 3);
                          $cep = "$um.$dois.$tres";
                          ?>
                        <td><?= $cep?></td>
                        <?php
                        $num_cpf = $rows_comp['cpf'];
                        $um     = substr($num_cpf, 0, 3);
                        $dois   = substr($num_cpf, 3, 3);
                        $tres   = substr($num_cpf, 6, 3);
                        $quatro = substr($num_cpf, 9, 2);
                        $cpf = "$um.$dois.$tres-$quatro";
                        ?>
                        <td><?=  $cpf?></td>
                      </tr>
                      <tr>
                        <th>Cartão</th>
                        <th>Nº Cartão</th>
                        <th>Valor Compra</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= $rows_comp['nomeCartao']?></td>
                        <td><?= $rows_comp['numeroCartao']?></td>
                        <td>R$ <?= number_format($rows['valor_pedido'], 2, ',', '.')?></td>
                      </tr>
                      <tr>
                        <th>Parcelas</th>
                        <th>Valor Parcela</th>
                        <th>Data Compra</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?= $rows_comp['parcelas']?></td>
                        <?php  $valor_parcela = ($rows['valor_pedido'] /  $rows_comp['parcelas']);?>
                        <td>R$ <?= number_format($valor_parcela, 2, ',', '.')?></td>
                        <td><?= date('d/m/Y H:i:s', strtotime($rows_comp['data_compra']))?></td>
                      </tr>
                      <tr>
                          <th>Endereço</th>
                      </tr>
                      <tr>
                          <td  colspan="3"><?= $rows_comp['endereco']?></td>
                      </tr>
                      <tr>
                        <td>
                          <a href="../Controller/delete_compra.php?usuario_login=<?=$rows_comp['usuario_login'];?>">
                          <button class="btn btn-success">Deletar Compra</button></a>
                        </td>
                      </tr>
                    </thead>
                </tbody>
              </table>
              </main>
            </div>
          </div>
      	</div><!-- /.container -->
			</div><!-- /.container -->
      <!-- FOOTER -->
      <footer class="container">
        <p>&copy; RobertoSoft10. 2020 &middot;
      </footer>
    </main>

    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script src="../Css/jquery.js"></script>
    <script src="../Css/jquery02.js"></script>
    <script src="../Css/jquery03.js"></script>
    <script src="../Css/jquery04.js"></script>

    <script src="../Css/jqueryDatatables.js"></script>
    <script src="../Css/dataTables.js"></script>
    <script src="../Css/ajax.js"></script>
    <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
  </body>
</html>
