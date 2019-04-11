<?php
	
	$id = $_POST['id'];
	$val = $_POST['val'];
	$no = $_POST['no'];
	session_start();
	//$_SESSION['id'][$no] = $id;
	$_SESSION['value'][$no] = $val;
?>