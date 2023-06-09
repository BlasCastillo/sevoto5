<?php
require "../controlador/MunicipioController.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    $municipioController = new MunicipioController();
    $municipio = $municipioController->buscarPorId($id);

    if ($municipio == null) {
        header("Location: index.php");
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $fk_estado = $_POST['fk_estado'];

    $municipioController = new MunicipioController();
    $municipioController->editar($id, $nombre, $fk_estado);

    header("Location: indexmunicipio.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Municipio</title>
</head>
<body>
    <h1>Editar Municipio</h1>
    <form action="editar_municipio.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($municipio->getId()); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($municipio->getNombre()); ?>"><br><br>
        <label for="estado">Estado:</label>
        <select name="fk_estado" id="estado">
            <?php
            require_once "../controlador/estadocontroller.php";
            $estadoController = new EstadoController();
            $estados = $estadoController->mostrarTodos();
            foreach ($estados as $estado) {
                $selected = ($estado->getId() == $municipio->getFkEstado()) ? "selected" : "";
                echo "<option value=\"" . htmlspecialchars($estado->getId()) . "\" $selected>" . htmlspecialchars($estado->getNombre()) . "</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
