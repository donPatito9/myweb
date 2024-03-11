<?php 

include("../../bd.php");

if(isset($_GET['txtId'])){
  //Recuperar los datos del ID correspondinte
  $txtId=(isset($_GET['txtId']))?$_GET['txtId']:"";
  $sentencia=$connection->prepare("SELECT * FROM tbl_solicitud WHERE id_solicitud=:id_solicitud");
  $sentencia->bindParam(":id_solicitud",$txtId);
  $sentencia->execute();
  $registro=$sentencia->fetch(PDO::FETCH_LAZY);

  $id_usuario=$registro['id_usuario'];
  
  $id_servicio=$registro['id_servicio'];

}
if($_POST){
  print_r($_POST);

    //recepcionamos los valores del formulario
    $txtId=(isset($_POST['txtId']))?$_POST['txtId']:"";
    $id_usuario=(isset($_POST['id_usuario']))?$_POST['id_usuario']:"";
    //$titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $id_servicio=(isset($_POST['id_servicio']))?$_POST['id_servicio']:"";

    $sentencia=$connection->prepare("UPDATE tbl_solicitud
    SET
    id_usuario=:id_usuario,
    id_servicio=:id_servicio
    WHERE id_solicitud=:id_solicitud");
    

     $sentencia->bindParam(":id_usuario",$id_usuario);
     //$sentencia->bindParam(":titulo",$titulo); 
     $sentencia->bindParam(":id_servicio",$id_servicio);
     $sentencia->bindParam(":id_solicitud",$txtId);
     $sentencia->execute();
     $mensaje="Registro modificado con exito.";
     header("Location:index.php?mensaje=".$mensaje);

}

include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
        Editando la informacion de Solicitud
    </div>
    <div class="card-body">
        
    <form action=""enctype="multipart/form-data"type method="post">

    <div class="mb-3">
      <label for="txtId" class="form-label">Id_Solicitud:</label>
      <input readonly value="<?php echo $txtId;?>" type="text"
        class="form-control" name="txtId" id="txtId" aria-describedby="helpId" placeholder="ID">
      
  
      
    </div>

    <div class="mb-3">
      <label for="id_usuario" class="form-label">id_usuario</label>
      <input value="<?php echo $id_usuario;?>"type="number"
        class="form-control" name="id_usuario" id="id_usuario" aria-describedby="helpId" placeholder="id_usuario">
      

    </div>

  <!--<div class="mb-3">
    <label for="titulo" class="form-label">Titulo</label>
    <input value="<?php echo $titulo;?>"type="text"
      class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">
    
  </div>-->

  <div class="mb-3">
    <label for="id_servicio" class="form-label">Id_Servicio</label>
    <input value="<?php echo $id_servicio;?>" type="number"
      class="form-control" name="id_servicio" id="id_servicio" aria-describedby="helpId" placeholder="id_servicio">
    
  </div>

  <button type="submit" class="btn btn-success">Actualizar</button>

  <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

</form>

</div>

    <div class="card-footer text-muted">
        
    </div>
</div>


<?php include("../../templates/footer.php");?>