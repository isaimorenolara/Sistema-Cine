function revisionSesion()
{
	let correo=document.getElementById('correo').value;
	let pwd=document.getElementById('contrasena').value;
	if(correo.length>0 && pwd.length>7)
	{
		document.getElementById('contrasena').value=Sha512.hash(pwd);
		return true;
	}
	else
		alert("Ingrese un correo y/o la contraseña debe tener minimo 7 caracteres");
	return false;
}