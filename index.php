<?php
	require('conexion.php');
	
	session_start();
	
	if(isset($_SESSION["id_usuario"])){
		header("Location: welcome.php");
	}
	
	if(!empty($_POST))
	{
		$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$password = mysqli_real_escape_string($mysqli,$_POST['clave']);
		$error = '';
		
		$sql = "SELECT Id_Usuario,Usuario,Clave,Estado FROM usuarios WHERE Usuario = '$usuario' AND Clave = '$password' AND Estado='01'";
		//, id_tipo
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;
		
		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['id_usuario'] = $row['Id_Usuario'];
			//$_SESSION['tipo_usuario'] = $row['id_tipo'];
			
			header("location: welcome.php");
			} else {
			$error = "El nombre o contrase&ntilde;a son incorrectos";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
	<div class=cuerpo>
		<div class="login">
			<img class="logo" src="logo.png" alt="logo">
			<form class="formulario" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off"> 
				<label>Usuario:</label><input id="usuario" name="usuario" type="text" >
				<label>Clave:</label><input id="clave" name="clave" type="password">
				<input class="boton" name="login" type="submit" value="login">
			</form> 
			<br />
			<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>	
		</div>
	</div>
</body>
</html>