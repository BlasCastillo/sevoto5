<?php

require_once "../controlador/EstadoController.php";

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $estadoController = new EstadoController();
    $estado = $estadoController->crear($nombre);
    header("Location: indexestado.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Estado</title>
</head>
<body>
    <h1>Crear Estado</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre">
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
