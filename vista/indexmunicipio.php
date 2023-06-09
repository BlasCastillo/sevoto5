<!DOCTYPE html>
<html>
<head>
    <title>Lista de Municipios</title>
</head>
<body>
    <h1>Lista de Municipios</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "../modelo/Municipio.php";
            $municipios = Municipio::mostrarTodos();
            foreach ($municipios as $municipio) {
                echo "<tr>";
                echo "<td>" . $municipio->getId() . "</td>";
                echo "<td>" . $municipio->getNombre() . "</td>";
                echo "<td>" . $municipio->getEstadoNombre() . "</td>";
                echo "<td>";
                echo "<a href='editar_municipio.php?id=" . $municipio->getId() . "'>Editar</a>";
                echo " | ";
                echo "<a href='eliminar_municipio.php?id=" . $municipio->getId() . "'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="crear_municipio.php">Crear Municipio</a>

</body>
</html>
