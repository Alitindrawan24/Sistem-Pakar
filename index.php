<?php
    include "koneksi.php";
    $sql = "SELECT id_penyakit FROM penyakit";
    if($result = mysqli_query($conn,$sql)){
        $jum_penyakit = mysqli_num_rows($result);
    }
    $sql = "SELECT id_gejala FROM gejala";
    if($result = mysqli_query($conn,$sql)){
        $jum_gejala = mysqli_num_rows($result);
    }

    session_start();
    if(isset($_SESSION['login'])){
        $login = true;
    }
    else{
        $login = false;
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
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home" style="color: white !important">Home</a></li>
                        <li class="scroll"><a href="#cta" style="color: white !important">Konsultasi</a></li>
                        <li class="scroll"><a href="#animated-number" style="color: white !important">About</a></li>
                        <?php if(!$login): ?>
                        <li class="scroll"><a href="#login" style="color: white !important">Login/Signup</a></li>
                        <?php endif; ?> 
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->

    <section id="main-slider">
        <div class="owl-carousel">
            <?php for($i=1;$i<=3;$i++): ?>
            <div class="item" style="background-image: url(images/slider/bg<?php echo $i; ?>.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2 style="text-shadow: 2px 2px 4px black;">Sistem Pakar Diagnosa Penyakit Tumbuhan Cabai Merah</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endfor; ?><!--/.item-->

        </div><!--/.owl-carousel-->
    </section><!--/#main-slider-->

    <section id="cta" class="wow fadeIn">
        <div class="container"  style="margin-top: 50px;">
            <div class="row">
                <div class="col-sm-9">
                    <h2>Sistem Pakar Diagnosa Penyakit Tumbuhan Cabai Merah</h2>
                    <p style="text-align: justify;">Cabai merah merupakan salah satu komoditas strategis di sektor hortikultura sehingga produksinya perlu ditingkatkan. Namun, penyakit yang menyerang tanaman cabai cukup kompleks, dengan gejala penyakit cukup banyak dan beberapa penyakit yang memiliki gejala yang sama, penanganan dan pengendalian penyakit cabai yang belum benar, menyebabkan petani sulit mendiagnosis penyakit cabai merah dan mengakibatkan tingkat produksi berkurang. Pembentukan sistem pakar diagnosa penyakit cabai merah menjadi salah satu solusi petani untuk mengendalikan penyakit yang terjadi pada tanaman cabai merah. Certainty Factor adalah metode untuk membuktikan apakah suatu fakta pasti atau tidak pasti dalam bentuk metrik yang biasanya digunakan dalam sistem pakar. Berdasarkan masalah untuk mengatasi penyakit tanaman cabai merah, maka perlu dibangun sistem yang terkomputerisasi yang memiliki pengetahuan seperti para ahli botani dan sistem tersebut dapat menjadi alat dalam mendiagnosis jenis penyakit dan memberikan solusi bagaimana menangani dan mengendalikan. Sistem Pakar adalah salah satu bidang pengetahuan yang bisa menjadi alat dalam mengatasi masalah.</p>
                </div>
                <div class="col-sm-3 text-right">
                    <a class="btn btn-success btn-lg">Konsultasi Penyakit</a>
                </div>
            </div>
        </div>
    </section><!--/#cta-->
    
    <section id="animated-number">
        <div style="background-color: black;width: 100%;height: 100%;opacity: 0.6;padding-top: 20px;padding-bottom: 20px">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Tentang Sistem Pakar Diagnosa Penyakit Tumbuhan Cabai Merah</h2>                
            </div>

            <div class="row text-center">
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="1ms">
                        <div class="animated-number" data-digit="<?php echo $jum_penyakit; ?>" data-duration="1500"></div>
                        <strong>Penyakit</strong>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                        <div class="animated-number" data-digit="<?php echo $jum_gejala; ?>" data-duration="1500"></div>
                        <strong>Gejala</strong>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                        <div class="animated-number" data-digit="94.3%" data-duration="1500"></div>
                        <strong>Akurasi</strong>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                        <div class="animated-number" data-digit="1" data-duration="1500"></div>
                        <strong>Konsultasi</strong>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section><!--/#animated-number-->    
    <?php if(!$login): ?>
    <div style="background: linear-gradient(to bottom,#52c234 0% ,#061700 100%);height: 100%;width: 100%;">        
        <section id="login" class="wow fadeIn">
            <div class="container"  style="padding-top: 50px;padding-bottom: 100px">
                <div class="row">
                    <div class="col-sm-8 center">                        
                        <center><p class="alert">Password atau Email Salah<p></center>
                        <div class="col-sm-8 center">                            
                            <center>
                                <button id="login-btn" class="btn hype actived"  onclick="show('login')">Login</button>
                                <button id="signup-btn" class="btn hype"  onclick="show('signup')">Register</button>
                            </center>
                        </div>
                        <div id="login-form">
                            <form>
                                <div class="col-sm-8 center">
                                    <input type="text" name="email" class="form-control shadow" placeholder="Masukkan Email" autocomplete="off">
                                </div>                    
                                <div class="col-sm-8 center">
                                    <input id="password1" type="password" name="password" class="form-control shadow" placeholder="Password" autocomplete="off">
                                </div>
                                <div class="col-sm-8 center">                                    
                                    <input type="checkbox" style="float: left;margin-right: 10px" onchange="change(this.checked,1)"> <p style="color: white;text-align: left !important; ">Tampilkan Password</p>
                                </div>
                                <div class="col-sm-8 center">
                                    <center><button class="btn btn-success shadow">Login</button></center>
                                </div>
                            </form>
                        </div>
                        <div id="signup-form" style="display: none;">
                            <form>
                                <div class="col-sm-8 center">
                                    <input type="text" name="nama" class="form-control shadow" placeholder="Masukkan Nama Lengkap" autocomplete="off">
                                </div>
                                <div class="col-sm-8 center">
                                    <input type="text" name="email" class="form-control shadow" placeholder="Masukkan Email" autocomplete="off">
                                </div>
                                <div class="col-sm-8 center">
                                    <input id="password2" type="password" name="password" class="form-control shadow" placeholder="Password" autocomplete="off">
                                </div>
                                <div class="col-sm-8 center">                                    
                                    <input type="checkbox" style="float: left;margin-right: 10px" onchange="change(this.checked,2)"> <p style="color: white;text-align: left !important; ">Tampilkan Password</p>
                                </div>
                                <div class="col-sm-8 center">
                                    <center><button class="btn btn-success shadow">Sign Up</button></center>
                                </div>
                            </form>
                        </div>
                    </div>                
                </div>
            </div>
        </section>
    </div>
    <?php endif; ?>    

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
        function show(type){            
            if(type == 'login'){
                $('#login-btn').addClass('actived');
                $('#signup-btn').removeClass('actived');
                $('#login-form').fadeIn();
                $('#signup-form').hide();
            }
            else{
                $('#login-btn').removeClass('actived');
                $('#signup-btn').addClass('actived');
                $('#login-form').hide();
                $('#signup-form').fadeIn();
            }
        }

        function change(input,id){
            if(input){
                $('#password'+id).attr('type','text');
            }
            else{
                $('#password'+id).attr('type','password');
            }
        }
    </script>

</body>
</html>