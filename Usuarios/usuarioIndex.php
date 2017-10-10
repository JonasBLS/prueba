<?php
include_once 'conexion.php';

$sql = "SELECT
    U.usu_id,
    U.usu_nombre || ' ' || U.usu_apellido_paterno || ' ' || U.usu_apellido_materno AS nombre_completo,
    R.rol_nombre
FROM
    usuario U
    JOIN rol R USING (rol_id)
;";

$resultados = queryPSQL($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Administración de usuarios</title>
    </head>
    <body>
        <h1 class="text-center">Administración de usuarios</h1>

        <hr>
        <a class="btn btn-default" href="usuarioEditar.php">Agregar usuario</a>
        <hr>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>Usuario Id</th>
                    <th>Nombre Completo</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($renglon = pg_fetch_assoc($resultados)) :
                    ?>
                    <tr>
                        <td>
                                <a class="btn btn-primary" href="usuarioEditar.php?id=<?php echo $renglon['usu_id']; ?>">Editar</a>

                                <form action="usuarioEliminar.php" method="post" class="btn">
                                    <input type="hidden" name="usu_id" value="<?php echo $renglon['usu_id'];?>">
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                        </td>
                        <td><?php echo $renglon['usu_id']; ?></td>
                        <td><?php echo $renglon['nombre_completo']; ?></td>
                        <td><?php echo $renglon['rol_nombre']; ?></td>
                    </tr>
                    <?php
                endwhile;
                 ?>
            </tbody>
        </table>
    </body>
</html>
