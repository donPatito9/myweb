<?php 

include("../../bd.php");

if(isset($_GET['txtId'])){
  //Recuperar los datos del ID correspondinte
  $txtId=(isset($_GET['txtId']))?$_GET['txtId']:"";
  $sentencia=$connection->prepare("SELECT * FROM tbl_usuarios WHERE id=:id");
  $sentencia->bindParam(":id",$txtId);
  $sentencia->execute();
  $registro=$sentencia->fetch(PDO::FETCH_LAZY);

  $nombre=$registro['nombre'];
  $rut=$registro['rut'];
  $correo=$registro['correo'];
  $telefono=$registro['telefono'];
  $direccion=$registro['direccion'];

}
if($_POST){
  print_r($_POST);

    //recepcionamos los valores del formulario
    
    $texId=(isset($_POST['txtId']))?$_POST['txtId']:"";
    $nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
    $rut=(isset($_POST['rut']))?$_POST['rut']:"";
    $correo=(isset($_POST['correo']))?$_POST['correo']:"";
    $telefono=(isset($_POST['telefono']))?$_POST['telefono']:"";
    $direccion=(isset($_POST['direccion']))?$_POST['direccion']:"";

    $sentencia=$connection->prepare("UPDATE tbl_usuarios
    SET
    nombre=:nombre,
    rut=:rut,
    correo=:correo,
    telefono=:telefono,
    direccion=:direccion
    WHERE id=:id");
    
    
    
    //$sentencia->bindParam(":textId",$txtId);
     $sentencia->bindParam(":nombre",$nombre);
     $sentencia->bindParam(":rut",$rut);
     $sentencia->bindParam(":correo",$correo);
     $sentencia->bindParam(":telefono",$telefono); 
     $sentencia->bindParam(":direccion",$direccion);
     $sentencia->bindParam(":id",$txtId);
    
     $sentencia->execute();
     $mensaje="Registro modificado con exito.";
     header("Location:index.php?mensaje=".$mensaje);

}

include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
        Editando la informacion del servicios
    </div>
    <div class="card-body">
        
    <form action=""enctype="multipart/form-data"type method="post">

    <div class="mb-3">
      <label for="txtId" class="form-label">ID:</label>
      <input readonly value="<?php echo $txtId;?>" type="text"
        class="form-control" name="txtId" id="txtId" aria-describedby="helpId" placeholder="ID">
        
    </div>

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input value="<?php echo $nombre;?>"type="text"
        class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="nombre">
      
    </div>


    <div class="mb-3">
      <label for="rut" class="form-label">Rut</label>
      <input value="<?php echo $rut;?>"type="text"
        class="form-control" name="rut" id="rut" aria-describedby="helpId" placeholder="rut">
    </div>


    <div class="mb-3">
      <label for="correo" class="form-label">Correo</label>
      <input value="<?php echo $correo;?>"type="email"
        class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="correo">
    </div>
    

  <div class="mb-3">
    <label for="telefono" class="form-label">Telefono</label>
    <input value="<?php echo $telefono;?>"type="text"
      class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Telefono">
    
  </div>

  <div class="mb-3">
    <label for="direccion" class="form-label">Direccion</label>
    <input value="<?php echo $direccion;?>" type="text"
      class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="direccion">
    
  </div>

  <button type="submit" class="btn btn-success">Actualizar</button>

  <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

</form>

</div>

    <div class="card-footer text-muted">
        
    </div>
</div>

<?php include("../../templates/footer.php");?>