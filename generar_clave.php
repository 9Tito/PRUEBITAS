<?php
include 'generador.php';

//obtener nombre de usuario
$usuario = $_POST['user'];

if ( $usuario <> '' ) {
        //buscar pass y correo de usuario en bd
        include 'conexion.php';

        $enlace = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);

        /* comprobar la conexión */
        if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
        }
	
        $query_usuario = $enlace->query("SELECT Id, Email FROM Usuarios WHERE User='".$usuario."'");
	
	if ($query_usuario->num_rows == 0){
		header( "Location: eThalamus/mensajes.php?m=2");
		exit();
	}	
        else{
		$fila_usuario = $query_usuario->fetch_row();
                $id = $fila_usuario[0];
                $email = $fila_usuario[1];
                $pass = generateStrongPassword();
                $pass_encriptada = sha1(md5(trim($pass)));

                $enlace->query("UPDATE Usuarios SET Pass='".$pass_encriptada."' WHERE Id=".$id);
        }

        $asunto = 'Recuperar contrase&ntilde;a de Thalamus';
        $mensaje = 'Ha solicitado recuperar su contrase&ntilde;a.<br><br>'.$pass.'<br><br>Se recomienda cambiar su contrase&ntilde;a y eliminar este correo.';

        //enviar al correo
        $data = array( "email" => $email, "asunto" => $asunto, "mensaje" => $mensaje, "redirect" => $redirect );
        $url = 'http://monitoreo.widefense.cl/Thalamus/Mailer/mailer.php';
        
        $handle = curl_init( $url );
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($handle, CURLOPT_VERBOSE, 0);
        curl_setopt($handle, CURLOPT_FOLLOWLOCATION, 1);
        curl_exec($handle);

        /* cerrar la conexión */
        $enlace->close();
	header( "Location: eThalamus/mensajes.php?m=1");
}
else{
	header( "Location: eThalamus/mensajes.php?m=2");
}

?>

