<?php
require_once "../controlador/MunicipioController.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $fk_estado = $_POST['fk_estado'];

    $municipioController = new MunicipioController();
    $municipioController->crear($nombre, $fk_estado);

    // Redirige a la página principal o a la lista de municipios
    header("Location: indexmunicipio.php");
} 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Crear Municipio</title>
</head>
<body>
    <h1>Crear Municipio</h1>
    <!-- Cambiado el atributo action del formulario para apuntar a crear_municipio.php -->
    <form action="crear_municipio.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"><br><br>
        <label for="estado">Estado:</label>
        <select name="fk_estado" id="estado">
            <?php
            require_once "../controlador/estadocontroller.php";
            $estadoController = new EstadoController();
            $estados = $estadoController->mostrarTodos();
            foreach ($estados as $estado) {
                echo "<option value=\"" . htmlspecialchars($estado->getId()) . "\">" . htmlspecialchars($estado->getNombre()) . "</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
