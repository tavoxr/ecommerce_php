<div class="container">
  <div class="row">
    <?php 
       
        $query = "SELECT 
        p.id,
        p.nombre,
        p.precio,
        p.stock,
        f.web_path
        FROM 
        Productos AS p
        INNER JOIN productos_files AS pf ON pf.producto_id = p.id
        INNER JOIN files AS f ON f.id = pf.file_id
      
        ";

        $res = mysqli_query($conexion, $query);
        while($row = mysqli_fetch_assoc($res)){
?>
    <div class="col-lg-4 col-md-6 col-sm-12" >
            <div class="card border-primary">
                <img class="card-img-top img-thumbnail" src="<?php echo $row['web_path'] ?> " alt="" />
                <div class="card-body text-center">
                <h4 class="card-text"><strong><?php echo $row['nombre'];?></strong></h4>
                <p class="card-text"><strong>Precio: </strong><?php echo $row['precio']; ?></p>
                <p class="card-text"><strong>Existencia: </strong><?php echo $row['stock']; ?></p>
                <a  class="btn btn-primary w-50 " href="index.php?modulo=detalleProducto&id=<?php echo $row['id']; ?>">Ver</a>
                </div>
            </div>
    </div>

<?php

        }
    ?>

  </div>















  </div>