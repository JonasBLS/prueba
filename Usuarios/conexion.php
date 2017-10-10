<?php
function conectarPSQL() {
	$conexionBD = pg_connect("host=localhost port=5433 dbname=reg_prueba user=postgres password=leonardo");
	if (!$conexionBD) {
		die('Ocurrio un Problema en la conexion');
	}
	return $conexionBD;
}

function queryPSQL($sql) {
	$conn = conectarPSQL();
	$result = pg_query(
		$conn, $sql
	);
	pg_close($conn);
	return $result;
}
?>
