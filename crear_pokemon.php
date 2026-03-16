<?php
session_start();
require_once 'pokemon.php';
include_once "nav.php";

if (!isset($_SESSION['pokemons'])) {
    $_SESSION['pokemons'] = [];
}

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $elemento = $_POST['elemento'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $ataque = $_POST['ataque'] ?? 10;
    $nivel = $_POST['nivel'] ?? 1;
    $vida = $_POST['vida'] ?? 100;

    if ($nombre && $elemento && $tipo) {
        $pokemon = new Pokemon($nombre, $elemento, $tipo, $ataque, $nivel, $vida);
        $_SESSION['pokemons'][] = $pokemon;
        $mensaje = "Pokémon {$nombre} creado correctamente.";
    } else {
        $mensaje = "Rellena todos los campos obligatorios.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear nuevo Pokémon</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<section class="contenedor">
    <h2>Crear nuevo Pokémon</h2>
    <section class="mensaje">
    <?php if ($mensaje): ?>
        <p><strong><?= $mensaje ?></strong></p>
    <?php endif; ?>
    </section>
    <form method="post">
        <label>Nombre*</label>
        <input type="text" name="nombre" required><br>

        <label>Elemento*</label>
        <select name="elemento" required><br>
            <option value="">--Selecciona--</option>
            <option value="Fuego">Fuego</option>
            <option value="Agua">Agua</option>
            <option value="Planta">Planta</option>
            <option value="Eléctrico">Eléctrico</option>
        </select><br>

        <label>Tipo*</label>
        <input type="text" name="tipo" required><br>

        <label>Ataque</label>
        <input type="number" name="ataque" value="10"><br>

        <label>Nivel</label>
        <input type="number" name="nivel" value="1"><br>

        <label>Vida</label>
        <input type="number" name="vida" value="100"><br>

        <button type="submit">Crear Pokémon</button>
    </form>
</section>
</body>
</html>

