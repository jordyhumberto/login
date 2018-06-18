<?php
	session_start(); //Inicia una nueva sesión o reanuda la existente
	require 'conexion.php'; //Agregamos el script de Conexión
	
//Evaluamos si existe la variable de sesión id_usuario, si no existe redirigimos al index
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	
	$idUsuario = $_SESSION['id_usuario'];

	//Consultamos los datos del Usuario
	$sql = "SELECT Id_Usuario, Nombre FROM usuarios  WHERE Id_Usuario = '$idUsuario'";
	$result=$mysqli->query($sql);
	$row = $result->fetch_assoc();
?>

<html>
	<head>
		<title>Welcome</title>
	</head>
	
	<body>

	<!-- Imprimimos el nombre del usuario con datos de la consulta  -->
	<h1><?php echo 'Bienvenid@ '.utf8_decode($row['Nombre']); ?></h1>
	
<!-- Evaluamos el perfil, si es administrador muestra la opción para registrar mas usuarios  -->
	<?php //if($_SESSION['tipo_usuario']==1) { ?>
	
	<!--<a href="registro.php">Registarse</a>-->
	<!--<br />-->
	<?php //} ?>
	
<!-- Muestra la opción para Cerrar Sesión  -->
	<a href="logout.php">Cerrar Sesi&oacute;n</a>
	
	</body>
</html>