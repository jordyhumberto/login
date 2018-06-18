<?php
//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$mysqli=new mysqli("localhost","root","","login"); 
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
    }
//https://codigosdeprogramacion.com/2016/12/20/sistema-de-usuarios-y-sesiones-en-php-y-mysql-1-login-sesiones-y-logout/    
?>