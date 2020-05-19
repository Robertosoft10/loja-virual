<?php
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
$usuario = $_SESSION['idUser'];
include_once '../Private/conexao.php';
$sql = "SELECT * FROM tb_loja";
$consulta = mysqli_query($conexao, $sql);
$rows = mysqli_fetch_assoc($consulta);

$sql = "SELECT * FROM tb_loja";
$query = mysqli_query($conexao, $sql);
$rows = mysqli_fetch_assoc($query);

if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = array();
}
if(isset($_GET['acao'])){

  if($_GET['acao'] == 'adItem'){
      $idItem = intval($_GET['idItem']);
      if(!isset($_SESSION['carrinho'][$idItem])){
          $_SESSION['carrinho'][$idItem] = 1;
      }else{
        $_SESSION['carrinho'][$idItem] += 1;
      }
  }

      if($_GET['acao'] == 'atualizarQtd'){
          if(is_array(@$_POST['atualizar'])){
            foreach($_POST['atualizar'] as $idItem => $quantidade) {
              $idItem = intval($idItem);
              $quantidade = intval($quantidade);
              if(!empty($quantProduto) || $quantidade <> 0){
                $_SESSION['carrinho'][$idItem] = $quantidade;
              }else{
                unset($_SESSION['carrinho'][$idItem]);
              }
            }
          }
      }
      if($_GET['acao'] == 'deleleItem'){
          $idItem = intval($_GET['idItem']);
          if(isset($_SESSION['carrinho'][$idItem])){
            unset($_SESSION['carrinho'][$idItem]);
          }
      }
      if($_GET['acao'] == 'cancelar'){
          unset($_SESSION['carrinho']);
      }
}

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
                       <a id="link-topo" href="login_cart.php"><i class="fa fa-sign-in"></i> Login</a>
                       <a id="link-topo" href="register_user_cart.php"><i class="fa fa-edit"></i> Cadastrar - se </a>
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
                                <li><a href="login_cart.php">Login</a></li>
                                <li><a href="register_user_cart.php">Cadastrar - se</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->
     <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                 <i class="fa fa-shopping-cart"></i> Carrinho de Compras
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th></td>
                                    <th>Item</th>
                                    <th>Preço</th>
                                    <th>Qtd</th>
                                    <th>SubTotal</th>
                                    <th>Acão</th>
                                </tr>
                            </thead>
                             <form  action="?acao=atualizarQtd" method="post">
                            <tfoot>
                             <tr>
                            <td colspan="6">
                            <tbody>
                                <tr>
                                <?php if(count($_SESSION['carrinho']) == 0){
                                 }else{
                                 require_once '../Private/conexao.php';
                                 $somaValorItem = 0;
                                 foreach($_SESSION['carrinho'] as $idItem => $quantidade){
                                 $sql   = mysqli_query($conexao, "SELECT * FROM tb_itens WHERE idItem= '$idItem'");
                                 $row    = mysqli_fetch_assoc($sql);
                                 $subTotal = $row['preco'] * $quantidade;
                                 $somaValorItem += $row['preco'] * $quantidade;
                                echo '<tr>
                                    <td class="cart-pic first-row"><img src="../Images/itens/'.$row['imagem'].'"></td>
                                    <td class="cart-title first-row">
                                        <h5 id="item-nome">'.$row['nome_item'].'</h5>
                                    </td>
                                    <td class="p-price first-row">R$ '.number_format($row['preco'], 2, ',', '.').'</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                    <input type="text" name="atualizar['.$idItem.']" value="'.$quantidade.'">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">R$ '.number_format($subTotal, 2, ',', '.').'</td>
                                    <td class="close-td first-row">
                                    <a href="?acao=deleleItem&idItem='.$idItem.'">
                                  <i class="fa fa-trash" id="btn-acao-cart"></i></a>
                              </td>
                                </tr>';
                                    }
                                   }
                                 ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="cart-buttons">
                            <button  class="btn primary-btn"> <i class="fa fa-refresh"></i> Atualizar Qtd</button>
                        </form>
                            <a href="itens_list.php" class="btn primary-btn"><i class="fa fa-tags"></i> Continuar Comprando</a>
                        </div>
                         </div>
                        <div class="row col-lg-5" id="btn-cart-save">
                        <div class="col-lg-12 offset-lg-12">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Total 
                                    <span>R$ <?= number_format($somaValorItem, 2, ',', '.');?></span></li>
                                    <li class="cart-total">Valor 
                                        <span>R$ <?= number_format($somaValorItem, 2, ',', '.');?></span></li>
                                    <?php if(isset($_SESSION['username'])){?>
                                    <form action="../Controller/insert_pedido.php?usuario=<?= $usuario;?>" method="post">
                                    <button class="btn primary-btn col-lg-12"><i class="fa fa-save"></i> Finalizar Pedido</button>
                                    </form>
                                <?php } else{?>
                                    <h4 id="msg-cart">Faça login para finalizar seu pedido!</h4>
                                <?php }?>
                                    
                                </ul>
                            </div>
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
</body>

</html>