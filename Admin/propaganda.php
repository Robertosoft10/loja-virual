<?php
session_start();
include_once '../Private/secury.php';
require_once '../Dao/propagDao.php';
$propgDAO = new PropgDAO();
$propg = $propgDAO->listPropg();

if(isset($_GET['idProp'])){
    $idProp = $_GET['idProp'];
    $rowPropg = $propgDAO->riquestPropg($idProp);
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
                  
                <?php if(isset($_SESSION ['propNaoSalvo'])){?>
                <div class="alert alert-danger" role="alert">
                <?= $_SESSION ['propNaoSalvo'];?>
                </div>
                <?php unset($_SESSION ['propNaoSalvo']); } ?>

                <?php if(isset($_SESSION ['propSalvo'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['propSalvo'];?>
                </div>
                <?php unset($_SESSION ['propSalvo']); } ?>

                <?php if(isset($_SESSION ['propoNaoAtualizado'])){?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION ['propoNaoAtualizado'];?>
                </div>
                <?php unset($_SESSION ['propoNaoAtualizado']); } ?>

                <?php if(isset($_SESSION ['propAtualizado'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['propAtualizado'];?>
                </div>
                <?php unset($_SESSION ['propAtualizado']); } ?>

                <?php if(isset($_SESSION ['propNaoRemovido'])){?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION ['propNaoRemovido'];?>
                </div>
                 <?php unset($_SESSION ['propNaoRemovido']); } ?>

                <?php if(isset($_SESSION ['propRemovido'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['propRemovido'];?>
                </div>
                <?php unset($_SESSION ['propRemovido']); } ?>

                <?php if(isset($_SESSION ['fotoNaoAlterada'])){?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION ['fotoNaoAlterada'];?>
                </div>
                <?php unset($_SESSION ['fotoNaoAlterada']); } ?>

                <?php if(isset($_SESSION ['fotoAlterada'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['fotoAlterada'];?>
                </div>
                <?php unset($_SESSION ['fotoAlterada']); } ?>

                <!-- ============= alerts feminino =======-->
                 <?php if(isset($_SESSION ['propFNaoSalvo'])){?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION ['propFNaoSalvo'];?>
                </div>
                <?php unset($_SESSION ['propFNaoSalvo']); } ?>

                 <?php if(isset($_SESSION ['propFSalvo'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['propFSalvo'];?>
                </div>
                <?php unset($_SESSION ['propFSalvo']); } ?>

                 <?php if(isset($_SESSION ['propFNaoRemovido'])){?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION ['propFNaoRemovido'];?>
                </div>
                <?php unset($_SESSION ['propFNaoRemovido']); } ?>

                 <?php if(isset($_SESSION ['propFRemovido'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['propFRemovido'];?>
                </div>
                <?php unset($_SESSION ['propFRemovido']); } ?>

                <?php if(isset($_SESSION ['imgFaNaoAtualiza'])){?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION ['imgFaNaoAtualiza'];?>
                </div>
                <?php unset($_SESSION ['imgFaNaoAtualiza']); } ?>

                 <?php if(isset($_SESSION ['imgFaAtualiza'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['imgFaAtualiza'];?>
                </div>
                <?php unset($_SESSION ['imgFaAtualiza']); } ?>


                 <?php if(isset($_SESSION ['propFNaoAtualiza'])){?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION ['propFNaoAtualiza'];?>
                </div>
                <?php unset($_SESSION ['propFNaoAtualiza']); } ?>

                 <?php if(isset($_SESSION ['propFAtualiza'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['propFAtualiza'];?>
                </div>
                <?php unset($_SESSION ['propFAtualiza']); } ?>
                 <!-- ============= alerts masculino =======-->
                 <?php if(isset($_SESSION ['propMNaoSalvo'])){?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION['propMNaoSalvo'];?>
                </div>
                <?php unset($_SESSION ['propMNaoSalvo']); } ?>

                 <?php if(isset($_SESSION['propMSalvo'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION['propMSalvo'];?>
                </div>
                <?php unset($_SESSION['propMSalvo']); } ?>

                 <?php if(isset($_SESSION ['propMNaoAtualiza'])){?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION['propMNaoAtualiza'];?>
                </div>
                <?php unset($_SESSION ['propMNaoAtualiza']); } ?>

                 <?php if(isset($_SESSION['propMAtualiza'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION['propMAtualiza'];?>
                </div>
                <?php unset($_SESSION['propMAtualiza']); } ?>

                 <?php if(isset($_SESSION ['imgMascNaoAtualiza'])){?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION['imgMascNaoAtualiza'];?>
                </div>
                <?php unset($_SESSION ['imgMascNaoAtualiza']); } ?>

                 <?php if(isset($_SESSION['imgMascAtualiza'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION['imgMascAtualiza'];?>
                </div>
                <?php unset($_SESSION['propMNaoRemovido']); } ?>

                <?php if(isset($_SESSION ['propMNaoRemovido'])){?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION['propMNaoRemovido'];?>
                </div>
                <?php unset($_SESSION ['imgMascNaoAtualiza']); } ?>

                 <?php if(isset($_SESSION['propMRemovido'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION['propMRemovido'];?>
                </div>
                <?php unset($_SESSION['propMRemovido']); } ?>



              <?php if(!isset($_GET['idProp'])){?>
                <h4 class="mb-3">Propaganda Principal</h4>
                <form class="needs-validation" action="../Controller/insert_propg.php" method="post"  enctype="multipart/form-data">
                
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="primeiroNome">Mensagem: *</label>
                        <input type="text" name="mensagem" class="form-control" id="primeiroNome">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="primeiroNome">Propaganda: *</label>
                        <input type="text" name="propaganda" class="form-control" id="primeiroNome">
                      </div>
                       <div class="col-md-4 mb-3">
                        <label for="primeiroNome">Desconto: </label>
                        <input type="text" name="desconto" class="form-control" id="primeiroNome">
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="primeiroNome">Imagem Principal: *</label>
                        <input type="file" name="imagem_site" class="form-control" id="primeiroNome">
                      </div>
                      </div>
                    <hr class="mb-4">
                    <button class="btn btn-success col-md-4" type="submit">Salvar Dados</button>
				           </form>
                 <?php }else{?>
                   <h4 class="mb-3">Alterar dados da Propagnada</h4>
                   <form class="needs-validation" action="../Controller/update_propg.php?idProp=<?= $rowPropg->getIdProp();?>"  method="post">
                     <div class="row">
                     <div class="col-md-4 mb-3">
                        <label for="primeiroNome">Mensagem: </label>
                        <input type="text" name="mensagem" class="form-control" id="primeiroNome" value="<?= $rowPropg->getMensagem();?>">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="primeiroNome">Propaganda: </label>
                        <input type="text" name="propaganda" class="form-control" id="primeiroNome" value="<?= $rowPropg->getPropaganda();?>">
                      </div>
                       <div class="col-md-4 mb-3">
                        <label for="primeiroNome">Desconto: </label>
                        <input type="text" name="desconto" class="form-control" id="primeiroNome" value="<?= $rowPropg->getDesconto();?>">
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
                <h2>Dados da Propaganda Principal</h2>
      		      <div class="col-md-12 order-md-1">
                <div class="table-responsive">
                  <table class="table table-striped table-sm col-md-12">
                    <thead>
                      <tr>
                        <th>Mensagem</th>
                        <th>Propaganda</th>
                        <th>Desconto</th>
                        <th>Imagem</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($rows = array_shift($propg)){?>
              			  <tr>
                        <td><?= $rows->getMensagem();?></td>
                        <td><?= $rows->getPropaganda();?></td>
                        <td><?= $rows->getDesconto();?></td>
                        <td>
                        <img src="<?= "../Images/loja/". $rows->getImagem_site();?>"  id="img-detalhe">
                            
                            </td>
                        <td>
                      <a href="propaganda.php?idProp=<?= $rows->getIdProp();?>">
                      <button class="btn btn-success btn-sm">Alterar Dados</button></a><br><br>
                        <a href="../Controller/delete_propag.php?idProp=<?= $rows->getIdProp();?>">
                      <button class="btn btn-success btn-sm">Deletar Dados</button></a><br><br>
                      <form action="../Controller/update_imagem_propg.php?idProp=<?= $rows->getIdProp();?>" method="post"  enctype="multipart/form-data">
                      Alterar Imagem
                      <input type="file" name="imagem_site" class="form-control" id="primeiroNome">
                      <br><button class="btn btn-success  btn-sm">Salvar Alterações</button>
                      </form>
      				          </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- ==================  propaganda feminina =====-->
                <?php 
                require_once '../Dao/propagDaoFemin.php';
                  $propgFeminDAO = new PropgFeminDAO();
                  $propgFemin = $propgFeminDAO->listPropgFemin();

                if(isset($_GET['idProFemin'])){
                      $idProFemin = $_GET['idProFemin'];
                      $rowPropgFemin = $propgFeminDAO->riquestPropgFemin($idProFemin);
                  }
                  ?>

                  <?php if(!isset($_GET['idProFemin'])){?>
                  <h4 class="mb-3">Propaganda Feminina</h4>
                  <form class="needs-validation" action="../Controller/insert_propg_femin.php" method="post"  enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="primeiroNome">Titulo: *</label>
                        <input type="text" name="titulo" class="form-control" id="primeiroNome">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="primeiroNome">Imagem: *</label>
                        <input type="file" name="imagem_femin" class="form-control" id="primeiroNome">
                      </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-success col-md-4" type="submit">Salvar Dados</button>
                   </form>
                 <?php }else{?>
                  <h4 class="mb-3">Alterar dados da Propaganda Feminina</h4>
                  <form class="needs-validation" action="../Controller/update_propg_femin.php?idProFemin=<?= $rowPropgFemin->getIdProFemin();?>" method="post">
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="primeiroNome">Titulo: </label>
                        <input type="text" name="titulo" class="form-control" id="primeiroNome" value="<?=  $rowPropgFemin->getTitulo();?>">
                      </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-success col-md-4" type="submit">Salvar Alterações</button>
                   </form>
                 <?php } ?>
                <div class="row">
                <h2>Dados da Propaganda Feminimna</h2>
                <div class="col-md-12 order-md-1">
                <div class="table-responsive">
                  <table class="table table-striped table-sm col-md-12">
                    <thead>
                      <tr>
                        <th>Título</th>
                        <th>Imagem</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($rows_femin = array_shift($propgFemin)){?>
                      <tr>
                        <td><?= $rows_femin->getTitulo();?></td>
                        <td>
                        <img src="<?= "../Images/femin/". $rows_femin->getImagem_femin();?>"  id="img-detalhe">
                            
                            </td>
                        <td>
                      <a href="propaganda.php?idProFemin=<?= $rows_femin->getIdProFemin();?>">
                      <button class="btn btn-success btn-sm">Alterar Dados</button></a><br><br>
                        <a href="../Controller/delete_propag_femin.php?idProFemin=<?= $rows_femin->getIdProFemin();?>">
                      <button class="btn btn-success btn-sm">Deletar Dados</button></a><br><br>
                      <form action="../Controller/update_imagem_propg_femin.php?idProFemin=<?= $rows_femin->getIdProFemin();?>" method="post"  enctype="multipart/form-data">
                      Alterar Imagem
                      <input type="file" name="imagem_femin" class="form-control" id="primeiroNome" required="">
                      <br><button class="btn btn-success  btn-sm">Salvar Alterações</button>
                      </form>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- ===== propaganda masculino ===-->
                 <?php 
                require_once '../Dao/propagDaoMasc.php';
                  $propgMascDAO = new PropgMascDAO();
                  $propgMasc = $propgMascDAO->listPropgMasc();

                  if(isset($_GET['idProMasc'])){
                      $idProMasc = $_GET['idProMasc'];
                      $rowPropgMasc = $propgMascDAO->riquestPropgMasc($idProMasc);
                  }
                  ?>
                  <?php if(!isset($_GET['idProMasc'])){?>
                 <h4 class="mb-3">Propaganda Masculino</h4>
                  <form class="needs-validation" action="../Controller/insert_propg_masc.php" method="post"  enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="primeiroNome">Titulo: *</label>
                        <input type="text" name="titulo" class="form-control" id="primeiroNome">
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="primeiroNome">Imagem: *</label>
                        <input type="file" name="imagem_masc" class="form-control" id="primeiroNome">
                      </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-success col-md-4" type="submit">Salvar Dados</button>
                   </form>
                 <?php } else{?>
                  <h4 class="mb-3">Alterar dados da Propaganda Masculino</h4>
                  <form class="needs-validation" action="../Controller/update_propg_masc.php?idProMasc=<?= $rowPropgMasc->getidProMasc();?>" method="post">
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="primeiroNome">Titulo: </label>
                        <input type="text" name="titulo" class="form-control" id="primeiroNome" value="<?= $rowPropgMasc->getTitulo();?>">
                      </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-success col-md-4" type="submit">Salvar Alerações</button>
                   </form>
                 <?php }?>
                 <div class="row">
                <h2>Dados da Propaganda Masculino</h2>
                <div class="col-md-12 order-md-1">
                <div class="table-responsive">
                 <table class="table table-striped table-sm col-md-12">
                    <thead>
                      <tr>
                        <th>Título</th>
                        <th>Imagem</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($rows_masc = array_shift($propgMasc)){?>
                      <tr>
                        <td><?= $rows_masc->getTitulo();?></td>
                        <td>
                        <img src="<?= "../Images/masc/". $rows_masc->getImagem_masc();?>"  id="img-detalhe">
                            
                            </td>
                        <td>
                      <a href="propaganda.php?idProMasc=<?= $rows_masc->getIdProMasc();?>">
                      <button class="btn btn-success btn-sm">Alterar Dados</button></a><br><br>
                        <a href="../Controller/delete_propag_masc.php?idProMasc=<?= $rows_masc->getIdProMasc();?>">
                      <button class="btn btn-success btn-sm">Deletar Dados</button></a><br><br>
                      <form action="../Controller/update_imagem_propg_masc.php?idProMasc=<?= $rows_masc->getIdProMasc();?>" method="post"  enctype="multipart/form-data">
                      Alterar Imagem
                      <input type="file" name="imagem_masc" class="form-control" id="primeiroNome"  required="">
                      <br><button class="btn btn-success  btn-sm">Salvar Alterações</button>
                      </form>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
              </main>
            </div>
              </main>
            </div>
            
              </main>
            </div>
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
