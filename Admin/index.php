<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin loja</title>
    <link href="Css/style.css" rel="stylesheet">

  </head>
  <?php
 unset($_SESSION['email'],
 $_SESSION['senha']);
?>
<body>
<div class="container" >
</div>
</div>
        <div class="container col-lg-4 col-xs-4" id="login">
            <strong>Administrativo</strong>
            <hr>
            <?php if(isset($_SESSION ['loginVazio'])){?>
            <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION ['loginVazio'];?>
            </div>
            <?php unset($_SESSION ['loginVazio']); } ?>

            <?php if(isset($_SESSION ['loginIncorreto'])){?>
            <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION ['loginIncorreto'];?>
            </div>
              <?php unset($_SESSION ['loginIncorreto']); } ?>

            <?php if(isset($_SESSION ['secury'])){?>
            <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION ['secury'];?>
            </div>
            <?php unset($_SESSION ['secury']); } ?>

            <?php if(isset($_SESSION ['userCdastro'])){?>
            <div class="alert alert-success" role="alert">
            <?php echo $_SESSION ['userCdastro'];?>
            </div>
            <?php unset($_SESSION ['userCdastro']); } ?>
            <form action="../Private/autentic_user_admin.php" method="post">
                <fieldset>
                        <div class="form-group col-lg-12 col-xs-12">
                          <legend>Login</legend>
                        <input type="text" class="form-control" id="email" name="email_user" placeholder="E-mail">
                        </div>
                        <div class="form-group col-lg-12 col-xs-12">
                        <input type="password" class="form-control" id="senha" name="senha_user" placeholder="Senha">
                        </div>
                        <div class="form-group col-lg-12 col-xs-12">
						<button id="btn-login"  type="submit" class="btn btn-success col-xs-12"> Entrar</button>
                      </div>
                </fieldset>
            </form>
        </div>
        </div>
    </div>
</div>

</body>
</html>
