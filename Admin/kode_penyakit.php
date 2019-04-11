<?php
	$sql = "SELECT max(id_penyakit) as kode FROM penyakit";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_assoc($query);
	$result['kode']++;
	//$result['kode'] = "P0".$result['kode'];
?>