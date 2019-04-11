<?php
  include 'template_top.php';
  $sql = "SELECT 
  (SELECT COUNT(id_penyakit)FROM penyakit) AS jum_penyakit,
  (SELECT COUNT(id_gejala) FROM gejala) AS jum_gejala,
  (SELECT COUNT(id_user) FROM USER) AS jum_user,
  (SELECT COUNT(id_konsultasi) FROM konsultasi) AS jum_konsul
  FROM penyakit LIMIT 1;
  ";
  $query = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($query);
?>

<script>
  var page = 'dashboard';
</script>
  
  <div class="content-wrapper">    
    <section class="content-header">
      <h1>
        Dashboard        
      </h1>      
    </section>
    
    <section class="content">      
      <div class="row">
        <div class="col-lg-3 col-xs-6">          
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $row['jum_penyakit'] ?></h3>

              <p>Jumlah Penyakit</p>
            </div>
            <div class="icon">
              <i class="ion ion-medkit"></i>
            </div>
            <a href="penyakit.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>        
        <div class="col-lg-3 col-xs-6">          
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $row['jum_gejala'] ?></h3>

              <p>Jumlah Gejala</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="gejala.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>      
        <div class="col-lg-3 col-xs-6">        
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $row['jum_user'] ?></h3>

              <p>Jumlah Pengguna</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="user.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>      
        <div class="col-lg-3 col-xs-6">          
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $row['jum_konsul']; ?></h3>

              <p>Jumlah Konsultasi</p>
            </div>
            <div class="icon">
              <i class="ion ion-chatbubbles"></i>
            </div>
            <a href="konsultasi.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>        
      </div>      
    </section>    
  </div>  

<?php include 'template_bottom.php'; ?>