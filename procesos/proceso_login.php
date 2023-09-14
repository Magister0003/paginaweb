<?php
include("../procesos/conexion.php");

// Obtener el nombre de usuario y la contraseña del formulario de inicio de sesión
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta SQL para buscar el usuario en la base de datos
$sql = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if ($result === false) {
	// Si hay un error de consulta, se muestra un mensaje de error
	echo "Error de consulta: " . mysqli_error($conn);
} elseif (mysqli_num_rows($result) == 1) {
	// Si el usuario existe, se obtiene su nivel de acceso
	$row = mysqli_fetch_assoc($result);
	$access_level = $row['access_level'];
	$email = $row['email']; 
	$archivo = $row['archivo'];// Nombre del archivo de imagen del usuario
	

	// Se inicia la sesión y se establece el nivel de acceso del usuario
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['access_level'] = $access_level;
	$_SESSION['email'] = $email;
	$_SESSION['archivo'] = $archivo;
       
    if ($access_level >= 1) {
		header('Location: ../admin.html');
		exit();
	} 
 } else {
	// Si el usuario no existe, se muestra un mensaje de error 
	// Generar una alerta
	$mensaje = "Nombre de usuario o contraseña incorrectos.";
	echo '<script>alert("'. $mensaje . '");</script>';
	header('Location: form_login.php');
		exit();
	//echo "Nombre de usuario o contraseña incorrectos.";
}

// Cierre de la conexión a la base de datos
mysqli_close($conn);
?>