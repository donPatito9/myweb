<?php

include("../../bd.php");

if($_POST){

  

    //recepcionamos los valores del formulario
    $id_usuario=(isset($_POST['id_usuario']))?$_POST['id_usuario']:"";
    //$titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $id_servicio=(isset($_POST['id_servicio']))?$_POST['id_servicio']:"";

    $sentencia=$connection->prepare("INSERT INTO `tbl_solicitud` (`id_solicitud`, `id_usuario`, `id_servicio`) 
    VALUES(NULL, :id_usuario, :id_servicio);");
    
    //$sentencia->bindParam(":id_solicitud",$id_solicitud);
     $sentencia->bindParam(":id_usuario",$id_usuario);
     //$sentencia->bindParam(":titulo",$titulo); 
     $sentencia->bindParam(":id_servicio",$id_servicio);


    $sentencia->execute();
    $mensaje="Registro agregado con exito.";
    header("Location:index.php?mensaje=".$mensaje);

}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        Crear Solicitud
    </div>
    <div class="card-body">
        
    <form action=""enctype="multipart/form-data"type method="post">

    <div class="mb-3">
      <label for="id_usuario" class="form-label">Id_usuario</label>
      <input type="number"
        class="form-control" name="id_usuario" id="id_usuario" aria-describedby="helpId" placeholder="id_usuario">
      

    </div>

  <!--<div class="mb-3">
    <label for="titulo" class="form-label">Titulo</label>
    <input type="text"
      class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">
    
  </div>-->

  <div class="mb-3">
    <label for="id_servicio" class="form-label">Id_servicio</label>
    <input type="number"
      class="form-control" name="id_servicio" id="id_servicio" aria-describedby="helpId" placeholder="id_servicio">
    
  </div>

  <button type="submit" class="btn btn-success">Agregar</button>

  <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

</form>

</div>

    <div class="card-footer text-muted">
        
    </div>
</div>


<?php include("../../templates/footer.php");?>