<?php
session_start();
include_once '../Private/secury.php';
require '../Private/conexao.php';

$sql = "SELECT * FROM  tb_login";
$consulta = mysqli_query($conexao, $sql);
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
           Olá: <?= $_SESSION['nome_user'];?>  <a id="link-top" class="nav-link disabled"  href="../Private/logout_admin.php">Sair</a>
          </div>
        </div>
      </nav>
    </header>
    <main role="main">
	<br><br>
     <hr>
      <div class="container marketing">
              <div class="row">
                <h2>Lista de Clientes</h2>
      		  <div class="col-md-12 order-md-1">
                <div class="table-responsive">
                  <table class="table table-striped table-sm col-md-12" id="example">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Usuário</th>
                        <th>E-mail</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($rows = mysqli_fetch_array($consulta)){?>
              			  <tr>
                       <td><?= $rows['idUser'];?></td>
                        <td><?= $rows['username'];?></td>
                        <td><?= $rows['user_email'];?></td>
                      </tr>
                      <?php } ?>
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
    <script src="Css/jquery.js"></script>
    <script src="Css/datatables.js"></script>
    <script src="Css/datatables-plugins.js"></script>
    <script>
      $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
  </body>
</html>
