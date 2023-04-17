<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <link rel="icon" href="../Images/logo.png">
        <link href="../CSS/estilosRegistro.css" rel="stylesheet" type="text/css">

        <title>Registro</title>
    </head>

    <body class="bg-danger">
        <div class="signup-form">
            <form action="RegistrarUsuario.php" method="post">
                <!--<h1 class="h1 fw-bold">CinemaOps</h1>
                <hr>-->
                <!--<h3 class="fw-normal mb-3 pb-3">Iniciar Sesión</h3>-->
                <h2>Registro</h2>
                <p class="hint-text">Crea tu cuenta. Es gratis y sólo lleva un minuto.</p>
                <div class="form-group">
                    <input type="text" class="form-control" name="nombre_completo" placeholder="Nombre completo" required="required">
                    <!--<div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" required="required">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required">
                        </div>
                    </div>-->
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="correo" placeholder="Correo electrónico" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirmar contraseña" required="required">
                </div>
                <div class="form-group">
                    <label class="form-check-label">
                        <input type="checkbox" required="required"> <small>Acepto las
                        <a href="#" class="link-danger">Condiciones de uso</a> y la 
                        <a href="#" class="link-danger">Política de privacidad</a></small>
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-block btn-danger">Registrarse</button>
                </div>
            </form>
            <div class="text-center">¿Ya tienes una cuenta?
                <a href="../PHP/InicioSesion.php" class="link-light">Acceder</a>
            </div>
        </div>
    </body>
</html>
