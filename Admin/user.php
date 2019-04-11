<?php
  include 'template_top.php';
  
  $sql = "SELECT * FROM user  
  ";
  $query = mysqli_query($conn,$sql);
?>

<script>
	var page = 'user';
</script>

<div class="content-wrapper">    
    <section class="content-header">
      <h1>
        User
      </h1>
    </section>
    
    <section class="content">      
      <div class="row">
      	<div class="col-xs-12">
      	<div class="box">
            <div class="box-header">
              <h3 class="box-title">List User</h3>
              <button class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data User</button>
            </div>            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>	                  
	                  <th>Nama User</th>
                    <th>Email</th>
                    <th>Level</th>
	                  <th>Aksi</th>
	                </tr>
                </thead>
                <tbody>
	                <?php while($row = mysqli_fetch_assoc($query)): ?>
                  <tr>
                    <td><?php echo $row['nama_lengkap'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['level'] ?></td>
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