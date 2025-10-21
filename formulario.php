<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

// Intradas del form
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$mensaje = (isset($_POST['mensaje'])) ? $_POST['mensaje'] : '';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

$_POST = json_decode(file_get_contents("php://input"), true);

// CONFIGURACIÓN RÁPIDA
$email = 'ovelazquez@corsec.com.mx';
$appPassword = 'oifh ogvh bdli klvf'; // CAMBIAR ESTO

try {
    $mail = new PHPMailer(true);
    
    // Configuración mínima
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $email;
    $mail->Password = $appPassword;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    $mail->CharSet = 'UTF-8';
    
    // Email mínimo
    $mail->setFrom($email, 'Correo del sitio web Iniciativa Norte');
    $mail->addAddress($email);
    $mail->Subject = 'Tienes Correo';
    $mail->isHTML(true);
    $mail->Body = '
    <html>
    Nombre: '.$nombre.'
    <br>
    Correo: '.$correo.'
    <br>
    Mensaje: '.$mensaje.'
    <br>
    </html>
    ';
    
    if ($mail->send()) {
        // echo json_encode('correcto', JSON_UNESCAPED_UNICODE);
        echo "<script>alert('Listo, tu información quedó registrada!')</script>";
        echo "<script>window.location='index.html'</script>";
    } else {
        echo json_encode('error_envio', JSON_UNESCAPED_UNICODE);
    }
    
} catch (Exception $e) {
    // Solo una respuesta según el tipo de error
    if (strpos($e->getMessage(), 'authenticate') !== false) {
        // echo json_encode('Contraseña incorrecta', JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode('Error: ' . $e->getMessage(), JSON_UNESCAPED_UNICODE);
    }
}

?>