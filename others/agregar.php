<?php

require_once 'usuarios.php';

// Verificar si el usuario ha iniciado sesión


// Agregar una nueva actividad si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo'];
  $fecha_asignacion = $_POST['fecha_asignacion'];
  $fecha_entrega = $_POST['fecha_entrega'];
  $descripcion = $_POST['descripcion'];

  // Obtener el arreglo de eventos del usuario actual
  $eventos = $usuarios[$_SESSION['usuario']]['eventos'];

  // Crear un objeto para la actividad
  $evento = new stdClass();
  $evento->titulo = $titulo;
  $evento->fecha_asignacion = $fecha_asignacion;
  $evento->fecha_entrega = $fecha_entrega;
  $evento->descripcion = $descripcion;
  $evento->estado = ($fecha_entrega < date('Y-m-d')) ? 'Con retraso' : 'Pendiente';

  // Agregar la actividad al arreglo de eventos del usuario
  $eventos[] = $evento;

  // Actualizar el arreglo de eventos del usuario en el arreglo de usuarios
  $usuarios[$_SESSION['usuario']]['eventos'] = $eventos;

  // Guardar los cambios en el archivo de usuarios
  file_put_contents('usuarios.php', '<?php return ' . var_export($usuarios, true) . ';');

  // Redirigir a la página de eventos
  header('Location: eventos.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar actividad - Empresa XYZ</title>
</head>
<body>
  <h1>Agregar actividad</h1>
  <p>Bienvenido, <?php echo $_SESSION['usuario']; ?>.</p>

  <form method="post">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required>

    <br>

    <label for="fecha_asignacion">Fecha de asignación:</label>
    <input type="date" name="fecha_asignacion" required>

    <br>

    <label for="fecha_entrega">Fecha de entrega:</label>
    <input type="date" name="fecha_entrega" required>

    <br>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required></textarea>

    <br>

    <button type="submit">Agregar</button>
  </form>
</body>
</html>
