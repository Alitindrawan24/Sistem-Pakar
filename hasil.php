<?php
    include 'koneksi.php';

    $sql = "SELECT count(id_gejala) as jum FROM gejala";
    $query = mysqli_query($conn,$sql);
    $max = mysqli_fetch_assoc($query);

    $sql = "SELECT id_penyakit FROM penyakit";
    $query = mysqli_query($conn,$sql);

    while($penyakit = mysqli_fetch_assoc($query)){

        $_SESSION['cf'][$penyakit['id_penyakit']] = 0;
        $bef = -1;

        for ($i=1; $i <= $max['jum']; $i++) { 
            if(!isset($_SESSION['value'][$i]))
                $val = 0;
            else
                $val = $_SESSION['value'][$i];

            if(!isset($_SESSION['id'][$i])){
                if($i > 9)
                    $kode = "G0".$i;
                else
                    $kode = "G".$i;
            }
            else
                $kode = $_SESSION['id'][$i];
            $id_penyakit = $penyakit['id_penyakit'];

            $sql = "SELECT count(id_relasi) as jum, relasi.* FROM relasi WHERE gejala_id = '$kode' AND penyakit_id = '$id_penyakit' ";            
            $temp = mysqli_query($conn,$sql);
            $temp = mysqli_fetch_assoc($temp);
            if($temp['jum'] > 0  && $_SESSION['value'][$i] != 0){                
                if($bef == -1){
                    $_SESSION['cf'][$penyakit['id_penyakit']] += ($_SESSION['value'][$i] * $temp['CF']);
                }
                else{                    
                    $_SESSION['cf'][$penyakit['id_penyakit']] += ($_SESSION['value'][$i] * $temp['CF']) * (1 - $bef);                                         
                }           

                $bef = $_SESSION['cf'][$penyakit['id_penyakit']];                
            }            
        }

        $result[$penyakit['id_penyakit']] = ceil($_SESSION['cf'][$penyakit['id_penyakit']]*100)."%";
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
                    <div class="col-sm-8" style="left: 50%; transform: translateX(-50%);">
                        <center><h1>Hasil</h1></center>
                        <br>
                        <table class="table table-bordered" style="background-color: white; font-size:18px;">
                            <tr>
                                <th>Nama Penyakit</th>
                                <th style="text-align: center;">CF</th>
                            </tr>
                            <?php
                                $sql = "SELECT * FROM penyakit";
                                $query = mysqli_query($conn,$sql);
                                while($penyakit = mysqli_fetch_assoc($query)): 
                            ?>
                            <tr>
                                <td><?php echo $penyakit['nama_penyakit']; ?></td>
                                <td  style="text-align: center;"><?php echo $result[$penyakit['id_penyakit']]; ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </table>                        
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
</html>
