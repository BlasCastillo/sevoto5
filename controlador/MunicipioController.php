<?php

require_once "../modelo/Municipio.php";
require_once "../modelo/Estado.php";

class MunicipioController {
    public function crear($nombre, $fk_estado) {
        $municipio = new Municipio(null, $nombre, $fk_estado);
        $municipio->crear();
        return $municipio;
    }

    public function editar($id, $nombre, $fk_estado) {
        $municipio = new Municipio($id, $nombre, $fk_estado);
        $municipio->editar();
        return $municipio;
    }

    public function eliminar($id) {
        $municipio = new Municipio($id, null, null);
        $municipio->eliminar();
    }

    public function mostrarTodos() {
        return Municipio::mostrarTodos();
    }

    public function buscarPorID($nombre) {
        return Municipio::buscarPorID($nombre);
    }

    public function buscarPorEstado($fk_estado) {
        return Municipio::buscarPorEstado($fk_estado);
    }
}
