<?php 

include "modelo/conexion.php";

$id = $_GET["id"];

$sql = $conexion->query(" select * from persona where id = $id ");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/97af5af19c.js" crossorigin="anonymous"></script>
</head>

<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center alert alert-secondaty">Modificar Persona</h3>
        <input type="hidden" name="id" value="<?= $_GET["id"]?>">
        <?php 
        include "controlador/modificar_persona.php";
    while($datos = $sql->fetch_object()){?>
        <div class="mb-1">
            <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
            <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>">
        </div>
        <div class="mb-1">
            <label for="exampleInputEmail1" class="form-label">Apellido de la persona</label>
            <input type="text" class="form-control" name="apellido" value="<?= $datos->apellido ?>">
        </div>
        <div class="mb-1">
            <label for="exampleInputEmail1" class="form-label">D.N.I</label>
            <input type="text" class="form-control" name="dni" placeholder="Sin puntos." value="<?= $datos->dni ?>">
        </div>
        <div class="mb-1">
            <label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fecha" value="<?= $datos->fecha_nac ?>">
        </div>
        <div class="mb-1">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                value="<?= $datos->email ?>">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <?php 
    }
    ?>
        <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Modificar</button>
    </form>
</body>

</html>