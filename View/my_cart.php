<?php 
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
$usuario = $_SESSION['idUser'];
include_once '../Private/conexao.php';
$sql = "SELECT * FROM tb_loja";
$consulta = mysqli_query($conexao, $sql);
$rows = mysqli_fetch_assoc($consulta);

$usuario_login = $_GET['usuario'];
$sql = "SELECT * FROM tb_compras T_C JOIN tb_login T_L ON  T_C.usuario_login = T_L.idUser WHERE usuario_login = '$usuario_login'";
$consulta = mysqli_query($conexao, $sql);
$rows_comp = mysqli_fetch_assoc($consulta);

$user = $_GET['usuario'];
$sql = "SELECT * FROM tb_pedidos T_P JOIN tb_itens T_I ON T_P.item = T_I.idItem WHERE user='$user'";
$consulta = mysqli_query($conexao, $sql);
$rows_ped = mysqli_fetch_array($consulta);
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
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Minha Compra</h4>
                        <div class="my_cart">
                          <div class="dado-compra">
                               <?php if(!isset($rows_comp['endereco'])){?>
                                <h3>Não há compra em seu nome</h3>
                                <?php }else{?>
                                  Usuário: <?= $rows_comp['username'];?><br>
                                  E-mail: <?= $rows_comp['user_email'];?><br>
                                  Endereço: <?= $rows_comp['endereco'];?><br>
                                  <?php
                                  $num_cep = $rows_comp['cep'];
                                  $um     = substr($num_cep, 0, 2);
                                  $dois   = substr($num_cep, 2, 3);
                                  $tres   = substr($num_cep, 5, 3);
                                  $cep = "$um.$dois.$tres";
                                  ?>
                                  Cep: <?= $cep;?><br>
                                  <?php
                                  if(!empty($rows_comp['cpf'])){
                                  $num_cpf = $rows_comp['cpf'];
                                  $um     = substr($num_cpf, 0, 3);
                                  $dois   = substr($num_cpf, 3, 3);
                                  $tres   = substr($num_cpf, 6, 3);
                                  $quatro = substr($num_cpf, 9, 2);
                                  $cpf = "$um.$dois.$tres-$quatro";
                                  ?>
                                  Cpf: <?= $cpf;?><br>
                                <?php }else{
                                  echo "Pago no cartão <br>";
                                }
                                
                                if(!empty($rows_comp['numeroCartao'])){
                                  echo  "Cartão:".$rows_comp['nomeCartao']."<br>";
                                $num_cartao = $rows_comp['numeroCartao'];
                                $um     = substr($num_cartao, 0, 4);
                                $dois   = substr($num_cartao, 4, 4);
                                $tres   = substr($num_cartao, 8, 4);
                                $quatro = substr($num_cartao, 12, 4);
                                $cartao_num = "$um $dois $tres $quatro";
                                ?>
                                  Nº Cartão: <?= $cartao_num;?><br>
                                <?php }else{
                                  echo "Cmprou no boleto<br>";
                                }?>
                                  Valor Compra: R$  <?= number_format($rows_ped['valor_pedido'], 2, ',', '.');?><br>
                                  Total Pecelas: <?= $rows_comp['parcelas'];?><br>
                                  <?php  $valor_parcela = ($rows_ped['valor_pedido'] /  $rows_comp['parcelas']);?>
                                  Valor Parcelas: R$  <?= number_format($valor_parcela, 2, ',', '.');?><br>
                                  Data Compra: <?= date('d/m/Y', strtotime($rows_comp['data_compra']));?><br>
                                  Data Vencimento: <?= date('d/m/Y', strtotime('+30 days', strtotime($rows_ped['data_pedido'])));?>
                                  <table class="col-md-12">
                                  <thead>
                                    <tr>
                                      <th  id="dado-cart" scope="col">Item</th>
                                      <th  id="dado-cart" scope="col">Preço</th>
                                      <th  id="dado-cart" scope="col">Qtd</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  $user = $_GET['usuario'];
                                  $sql = "SELECT * FROM tb_pedidos T_P JOIN tb_itens T_I ON T_P.item = T_I.idItem WHERE user='$user'";
                                  $consulta = mysqli_query($conexao, $sql);
                                  while($rows = mysqli_fetch_array($consulta)){
                                ?>
                                    <tr>
                                    <td><?= $rows['nome_item'];?></td>
                                    <td>R$ <?= number_format($rows['preco'], 2, ',', '.');?></td>
                                    <td><?= $rows['quantidade'];?></td>
                                    </tr>
                                  <?php } ?>
                                  <?php } ?>
                                 </tbody>
                                 </table>
                             <hr>
                             <?php if(!empty($rows_comp['cpf'])){?>
                             <a href="boleto.php?usuario=<?= $usuario;?>" target="_blank">
                             <button class="btn primary-btn">
                             <i class="fa fa-barcode"></i> Boleto</button></a>
                           <?php } ?>
                             <hr>
                              </div>
                             </div>
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