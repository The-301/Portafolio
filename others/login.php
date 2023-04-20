<?php

session_start();

// Definir los usuarios y sus contraseñas
$usuarios = [
  'admin' => '12345',
  'David' => '123456',
];

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usuario = $_POST['usuario'];
  $contrasena = $_POST['contrasena'];

  
  // Verificar si el usuario y la contraseña son correctos
  if (isset($usuarios[$usuario]) && $usuarios[$usuario] === $contrasena) {
    // Iniciar sesión y redirigir a la página de eventos
    $_SESSION['usuario'] = $usuario;
    header('Location: eventos.php');
    exit();
  } else {
    // Mostrar un mensaje de error y volver a mostrar el formulario de inicio de sesión
    header('Location: index.php?error=1');
    exit();
  }
}

?>