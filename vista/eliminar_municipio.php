<?php
require_once "../controlador/MunicipioController.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    $municipioController = new MunicipioController();
    $municipio = $municipioController->buscarPorId($id);

    if ($municipio == null) {
        header("Location: index.php");
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $municipioController = new MunicipioController();
    $municipioController->eliminar($id);

    header("Location: indexmunicipio.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Municipio</title>
</head>
<body>
    <h1>Eliminar Municipio</h1>
    <p>¿Estás seguro de que deseas eliminar el municipio "<?php echo htmlspecialchars($municipio->getNombre()); ?>"p>
    <form action="eliminar_municipio.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($municipio->getId()); ?>">
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>
