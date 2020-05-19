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
    <link href="Admin/Css/style.css" rel="stylesheet">

  </head>
<body>
<div class="container" >
</div>
</div>
        <div class="container col-lg-4 col-xs-4" id="login">
            <strong>Administrativo</strong>
            <hr>
            <?php if(isset($_SESSION ['userCdastroErro'])){?>
            <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION ['userCdastroErro'];?>
            </div>
            <?php unset($_SESSION ['userCdastroErro']); } ?>
            <form action="Controller/insert_user_primary.php" method="post">
                <fieldset>
                        <div class="form-group col-lg-12 col-xs-12">
                          <legend>Usuário do Administrador</legend>
                          Nome de Usuário:
                        <input type="text" class="form-control" id="nome_user" name="nome_user" required="">
                        </div>
                        <div class="form-group col-lg-12 col-xs-12">
                        E-mail do Usuário:
                        <input type="text" class="form-control" id="email_user" name="email_user" required="">
                        </div>
                        <div class="form-group col-lg-12 col-xs-12">
                        Senha de Usuário:
                        <input type="password" class="form-control" id="senha_user" name="senha_user" required="">
                        </div>
                        <div class="form-group col-lg-12 col-xs-12">
                        Nível:
                        <select type="text" class="form-control" id="nivel_user" name="nivel_user" required="">
                        <option></option>
                        <option value="1">Administrador</option>
                        <option value="2">Usuário comum</option>
                        </select>    
                    </div>
                        <div class="form-group col-lg-12 col-xs-12">
						<button id="btn-login"  type="submit" class="btn btn-success col-xs-12"> Salvar</button>
                      </div>
                </fieldset>
            </form>
        </div>
        </div>
    </div>
</div>

</body>
</html>
