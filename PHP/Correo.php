<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    // Obtener los datos del formulario
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $mensaje = $_POST['message'];

    // Configuración del servidor SMTP y del correo electrónico
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'isailara2002@outlook.com';
    $mail->Password   = 'CONTRASEÑA';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom($email, $nombre);
    $mail->addAddress('isailara2002@outlook.com');

    // Configuración del correo electrónico
    $mail->isHTML(true);
    $mail->Subject = 'Nuevo mensaje de contacto';
    $mail->Body = "
                    <html>
                    <head>

                    </head>
                    <body>
                        <h2>Nuevo mensaje de contacto</h2>
                        <p><strong>Nombre:</strong> $nombre</p>
                        <p><strong>Correo electrónico:</strong> $email</p>
                        <p><strong>Mensaje:</strong></p>
                        <p>$mensaje</p>
                    </body>
                    </html>
                ";

    // Envío del correo electrónico
    try {
        $mail->send();
        header('Location: Contacto.php?success=true');
    } catch (Exception $e) {
        header('Location: Contacto.php?success=false&error=' . urlencode($mail->ErrorInfo));
    }    
?>