<?php

include("../../bd.php");

if($_POST){

  

    //recepcionamos los valores del formulario
    $nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
    $rut=(isset($_POST['rut']))?$_POST['rut']:"";
    $correo=(isset($_POST['correo']))?$_POST['correo']:"";
    $telefono=(isset($_POST['telefono']))?$_POST['telefono']:"";
    $direccion=(isset($_POST['direccion']))?$_POST['direccion']:"";
    //Preparamos la consulta insertar datos en la tabla usuarios
    $sentencia=$connection->prepare("INSERT INTO `tbl_usuarios` (`id`, `nombre`, `rut`, `correo`,`telefono`, `direccion`) 
    VALUES (NULL, :nombre, :rut, :correo, :telefono, :direccion);");
    

     $sentencia->bindParam(":nombre",$nombre);
     $sentencia->bindParam(":rut",$rut);
     $sentencia->bindParam(":correo",$correo);
     $sentencia->bindParam(":telefono",$telefono); 
     $sentencia->bindParam(":direccion",$direccion);


    $sentencia->execute();
    $mensaje="Registro agregado con exito.";
    header("Location:index.php?mensaje=".$mensaje);

}

include("../../templates/header.php");
?>
 
<div class="card">
    <div class="card-header">
        Crear Usuarios
    </div>
    <div class="card-body">
        
    <form action=""enctype="multipart/form-data"type method="post">

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text"
        class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingresar Nombre">
    </div>

    <div class="mb-3">
      <label for="rut" class="form-label">Rut</label>
      <input type="text"
      class="form-control" name="rut" id="rut" aria-describedby="helpId" placeholder="Ingresar Rut">
    </div>

    <div class="mb-3">
      <label for="correo" class="form-label">Correo</label>
      <input type="email" 
      class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Ingresar Correo">
    </div>

  <div class="mb-3">
    <label for="telefono" class="form-label">Telefono</label>
    <input type="text"
      class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Ingresar Telefono">
    
  </div>

  <div class="mb-3">
    <label for="direccion" class="form-label">Direccion</label>
    <input type="text"
      class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="Ingresar Dirección">
    
  </div>

  <button type="submit" class="btn btn-success">Agregar</button>
 

  <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

</form>

</div>

    <div class="card-footer text-muted">
        
    </div>
</div>


<?php include("../../templates/footer.php");?>