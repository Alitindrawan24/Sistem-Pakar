<?php
  include '..\koneksi.php';  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">  

  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><b>Admin</b>LTE</a>
  </div>

  <?php if(isset($_SESSION['alert-danger']) ): ?>
  <div id="alert-danger" class="alert-danger alert alert-dismissible">
    <button type="button" class="close" aria-hidden="true" onclick="$('#alert-danger').fadeOut();">&times;</button>
    Login gagal
  </div>
  <?php        
    unset($_SESSION['alert-danger']);
  ?>
  <?php endif; ?>
  
  <div class="login-box-body">
    <p class="login-box-msg">Login</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input name="email" type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <a href="register.php" class="text-center">Belum punya akun ? silahkan register</a>
        </div>
        
        <div class="col-xs-4">
          <button name="submit" type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
        </div>

      </div>
    </form>    
  </div>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%'
    });
  });
</script>
</body>
</html>


<?php
  if(isset($_POST['submit'])){    
    $email = $_POST['email'];
    $password = $_POST['password'];    

    $sql = "SELECT * FROM user WHERE email = '$email' AND level = 'admin'";
    $query = mysqli_query($conn,$sql);
    $row  = mysqli_fetch_assoc($query);      
    $result = password_verify($password,$row['password']);
    if($result){
      $_SESSION['admin_login'] = true;
      $_SESSION['user'] = $row['nama_lengkap'];
      header('location:index.php');
    }
    else
      $_SESSION['alert-danger'] = true;
    if(!$_SESSION['admin_login'])
      header('location:login.php');

  }
?>