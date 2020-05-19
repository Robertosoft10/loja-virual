<?php
session_start();
if(isset($_SESSION['email_user']) &&
isset($_SESSION['senha_user'])){
session_destroy();
header('Location: ../Admin/index.php');
}
?>
