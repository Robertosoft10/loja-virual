<?php
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
include_once '../Private/secury.php';
include_once '../Private/conexao.php';
require_once '../Dao/itemDao.php';
$itemDAO = new ItemDAO();
$itens = $itemDAO->listItens();

if(isset($_GET['idItem'])){
    $idItem = $_GET['idItem'];
    $rowItem = $itemDAO->riquestItem($idItem);

$sql = "SELECT * FROM tb_itens T_I JOIN tb_categorias T_C ON T_I.categ_item = T_C.idCateg WHERE idItem = '$idItem'";
  $consult = mysqli_query($conexao, $sql);
  $rowCateg = mysqli_fetch_array($consult);
}
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
                <h2>Detalhe do Item</h2>
      		  <div class="col-md-12 order-md-1">
                <div class="table-responsive">
                  <table class="table table-striped table-sm col-md-12">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Item</th>
                        <th>Preço</th>
                        <th>Valor</th>
                        <th>Código</th>
                      </tr>
                    </thead>
                    <tbody>
              			  <tr>
                        <td><?= $rowItem->getIdItem();?></td>
                        <td><?= $rowItem->getNome_Item();?></td>
                        <td>R$ <?= number_format($rowItem->getPreco(), 2, ',', '.');?></td>
                        <td>R$ <?= number_format($rowItem->getValor(), 2, ',', '.');?></td>
                        <td><?= $rowItem->getCodigo();?></td>
                      </tr>
                      <tr>
                        <th>Sexo</th>
                        <th>Categoria</th>
                        <th>Descrição</th>
                        <th>Imagem</th>
                      </tr>
                      <tr>
                         <td><?= $rowItem->getSexo();?></td>
                        <td><?= $rowCateg['categoria'];?></td>
                        <td><?= $rowItem->getDescricao();?></td>
                        <td colspan="2">
                          <img src="<?php echo "../Images/itens/". $rowItem->getImagem();?>"  id="img-detalhe">
                          <hr>
                          <form class="needs-validation" action="../Controller/update_imagem_item.php?idItem=<?= $rowItem->getIdItem();?>"  method="post" enctype="multipart/form-data">
                            <div class="col-md-4 mb-3">
                            <label for="primeiroNome">Alterar Image</label>
                            <input type="file" name="imagem" class="form-control" id="primeiroNome">
                            <div><br>
                                <button class="btn btn-success col-md-12" type="submit">Salvar Alteração</button>
                          </form>
                        </td>
                        <td>
                        <a href="itens?idItem=<?= $rowItem->getidItem();?>">
                        <button class="btn btn-success btn-sm">Alterar Item</button></a><hr>
                        <a href="../Controller/delete_item?idItem=<?= $rowItem->getidItem();?>">
                        <button class="btn btn-success btn-sm">Deletar Item</button></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
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
