<?php 

require_once "../controlador/EstadoController.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $estadoController = new EstadoController();
    $estadoController->eliminar($id);
    header("Location: indexestado.php");
}

 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Estado</title>
</head>
<body>
    <h1>Eliminar Estado</h1>
    <p>¿Estás seguro de que deseas eliminar este estado?</p>
    <form method="POST">
        <button type="submit">Eliminar</button>
        <a href="indexestado.php">Cancelar</a>
    </form>
</body>
</html>
