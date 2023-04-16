function mostrarPromocion(str)
{
    let x = document.getElementById(str);
    let p;

    if(str=="prom1")
    {
        p=document.getElementById("prom2");
    }
    else
    {
        p=document.getElementById("prom1");
    }

    if(x.style.display === "none")
    {
        if(p.style.display === "block")
        {
            p.style.display = "none";
        }
        x.style.display = "block";
    }
    else 
    {
        x.style.display = "none";
    }
}