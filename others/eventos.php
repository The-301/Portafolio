<?php

require_once 'usuarios.php';

// Verificar si el usuario ha iniciado sesión


// Obtener el arreglo de eventos del usuario actual

// Agregar una nueva actividad si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo'];
  $fecha_asignacion = $_POST['fecha_asignacion'];
  $fecha_entrega = $_POST['fecha_entrega'];
  $descripcion = $_POST['descripcion'];

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
  <title>Actividades - Empresa XYZ</title>
</head>
<body>
  <h1>Actividades pendientes</h1>

  <table>
    <thead>
      <tr>
        <th>Título</th>
        <th>Fecha de asignación</th>
        <th>Fecha de entrega</th>
        <th>Descripción</th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody>
      <?php
    function display_data($evento){
   echo "<table>";
   echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
   foreach($evento as $row){
       echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td></tr>";
   }
   echo "</table>";
}?>
    </tbody>
  </table>

  <h2>Agregar actividad</h2>

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

    <button type="submit">Agregar actividad</button>
  </form>
</body>
</html>

