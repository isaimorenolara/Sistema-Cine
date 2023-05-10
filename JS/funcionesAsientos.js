const seats = document.querySelectorAll('.row .seat');
const asientosSeleccionados = document.querySelector('.asientos');

// Recorremos todos los elementos y agregamos un evento 'click' a cada uno
seats.forEach((seat, index) => {
  seat.addEventListener('click', () => {
    // Si el asiento no está reservado, lo seleccionamos o deseleccionamos
    if (!seat.classList.contains('reserved')) {
      seat.classList.toggle('selected');
      console.log(`Asiento ${seat.textContent} ${seat.classList.contains('selected') ? 'seleccionado' : 'deseleccionado'}`);

      // Agregamos el asiento seleccionado al div
      if (seat.classList.contains('selected')) {
        asientosSeleccionados.innerHTML += ` ${seat.textContent}`;
      } else {
        asientosSeleccionados.innerHTML = asientosSeleccionados.innerHTML.replace(` ${seat.textContent}`, '');
      }
    }
  });
});
