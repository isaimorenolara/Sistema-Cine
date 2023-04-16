function mostrarPelicula(str)
{
    if(str == "")
    {
        document.getElementById("txt").innerHTML = "";
        return;
    }
    if(window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            document.getElementById("txt").innerHTML = xmlhttp.responseText;
    }
    xmlhttp.open("GET","getPeliculas.php?q="+str,true);
    xmlhttp.send();
}