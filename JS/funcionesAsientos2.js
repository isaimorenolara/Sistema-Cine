// function mostrarSala(str) {
//     if (str == "") {
//         document.getElementById("asientos-container").innerHTML = "";
//         return;
//     }
//     if (window.XMLHttpRequest)
//         xmlhttp = new XMLHttpRequest();
//     else
//         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//     xmlhttp.onreadystatechange = function () {
//         if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
//             document.getElementById("asientos-container").innerHTML = xmlhttp.responseText;
//     }
//     xmlhttp.open("GET", "getSala.php?q=" + str, true);
//     xmlhttp.send();
// }

function mostrarSala(funcionSelect) {
    var funcionOption = funcionSelect.options[funcionSelect.selectedIndex];
    var idFuncion = funcionOption.value;
    var idSala = funcionOption.getAttribute("data-sala");

    if (idFuncion == "") {
        document.getElementById("asientos-container").innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            document.getElementById("asientos-container").innerHTML = xmlhttp.responseText;
    }
    xmlhttp.open("GET", "getSala.php?q=" + idFuncion + "&sala=" + idSala, true);
    xmlhttp.send();
}


// const seats = document.querySelectorAll('.row .seat');
// const asientosSeleccionados = document.querySelector('.asientos');

// // Recorremos todos los elementos y agregamos un evento 'click' a cada uno
// seats.forEach((seat, index) => {
//     seat.addEventListener('click', () => {
//         // Si el asiento no está reservado, lo seleccionamos o deseleccionamos
//         if (!seat.classList.contains('reserved')) {
//             seat.classList.toggle('selected');
//             console.log(`Asiento ${seat.textContent} ${seat.classList.contains('selected') ? 'seleccionado' : 'deseleccionado'}`);

//             // Agregamos el asiento seleccionado al div
//             if (seat.classList.contains('selected')) {
//                 asientosSeleccionados.innerHTML += ` ${seat.textContent}`;
//             } else {
//                 asientosSeleccionados.innerHTML = asientosSeleccionados.innerHTML.replace(` ${seat.textContent}`, '');
//             }
//         }
//     });
// });

