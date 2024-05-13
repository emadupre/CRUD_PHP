<?php 

    if (!empty($_POST["btnRegistrar"])) {
        if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["dni"]) and !empty($_POST["fecha"]) and !empty($_POST["email"])) {
            echo '<div class="alert alert-success">Modificacion completa.</div>';
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $dni = $_POST["dni"];
            $fecha = $_POST["fecha"];
            $email = $_POST["email"];

            $sql = $conexion->query(" update persona set nombre='$nombre', apellido='$apellido', dni = $dni, fecha_nac='$fecha', email='$email' where id = $id ");
            if ($sql == 1) {
                echo '<div class="alert alert-success"> Persona modificada correctamente. </div>';
                header("location:index.php");
            }else{
                echo '<div class="alert alert-danger"> Error, persona no modificada. </div>';
            }

        }else{
            echo '<div class="alert alert-danger">Alguno de los campos está vacio.</div>';
        }
    }

?>