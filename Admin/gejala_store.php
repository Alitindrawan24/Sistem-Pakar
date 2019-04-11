<?php
	include '..\koneksi.php';
	$id = $_POST['id'];
	$nama = $_POST['nama'];	
	$sql = "INSERT INTO gejala VALUES('$id','$nama')";
	$query1 = mysqli_query($conn,$sql);
	if($query1){
		$_SESSION['alert-success'] = true;
		echo 'success';
	}
	else{
		printf("%s", mysqli_error($conn));
		//echo 'error';	
	}
?>