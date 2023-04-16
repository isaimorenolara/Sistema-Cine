<?php
	session_start(); //crea o recupera la sesión

	if(isset($_POST['correo'],$_POST['contrasena']))
	{
		$mysqli = new mysqli("localhost", "root", "", "cine2");//"127.0.0.1"
		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		$query="select * from usuarios 
					where Correo_electronico='".$_POST['correo'].
					"' and Contrasena='".$_POST['contrasena']."'";
		$res = $mysqli->query($query) or 
				die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
		$Nregistros=$res->num_rows;
		if($Nregistros==1)
		{
			$registro = $res->fetch_assoc();
			echo "Id_Usuario: ".$registro['Id_Usuario'].
                "<br> Correo: ".$registro['Correo_electronico'].
                "<br> Nombre: ".$registro['Nombre'];
		}
		else
		{
			header("Location: http://localhost/pruebaCine/InicioSesion.php");
			exit();
		}
	}
	else
		die("No proporcionó usuario y/o contraseña");
?>