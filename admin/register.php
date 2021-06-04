
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Ecommerce | Registration Page</title>
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <h3"><b>My</b> Ecommerce</h3>
  </div>
    <?php

      

    if(isset($_REQUEST['btnRegister'])){
        include_once "./db_ecommerce.php";
        $conexion = mysqli_connect($host,$user,$pass,$db,$port);

        $userName =$_REQUEST['userName']??'';
        $name =$_REQUEST['nombre']??'';
        $lastName =$_REQUEST['apellido']??'';
        $email = $_REQUEST['email']??'';
        $password =$_REQUEST['pass']??'';
        $password = md5($password);

        $query = "INSERT INTO Usuarios(userName, nombre,apellido,email,pass) VALUES('".$userName."','".$name."', '".$lastName."', '".$email."', '".$password."');";
        $res = mysqli_query($conexion,$query);

        if($res){
            
            header("Location: index.php");
            
           
        }
        
    }

    
    
    ?>




  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form  method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="userName" name="userName">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="First Name" name="nombre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="lastName" name="apellido">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
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
      <!--  <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        -->
        <div class="row">
        
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="btnRegister">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     

      <a href="index.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
</body>
</html>
