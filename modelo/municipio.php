<?php

require_once "Estado.php";

class Municipio {
    private $id;
    private $nombre;
    private $fk_estado;
    private $estado;

    public function __construct($id, $nombre, $fk_estado) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->fk_estado = $fk_estado;    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getFkEstado() {
        return $this->fk_estado;
    }

    public function setFkEstado($fk_estado) {
        $this->fk_estado = $fk_estado;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function crear($conexion) {
        $stmt = $conexion->prepare("INSERT INTO municipio (nombre, fk_estado) VALUES (?, ?)");
        $stmt->bind_param("si", $this->nombre, $this->fk_estado);
        $stmt->execute();
        $this->id = $conexion->insert_id;
        $stmt->close();
    }

    public function editar($conexion) {
        $stmt = $conexion->prepare("UPDATE municipio SET nombre = ?, fk_estado = ? WHERE id = ?");
        $stmt->bind_param("sii", $this->nombre, $this->fk_estado, $this->id);
        $stmt->execute();
        $stmt->close();
    }

    public function eliminar($conexion) {
        $stmt = $conexion->prepare("DELETE FROM municipio WHERE id = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $stmt->close();
    }

    public static function mostrarTodos($conexion) {
        $stmt = $conexion->prepare("SELECT * FROM municipio");
        $stmt->execute();
        $result = $stmt->get_result();
        $municipios = [];
        while ($row = $result->fetch_assoc()) {
            $municipio = new Municipio($row['id'], $row['nombre'], $row['fk_estado']);
            $municipio->setEstado(Estado::buscarPorId($conexion, $row['fk_estado']));
            $municipios[] = $municipio;
        }
        $stmt->close();
        return $municipios;
    }

    public static function buscarPorId($conexion, $id) {
        $stmt = $conexion->prepare("SELECT * FROM municipio WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        if ($row) {
            $municipio = new Municipio($row['id'], $row['nombre'], $row['fk_estado']);
            $municipio->setEstado(Estado::buscarPorId($conexion, $row['fk_estado']));
            return $municipio;
        } else {
            return null;
        }
    }
}
