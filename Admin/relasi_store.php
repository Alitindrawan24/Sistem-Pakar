<?php
	include '..\koneksi.php';	
	$gejala = $_POST['gejala'];
	$penyakit = $_POST['penyakit'];
	$cf = $_POST['cf'];	
	$sql = "INSERT INTO relasi VALUES('','$penyakit','$gejala',$cf)";	
	$query = mysqli_query($conn,$sql);
	if($query){
		$_SESSION['alert-success'] = true;
		echo 'success';
	}
	else{
		echo 'error';	
	}
?>