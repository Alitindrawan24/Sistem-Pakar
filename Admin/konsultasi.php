<?php
	include 'template_top.php';	

  $sql = "SELECT * FROM konsultasi  
  LEFT JOIN penyakit ON id_penyakit = penyakit_id 
  LEFT JOIN user ON id_user = user_id 
  ";
  $query = mysqli_query($conn,$sql);
?>

<script>
	var page = 'konsultasi';
</script>

<div class="content-wrapper">    
    <section class="content-header">
      <h1>
        Konsultasi
      </h1>
    </section>
    
    <section class="content">      
      <div class="row">
      	<div class="col-xs-12">
      	<div class="box">
            <div class="box-header">
              <h3 class="box-title">List Konsultasi</h3>              
            </div>            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  <th>Nama User</th>
	                  <th>Diagnosa Penyakit</th>
                    <th>CF</th>
	                  <th>Aksi</th>
	                </tr>
                </thead>
                <tbody>
	                <?php while($row = mysqli_fetch_assoc($query)): ?>
                  <tr>
                    <td><?php echo $row['nama_lenkap'] ?></td>
                    <td><?php echo $row['nama_penyakit'] ?></td>
                    <td><?php echo $row['CF'] ?></td>
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