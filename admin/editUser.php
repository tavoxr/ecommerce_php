<?php
    include_once './db_ecommerce.php';
    $conexion =  mysqli_connect($host,$user,$pass,$db,$port);



if(isset($_REQUEST['edit'])){

  $name = mysqli_real_escape_string($conexion, $_REQUEST['name']??'');
  $lastName= mysqli_real_escape_string($conexion, $_REQUEST['lastName']??'');
  $userName = mysqli_real_escape_string($conexion, $_REQUEST['userName']??'');
  $email =  mysqli_real_escape_string($conexion, $_REQUEST['email']??'');
  $password = md5(mysqli_real_escape_string($conexion, $_REQUEST['password']??''));
  $idUser =  mysqli_real_escape_string($conexion, $_REQUEST['id']??'');
  $query = "UPDATE Usuarios SET userName = '".$userName."' , nombre = '".$name."', apellido ='".$lastName."' , email = '".$email."', pass = '".$password."'  WHERE id = '".$idUser."'; ";
  $res = mysqli_query($conexion, $query);

  if($res){
    echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=users&mensaje=Usuario ' .$userName.  ' editado exitosamente" />';
  }else{
    ?>
    <div class="alert alert-danger" role="alert">
      Error al editar usuario <?php echo mysqli_error($conexion); ?>
    </div>
<?php
  }
}

$id = mysqli_real_escape_string($conexion, $_REQUEST['id']??'');
$query = "SELECT * FROM Usuarios WHERE id ='".$id."';";
$res = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($res);


?>




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-lg-12  col-sm-12  text-center">
            <h1>Editar Usuario</h1>
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
              <form action="panel.php?modulo=editUser" method="post">
              <div class="row">
                <div class="col">
                <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" name="name" id="" class="form-control" value="<?php echo $row['nombre']; ?>" />
                    </div>
    
                </div>
                <div class="col">
                <div class="form-group">
                      <label for="lastName">Apellido</label>
                      <input type="text" name="lastName" id="" class="form-control" value="<?php echo $row['apellido'];  ?>" />
                    </div>
  
                </div>
              
               </div>
               <div class="row">
                <div class="col">
              
                    <div class="form-group">
                      <label for="userName">Usuario</label>
                      <input type="text" name="userName" id="" class="form-control" value="<?php echo $row['userName'];  ?>" required />
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                      <label for="password">Contaseña</label>
                      <input type="password" name="password" id="" class="form-control"  required />
                    </div>
                    </div>
                </div>

                <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="" class="form-control" value="<?php echo $row['email'];  ?>" />
                    </div>

                    <div class="form-group">
                    <input type="hidden"  name="id" value="<?php echo $row['id']; ?>" />
                      <button type="submit" class="btn btn-primary form-control" name="edit">Editar</button>
                    </div>
                    <div class="form-group">
                      <a href="panel.php?modulo=users" type="button" class="btn btn-danger form-control" name="cancel">Cancelar</a>
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