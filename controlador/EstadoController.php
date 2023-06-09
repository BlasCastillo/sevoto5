<?php

require_once "../modelo/Estado.php";

class EstadoController {
    public function crear($nombre) {
        $estado = new Estado(null, $nombre);
        $estado->crear();
        return $estado;
    }

    public function editar($id, $nombre) {
        $estado = new Estado($id, $nombre);
        $estado->editar();
        return $estado;
    }

    public function eliminar($id) {
        $estado = new Estado($id, null);
        $estado->eliminar();
    }

    public function mostrarTodos() {
        return Estado::mostrarTodos();
    }

    public function buscarPorNombre($nombre) {
        return Estado::buscarPorID($nombre);
    }
}
