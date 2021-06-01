<?php
include_once './db_ecommerce.php';
$conexion =  mysqli_connect($host,$user,$pass,$db,$port);

if(isset($_REQUEST['actualizar'])){
  
  $nombre = mysqli_real_escape_string($conexion, $_REQUEST['name']??'');
  $precio= mysqli_real_escape_string($conexion, $_REQUEST['price']??'');
  $stock = mysqli_real_escape_string($conexion, $_REQUEST['stock']??'');
  $idProduct = mysqli_real_escape_string($conexion, $_REQUEST['id']??'');

  $query = "UPDATE Productos SET nombre = '".$nombre."' , precio = '".$precio."', stock = '".$stock."' WHERE id = '".$idProduct."'; ";
  $res = mysqli_query($conexion, $query);

  if($res){
    echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=products&mensaje=Producto editado exitosamente" />';
  }else{
    ?>
    <div class="alert alert-danger" role="alert">
      Error al editar producto <?php echo mysqli_error($conexion); ?>
    </div>
<?php
  }
}

$id = mysqli_escape_string($conexion,$_REQUEST['id']??'');
$query= "SELECT * FROM Productos WHERE id ='".$id."';";
$res = mysqli_query($conexion, $query);
$row =  mysqli_fetch_assoc($res);




?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-lg-12  col-sm-12  text-center">
            <h1>Agregar Producto</h1>
          </div>
         
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-8 mx-auto">
          <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body">
              <form action="panel.php?modulo=editProduct" method="post">
              
                <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" name="name" id="" class="form-control" value="<?php echo $row['nombre']; ?>" />
                    </div>
    
               
                <div class="form-group">
                      <label for="lastName">Precio</label>
                      <input type="text" name="price" id="" class="form-control" value="<?php  echo  $row['precio'];   ?>" />
                    </div>
  
               
              
              
               
              
                    <div class="form-group">
                      <label for="userName">Existencia</label>
                      <input type="text" name="stock" id="" class="form-control" required  value="<?php echo $row['stock']; ?> " />
                    </div>
                   
                   
                   
                 
                    
                    
                

              
                    <div class="form-group">
                    <input type="hidden"  name="id" value="<?php echo $row['id']; ?>" />
                      <button type="submit" class="btn btn-primary form-control" name="actualizar">Actualizar</button>
                    </div>
              
              
              </form>
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