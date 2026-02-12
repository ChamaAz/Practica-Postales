<?php
// Mostrar todos los errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'conexion.php';

require 'C:\xampp\htdocs\Postales_Mail_Final\src\Exception.php';
require 'C:\xampp\htdocs\Postales_Mail_Final\src\PHPMailer.php';
require 'C:\xampp\htdocs\Postales_Mail_Final\src\SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Validación de datos

if (
    !isset($_POST['selected_emails'], $_POST['selected_imagenes']) ||
    empty($_POST['selected_emails']) ||
    empty($_POST['selected_imagenes'])
) {
    die("Debes seleccionar al menos una imagen y un correo.");
}

$emails   = $_POST['selected_emails'];
$imagenes = $_POST['selected_imagenes'];

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = '127.0.0.1';
    $mail->Port       = 1587;         
    $mail->SMTPAuth   = true;
   $mail->AuthType   = 'LOGIN';      
    $mail->Username   = 'ana.martin@scarlatti.com';
    $mail->Password   = 'ana';
    $mail->SMTPSecure = false;
    $mail->SMTPAutoTLS = false;
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('ana.martin@scarlatti.com', 'Ana');

    foreach ($emails as $email) {
        $mail->addAddress($email);
    }

    $mail->Subject = 'Postales Seleccionadas';
    $mail->Body    = 'Se adjuntan las imágenes seleccionadas.';
    // adjuntar imagenes
    foreach ($imagenes as $imagen) {
        $rutaReal = __DIR__ . '/' . $imagen;
        if (file_exists($rutaReal)) {
            $mail->addAttachment($rutaReal);
        }
    }
    //enviar correo

    $mail->send();
    echo "Correo enviado correctamente";

} catch (Exception $e) {
    echo " Error al enviar el correo: " . $mail->ErrorInfo;
}
