<?php
include_once 'conexion.php';

if (empty($_POST)) {
    die('Erro al guardar usuario');
}
$usuId = !empty($_POST['usu_id']) ? $_POST['usu_id'] : '';
$usuNombre = !empty($_POST['usu_nombre']) ? $_POST['usu_nombre'] : '';
$usuApellidoPaterno = !empty($_POST['usu_apellido_paterno']) ? $_POST['usu_apellido_paterno'] : '';
$usuApellidoMaterno = !empty($_POST['usu_apellido_materno']) ? $_POST['usu_apellido_materno'] : '';
$usuCorreo = !empty($_POST['usu_correo']) ? $_POST['usu_correo'] : '';
$usuPassword = !empty($_POST['usu_password']) ? $_POST['usu_password'] : '';
$rolId = !empty($_POST['rol_id']) ? $_POST['rol_id'] : '';

$sql = "";
if (empty($usuId)) {
    $sql = "INSERT INTO usuario(usu_nombre, usu_apellido_paterno, usu_apellido_materno, usu_correo, usu_password, rol_id)
    VALUES ('$usuNombre', '$usuApellidoPaterno', '$usuApellidoMaterno', '$usuCorreo', '$usuPassword', '$rolId');";
} else {
    $sql = "UPDATE usuario
    SET usu_nombre = '$usuNombre', usu_apellido_paterno = '$usuApellidoPaterno', usu_apellido_materno = '$usuApellidoMaterno', usu_correo = '$usuCorreo', usu_password = '$usuPassword', rol_id = '$rolId'
    WHERE usu_id = '$usuId';";
}
$resultado = queryPSQL($sql);
if ($resultado) {
    echo 'Usuario guardado correctamente';
} else {
    echo 'Error al guardar el usuario';
}
 ?>
