<?php

require_once 'usuarios.php';

// Verificar si el usuario ha iniciado sesión


// Obtener el arreglo de eventos del usuario actual
$eventos = $usuarios['eventos'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de actividades - Empresa XYZ</title>
</head>
<body>
  <h1>Lista de actividades</h1>

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
      <?php foreach ($eventos as $evento): ?>
        <tr>
          <td><?php echo $evento->titulo; ?></td>
          <td><?php echo $evento->fecha_asignacion; ?></td>
          <td><?php echo $evento->fecha_entrega; ?></td>
          <td><?php echo $evento->descripcion; ?></td>
          <td><?php echo $evento->estado; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
