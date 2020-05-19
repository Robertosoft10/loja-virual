<?php 
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
$usuario = $_SESSION['idUser'];
include_once 'Private/conexao.php';
$sql = "SELECT * FROM tb_loja";
$consulta = mysqli_query($conexao, $sql);
$rows = mysqli_fetch_assoc($consulta);

$sql = "SELECT * FROM tb_propaganda";
$consulta = mysqli_query($conexao, $sql);
$rows_propg = mysqli_fetch_assoc($consulta);

$sql = "SELECT * FROM tb_itens WHERE sexo = 'F'";
$consult_femin = mysqli_query($conexao, $sql);

$sql = "SELECT * FROM tb_itens WHERE sexo = 'M'";
$consult_masc = mysqli_query($conexao, $sql);
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
    <link rel="stylesheet" href="Components/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="Components/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="Components/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="Components/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="Components/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="Components/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="Components/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="Components/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="Components/css/style.css" type="text/css">
    <link rel="stylesheet" href="Components/style.css" type="text/css">
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
                        <a id="link-topo" href="Private/logout_site.php"><i class="fa fa-sign-out"></i> Sair</a>
                    <?php } else{?>
                       <a id="link-topo" href="View/login.php"><i class="fa fa-sign-in"></i> Login</a>
                       <a id="link-topo" href="View/register_user.php"><i class="fa fa-edit"></i> Cadastrar - se </a>
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
                                <?php if(!isset($_SESSION['username'])){?>
                                <a href="View/login.php">
                                    <button class="btn primary-btn">
                                    <i class="fa fa-shopping-cart"></i> Meu Carrinho</button>
                                </a>
                            <?php } else{?>
                                 <a href="View/my_cart.php?usuario=<?= $usuario;?>">
                                    <button class="btn primary-btn">
                                    <i class="fa fa-shopping-cart"></i> Meu Carrinho</button>
                                </a>
                            <?php }?>
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
                            <li><a href="View/itens_femin_list.php">Feminino</a></li>
                            <li class="active"><a href="View/itens_masc_list.php">Masculino</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="index.php">
                        <i class="fa fa-home"></i> Início</a></li>
                        <li><a href="View/itens_list.php">
                        <i class="fa fa-tags"></i> Itens</a></li>
                        <li><a href="View/contact.php">
                        <i class="fa fa-phone"></i> Fale Conosco</a></li>
                        <li><a href="#"><i class="fa fa-plus"></i> Mais</a>
                            <ul class="dropdown">
                                <li><a href="View/login.php">Login</a></li>
                                <li><a href="View/register_user.php">Cadastrar - se</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Hero Section Begin -->
    <section class="hero-section">
    <?php if($_SESSION['vendaOk']) { ?>
    <div class="alert alert-success">
    <?= $_SESSION['vendaOk'];?>
    </div>
    <?php unset($_SESSION['vendaOk']); } ?>
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="<?= "Images/loja/".$rows_propg['imagem_site'];?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span id="msg-index"><?= $rows_propg['mensagem'];?></span>
                            <h1  id="propg-index"><?= $rows_propg['propaganda'];?></h1>
                        </div>
                    </div>
                    <div class="off-card"  id="desc-index">
                        <h2><?= $rows_propg['desconto'];?></h2>
                    </div>
                </div>
            </div>
    </section>
    <hr>
    <!-- Hero Section End -->
    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <?php
                $sql = "SELECT * FROM tb_propaganda_femin";
                $consult_img_femin = mysqli_query($conexao, $sql);
                $row_img_femin = mysqli_fetch_assoc($consult_img_femin);
                ?> 
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="<?= "Images/femin/".$row_img_femin['imagem_femin'];?>">
                        <h2 id="title-img-prop"><?= $row_img_femin['titulo'];?></h2>
                        <a href="View/itens_femin_list.php">
                        <button class="btn primary-btn">
                        <i class="fa fa-plus"></i> Mais</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="product-slider owl-carousel">
                    <?php  while($rows_femin = mysqli_fetch_array($consult_femin)){?>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?= "Images/itens/".$rows_femin['imagem'];?>" alt="">
                                <ul>
                                    <li class="w-icon active"><a href="View/cart.php"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li class="quick-view"><a href="View/cart.php?acao=adItem&idItem=<?= $rows_femin['idItem'];?>"> Comprar</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name" id="nome-item"><?= $rows_femin['nome_item'];?></div>
                                <a href="">
                                    <h5><?= $rows_femin['descricao'];?></h5>
                                </a>
                                <div class="product-price">R$ 
                                    <?= number_format($rows_femin['preco'], 2, ',', '.');?>
                                    <span>R$ <?= number_format($rows_femin['valor'], 2, ',', '.');?></span>
                                </div>
                            </div>
                        </div>
                        <!-- ================== fim da imagem =============== -->
                    <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->
    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-slider owl-carousel">
                        <?php  while($rows_masc = mysqli_fetch_array($consult_masc)){?>
                        <div class="product-item">
                            <div class="pi-pic">
                               <img src="<?= "Images/itens/".$rows_masc['imagem'];?>" alt="">
                                <ul>
                                   <li class="w-icon active"><a href="View/cart.php"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li class="quick-view"><a href="View/cart.php?acao=adItem&idItem=<?= $rows_masc['idItem'];?>"> Comprar</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"  id="nome-item"><?= $rows_masc['nome_item']?></div>
                                <a href="">
                                    <h5><?= $rows_masc['descricao']?></h5>
                                </a>
                                <div class="product-price">
                                    R$ <?= number_format($rows_masc['preco'], 2, ',', '.');?>
                                    <span> R$ <?= number_format($rows_masc['valor'], 2, ',', '.')?></span>
                                </div>
                            </div>
                        </div>
                        <!-- ================== fim da imagem =============== -->
                    <?php } ?>
                    </div>
                </div>
                <?php
                $sql = "SELECT * FROM tb_propaganda_masc";
                $consult_img_masc = mysqli_query($conexao, $sql);
                $row_img_masc = mysqli_fetch_assoc($consult_img_masc);
                ?> 
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="<?= "Images/masc/".$row_img_masc['imagem_masc'];?>">
                        <h3  id="title-img-prop"><?= $row_img_masc['titulo'];?></h3>
                       <a href="View/itens_masc_list.php">
                        <button class="btn primary-btn">
                        <i class="fa fa-plus"></i> Mais</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->


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
    <script src="Components/js/jquery-3.3.1.min.js"></script>
    <script src="Components/js/bootstrap.min.js"></script>
    <script src="Components/js/jquery-ui.min.js"></script>
    <script src="Components/js/jquery.countdown.min.js"></script>
    <script src="Components/js/jquery.nice-select.min.js"></script>
    <script src="Components/js/jquery.zoom.min.js"></script>
    <script src="Components/js/jquery.dd.min.js"></script>
    <script src="Components/js/jquery.slicknav.js"></script>
    <script src="Components/js/owl.carousel.min.js"></script>
    <script src="Components/js/main.js"></script>
</body>

</html>