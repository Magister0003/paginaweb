<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$para = "integraticwww@gmail.com";
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$movil = $_POST['movil'];
$servicio = $_POST['servicio'];
$mensaje = $_POST['mensaje'];

// Crea una instancia de PHPMailer
$mail = new PHPMailer();

// Configura el servidor SMTP de Gmail Usuario: integraticwww@gmail.com / Contraseña: integraticsas456* / llave de seguridad: hwzgzfhbukxyfekk
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'integraticwww@gmail.com';
$mail->Password = 'hwzgzfhbukxyfekk';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

// Configura el mensaje
$mail->setFrom($email, $nombre);
$mail->addAddress($para);
$mail->Subject = "Mensaje enviado desde www.integratic.com.co por $nombre";

// Agrega los campos 'Móvil' y 'Servicio' al cuerpo del mensaje
$mail->Body = "Nombre: $nombre\nCorreo electrónico: $email\nMóvil: $movil\nServicio: $servicio\n\nMensaje:\n$mensaje";




// Envía el mensaje y verifica si hay errores
if(!$mail->send()) {
    echo 'Error al enviar el mensaje: ' . $mail->ErrorInfo;
} else {
    //echo 'Mensaje enviado correctamente';
     // Redirige al usuario a una página de confirmación
     echo '<script>
     alert("Esta información fue enviada correctamente");
     window.location.href = "index.html"; // Reemplaza con la URL a la que deseas redirigir
     </script>';
     //header("Location: index.html");
    exit;
}

?>
