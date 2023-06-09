<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1″ />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <link rel="icon" href="../Images/logo.png">
    <link href="../CSS/estilos.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../CSS/estilosAsientos.css">
    <script src="../JS/funcionesAsientos2.js"></script>
</head>

<body>
    <?php
    header("Content-Type: text/html;charset=utf-8");

    $mysqli = new mysqli("localhost", "root", "", "cine2"); //"127.0.0.1"
    $acentos = $mysqli->query("SET NAMES 'utf8'");

    if ($mysqli->connect_errno)
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    if (!isset($_GET['q']))
        echo "Los datos de las películas: ";
    else {
        $q = $_GET['q'];
        $sala = $_GET['sala'];
        $query = "SELECT * FROM funciones f , salas s WHERE f.id_sala = s.id_sala AND s.id_sala = '$sala' AND f.Id_Funcion = '$q'";
        // select * from funciones f , salas s where f.id_sala = s.id_sala and s.id_sala = 4 and f.Id_Funcion = 5
        // var_dump($query);
        // echo "Funcion:".$q."<br>";
        // echo "Sala:".$sala."<br>";
        $res = $mysqli->query($query) or
            die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);

        while ($row = $res->fetch_assoc()) {
            $numero_asientos = $row['numero_asientos'];
            $numero_filas = $row['filas'];

            
            // Generar las butacas
            echo '<div class="cinema-seats">';
            for ($fila = 1; $fila <= $numero_filas; $fila++) {
                $nombre_fila = chr(64 + $fila); // Convertir número de fila a carácter ASCII
            
                echo '<div class="row" data-row="' . $nombre_fila . '">';
                for ($asiento = 1; $asiento <= $numero_asientos; $asiento++) {
                    $nombre_butaca = $nombre_fila . $asiento;
                    echo '<div class="seat" data-column="' . $asiento . '" onclick="asientos(this)">' . $nombre_butaca . '</div>';
                }
                echo '</div>';
            }
            echo '</div>';
            
            
        }
    }
    $res->free();
    $mysqli->close();
    ?>
    <!-- <script>
        const seats = document.querySelectorAll('.row .seat');
        const asientosSeleccionados = document.querySelector('.asientos');

        function asientos(seat) {
            if (!seat.classList.contains('reserved')) {
                seat.classList.toggle('selected');
                console.log(`Asiento ${seat.textContent} ${seat.classList.contains('selected') ? 'seleccionado' : 'deseleccionado'}`);

                // Agregamos el asiento seleccionado al div
                if (seat.classList.contains('selected')) {
                    asientosSeleccionados.innerHTML += ` ${seat.textContent}`;
                } else {
                    asientosSeleccionados.innerHTML = asientosSeleccionados.innerHTML.replace(` ${seat.textContent}`, '');
                }
            }
        }
    </script> -->
</body>

</html>