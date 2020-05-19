<?php
session_start();
include_once '../Private/secury.php';
require_once '../Dao/lojaDao.php';
$lojaDAO = new LojaDAO();
$loja = $lojaDAO->listLoja();

if(isset($_GET['idLoja'])){
    $idLoja = $_GET['idLoja'];
    $rowLoja = $lojaDAO->riquestLoja($idLoja);
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
        <div class="col-md-12 order-md-1">
                  <h4 class="mb-3">Loja</h4>
                  <?php if(isset($_SESSION ['lojaNaoSalvo'])){?>
                  <div class="alert alert-danger" role="alert">
                    <?= $_SESSION ['lojaNaoSalvo'];?>
                  </div>
                <?php unset($_SESSION ['lojaNaoSalvo']); } ?>

                <?php if(isset($_SESSION ['lojaSalvo'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['lojaSalvo'];?>
                </div>
               <?php unset($_SESSION ['lojaSalvo']); } ?>

                <?php if(isset($_SESSION ['lojaNaoAtualiza'])){?>
                <div class="alert alert-danger" role="alert">
                <?= $_SESSION ['lojaNaoAtualiza'];?>
              </div>
              <?php unset($_SESSION ['lojaNaoAtualiza']); } ?>

              <?php if(isset($_SESSION ['lojaAtualiza'])){?>
              <div class="alert alert-success" role="alert">
                <?= $_SESSION ['lojaAtualiza'];?>
              </div>
              <?php unset($_SESSION ['lojaAtualiza']); } ?>

              <?php if(isset($_SESSION ['lojaNaoRemovido'])){?>
              <div class="alert alert-danger" role="alert">
                <?= $_SESSION ['lojaNaoRemovido'];?>
              </div>
              <?php unset($_SESSION ['lojaNaoRemovido']); } ?>

              <?php if(isset($_SESSION ['lojaRemovido'])){?>
              <div class="alert alert-success" role="alert">
                <?= $_SESSION ['lojaRemovido'];?>
              </div>
              <?php unset($_SESSION ['lojaRemovido']); } ?>

              <?php if(!isset($_GET['idLoja'])){?>
                <form class="needs-validation" action="../Controller/insert_loja.php" method="post">
                
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="primeiroNome">Razão Social: *</label>
                        <input type="text" name="razao" class="form-control" id="primeiroNome">
                      </div>
                       <div class="col-md-3 mb-3">
                        <label for="primeiroNome">Cnpj: *</label>
                        <input type="text" name="cnpj" class="form-control" id="primeiroNome">
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="primeiroNome">Fone: *</label>
                        <input type="text" name="fone" class="form-control" id="primeiroNome">
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="primeiroNome">E-mail: *</label>
                        <input type="email" name="email" class="form-control" id="primeiroNome">
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="primeiroNome">Endereço: *</label>
                        <input type="text" name="endereco" class="form-control" id="primeiroNome">
                      </div>
                      </div>
                    <hr class="mb-4">
                    <button class="btn btn-success col-md-4" type="submit">Salvar Dados</button>
				           </form>
                 <?php }else{?>
                   <h4 class="mb-3">Alterar dados da Loja</h4>
                   <form class="needs-validation" action="../Controller/update_loja.php?idLoja=<?= $rowLoja->getIdLoja();?>"  method="post">
                     <div class="row">
                       <div class="col-md-6 mb-3">
                         <label for="primeiroNome">Razão Social: </label>
                         <input type="text" name="razao" class="form-control" id="primeiroNome" value="<?= $rowLoja->getRazao();?>">
                       </div>
                        <div class="col-md-3 mb-3">
                        <label for="primeiroNome">Cnpj: </label>
                        <input type="text" name="cnpj" class="form-control" id="primeiroNome" value="<?= $rowLoja->getCnpj();?>">
                      </div>
                       <div class="col-md-3 mb-3">
                         <label for="primeiroNome">Fone: </label>
                         <input type="text" name="fone" class="form-control" id="primeiroNome"  value="<?= $rowLoja->getFone();?>">
                       </div>
                       <div class="col-md-12 mb-3">
                         <label for="primeiroNome">E-mail: </label>
                         <input type="email" name="email" class="form-control" id="primeiroNome"  value="<?= $rowLoja->getEmail();?>">
                       </div>
                       <div class="col-md-12 mb-3">
                         <label for="primeiroNome">Endereço: </label>
                         <input type="text" name="endereco" class="form-control" id="primeiroNome"  value="<?= $rowLoja->getEndereco();?>">
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
                <h2>Dados da Loja</h2>
      		  <div class="col-md-12 order-md-1">
                <div class="table-responsive">
                  <table class="table table-striped table-sm col-md-12">
                    <thead>
                      <tr>
                        <th>Razão Social</th>
                         <th>Cnpj</th>
                        <th>Contato</th>
                        <th>E-mail</th>
                        <th>Endereço</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($rows = array_shift($loja)){?>
              			  <tr>
                        <td><?= $rows->getRazao();?></td>
                         <td><?= $rows->getCnpj();?></td>
                        <td><?= $rows->getFone();?></td>
                        <td><?= $rows->getEmail();?></td>
                        <td><?= $rows->getEndereco();?></td>
                        <td id="btn-loja">
                        <a href="loja.php?idLoja=<?= $rows->getIdLoja();?>">
                      <button class="btn btn-success btn-sm">Alterar</button></a>
                        <a href="../Controller/delete_loja.php?idLoja=<?= $rows->getIdLoja();?>">
                      <button class="btn btn-success btn-sm">Deletar</button></a>
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
