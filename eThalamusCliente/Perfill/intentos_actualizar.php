<?php


        //buscar pass y correo de usuario en bd
        include '../Conexion/conexion_enlace.php';

        $enlace = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);

        /* comprobar la conexión */
        if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
        }
	
        //$query_usuario = $enlace->query("SELECT Id, Email FROM Usuarios WHERE User='".$usuario."'");
		$query_usuario = $enlace->query("SELECT Id FROM Usuarios WHERE User='".$usuario."'");
	
		if ($query_usuario->num_rows != 0){
			$fila = $query_usuario->fetch_row();
			$id = $fila[0];
			$enlace->query("UPDATE Usuarios SET Intentos=4 WHERE Id=".$id);
		}

		$enlace->close();

?>

