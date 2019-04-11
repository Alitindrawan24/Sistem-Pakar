<?php
  include '..\koneksi.php';
  include 'session.php';
  ob_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title id="title"></title>  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">  
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">  
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">  
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">  
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">  
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">  
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">  
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">  
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">  
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">    
    <a href="index2.html" class="logo">      
      <span class="logo-mini"><b>A</b>LT</span>      
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    
    <nav class="navbar navbar-static-top">      
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['user']; ?></span>
            </a>
            <ul class="dropdown-menu">              
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['user']; ?>
                </p>
              </li>                          
              <li class="user-footer">                
                <center>
                  <form method="post">
                    <button name="logout" class="btn btn-success btn-flat">Logout</button>
                  </form>
                </center>
              </li>
            </ul>
          </li>          
        </ul>
      </div>
    </nav>
  </header>  
  <aside class="main-sidebar">    
    <section class="sidebar">      
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['user']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>
        <li id="dashboard" class="">
          <a href="index.php">
            <i class="fa fa-home"></i> <span>Dashboard</span>
          </a>
        </li>
        <li id="penyakit" class="">
          <a href="penyakit.php">
            <i class="fa fa-dashboard"></i> <span>Penyakit</span>
          </a>
        </li>
        <li id="gejala" class="">
          <a href="gejala.php">
            <i class="fa fa-dashboard"></i> <span>Gejala</span>
          </a>
        </li>
        <li id="relasi" class="">
          <a href="relasi.php">
            <i class="fa fa-dashboard"></i> <span>Relasi</span>
          </a>
        </li>
        <li id="konsultasi" class="">
          <a  href="konsultasi.php">
            <i class="fa fa-dashboard"></i> <span>Konsultasi</span>
          </a>
        </li>
        <li id="user" class="">
          <a href="user.php">
            <i class="fa fa-dashboard"></i> <span>User</span>
          </a>
        </li>
      </ul>
    </section>    
  </aside>

  <?php
    ob_start();
    if(isset($_POST['logout'])){      
      session_destroy();      
      header('location:login.php');      
    }
  ?>