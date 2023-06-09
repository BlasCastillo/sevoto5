<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Municipio</title>
</head>
<body>
    <h1>Eliminar Municipio</h1>
    <?php
    require_once "../controlador/MunicipioController.php";
    $controller = new MunicipioController();
    $municipio = $controller->buscarPorId($_GET['id']);
    ?>
    <p>¿Estás seguro de que deseas eliminar el municipio "<?php echo $municipio->getNombre(); ?>"?</p>
    <form action="municipio_eliminar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $municipio->getId(); ?>">
        <input type="submit" value="Eliminar">
    </form>
    <a href="indexmunicipios.php">Cancelar</a>
</body>
</html>
