<?php
 include_once "./db_ecommerce.php";
 $conexion  = mysqli_connect($host, $user,$pass, $db,$port);

 
 if(isset($_REQUEST['idDelete'])){

    $idProduct= mysqli_real_escape_string($conexion, $_REQUEST['idDelete']??'');
    $query = "DELETE FROM Productos WHERE id = '".$idProduct."';";
    $res = mysqli_query($conexion,$query);
  
    if($res){
     
      ?>
    <div class="alert alert-warning float-right" role="alert">
      Producto eliminado con exito. 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
      </button>
  </div>
  <?php
  
    }else{
      ?>
      <div class="alert alert-danger float-right" role="alert">
        Error al eliminar <?php echo mysqli_error($conexion); ?>
      </div>
      <?php
    }
   }
  
  ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-lg-10  col-sm-12">
            <h1>Productos</h1>
          </div>
         
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body col-12">
              <table id="tablaProductos" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Producto</th>
                  <th>Precio</th>
                  <th>Existencia</th>
                  <th>Imagen(es)</th>
                </tr>
                </thead>
               
               
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

      
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>