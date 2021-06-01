<?php
 include_once "./db_ecommerce.php";
 $conexion  = mysqli_connect($host, $user,$pass, $db,$port);

 if(isset($_REQUEST['idDelete'])){

  $idUser= mysqli_real_escape_string($conexion, $_REQUEST['idDelete']??'');
  $query = "DELETE FROM Usuarios WHERE id = '".$idUser."';";
  $res = mysqli_query($conexion,$query);

  if($res){
   
    ?>
  <div class="alert alert-warning float-right" role="alert">
    Usuario eliminado con exito. 
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
            <h1>Usuarios</h1>
          </div>
          <div class=" col-lg-2 col-sm-12 text-right">
          <a class="btn btn-success w-100 text-white" href="panel.php?modulo=createUser" >New User</a>
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
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>UserName</th>
                  <th>Email</th>
                  <th>Actions  </th>
                  
                </tr>
                </thead>
                <tbody>

                <?php
                 
                  $query = "SELECT * FROM Usuarios;";
                  $res = mysqli_query($conexion,$query);
                              
                  while($row = mysqli_fetch_assoc($res)){
?>

                <tr>
                  <td><?php echo $row['userName'];   ?></td>
                  <td><?php echo $row['email'];  ?></td>
                  <td>
                    <a class="btn btn-primary" href="panel.php?modulo=editUser&id=<?php echo $row['id'];  ?>" >
                      <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger delete" href="panel.php?modulo=users&idDelete=<?php echo $row['id'] ?>">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
                    <?php
                  }
                ?>
                
              
                </tbody>
               
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