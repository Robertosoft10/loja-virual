<?php 
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
$usuario = $_SESSION['idUser'];
include_once '../Private/conexao.php';
$sql = "SELECT * FROM tb_loja";
$consulta = mysqli_query($conexao, $sql);
$rows = mysqli_fetch_assoc($consulta);

$sql = "SELECT * FROM tb_pedidos  WHERE user='$usuario'";
$consulta = mysqli_query($conexao, $sql);
$rows_ped = mysqli_fetch_assoc($consulta);
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
    <!-- Product Shop Section Begin -->
   <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                     <?php if($_SESSION['pedOk']) { ?>
                    <div class="alert alert-success">
                    <?= $_SESSION['pedOk'];?>
                    </div>
                    <?php unset($_SESSION['pedOk']); } ?>

                     <?php if($_SESSION['vendaErro']) { ?>
                    <div class="alert alert-danger">
                    <?= $_SESSION['vendaErro'];?>
                    </div>
                    <?php unset($_SESSION['vendaErro']); } ?>
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Finalizar Compra</h4>
                            <p id="valor-compra">Valor da Compra: R$ 
                                <?= number_format($rows_ped['valor_pedido'],2 , ',','.');?> </p>
                            <form action="../Controller/insert_compra.php?usuario_login=<?= $usuario;?>" class="comment-form" method="post">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Informe seu endereço" required>
                                    </div>
                                     <div class="col-lg-3">
                                        <input type="number" class="form-control" id="tefefone" name="telefone" placeholder="Informe seu Telefone" required>
                                    </div>
                                    <div class="col-lg-3">
                                         <input type="number" class="form-control" id="cep" name="cep"  placeholder="Cep do endereço" required>
                                    </div>
                                    <div class="col-lg-4" id="novo-campo">
                                        <input type="number" class="form-control" id="parcelas" name="parcelas" placeholder="Total de parcelas até 10" required>
                                    </div>
                                    <div class="col-lg-5">
                                    Forma de Pagamento: <br><button id="boleto" class="btn primary-btn" type="button">
                                    <i class="fa fa-barcode"></i> Boleto</button>
                                    <button id="cartao" class="btn primary-btn" type="button">
                                    <i class="fa fa-credit-card"></i> Cartão</button>
                                </div>
                                    <div class="col-lg-">
                                        <button type="submit" class="site-btn">
                                        <i class="fa fa-save"></i>  Finalizar Compra</button>
                                         <button type="reset" onClick='parent.location="javascript:location.reload()"' class="site-btn">
                                        <i class="fa fa-refresh"></i> Mudar Forma de Pagamento</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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

    <script>
  $( "#cartao" ).click(function() {
    $( "#novo-campo" ).append( '<input type="text" name="nomeCartao" class="form-control" id="primeiroNome"  placeholder="Nome do cartão *"  required> <br><input type="number" name="numeroCartao" class="form-control" id="primeiroNome"  placeholder="Número do cartão *"  required> ');
  });
  </script>
  <script>
  $( "#boleto" ).click(function() {
    $( "#novo-campo" ).append( '<br><input type="number" name="cpf" class="form-control" id="primeiroNome"  placeholder="Informe seu CPF *" required>');
  });
  </script>
</body>

</html>