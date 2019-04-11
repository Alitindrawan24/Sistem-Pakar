<?php
	include 'template_top.php';	
  include 'kode_penyakit.php';  
  
?>

<script>
	var page = 'penyakit';
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
        Penyakit        
      </h1>
    </section>
    
    <section class="content">      
      <div class="row">
      	<div class="col-xs-12">

      	<div class="box">          
            <div class="box-header">
              <h3 class="box-title">Tambah Data Penyakit</h3>              
            </div>            
            <div class="box-body">
              <form role="form" method="post" id="formInput">
                <div class="form-group">
                  <label>ID Penyakit</label>
                  <input type="text" class="form-control" name="id" value="<?php echo $result['kode']; ?>" style="display: none;">
                  <input type="text" class="form-control" disabled value="<?php echo $result['kode']; ?>">
                </div>
                <div class="form-group">
                  <label>Nama Penyakit</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukkan nama penyakit" required>
                </div>
                <div class="form-group">
                  <label>Solusi</label>                  
                    <textarea name="solusi" class="textarea" placeholder="Masukkan solusi penyakit"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>                  
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
              url : 'penyakit_store.php',
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