<?php

require_once "../controlador/EstadoController.php";

$estadoController = new EstadoController();
$estados = $estadoController->mostrarTodos();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Listado de Estados</title>
</head>
<body>
    <h1>Listado Estados</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estados as $estado): ?>
                <tr>
                    <td><?php echo $estado->getId(); ?></td>
                    <td><?php echo $estado->getNombre(); ?></td>
                    <td>
                        <a href="editar_estado.php?id=<?php echo $estado->getId(); ?>">Editar</a>
                        <a href="eliminar_estado.php?id=<?php echo $estado->getId(); ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="crear_estado.php">Crear Estado</a>
</body>
</html>
