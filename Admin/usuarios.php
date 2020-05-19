<?php
session_start();
include_once '../Private/secury.php';
require_once '../Dao/usuarioDao.php';
$usuarioDAO = new UsuarioDAO();
$usuario = $usuarioDAO->listUsuario();

if(isset($_GET['idUser'])){
    $idUser = $_GET['idUser'];
    $rowUsuario = $usuarioDAO->riquestUsuario($idUser);
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
        <div class="col-md-12 order-md-1">
                  <h4 class="mb-3">Usuários</h4>
                  <?php if(isset($_SESSION ['user_Admin_existe'])){?>
                  <div class="alert alert-danger" role="alert">
                    <?= $_SESSION ['user_Admin_existe'];?>
                  </div>
                <?php unset($_SESSION ['user_Admin_existe']); } ?>


                  <?php if(isset($_SESSION ['userNaoSalvo'])){?>
                  <div class="alert alert-danger" role="alert">
                    <?= $_SESSION ['userNaoSalvo'];?>
                  </div>
                <?php unset($_SESSION ['userNaoSalvo']); } ?>

                <?php if(isset($_SESSION ['userSalvo'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['userSalvo'];?>
                </div>
               <?php unset($_SESSION ['userSalvo']); } ?>

                <?php if(isset($_SESSION ['userNaoAtualiza'])){?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION ['userNaoAtualiza'];?>
                </div>
                <?php unset($_SESSION ['userNaoAtualiza']); } ?>

                <?php if(isset($_SESSION ['userAtualiza'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['userAtualiza'];?>
                </div>
                <?php unset($_SESSION ['userAtualiza']); } ?>

                <?php if(isset($_SESSION ['userNaoRemovido'])){?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION ['userNaoRemovido'];?>
                </div>
                <?php unset($_SESSION ['userNaoRemovido']); } ?>

                <?php if(isset($_SESSION ['userRemovido'])){?>
                <div class="alert alert-success" role="alert">
                  <?= $_SESSION ['userRemovido'];?>
                </div>
                <?php unset($_SESSION ['userRemovido']); } ?>

                 <?php if(!isset($_GET['idUser'])){?>
                  <form class="needs-validation" action="../Controller/insert_user_admin.php"  method="post">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="primeiroNome">Usuário: *</label>
                        <input type="text" name="nome_user" class="form-control" id="primeiroNome" required="">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="primeiroNome">E-mail: *</label>
                        <input type="email" name="email_user" class="form-control" id="primeiroNome" required="">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="primeiroNome">senha: *</label>
                        <input type="password" name="senha_user" class="form-control" id="primeiroNome" required="">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="primeiroNome">Nível: *</label>
                        <select type="text" name="nivel_user" class="form-control" id="primeiroNome"  required="">
                        <option></option>
                        <option value="1">Administrador</option>
                        <option value="2">Usuário comum</option>
                        </select>
                      </div>
                      </div>
                    <hr class="mb-4">
                    <button class="btn btn-success col-md-4" type="submit">Salvar Usuário</button>
				           </form>
                 <?php } else{?>
                     <h4 class="mb-3">Alterar dados do Usuário</h4>
                   <form class="needs-validation" action="../Controller/update_user_admin.php?idUser=<?= $rowUsuario->getIdUser();?>" method="post">
                     <div class="row">
                       <div class="col-md-6 mb-3">
                         <label for="primeiroNome">Usuário: </label>
                         <input type="text" name="nome_user" class="form-control" id="primeiroNome" value="<?= $rowUsuario->getNome_user();?>">
                       </div>
                       <div class="col-md-6 mb-3">
                         <label for="primeiroNome">E-mail: </label>
                         <input type="email" name="email_user" class="form-control" id="primeiroNome" value="<?= $rowUsuario->getEmail_user();?>">
                       </div>
                       <div class="col-md-6 mb-3">
                         <label for="primeiroNome">Digite sua senha atual, ou novoa senha: </label>
                         <input type="password" name="senha_user" class="form-control" id="primeiroNome" required="">
                       </div>
                       <div class="col-md-6 mb-3">
                         <label for="primeiroNome">Nível: </label>
                         <select type="number" name="nivel_user" class="form-control" id="primeiroNome">
                         <option value="<?= $rowUsuario->getNivel_user();?>">
                           <?php if($rowUsuario->getNivel_user() == 1){
                             $nivel = "Administrador";
                           }else{
                              $nivel = "Usuário comum";
                           }?>
                           <?= $nivel;?></option>
                         <option value="1">Administrador</option>
                         <option value="2">Usuário comum</option>
                         </select>
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
                <h2>Lista de Usuários</h2>
      		  <div class="col-md-12 order-md-1">
                <div class="table-responsive">
                  <table class="table table-striped table-sm col-md-12" id="example">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Usuário</th>
                        <th>E-mail</th>
                        <th>Nível</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($rows = array_shift($usuario)){?>
              			  <tr>
                        <td><?= $rows->getIdUser();?></td>
                        <td><?= $rows->getNome_user();?></td>
                        <td><?= $rows->getEmail_user();?></td>
                        <?php
                        if($rows->getNivel_user() == 1){
                        $nivel = "Administrador";
                      }else{
                         $nivel = "Usuário comum";
                      }?>
                        <td><?= $nivel;?></td>
                        <td>
                        <a href="usuarios.php?idUser=<?= $rows->getIdUser();?>">
                      <button class="btn btn-success btn-sm">Alterar</button></a>
                        <a href="../Controller/delete_user_admin.php?idUser=<?= $rows->getIdUser();?>">
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
