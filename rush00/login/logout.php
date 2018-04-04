<?php
	session_start();
	unset($_SESSION['panier']);
	session_unset();
	session_destroy();
	session_write_close();
	header('Location: ../index.php');
?>
