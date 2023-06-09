<?php
    require_once "../modelo/Estado.php";
    require_once "../controlador/EstadoController.php";

    $id = $_GET['id'];
    $estado = Estado::buscarPorID($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $estadoController = new EstadoController();
        $estadoController->editar($id, $nombre);
        header("Location: indexestado.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Estado</title>
</head>
<body>
    <h1>Editar Estado</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($estado->getNombre()); ?>">
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
