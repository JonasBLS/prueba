<?php
include_once 'conexion.php';

$usuId = empty($_POST['usu_id']) && is_numeric($_POST['usu_id']) ? '' : $_POST['usu_id'];

$sql = "DELETE FROM usuario WHERE usu_id = '$usuId';";

if (!empty($usuId)) {
    queryPSQL($sql);
    echo "Usuario $usuId eliminado correctamente!";
} else {
    echo "No se especifico el usuario para ser eliminado";
}
?>
