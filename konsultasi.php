<?php
    include 'koneksi.php';
    $id = $_GET['id'];
    if($id == null){
        unset($_SESSION['value']);
        unset($_SESSION['id']);
        header('location:konsultasi.php?id=1');
    }
    $sql = "SELECT * FROM gejala LIMIT ".($id-1)." ,".($id)."";    
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($query);
    $sql = "SELECT count(id_gejala) as jum FROM gejala";
    $query = mysqli_query($conn,$sql);
    $max = mysqli_fetch_assoc($query);

    $_SESSION['id'][$id] = $result['id_gejala'];

    if(!isset($_SESSION['value'][$id])){
        $_SESSION['value'][$id] = 0;        
        $temp = $_SESSION['value'][$id];

    }else{
        $temp = $_SESSION['value'][$id];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <title>Sistem Pakar</title>
    	<!-- CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link href="css/owl.carousel.css" rel="stylesheet">
        <link href="css/owl.transitions.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body id="home" class="homepage">
        <header id="header">
            <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner" style="background: linear-gradient(to bottom,#76b852 0% ,#2c7744 100%) !important; opacity: 0.9">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
                    </div>
                    
                    <div class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="scroll active"><a href="#home" style="color: white !important">Konsultasi</a></li>
                        </ul>
                    </div>
                </div><!--/.container-->
            </nav><!--/nav-->
        </header><!--/header-->

        <section id="cta" class="wow fadeIn">
            <input type="text" name="kode_gejala" value="<?php echo $result['id_gejala']; ?>" hidden id="id_gejala">
            <input type="text" name="no" value="<?php echo $id; ?>" hidden id="no">
            <div class="container"  style="margin-top: 50px;">
                <div class="row">
                    <div class="col-sm-8">
                        <h2><?php echo $result['nama_gejala']; ?></h2>                        
                        <br><input type="radio" name="pil" class="radio-inline" value="0.8" <?php if($temp == 0.8) echo "checked"; ?>> Sangat Banyak
                        <br><input type="radio" name="pil" class="radio-inline" value="0.6" <?php if($temp == 0.6) echo "checked"; ?>> Banyak
                        <br><input type="radio" name="pil" class="radio-inline" value="0.4" <?php if($temp == 0.4) echo "checked"; ?>> Sedikit
                        <br><input type="radio" name="pil" class="radio-inline" value="0" <?php if($temp == 0) echo "checked"; ?> > Tidak Ada
                    </div>
                    <div class="col-sm-4 text-right">
                        <!-- <?php if($id != 1): ?>
                        <a href="konsultasi.php?id=<?php echo $id-1; ?>" class="btn btn-success btn-lg"><i class="fa fa-caret-square-o-left"></i> Prev</a>
                        <?php endif; ?> -->
                        <?php if($id != $max['jum']): ?>
                        <a href="konsultasi.php?id=<?php echo $id+1; ?>" class="btn btn-success btn-lg">Ada gejala lainnya ? <i class="fa fa-caret-square-o-right"></i></a>
                        <?php endif; ?>
                        <a href="hasil.php" class="btn btn-success btn-lg"><i class="fa fa-edit"></i> Hasil</a>
                    </div>
                </div>
            </div>
        </section><!--/#cta-->


    </body>    

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mousescroll.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>

    <script type="text/javascript">
        $('input[type=radio][name=pil]').change(function(){
            var value = $('input[type=radio][name=pil]:checked').val();
            var dataString = "id="+$('#id_gejala').val()+"&val="+value+"&no="+$('#no').val();
            $.ajax({
              method : 'POST',
              url : 'simpan_value.php',
              cache: false,
              data: dataString,
              success : function(data){
                
              }
            });
        });
    </script>
</html>
