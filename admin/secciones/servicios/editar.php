<?php 

include("../../bd.php");

if(isset($_GET['txtId'])){
  //Recuperar los datos del ID correspondinte
  $txtId=(isset($_GET['txtId']))?$_GET['txtId']:"";
  $sentencia=$connection->prepare("SELECT * FROM tbl_servicios WHERE id=:id");
  $sentencia->bindParam(":id",$txtId);
  $sentencia->execute();
  $registro=$sentencia->fetch(PDO::FETCH_LAZY);

  $nombre=$registro['nombre'];
  $direccion=$registro['direccion'];
  $equipo=$registro['equipo'];

}
if($_POST){
  print_r($_POST);

    //recepcionamos los valores del formulario
    $textId=(isset($_POST['txtId']))?$_POST['txtId']:"";
    $nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
    $direccion=(isset($_POST['direccion']))?$_POST['direccion']:"";
    $equipo=(isset($_POST['equipo']))?$_POST['equipo']:"";

    $sentencia=$connection->prepare("UPDATE tbl_servicios
    SET
    nombre=:nombre,
    direccion=:direccion,
    equipo=:equipo
    WHERE id=:id");
    

     $sentencia->bindParam(":nombre",$nombre);
     $sentencia->bindParam(":direccion",$direccion); 
     $sentencia->bindParam(":equipo",$equipo);
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
        class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
      

    </div>

  <div class="mb-3">
    <label for="direccion" class="form-label">Direccion</label>
    <input value="<?php echo $direccion;?>"type="text"
      class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="direccion">
    
  </div>

  <div class="mb-3">
    <label for="equipo" class="form-label">Equipo</label>
    <input value="<?php echo $equipo;?>" type="text"
      class="form-control" name="equipo" id="equipo" aria-describedby="helpId" placeholder="equipo">
    
  </div>

  <button type="submit" class="btn btn-success">Actualizar</button>

  <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

</form>

</div>

    <div class="card-footer text-muted">
        
    </div>
</div>


<?php include("../../templates/footer.php");?>
