<?php

    // Configuración de la conexión a la base de datos
    $servername = "localhost";
    $username = "usuario_db";
    $password = "contraseña_db";
    $dbname = "nombre_db";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener el id de la función de la consulta
    $id_funcion = $_GET['id_funcion'];

    // Consulta para obtener los asientos disponibles de la función
    $sql = "SELECT asientos.Id_Asiento, asientos.Fila, asientos.Numero
            FROM asientos
            LEFT JOIN asientos_reservados ON asientos.Id_Asiento = asientos_reservados.Id_Asiento
            WHERE asientos_reservados.Id_Reservacion_Asiento IS NULL
            OR asientos_reservados.Id_Reservacion NOT IN (
            SELECT reservaciones.Id_Reservacion
            FROM reservaciones
            WHERE reservaciones.Id_Funcion = $id_funcion
            )";

    $result = $conn->query($sql);

    // Crear un array para almacenar los resultados
    $rows = array();

    // Recorrer el resultado y añadirlo al array
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    }

    // Enviar los resultados en formato JSON
    echo json_encode($rows);

    // Cerrar la conexión a la base de datos
    $conn->close();

?>
