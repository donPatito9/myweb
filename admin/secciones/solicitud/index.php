<?php 

include("../../bd.php");

if(isset($_GET['txtId'])){
    //borrar dichos registros con ID correspondinte
    $txtId=(isset($_GET['txtId']))?$_GET['txtId']:"";
    $sentencia=$connection->prepare("DELETE FROM tbl_solicitud WHERE id_solicitud=:id_solicitud");
    $sentencia->bindParam(":id_solicitud",$txtId);
    $sentencia->execute();

}

//seleccionar registros
$sentencia=$connection->prepare("SELECT * FROM `tbl_solicitud`");
$sentencia->execute();

$lista_servicio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar solicitud</a>
        
    </div>
    <div class="card-body">
       
     <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id_Solicitud</th>
                    <th scope="col">Id_Usuario</th>
                    <th scope="col">Id_servicio</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista_servicio as $registros){ ?>
                <tr class="">
                    <td><?php echo $registros['id_solicitud']; ?></td>
                    <td><?php echo $registros['id_usuario']; ?></td>
                    <td><?php echo $registros['id_servicio']; ?></td>
                    <td>
                      <a name="" id="" class="btn btn-info" href="editar.php? txtId=<?php echo $registros['id_solicitud']; ?>" role="button">Editar</a> 
                    <a name="" id="" class="btn btn-danger" href="index.php? txtId=<?php echo $registros['id_solicitud']; ?>" role="button">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
     </div>
     

    </div>
    
    </div>
</div>

<?php include("../../templates/footer.php");?>