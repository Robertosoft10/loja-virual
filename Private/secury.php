<?php
ob_start();
if(($_SESSION['email_user'] == "") || ($_SESSION['senha_user'] == "")) {
	$_SESSION['secury'] = "Login obrigatório";
	header('location: ../admin/index.php');
}
?>
