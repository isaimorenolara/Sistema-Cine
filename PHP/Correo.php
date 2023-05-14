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
                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css' integrity='sha512-M/qB7SHRqj3h3nhZawY2Id4RsZk/8rRwZ7ix3j4USs0r/gcQ6s8t8fIRhtnU+KNw+QfOozzB22SPK/np9NkwMA==' crossorigin='anonymous' referrerpolicy='no-referrer' />
            </head>
            <body>
                <div class='container'>
                    <div class='row'>
                        <div class='col-md-8 offset-md-2'>
                            <h2 class='text-center mb-4'>Nuevo mensaje de contacto</h2>
                            <div class='card'>
                                <div class='card-body'>
                                    <p><strong>Nombre:</strong> $nombre</p>
                                    <p><strong>Correo electrónico:</strong> $email</p>
                                    <p><strong>Mensaje:</strong></p>
                                    <p>$mensaje</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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