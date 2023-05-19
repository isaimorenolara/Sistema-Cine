<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->


  <link rel="icon" href="../Images/logo.png">
  <link href="../CSS/estilosInicioSesion.css" rel="stylesheet" type="text/css">
  <script src="../JS/funcionesInicioSesion.js"></script>

  <title>Inicio Sesión</title>

</head>

<body>
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-black">

          <br>
          <div class="px-5 ms-xl-4">
            <span class="h1 fw-bold mb-0"><a class="tituloinico link-dark" href="../PHP/Inicio.html">CinemaOps</a></span>
          </div>

          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

            <!-- <form style="width: 23rem;" action="VerificaSesion.php" method="post" onsubmit="return revisionSesion();"> -->
            <form style="width: 23rem;" action="VerificaSesion.php" method="post">
              <h2>Iniciar Sesión</h2>

              <?php
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                  echo '<div class="alert alert-danger" role="alert">
                              Contraseña incorrecta
                            </div>';
                }
              ?>

              <div class="form-outline mb-4">
                <input type="email" class="form-control form-control-lg" id="correo" name="correo" />
                <label class="form-label">Correo electrónico</label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" class="form-control form-control-lg" name="contrasena" id="contrasena" />
                <label class="form-label" for="contrasena">Contraseña</label>
                <i class="bi bi-eye-slash" id="togglePassword"></i>
              </div>

              <div class="pt-1 mb-4">
                <button class="btn btn-lg btn-block btn-danger" type="submit">Iniciar Sesión</button>
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">¿Olvidaste tu contraseña?</a></p>
              <p>¿No tienes una cuenta? <a href="../PHP/Registro.php" class="link-danger">Crear una nueva cuenta</a></p>

            </form>

          </div>

        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block bg-danger" style='height:100vh'></div>
      </div>
    </div>
  </section>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#contrasena');
    togglePassword.addEventListener('click', () => {
      // Toggle the type attribute using
      // getAttribure() method
      const type = password
        .getAttribute('type') === 'password' ?
        'text' : 'password';
      password.setAttribute('type', type);
      // Toggle the eye and bi-eye icon
      togglePassword.classList.toggle('bi-eye');
    });
  </script>

</body>

</html>