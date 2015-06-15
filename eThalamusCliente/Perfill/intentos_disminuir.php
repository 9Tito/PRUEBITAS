<?php session_start();

include '../../conexion.php';

$consulta = "SELECT Intentos FROM Usuarios WHERE Id=?";
$enlace = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);

if ($sentencia = $enlace->prepare( $consulta )) {

	/* enlazar parametros */
	$sentencia->bind_param( "s", $_SESSION["id_usuario"] );

	/* ejecutar la consulta de clientes */
	$sentencia->execute();

	/* almacenar el resultado */
	$sentencia->store_result();

	if ( $sentencia->num_rows > 0 ) {
		/* enlaza el resultado */
		$sentencia->bind_result( $Intentos_usuario );
		$sentencia->fetch();
		$Intentos_usuario = $Intentos_usuario - 1;
		$enlace->query("UPDATE Usuarios SET Intentos = ".$Intentos_usuario." WHERE Id = ".$_SESSION["id_usuario"]);
	}	

	//liberar resultado
	$sentencia->free_result();
}
// cerrar la conexión
//$enlace->close();
?>
