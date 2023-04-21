// Obtener la imagen del astronauta y agregar la clase "show-astro"
function showAstronaut() {
    const astronautImg = document.querySelector('.astro');
    astronautImg.classList.add('show-astro');
  
    // Esperar 4 segundos (duración de la animación) antes de eliminar la clase "show-astro"
    setTimeout(function() {
      astronautImg.classList.remove('show-astro');
    }, 4000);
  }
  
  // Llamar a la función "showAstronaut" cada 8 segundos
  setInterval(function() {
    showAstronaut();
  }, 8000);