function muestraCaja(id)
{
    let f = document.getElementById("frmModificar");
    f.style.visibility = "visible";
    f.style.display = "block";
    document.getElementById("Id_Pelicula").value = id;
}