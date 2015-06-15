<?php

if ( $_REQUEST['m'] == 1 ) {
	//echo '<span style="color:green" class="mensaje_contrasena" align="center">La Contrase&ntilde;a ha sido modificada exitosamente</span>';
	$mensaje = '<tr>
				<td valign="middle" align="center">
					<span style="color: #606060 ; font-family: "Calibri" ; font-size: 1vw;">Su petici&oacute;n ha sido procesada. Revise su mail.</span> 
					<br> &nbsp; 
					<br> &nbsp; 
					<span style="color: #606060 ; font-family: "Calibri" ; font-size: 1vw;"><br> Si no es redireccionado a la p&aacute;gina de inicio en 5 segundos por favor haga <a href="../index.html">click aqu&iacute;.</a></span>
				</td>
			</tr>	';
} elseif ($_REQUEST['m'] == 2) {
	//echo '<span style="color:red" class="mensaje_contrasena" align="center">Error al ingresar la Contrase&ntilde;a actual</span>';
	$mensaje = '<tr>
					<td valign="middle" align="center" class="texto_informativo_login">
						<span style="color: #606060 ; font-family: "Calibri" ; font-size: 1vw;">E-Mail invalido.</span>
						<br> &nbsp; 
						<br> &nbsp; 
						<span style="color: #606060 ; font-family: "Calibri" ; font-size: 1vw;"><br> Si no es redireccionado a la p&aacute;gina de inicio en 5 segundos por favor haga <a href="../index.html">click aqu&iacute;.</a></span>
					</td>
				</tr>	';				
} else {
	$mensaje = '<tr>
					<td valign="middle" align="center" class="texto_informativo_login">
						<span style="color: #606060 ; font-family: "Calibri" ; font-size: 1vw;">Problemas.</span>
						<br> &nbsp; 
						<br> &nbsp; 
						<span style="color: #606060 ; font-family: "Calibri" ; font-size: 1vw;"><br> Si no es redireccionado a la p&aacute;gina de inicio en 5 segundos por favor haga <a href="../index.html">click aqu&iacute;.</a></span>
					</td>
				</tr>	';
} 

header( "refresh:5;url=../index.html");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>eThalamus</title>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/style-feedback.css" />
	</head>
	<body>
		<table height="100%" width="100%" border="0" cellspacing="0" cellpadding="0" class="texto_informativo_login">
			<?php echo $mensaje;?>
		</table>
	</body>
</html>