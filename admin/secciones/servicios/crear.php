<?php

include("../../bd.php");

if($_POST){

  

    //recepcionamos los valores del formulario
    $nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
    $direccion=(isset($_POST['direccion']))?$_POST['direccion']:"";
    $equipo=(isset($_POST['equipo']))?$_POST['equipo']:"";
    
    //$descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";

    $sentencia=$connection->prepare("INSERT INTO `tbl_servicios` (`id`, `nombre`, `direccion`, `equipo`) 
    VALUES (NULL, :nombre, :direccion, :equipo);");
    

     $sentencia->bindParam(":nombre",$nombre);
     $sentencia->bindParam(":direccion",$direccion); 
     $sentencia->bindParam(":equipo",$equipo);


    $sentencia->execute();
    $mensaje="Registro agregado con exito.";
    header("Location:index.php?mensaje=".$mensaje);

}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        Crear servicios
    </div>
    <div class="card-body">
        
    <form action=""enctype="multipart/form-data"type method="post">

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text"
      class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="nombre">
    </div>

  <div class="mb-3">
    <label for="direccion" class="form-label">Direccion</label>
    <input type="text"
      class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="direccion">
    
  </div>

  <div class="mb-3">
    <label for="equipo" class="form-label">Equipo</label>
    <input type="text"
      class="form-control" name="equipo" id="equipo" aria-describedby="helpId" placeholder="equipo">
    
  </div>

  <button type="submit" class="btn btn-success">Agregar</button>

  <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

</form>

</div>

    <div class="card-footer text-muted">
        
    </div>
</div>


<?php include("../../templates/footer.php");?>