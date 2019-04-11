<?php
	$sql = "SELECT max(id_gejala) as kode FROM gejala";	
	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_assoc($query);
	$result['kode']++;
	if($result['kode'] == 1)
		$result['kode'] = 'G01';
	//$result['kode'] = "G0".$result['kode'];
?>