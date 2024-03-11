<?php 

include("../../bd.php");

if(isset($_GET['txtId'])){
    //borrar dichos registros con ID correspondinte
    $txtId=(isset($_GET['txtId']))?$_GET['txtId']:"";
    $sentencia=$connection->prepare("DELETE FROM tbl_servicios WHERE id=:id");
    $sentencia->bindParam(":id",$txtId);
    $sentencia->execute();

}

//seleccionar registros
$sentencia=$connection->prepare("SELECT * FROM `tbl_servicios`");
$sentencia->execute();

$lista_servicio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Servicio</a>
        
    </div>
    <div class="card-body">
       
     <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Equipo</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista_servicio as $registros){ ?>
                <tr class="">
                    <td><?php echo $registros['id']; ?></td>
                    <td><?php echo $registros['nombre']; ?></td>
                    <td><?php echo $registros['direccion']; ?></td>
                    <td><?php echo $registros['equipo']; ?></td>
                    <td>
                      <a name="" id="" class="btn btn-info" href="editar.php? txtId=<?php echo $registros['id']; ?>" role="button">Editar</a> 
                    <a name="" id="" class="btn btn-danger" href="index.php? txtId=<?php echo $registros['id']; ?>" role="button">Eliminar</a>
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