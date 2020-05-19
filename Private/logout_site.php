<?php
session_start();
if(isset($_SESSION['user_email']) &&
isset($_SESSION['password'])){
session_destroy();
header('Location: /../loja-virtual/index.php');
}
?>
