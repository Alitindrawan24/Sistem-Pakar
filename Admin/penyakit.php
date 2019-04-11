<?php
	include 'template_top.php';
	
	$sql = "SELECT *, COUNT(id_gejala) as count FROM penyakit
	LEFT JOIN relasi ON id_penyakit = penyakit_id
	LEFT JOIN gejala ON id_gejala = gejala_id	
	GROUP BY (id_penyakit)
	";
	$query = mysqli_query($conn,$sql);
?>

<script>
	var page = 'penyakit';
</script>

<div class="content-wrapper">    
    <section class="content-header">
      <h1>
        Penyakit
      </h1>
    </section>
    
    <section class="content">      
      <div class="row">
      	<div class="col-xs-12">
      	<div class="box">
            <div class="box-header">
              <h3 class="box-title">List Penyakit</h3>
              <a href="penyakit_create.php"><button class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data Penyakit</button></a>
            </div>            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                	<th>ID Penyakit</th>
	                  	<th>Nama Penyakit</th>
	                  	<th>Jumlah Gejala</th>
	                  	<th>Aksi</th>
	                </tr>
                </thead>
                <tbody>
                	<?php while($row = mysqli_fetch_assoc($query)): ?>
	                <tr>
        						<td><?php echo $row['id_penyakit'] ?></td>
        						<td><?php echo $row['nama_penyakit'] ?></td>
        						<td><?php echo $row['count'] ?></td>
        						<td>
        							<button class="btn btn-xs btn-warning">Edit</button>
        							<button class="btn btn-xs btn-danger">Hapus</button>							
        						</td>
	                </tr>
	            	<?php endwhile; ?>
                </tbody>                
              </table>
            </div>            
          </div>
          </div>          
      </div>
    </section>    
  </div> 
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script>
  $(function () {    
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>

<?php include 'template_bottom.php'; ?>