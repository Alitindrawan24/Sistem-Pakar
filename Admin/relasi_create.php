<?php
	include 'template_top.php';	  
  $sql = "SELECT * FROM gejala";
  $gejala = mysqli_query($conn,$sql);

  $sql = "SELECT * FROM penyakit";
  $penyakit = mysqli_query($conn,$sql);
?>

<script>
	var page = 'relasi';
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
              <h3 class="box-title">Tambah Data Relasi</h3>
            </div>            
            <div class="box-body">
              <form role="form" method="post" id="formInput">
                <div class="form-group">
                  <label>Nama Gejala</label>
                  <select class="form-control" required name="gejala">
                    <option selected disabled hidden value="">Pilih gejala</option>
                    <?php while($row = mysqli_fetch_assoc($gejala)): ?>
                      <option value="<?php echo $row['id_gejala']; ?>"><?php echo $row['id_gejala']." - ".$row['nama_gejala']; ?></option>
                    <?php endwhile; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama Penyakit</label>
                  <select class="form-control" required name="penyakit">
                    <option selected disabled hidden value="">Pilih penyakit</option>
                    <?php while($row = mysqli_fetch_assoc($penyakit)): ?>
                      <option value="<?php echo $row['id_penyakit']; ?>"><?php echo $row['id_penyakit']." - ".$row['nama_penyakit']; ?></option>
                    <?php endwhile; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>CF</label>                  
                  <input type="text" name="cf" class="form-control" placeholder="Masukkan nilai CF" required>
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
              url : 'relasi_store.php',
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