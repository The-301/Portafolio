// Obtener el menú desplegable y la etiqueta de "Proyectos"
var proyectosMenu = document.getElementById("proyectos-menu");
var proyectosLink = document.getElementById("proyectos");

// Agregar un evento de clic a la etiqueta de "Proyectos"
proyectosLink.addEventListener("click", function() {
  proyectosMenu.style.display = "block";
});

// Agregar un evento de clic al documento
document.addEventListener("click", function(event) {
  // Si el clic no fue en el menú desplegable ni en la etiqueta de "Proyectos", ocultar el menú desplegable
  if (event.target != proyectosMenu && event.target != proyectosLink) {
    proyectosMenu.style.display = "none";
  }
});

//Agrega efecto cambio de color
const nameElement = document.getElementById("name");

setInterval(function() {
  nameElement.style.color = randomColor();
}, 500);

function randomColor() {
  return "#" + Math.floor(Math.random()*16777215).toString(16);
}

// Agrega el siguiente código
nameElement.style.transition = "color 1s";