<!DOCTYPE html>
<html>
<head>
	<title>Reserva de Funciones</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="../../JS/reserva.js"></script>
</head>
<body>
	<h1>Reserva de Funciones</h1>
	<form id="reserva-form">
		<label for="funcion-select">Seleccione una función:</label>
		<select id="funcion-select" name="funcion-select">
			<option value="">--Seleccione una función--</option>
			<?php
				include 'db.php';
				$result = mysqli_query($conn, "SELECT * FROM funciones");
				while($row = mysqli_fetch_array($result)) {
					echo "<option value='".$row['Id_Funcion']."'>".$row['Fecha']." a las ".$row['Hora_inicio']."</option>";
				}
			?>
		</select><br><br>
		<label for="asiento-select">Seleccione un asiento:</label>
		<select id="asiento-select" name="asiento-select" disabled>
			<option value="">--Seleccione un asiento--</option>
		</select><br><br>
		<input type="submit" value="Reservar">
	</form>
	<div id="mensaje"></div>
</body>
</html>
