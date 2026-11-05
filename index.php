<?php
// Punto de entrada de la aplicación Cat-fé
define('APP_NAME', 'Cat-fé Cafetería Inteligente');

echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>" . APP_NAME . "</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body class='bg-light'>
    <div class='container py-5 text-center'>
        <h1 class='display-4 text-primary font-weight-bold'>🐾 " . APP_NAME . " ☕</h1>
        <p class='lead'>Estructura base MVC inicializada correctamente.</p>
        <div class='alert alert-success d-inline-block px-4'>
            <strong>Estado:</strong> Entorno y carpetas listas para la Sesión 1.
        </div>
    </div>
</body>
</html>";