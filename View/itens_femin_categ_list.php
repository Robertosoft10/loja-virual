<?php 
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
$usuario = $_SESSION['idUser'];
include_once '../Private/conexao.php';
$sql = "SELECT * FROM tb_loja";
$consulta = mysqli_query($conexao, $sql);
$rows = mysqli_fetch_assoc($consulta);


$page_primary = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
$page = (!empty($page_primary)) ? $page_primary : 1;
$quant_page_res = 6;
$ini = ($quant_page_res * $page) - $quant_page_res; 
$categ_item = $_GET['categ_item'];
$sql = "SELECT * FROM tb_itens T_I JOIN tb_categorias T_C ON T_I.categ_item = T_C.idCateg WHERE categ_item = '$categ_item' AND sexo = 'F'  LIMIT $ini, $quant_page_res";
$consult = mysqli_query($conexao, $sql);
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
                        <span>Subcategorias</span>
                        <ul class="depart-hover">
                        <?php 
                        $sql = "SELECT * FROM tb_itens  T_IT JOIN tb_categorias T_CT ON T_IT.categ_item = T_CT.idCateg WHERE sexo = 'F'";
                        $consult_sub = mysqli_query($conexao, $sql);
                        while($rows_sub = mysqli_fetch_array($consult_sub)){
                        ?>
                        <li><a href="itens_femin_categ_list.php?categ_item=<?= $rows_sub['categ_item'];?>"><?= $rows_sub['categoria'];?></a></li>
                        <?php } ?>
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
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categorias</h4>
                        <ul class="filter-catagories">
                            <li><a href="itens_femin_list.php">Feminino</a></li>
                            <li><a href="itens_masc_list.php">Masculino</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">
                             <?php while($rows = mysqli_fetch_array($consult)){?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="<?= "../Images/itens/".$rows['imagem'];?>" alt="">
                                        <ul>
                                            <li class="w-icon active">
                                            <a href="cart.php?acao=adItem&idItem=<?= $rows['idItem'];?>">
                                            <i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                            <li class="quick-view">
                                            <a href="cart.php?acao=adItem&idItem=<?= $rows['idItem'];?>">Comprar</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"  id="nome-item"><?= $rows['nome_item'];?></div>
                                        <a href="">
                                            <h5><?= $rows['descricao'];?></h5>
                                        </a>
                                        <div class="product-price">
                                            R$ <?= number_format($rows['preco'], 2, ',', '.');?>
                                            <span>R$ <?= number_format($rows['valor'], 2, ',', '.');?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============== fim da imagem =============== -->
                        <?php } ?>

                </div>
                
        </div>
        <div class="col-lg-12 text-center">
                    <?php
                    $sql = "SELECT COUNT(idItem) AS num_result FROM tb_itens WHERE sexo = 'F'";
                    $consult_page = mysqli_query($conexao, $sql);
                    $rows_page = mysqli_fetch_assoc($consult_page);
                    $quant_page = ceil($rows_page['num_result'] / $quant_page_res);
                    $max_links = 9;
                    echo "<nav aria-label='Navegação de página exemplo'>
                    <ul class='pagination'>
                    <li class='page-item'>
                    <a class='page-link btn primary-btn' href='itens_list.php?pagina=1' aria-label='Anterior'>
                    <span aria-hidden='true'>&laquo; Anterior</span>
                    <span class='sr-only'>Anterior</span>
                </a>
                </li>";
                    for($page_previous = $page - $max_links; $page_previous <= $page - 1; $page_previous++){
                        if($page_previous >= 1){
                            echo "<li class='page-item'><a class='page-link' href='itens_femin_list.php?page=$page_previous'>$page_previous</a></li>";
                        }
                    }
                    echo "<li class='page-item'><a id='btn-paginacao' class='btn btn-default'>$page</a></li>";
                    for($page_next = $page + 1; $page_next <= $page + $max_links; $page_next++){
                        if($page_next <= $quant_page){
                        echo "<li class='page-item'><a class='page-link' href='itens_femin_list.php?page=$page_next'>$page_next</a></li>";
                        }
                    }
                echo "<li class='page-item'><a class='page-link btn primary-btn' href='itens_femin_list.php?page=$quant_page' aria-label='Próximo'>
                <span aria-hidden='true'>&raquo; Próximo</span>
                <span class='sr-only'>Próximo</span>
                    </a>
                    </li>
                    </ul>
                    </nav>";?>
                </div>
            </div>
    </section>

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