<?php 

    if (!empty($_POST["btnRegistrar"])) {
        if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["dni"]) and !empty($_POST["fecha"]) and !empty($_POST["email"])) {
            echo '<div class="alert alert-success">Registro completo.</div>';
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $dni = $_POST["dni"];
            $fecha = $_POST["fecha"];
            $email = $_POST["email"];

            $sql = $conexion->query(" insert into persona(nombre,apellido,dni,fecha_nac,email) values('$nombre', '$apellido', '$dni', '$fecha', '$email')");;
            if ($sql == 1) {
                echo '<div class="alert alert-success"> Persona registrada correctamente. </div>';
            }else{
                echo '<div class="alert alert-danger"> Error, persona no registrada. </div>';
            }

        }else{
            echo '<div class="alert alert-danger">Alguno de los campos están vacios.</div>';
        }
    }

?>