<?php
  include '..\koneksi.php';  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register</title>  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">  
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">  
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">  
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="register.php"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input name="nama" type="text" class="form-control" placeholder="Full name" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="email" type="email" class="form-control" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" name="password" type="password" class="form-control" placeholder="Password" required onkeyup="check()">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="repassword" name="repassword" type="password" class="form-control" placeholder="Retype password" required onkeyup="check()">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <a href="login.php" class="text-center">Sudah punya akun ? Login disini</a>
          </div>
        </div>
        
        <div class="col-xs-4">
          <button id="register" type="submit" name="submit" class="btn btn-success btn-block btn-flat" disabled>Register</button>
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
      increaseArea: '20%' /* optional */
    });
  });  
</script>

<script>
  function check(){      
    var pass = $('#password').val();
    var repass = $('#repassword').val();
    
    if(pass == repass && pass.length >= 8){
      $('#register').attr('disabled',false);
    }
    else{
      $('#register').attr('disabled',true);
    }
  }
</script>
</body>
</html>


<?php  
  if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];    

    $sql = "INSERT INTO user VALUES(null,'$nama','$email','admin','".password_hash($password, PASSWORD_DEFAULT)."')";
    $query = mysqli_query($conn,$sql);
    if($query)
        echo "Berhasil";
      else
        echo mysqli_error($conn);
  }
?>