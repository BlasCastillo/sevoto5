<?php

require_once "../modelo/Municipio.php";
require_once "../modelo/Estado.php";

class MunicipioController {
    public function index() {
        $conexion = mysqli_connect("localhost", "usuario", "contraseña", "basedatos");
        $municipios = Municipio::mostrarTodos($conexion);
        mysqli_close($conexion);
        require_once "../vista/indexmunicipios.php";
    }

    public function crear() {
        $conexion = mysqli_connect("localhost", "usuario", "contraseña", "basedatos");
        $estados = Estado::mostrarTodos($conexion);
        mysqli_close($conexion);
        require_once "../vista/crear_municipios.php";
    }

    public function guardar() {
        $conexion = mysqli_connect("localhost", "usuario", "contraseña", "basedatos");
        $nombre = $_POST['nombre'];
        $fk_estado = $_POST['fk_estado'];
        $municipio = new Municipio(null, $nombre, $fk_estado);
        $municipio->crear($conexion);
        mysqli_close($conexion);
        header("Location: index.php?c=municipio&a=index");
    }

    public function editar() {
        $conexion = mysqli_connect("localhost", "usuario", "contraseña", "basedatos");
        $id = $_GET['id'];
        $municipio = Municipio::buscarPorId($conexion, $id);
        $estados = Estado::mostrarTodos($conexion);
        mysqli_close($conexion);
        require_once "views/municipios/editar.php";
    }

    public function actualizar() {
        $conexion = mysqli_connect("localhost", "usuario", "contraseña", "basedatos");
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $fk_estado = $_POST['fk_estado'];
        $municipio = new Municipio($id, $nombre, $fk_estado);
        $municipio->editar($conexion);
        mysqli_close($conexion);
        header("Location: index.php?c=municipio&a=index");
    }

    public function eliminar() {
        $conexion = mysqli_connect("localhost", "usuario", "contraseña", "basedatos");
        $id = $_GET['id'];
        $municipio = Municipio::buscarPorId($conexion, $id);
        $municipio->eliminar($conexion);
        mysqli_close($conexion);
        header("Location: index.php?c=municipio&a=index");
    }

    public function cargarEstados() {
        $conexion = mysqli_connect("localhost", "usuario", "contraseña", "basedatos");
        $estados = Estado::mostrarTodos($conexion);
        mysqli_close($conexion);
        require_once "views/municipios/select-estados.php";
    }
}
