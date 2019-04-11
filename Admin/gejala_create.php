<?php
	include 'template_top.php';	
  include 'kode_gejala.php';  
    
  $query = mysqli_query($conn,$sql);  

?>

<script>
	var page = 'gejala';
</script>

<div class="content-wrapper">    
    <section class="content-header">
      <?php if(isset($_SESSION['alert-success']) ): ?>
      <div id="alert-success" class="alert alert-success alert-dismissible">
        <button type="button" class="close" aria-hidden="true" onclick="$('#alert-success').fadeOut();">&times;</button>
        <p style="font-size: 16px"><i class="icon fa fa-check">
        Berhasil menambahkan data !
        </i></p>
      </div>
      <?php        
          unset($_SESSION['alert-success']);
      ?>
      <?php endif; ?>
      <h1>
        Gejala        
      </h1>
    </section>
    
    <section class="content">      
      <div class="row">
      	<div class="col-xs-12">

      	<div class="box">          
            <div class="box-header">
              <h3 class="box-title">Tambah Data Gejala</h3>              
            </div>            
            <div class="box-body">
              <form role="form" method="post" id="formInput">
                <div class="form-group">
                  <label>ID Gejala</label>
                  <input type="text" class="form-control" name="id" value="<?php echo $result['kode']; ?>" style="display: none;">
                  <input type="text" class="form-control" disabled value="<?php echo $result['kode']; ?>">
                </div>
                <div class="form-group">
                  <label>Nama Gejala</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukkan nama penyakit" required>
                </div>                
                
                <div class="form-group">
                  <button name="submit" type="submit" class="btn btn-success">Submit</button>
                </div>
              </form>
            </div>            
          </div>
          </div>          
      </div>
    </section>    
  </div>

  <script>
    
    $(function() {
        $("#formInput").submit(function(e){
            form = $(this).serializeArray();
            $.ajax({
              method : 'POST',
              url : 'gejala_store.php',
              cache: false,
              data: form,
              success : function(data){
                if(data == 'success'){                  
                  location.reload(true);
                }
              }
            });            
            e.preventDefault();
        });        
    });

  </script>


<?php include 'template_bottom.php'; ?>