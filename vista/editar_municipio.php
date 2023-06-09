<!DOCTYPE html>
<html>
<head>
    <title>Editar Municipio</title>
</head>
<body>
    <h1>Editar Municipio</h1>
    <?php
 require_once "../controlador/MunicipioController.php";
    $controller = new MunicipioController();
    $municipio = $controller->buscarPorId($_GET['id']);
    ?>
    <form action="municipio_editar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $municipio->getId(); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $municipio->getNombre(); ?>" required>
        <br>
        <label for="fk_estado">Estado:</label>
        <select name="fk_estado" id="fk_estado">
            <?php
            $estados = $controller->mostrarEstados();
            foreach ($estados as $estado) {
                $selected = $estado->getId() == $municipio->getFkEstado() ? "selected" : "";
                echo "<option value='" . $estado->getId() . "' $selected>" . $estado->getNombre() . "</option>";
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Guardar cambios">
    </form>
</body>
</html>
