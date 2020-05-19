<?php
session_start();
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
                  <?php if(isset($_SESSION ['itemNaoSalvo'])){?>
                  <div class="alert alert-danger" role="alert">
                    <?= $_SESSION ['itemNaoSalvo'];?>
                  </div>
                  <?php unset($_SESSION ['itemNaoSalvo']); } ?>
                  <?php if(isset($_SESSION ['itemSalvo'])){?>
                  <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['itemSalvo'];?>
                  </div>
                  <?php unset($_SESSION ['itemSalvo']); } ?>

                  <?php if(isset($_SESSION ['itemNaoAtualiza'])){?>
                  <div class="alert alert-danger" role="alert">
                  <?= $_SESSION ['itemNaoAtualiza'];?>
                  </div>
                  <?php unset($_SESSION ['itemNaoAtualiza']); } ?>
                  <?php if(isset($_SESSION ['itemAtualiza'])){?>
                  <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['itemAtualiza'];?>
                  </div>
                  <?php unset($_SESSION ['itemAtualiza']); } ?>


                  <?php if(isset($_SESSION ['itemDeleteErro'])){?>
                  <div class="alert alert-danger" role="alert">
                  <?= $_SESSION ['itemDeleteErro'];?>
                  </div>
                  <?php unset($_SESSION ['itemDeleteErro']); } ?>

                  <?php if(isset($_SESSION ['itemDelete'])){?>
                  <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['itemDelete'];?>
                  </div>
                  <?php unset($_SESSION ['itemDelete']); } ?>
      
                  <?php if(!isset($_GET['idItem'])){?>
                  <form class="needs-validation" action="../Controller/insert_item.php"  method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6 mb-6">
                        <label for="primeiroNome">Item: *</label>
                        <input type="text" name="nome_item" class="form-control" id="primeiroNome">
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="primeiroNome">Preço: *</label>
                        <input type="text" name="preco" class="form-control" id="primeiroNome">
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="primeiroNome">Valor Máximo: </label>
                        <input type="text" name="valor" class="form-control" id="primeiroNome">
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="primeiroNome">Código: *</label>
                        <input type="number" name="codigo" class="form-control" id="primeiroNome">
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="primeiroNome">Sexo: *</label>
                        <select type="text" name="sexo" class="form-control" id="primeiroNome">
                          <option></option>
                          <option value="M">Masculino</option>
                          <option value="F">Feminino</option>
                        </select>
                      </div>
                       <div class="col-md-3 mb-3">
                        <label for="primeiroNome">Categoria: *</label>
                        <select type="text" name="categ_item" class="form-control" id="primeiroNome">
                          <option></option>
                          <?php 
                          require_once '../Dao/categDao.php';
                            $categDAO = new CategDAO();
                            $categs = $categDAO->listCategs();
                            while($rows_categ = array_shift($categs)){?>
                          <option value="<?= $rows_categ->getIdCateg();?>"><?= $rows_categ->getCategoria();?></option>
                        <?php } ?>
                        </select>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="primeiroNome">Imagem: *</label>
                        <input type="file" name="imagem" class="form-control" id="primeiroNome">
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="primeiroNome">Descrição: </label>
                        <textarea type="text" name="descricao" class="form-control" id="primeiroNome">
                        </textarea>
                      </div>
                      </div>
                    <hr class="mb-4">
                    <button class="btn btn-success col-md-4" type="submit">Salvar Intem</button>
				           </form>
                 <?php }else{?>
                     <h4 class="mb-3">Alterar Itens</h4>
                   <form class="needs-validation" action="../Controller/update_item.php?idItem=<?= $rowItem->getIdItem();?>"  method="post">
                     <div class="row">
                       <div class="col-md-9 mb-3">
                         <label for="primeiroNome">Item: </label>
                         <input type="text" name="nome_item" class="form-control" id="primeiroNome"  value="<?php echo $rowItem->getNome_item();?>">
                       </div>
                       <div class="col-md-3 mb-3">
                         <label for="primeiroNome">Preço: </label>
                         <input type="number" name="preco" class="form-control" id="primeiroNome" value="<?= $rowItem->getPreco();?>">
                       </div>
                       <div class="col-md-3 mb-3">
                         <label for="primeiroNome">Valor: </label>
                         <input type="number" name="valor" class="form-control" id="primeiroNome" value="<?= $rowItem->getValor();?>">
                       </div>
                       <div class="col-md-3 mb-3">
                         <label for="primeiroNome">Código: </label>
                         <input type="number" name="codigo" class="form-control" id="primeiroNome"  value="<?= $rowItem->getCodigo();?>">
                       </div>
                      <div class="col-md-3 mb-3">
                        <label for="primeiroNome">Sexo: </label>
                        <select type="text" name="sexo" class="form-control" id="primeiroNome">
                          <option><?= $rowItem->getSexo();?></option>
                          <option value="M">Masculino</option>
                          <option value="F">Feminino</option>
                        </select>
                      </div>
                       <div class="col-md-3 mb-3">
                        <label for="primeiroNome">Categoria: </label>
                        <select type="text" name="categ_item" class="form-control" id="primeiroNome">
                          <option value="<?= $rowCateg['idCateg'];?>"><?= $rowCateg['categoria'];?></option>
                          <?php 
                          require_once '../Dao/categDao.php';
                            $categDAO = new CategDAO();
                            $categs = $categDAO->listCategs();
                            while($rows_categ = array_shift($categs)){?>
                          <option value="<?= $rows_categ->getIdCateg();?>"><?= $rows_categ->getCategoria();?></option>
                        <?php } ?>
                        </select>
                      </div>
                       <div class="col-md-12 mb-3">
                         <label for="primeiroNome">Descrição: </label>
                         <textarea type="text" name="descricao" class="form-control" id="primeiroNome"><?= $rowItem->getDescricao();?>
                         </textarea>
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
                <h2>Lista de Itens</h2>
      		  <div class="col-md-12 order-md-1">
                <div class="table-responsive">
                  <table class="table table-striped table-sm col-md-12" id="example">
                    <thead>
                      <tr>
                        <th >#</th>
                        <th>Item</th>
                        <th>Preço</th>
                        <th>Código</th>
                        <th>Descrição</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($rows = array_shift($itens)){?>
                        <tr>
                        <td><?= $rows->getidItem();?></td>
                        <td><?= $rows->getNome_item();?></td>
                        <td>R$ <?= number_format($rows->getPreco(), 2, ',', '.');?></td>
                        <td  id="descri-item"><?= $rows->getCodigo();?></td>
                        <td  id="descri-item"><?= $rows->getDescricao();?></td>
                        <td id="btn-acao">
                        <a href="detalhe_item.php?idItem=<?= $rows->getidItem();?>">
                      <button class="btn btn-success btn-sm">Detalhe</button></a>
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
