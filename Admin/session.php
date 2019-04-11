<?php
	if(!$_SESSION['admin_login']){
		header('location:login.php');
	}
?>