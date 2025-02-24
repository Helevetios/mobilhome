<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php'; // Asegúrate de que PHPMailer esté correctamente instalado

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'mobilhome.casamovilsur.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mobilhome@mobilhome.casamovilsur.com'; // Tu correo
        $mail->Password = '?uM0*QNp&9AN'; // Contraseña o app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Destinatario
        $mail->setFrom($correo);
        $mail->addAddress('mobilhome@mobilhome.casamovilsur.com'); 

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'MobilHome Solicitud de presupuesto';
        $mail->Body    = "Correo: $correo\nMensaje: $mensaje";

        $mail->send();
        echo "¡Mensaje enviado con éxito!";
    } catch (Exception $e) {
        echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
    }
}
?>
