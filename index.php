<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD en PHP, MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/97af5af19c.js" crossorigin="anonymous"></script>
</head>

<body>
    <script>
        function actualizarPagina(){
            var url = window.location.href;
            var nuevaUrl = url + (url.indexOf('?') !== -1 ? '&' : '?') + 'timestamp=' + new Date().getTime();

            window.location.href = nuevaUrl;
        }

        function eliminar(){
            var respuesta = confirm("Estás seguro que deseas eliminar?");
            return respuesta;
        }
    </script>

    <h1 class="text-center p-3">Bienvenido, Admin</h1>
    <?php 
            include "modelo/conexion.php";
            include "controlador/registro_persona.php";
            include "controlador/eliminar_persona.php";
    ?>
    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center alert alert-secondary">Registro de personas</h3>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido de la persona</label>
                <input type="text" class="form-control" name="apellido">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">D.N.I</label>
                <input type="text" class="form-control" name="dni" placeholder="Sin puntos.">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <button onclick="actualizarPagina()" type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Registrar</button>
        </form>

        <div class="col-8 p-4">
            <table class="table">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRES</th>
                        <th scope="col">APELLIDOS</th>
                        <th scope="col">DNI</th>
                        <th scope="col">FECHA DE NACIMIENTO</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include"modelo/conexion.php";
                        $sql = $conexion->query(" select * from persona");
                        while($datos=$sql->fetch_object()){ ?>
                    <tr class="text-center">
                        <td><?= $datos->id ?></td>
                        <td><?= $datos->nombre ?></td>
                        <td><?= $datos->apellido ?></td>
                        <td><?= $datos->dni ?></td>
                        <td><?= $datos->fecha_nac ?></td>
                        <td><?= $datos->email ?></td>
                        <td>
                            <a href="modificar_persona.php?id=<?= $datos->id ?>" class="btn btn-small btn-warning"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return eliminar()" href="index.php?id=<?= $datos->id ?>" class="btn btn-small btn-danger"><i
                                    class="fa-solid fa-trash"></i></a>
                        </td>

                    </tr>
                    <?php 
                        }
                        
                    ?>

                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>