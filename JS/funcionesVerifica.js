function revisionJS(){

    let correo = document.getElementById('correo').value;
    let contrasena = document.getElementById('contrasena').value;

    if(correo.length>0 && contrasena.length>7){
        return true;
    }
    else{
        alert('Ingrese un correo y la contraseña debe de tener mínimo 7 caracteres');
        return false;
    }
}
