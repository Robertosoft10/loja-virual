<?php 
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
$usuario = $_SESSION['idUser'];
include_once '../Private/conexao.php';
$sql = "SELECT * FROM tb_loja";
$consulta = mysqli_query($conexao, $sql);
$rows = mysqli_fetch_assoc($consulta);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $rows['razao'];?></title>
    <!-- Css Styles -->
    <link rel="stylesheet" href="../Components/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../Components/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../Components/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="../Components/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../Components/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../Components/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../Components/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../Components/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../Components/css/style.css" type="text/css">
    <link rel="stylesheet" href="../Components/style.css" type="text/css">
</head>
   <script>
      window.setTimeout(function() {
         $(".alert").fadeTo(500, 0).slideUp(500, function(){
             $(this).remove();
         });
     }, 6000);
    </script>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top" id="nav-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                     <?= $rows['email'];?>
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        <?= $rows['fone'];?>
                    </div>
                </div>
                <div class="ht-right">
                    <div class="link-login">
                        <?php if(isset($_SESSION['username'])){?>
                      <small id="link-topo"> Olá: <?= $_SESSION['username'];?> </small>
                        <a id="link-topo" href="../Private/logout_site.php"><i class="fa fa-sign-out"></i> Sair</a>
                    <?php } else{?>
                       <a id="link-topo" href="login.php"><i class="fa fa-sign-in"></i> Login</a>
                       <a id="link-topo" href="register_user.php"><i class="fa fa-edit"></i> Cadastrar - se </a>
                   <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo" id="logo-site">
                             <?= $rows['razao'];?>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="my_cart.php">
                                    <button class="btn primary-btn">
                                    <i class="fa fa-shopping-cart"></i> Meu Carrinho</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                         <i class="fa fa-cubes"></i>
                        <span>Categorias</span>
                        <ul class="depart-hover">
                            <li><a href="itens_femin_list.php">Feminino</a></li>
                            <li class="active"><a href="itens_masc_list.php">Masculino</a></li>
                            
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                      <li><a href="/../loja-virtual/index.php">
                        <i class="fa fa-home"></i> Início</a></li>
                        <li><a href="itens_list.php">
                        <i class="fa fa-tags"></i> Itens</a></li>
                        <li><a href="contact.php">
                        <i class="fa fa-phone"></i> Fale Conosco</a></li>
                        <li><a href="#"><i class="fa fa-plus"></i> Mais</a>
                            <ul class="dropdown">
                                <li><a href="login.php">Login</a></li>
                                <li><a href="register_user.php">Cadastrar - se</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->
   <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                     <?php if($_SESSION['user_login']) { ?>
                    <div class="alert alert-success">
                    <?= $_SESSION['user_login'];?>
                    </div>
                    <?php unset($_SESSION['user_login']); } ?>

                    <?php if($_SESSION['loginVazio']) { ?>
                    <div class="alert alert-danger">
                    <?= $_SESSION['loginVazio'];?>
                    </div>
                    <?php unset($_SESSION['loginVazio']); } ?>

                     <?php if($_SESSION['loginIncorreto']) { ?>
                    <div class="alert alert-danger">
                    <?= $_SESSION['loginIncorreto'];?>
                    </div>
                    <?php unset($_SESSION['loginIncorreto']); } ?>
                    <div class="login-form">
                        <h2>Login</h2>
                        <p class="text-center">SE NÃO TIVER CADASTRO CADASTRE - SE</p>
                        <form action="../Private/autentic_user_site.php" method="post">
                            <div class="group-input">
                                <input type="text" name="user_email" id="username" placeholder="E-mail">
                            </div>
                            <div class="group-input">
                                <input type="password" name="password" id="pass" placeholder="Senha">
                            <button type="submit" class="site-btn login-btn">Entrar</button>
                        </form>
                        <div class="switch-login">
                            <a href="register_user.php" class="or-login">Cadastrar - se</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>
    </div>
      <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;Robertosoft10 - 
<?php 
$hoje = date('Y');
 echo $hoje;?>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="../Components/js/jquery-3.3.1.min.js"></script>
    <script src="../Components/js/bootstrap.min.js"></script>
    <script src="../Components/js/jquery-ui.min.js"></script>
    <script src="../Components/js/jquery.countdown.min.js"></script>
    <script src="../Components/js/jquery.nice-select.min.js"></script>
    <script src="../Components/js/jquery.zoom.min.js"></script>
    <script src="../Components/js/jquery.dd.min.js"></script>
    <script src="../Components/js/jquery.slicknav.js"></script>
    <script src="../Components/js/owl.carousel.min.js"></script>
    <script src="../Components/js/main.js"></script>
</body>

</html>