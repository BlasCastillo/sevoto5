<?php
require_once "../controlador/MunicipioController.php";
require_once "../controlador/EstadoController.php";

echo "Estoy en crear_municipio.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Municipio</title>
</head>
<body>
    <h1>Crear Municipio</h1>
    <form action="../controlador/MunicipioController.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"><br><br>
        <label for="estado">Estado:</label>
        <select name="estado" id="estado">
            <?php
            $estadoController = new EstadoController();
            $estados = $estadoController->mostrarTodos();
            foreach ($estados as $estado) {
                echo "<option value=\"" . $estado->getId() . "\">" . $estado->getNombre() . "</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
