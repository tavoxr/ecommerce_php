<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Ecommerce | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Home</a>
      </li>
     
    </ul>

   
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link "  href="/ecommerce_php/admin/index.php">
          Login <i class="fas fa-user ml-2"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->
  
<div class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>My </b>Ecommerce</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php
        if(isset($_REQUEST['btnLogin'])){
          session_start();
          $user_email = $_REQUEST['user_email']?? '';
          $password = $_REQUEST['pass']?? '';
          $password = md5($password);
          if($user_email){
          print_r($_REQUEST);
          }
          include_once 'db_ecommerce.php';
          $con = mysqli_connect($host,$user,$pass,$db,$port);
          $query = "SELECT id,email,userName, nombre FROM Usuarios WHERE (email='".$user_email."' or userName = '".$user_email."') and pass='".$password."' ";
          $res =  mysqli_query($con, $query);
          $row =  mysqli_fetch_assoc($res);
          if($row){
            print_r($_REQUEST);
            $_SESSION['id']=$row['id'];
            $_SESSION['email']=$row['email'];
            $_SESSION['nombre']=$row['nombre'];
            $_SESSION['userName']=$row['userName'];
            header("location: panel.php");
          }else{
        ?>
              <div class="alert alert-danger" role="alert">
                <strong>Error de login</strong>
              </div>
             <?php

          }
        
        }
      ?> 


      <form  method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email or UserName" name="user_email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="btnLogin">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

</div>

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>

</body>
</html>
