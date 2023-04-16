function mostrarVideo() 
{
    let x = document.getElementsByClassName("video");
    let i;

    for (i = 0; i < x.length; i++) 
    {
        if(x[i].style.display === "none")
            x[i].style.display = "block";
        else
            x[i].style.display = "none";
    }
}

function mostrarDetalles(str)
{
    let x = document.getElementById(str);
    let d1,d2;

    switch (str)
    {
        case "detalle1":
            d1=document.getElementById("detalle2");
            d2=document.getElementById("detalle3");
            break;
        case "detalle2":
            d1=document.getElementById("detalle1");
            d2=document.getElementById("detalle3");
            break;
        case "detalle3":
            d1=document.getElementById("detalle1");
            d2=document.getElementById("detalle2");
            break;
    }

    if(x.style.display === "none")
    {
        if(d1.style.display === "block")
        {
            d1.style.display = "none";
        }
        if(d2.style.display === "block")
        {
            d2.style.display = "none";
        }
        x.style.display = "block";
    }
    else 
    {
        x.style.display = "none";
    }
}
