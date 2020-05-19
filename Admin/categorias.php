<?php
session_start();
include_once '../Private/secury.php';
require_once '../Dao/categDao.php';
$categDAO = new CategDAO();
$categs = $categDAO->listCategs();

if(isset($_GET['idCateg'])){
    $idCateg = $_GET['idCateg'];
    $rowCateg = $categDAO->riquestCateg($idCateg);
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
              <a id="link-top" class="nav-link" href="itens.php">Intens</a>
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
            <li class="nav-item">
              <a id="link-top" class="nav-link" href="categorias.php">Categorias</a>
            </li>
          </ul>
		   <div class="form-inline mt-2 mt-md-0"   id="user-logado">
           Olá: <?= $_SESSION['nome_user'];?> <a id="link-top" class="nav-link disabled"  href="../Private/logout_admin.php">Sair</a>
          </div>
        </div>
      </nav>
    </header>
    <main role="main">
	<br><br>
     <hr>
      <div class="container marketing">
        <div class="row">
        <div class="col-md-12 order-md-1">
              <h4 class="mb-3">Itens</h4>
               <?php if(isset($_SESSION ['categNaoSalvo'])){?>
                <div class="alert alert-danger" role="alert">
                <?= $_SESSION ['categNaoSalvo'];?>
                </div>
                <?php unset($_SESSION ['categNaoSalvo']); } ?>

                <?php if(isset($_SESSION ['categSalvo'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['categSalvo'];?>
                </div>
                <?php unset($_SESSION ['categSalvo']); } ?>

                <?php if(isset($_SESSION ['categNaoAtualiza'])){?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION ['categNaoAtualiza'];?>
                </div>
                <?php unset($_SESSION ['categNaoAtualiza']); } ?>
              
                <?php if(isset($_SESSION ['categAtualiza'])){?>
                <div class="alert alert-success" role="alert">
                <?= $_SESSION ['categAtualiza'];?>
               </div>
                <?php unset($_SESSION ['categAtualiza']); } ?>


                <?php if(isset($_SESSION ['categNaoRemovido'])){?>
              <div class="alert alert-danger" role="alert">
                <?= $_SESSION ['categNaoRemovido'];?>
              </div>
              <?php unset($_SESSION ['categNaoRemovido']); } ?>

              <?php if(isset($_SESSION ['categRemovido'])){?>
              <div class="alert alert-success" role="alert">
                <?= $_SESSION ['categRemovido'];?>
              </div>
              <?php unset($_SESSION ['categRemovido']); } ?>
      
            <?php if(!isset($_GET['idCateg'])){?>
                  <form class="needs-validation" action="../Controller/insert_categoria.php"  method="post">
                    <div class="row">
                      <div class="col-md-6 mb-6">
                        <label for="primeiroNome">Categoria: *</label>
                        <input type="text" name="categoria" class="form-control" id="primeiroNome">
                      </div>
                      </div>
                    <hr class="mb-4">
                    <button class="btn btn-success col-md-4" type="submit">Salvar Categoria</button>
				           </form>
                 <?php }else{?>
                     <h4 class="mb-3">Alterar Categoria</h4>
                   <form class="needs-validation" action="../Controller/update_categoria.php?idCateg=<?= $rowCateg->getIdCateg();?>"  method="post">
                     <div class="row">
                       <div class="col-md-9 mb-3">
                         <label for="primeiroNome">Categoria: </label>
                         <input type="text" name="categoria" class="form-control" id="primeiroNome"  value="<?php echo $rowCateg->getCategoria();?>">
                       </div>
                       
                       </div>
                     <hr class="mb-4">
                     <button class="btn btn-success col-md-4" type="submit">Salvar Alterações</button>
                   </form>
                 <?php } ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <h2>Lista de Categorias</h2>
      		  <div class="col-md-12 order-md-1">
                <div class="table-responsive">
                  <table class="table table-striped table-sm col-md-12" id="example">
                    <thead>
                      <tr>
                        <th >#</th>
                        <th>Categoria</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($rows = array_shift($categs)){?>
                        <tr>
                        <td><?= $rows->getidCateg();?></td>
                        <td><?= $rows->getCategoria();?></td>
                        <td id="btn-acao">
                        <a href="categorias.php?idCateg=<?= $rows->getIdCateg();?>"><button class="btn btn-success btn-sm">Alterar</button></a>
                         <a href="../Controller/deleteCategaria.php?idCateg=<?= $rows->getIdCateg();?>"><button class="btn btn-success btn-sm">Deletar</button></a>
      				          </td>
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
