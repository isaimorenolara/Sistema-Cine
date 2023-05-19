const calendar = document.querySelector('.calendar');
const prevBtn = calendar.querySelector('.prev-btn');
const nextBtn = calendar.querySelector('.next-btn');
const monthYear = calendar.querySelector('.month-year');
const calendarBody = calendar.querySelector('.calendar-body');

let currentDate = new Date();

function generateCalendar() {
  // Limpiamos el contenido del cuerpo del calendario
  calendarBody.innerHTML = '';

  // Creamos los nombres de los días de la semana
  const weekDays = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

  // Creamos las celdas de los días de la semana
  for (let i = 0; i < weekDays.length; i++) {
    const cell = document.createElement('div');
    cell.classList.add('day');
    cell.textContent = weekDays[i];
    calendarBody.appendChild(cell);
  }

  // Obtenemos el primer día del mes actual y el último día del mes actual
  const firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
  const lastDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);

  // Creamos las celdas de los días del mes anterior
  const prevMonthDays = firstDayOfMonth.getDay() === 0 ? 6 : firstDayOfMonth.getDay() - 1;
  for (let i = prevMonthDays; i >= 1; i--) {
    const day = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, i).getDate());
    const cell = document.createElement('div');
    cell.classList.add('day', 'disabled');
    cell.textContent = day.getDate();
    calendarBody.appendChild(cell);
  }

  // Creamos las celdas de los días del mes actual
  for (let i = 1; i <= lastDayOfMonth.getDate(); i++) {
    const day = new Date(currentDate.getFullYear(), currentDate.getMonth(), i);
    const cell = document.createElement('div');
    cell.classList.add('day');
    cell.textContent = day.getDate();
    if (day.toDateString() === new Date().toDateString()) {
      cell.classList.add('today');
    }
    calendarBody.appendChild(cell);
  }

  // Creamos las celdas de los días del mes siguiente
  const nextMonthDays = calendarBody.children.length % 7 === 0 ? 0 : 7 - calendarBody.children.length % 7;
  for (let i = 1; i <= nextMonthDays; i++) {
    const day = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, i);
    const cell = document.createElement('div');
    cell.classList.add('day', 'disabled');
    cell.textContent = day.getDate();
    calendarBody.appendChild(cell);
  }

  // Actualizamos el mes y el año en la interfaz
  const monthNames = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
  monthYear.textContent = `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
}

generateCalendar();

prevBtn.addEventListener('click', () => {
  currentDate.setMonth(currentDate.getMonth() - 1);
  generateCalendar();
});

nextBtn.addEventListener('click', () => {
  currentDate.setMonth(currentDate.getMonth() + 1);
  generateCalendar();
});
