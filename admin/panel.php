<?php
    session_start();
    session_regenerate_id(true);
    if(isset($_REQUEST['session']) && $_REQUEST['session']=="close"){
      session_destroy();
      header("location: index.php");


    }
    if( isset($_SESSION['id'])==false){
      header("location: index.php");
    }

    $modulo = $_REQUEST['modulo']??'';
  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Ecommerce | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css"> -->
  <!-- DataTables editables-->
  <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css" rel="stylesheet" />
  <link href="css/editor.dataTables.min.css" rel="stylesheet" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="editarPerfil.php">
          <i class="far fa-user"></i>
         
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="panel.php?modulo=editUser&id=<?php echo $_SESSION['id']; ?>" class="dropdown-item">
            <!-- Message Start -->
            <h6>Editar Perfil</h6>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="panel.php?modulo=&session=close" class="dropdown-item">
            <!-- Message Start -->
            <h6 class="text-danger">Cerrar Sesión</h6>
            <!-- Message End -->
          </a>
        
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="panel.php" class="brand-link">
      <img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">My ecommerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['userName']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Ecommerce
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./panel.php?modulo=statistics" class="nav-link <?php echo ($modulo == "statistics" || $modulo == "")? "active" : "";     ?>">
                  <i class="far fa-chart-bar nav-icon"></i>
                  <p>Estadisticas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./panel.php?modulo=users" class="nav-link <?php echo ($modulo == "users" || $modulo == "createUser" || $modulo == "editUser" )? "active" : "";   ?>  ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./panel.php?modulo=products" class="nav-link <?php  echo ($modulo == "products") ? "active" : ""; ?> ">
                  <i class="fas fa-box-open nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
          
             
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
 <?php
 if(isset($_REQUEST['mensaje'])){
   ?>
  <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    <span class="sr-only">Close</span>
    </button>
  <?php echo $_REQUEST['mensaje']?>
  </div>
<?php
 }
 if($modulo == "statistics" || $modulo == ""){
  include_once "statistics.php";
  }

  if($modulo == "users"){
    include_once "users.php";
  }

  if($modulo == "products"){
    include_once "products.php";
  }

  if($modulo == "sells"){
    include_once "sells.php";
  }

  if($modulo == "createUser"){
    include_once "createUser.php";
  }

  if($modulo == "editUser"){
    include_once "editUser.php";
  }
 ?>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<!-- <script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
-->
<!-- DataTables editables-->

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>
<script src="./js/dataTables.editor.min.js"></script>



<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script >
$(document).ready(function(){

//Delete User
$(".deleteUser").click(function(e){
  e.preventDefault();
  let message = confirm("Estas seguro de eliminar este usuario?");
  if(message){
    let link = $(this).attr("href");
    window.location= link;
  }
})


$(".deleteProduct").click(function(e){
    e.preventDefault();
    let message = confirm("Estas seguro de eliminar este producto?");
    if(message){
      let link = $(this).attr("href");
      window.location= link;
    }
  })



//DataTables
editor = new $.fn.dataTable.Editor( {
    ajax: "controllers/productos.php", 
    table: "#tablaProductos",
    fields: [ {
            label: "Nombre",
            name: "nombre"
        }, {
            label: "Precio",
            name: "precio"
        }, {
            label: "Existencia",
            name: "stock"
        },{
                label: "Imagenes:",
                name: "files[].id",
                type: "uploadMany",
                display: function ( fileId, counter ) {
                    return '<img src="'+editor.file( 'files', fileId ).web_path+'"/>';
                },
                noFileText: 'No hay imagenes'
            }
    ]
} );

$('#tablaProductos').DataTable( {
    dom: "Bfrtip",
    ajax: "controllers/productos.php",
    columns: [
        { data: "nombre" },
        { data: "precio", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) },
        { data: "stock" },
        {
                data: "files",
                render: function ( d ) {
                    return d.length ?
                        d.length+' imagen(s)' :
                        'No hay imagenes';
                },
                title: "Imagen"
            }
    ],
    select: true,
    buttons: [
        { extend: "create", editor: editor },
        { extend: "edit",   editor: editor },
        { extend: "remove", editor: editor }
    ]
} );








});





</script>
</body>
</html>
