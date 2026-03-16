<?php
session_start();
require_once 'entrenador.php';
include_once "nav.php";

if (!isset($_SESSION['entrenadoras'])) {
    $_SESSION['entrenadoras'] = [];
}

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    if ($nombre) {
        $entrenadora = new entrenador($nombre);
        $_SESSION['entrenadoras'][] = $entrenadora;
        $mensaje = "Entrenadora {$nombre} creada correctamente.";
    } else {
        $mensaje = "Introduce un nombre.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear nueva entrenadora</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<section class="contenedor">
    <h2>Crear nueva entrenadora</h2>
    <section class="mensaje">
    <?php if ($mensaje): ?>
        <p><strong><?= $mensaje ?></strong></p>
    <?php endif; ?>
    </section>
    <form method="post">
        <label>Nombre de la entrenadora</label>
        <input type="text" name="nombre" required>
        <button type="submit">Crear entrenadora</button>
    </form>
</section>
<?php   ?>
</body>
</html>
