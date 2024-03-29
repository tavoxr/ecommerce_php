<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Ecommerce | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="admin/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body>

<?php
 include_once "admin/db_ecommerce.php";
 $conexion = mysqli_connect($host, $user,$pass,$db,$port);
?>
   
  
<!-- Navbar -->
<nav class="navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
     
    </ul>

   
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" id="iconoCarrito">
          <i class="fas fa-shopping-cart"></i>
          <span class="badge badge-danger navbar-badge"  id="badgeProducto"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listaCarrito">
        
       
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link"  href="/ecommerce_php/admin/index.php">
          <i class="fas fa-user"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->
<?php  
   $modulo = $_REQUEST['modulo']??'';
   if($modulo == "productos" || $modulo == ""){
     include_once "productos.php";
   }

   if($modulo == 'detalleProducto'){
     include_once "detalleProducto.php";
   }

   if($modulo == "carrito"){
    include_once "carrito.php";
  }

?>

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- daterangepicker -->
<script src="admin/plugins/moment/moment.min.js"></script>
<script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<script src="admin/js/ecommerce.js" ></script>



</body>
</html>