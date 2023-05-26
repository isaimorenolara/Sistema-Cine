<?php
	session_start(); //crea o recupera la sesión
	if (isset($_POST['correo'], $_POST['contrasena'])) {
		//echo $_POST['correo']." <br> ".$_POST['contrasena'];

		$correo = $_POST['correo'];
		$pwd = $_POST['contrasena'];

		$mysqli = new mysqli("localhost", "root", "", "cine2");//"127.0.0.1"

		if ($mysqli->connect_errno)
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

		$query = "SELECT * FROM usuarios WHERE Correo_electronico = '$correo' AND Contrasena = '$pwd'";
		$res = $mysqli->query($query)or 
						die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);

		$Nregistros = $res -> num_rows;

		if($Nregistros == 1){
			$registro = $res->fetch_assoc();
			
			// echo "<tr> 
			// 		<td class='text-center'> Correo: ".$registro['Correo_electronico']."</td>
			// 		<td class='text-center'> Contraseña: ".$registro['Contrasena']."</td>
			// 		<td class='text-center'> Rol: ".$registro['rol']."</td>
			// 	</tr>
			// ";

			$_SESSION['correo'] = $registro['Correo_electronico'];
			$_SESSION['rol'] = $registro['rol'];
			$_SESSION['id'] = $registro['Id_Usuario'];

			switch($_SESSION['rol']){
				case 'Administrador':
					header("Location: http://localhost/pruebaCine/PHP/InicioAdmi.php?id=".$_SESSION['id']);
					exit();
					break;
				case 'Cliente':	
					header("Location: http://localhost/pruebaCine/PHP/Inicio.php?id=".$_SESSION['id']);
					exit();
					break;
				default:
					die("Error, cominíquese con el administrador del sistema.");
					break;
			}

			
		}else{
			// regresar error de usuario/contraseña
			header("Location: http://localhost/pruebaCine/PHP/InicioSesion.php");
			exit();
		}

	}
	else{
		die("No proporcionó usuario y/o contraseña");
	}
?>
