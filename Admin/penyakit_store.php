<?php
	include '..\koneksi.php';
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$solusi = $_POST['solusi'];
	$sql = "INSERT INTO penyakit VALUES('$id','$nama','$solusi')";
	$query = mysqli_query($conn,$sql);
	if($query){
		$_SESSION['alert-success'] = true;
		echo 'success';
	}
	else{
		echo 'error';	
	}
?>