<?php
include_once 'conexion.php';

$usuId = "";
$usuNombre = "";
$usuApellidoPaterno = "";
$usuApellidoMaterno = "";
$usuCorreo = "";
$usuPassword = "";
$rolId = "";

if (!empty($_GET['id'])) {
	$sql = "SELECT * FROM usuario WHERE usu_id = '{$_GET['id']}' LIMIT 1;";
	$usuario = pg_fetch_all(queryPSQL($sql));
	$usuario = array_pop($usuario);
	$usuId = $usuario['usu_id'];
	$usuNombre = $usuario['usu_nombre'];
	$usuApellidoPaterno = $usuario['usu_apellido_paterno'];
	$usuApellidoMaterno = $usuario['usu_apellido_materno'];
	$usuCorreo = $usuario['usu_correo'];
	$usuPassword = $usuario['usu_password'];
	$rolId = $usuario['rol_id'];
}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edición Usuarios</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
	<div class="row">
        <h1 class="text-center">Edición de usuario</h1>
        <br>
        <br>
        <br>
		<form class="form-horizontal" action="usuarioGuardar.php" method="post" enctype="multipart/form-data">
			<?php
			if (!empty($usuId)) :
			 	?>
				<input type="hidden" name="usu_id" value="<?php echo $usuId; ?>">
				<?php
			endif;
			  ?>
			<div class="form-group">
				<label class="col-md-3 col-md-offset-3" for="usu_nombre">Nombre:</label>
				<div class="col-md-3">
					<input type="text" class="form-control" name="usu_nombre" value="<?php echo $usuNombre ?>">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 col-md-offset-3" for="usu_apellido_paterno">Apellido Paterno:</label>
				<div class="col-md-3">
					<input type="text" class="form-control" name="usu_apellido_paterno" value="<?php echo $usuApellidoPaterno ?>">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 col-md-offset-3" for="usu_apellido_materno">Apellido Materno:</label>
				<div class="col-md-3">
					<input type="text" class="form-control" name="usu_apellido_materno" value="<?php echo $usuApellidoMaterno ?>">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 col-md-offset-3" for="usu_correo" placeholder="micorreo@ejemplo.com">Correo electrónico:</label>
				<div class="col-md-3">
					<input type="text" class="form-control" name="usu_correo" value="<?php echo $usuCorreo ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 col-md-offset-3" for="usu_password">Password:</label>
				<div class="col-md-3">
					<input type="password" class="form-control" name="usu_password" value="<?php echo $usuPassword ?>">
				</div>
			</div>
            <div class="form-group">
				<label class="col-md-3 col-md-offset-3" for="usu_rol_id">Rol:</label>
				<div class="col-md-3">
					<input type="text" class="form-control" name="rol_id" value="<?php echo $rolId ?>">
				</div>
			</div>
			<div class="col-md-9">
	             <button type="submit" class="btn btn-primary pull-right">Guardar</button>
			</div>
		</form>
	</div>
</div>

</body>
</html>
