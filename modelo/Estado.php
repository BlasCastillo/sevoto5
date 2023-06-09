<?php

require_once "../config/conexion.php";

class Estado {
    private $id;
    private $nombre;

    public function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

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

    public function crear() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO estado (nombre) VALUES (?)");
        $stmt->execute([$this->nombre]);
        $this->id = $pdo->lastInsertId();
    }

    public function editar() {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE estado SET nombre = ? WHERE id = ?");
        $stmt->execute([$this->nombre, $this->id]);
    }

    public function eliminar() {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM estado WHERE id = ?");
        $stmt->execute([$this->id]);
    }

    public static function mostrarTodos() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM estado");
        $stmt->execute();
        $estados = [];
        while ($row = $stmt->fetch()) {
            $estado = new Estado($row['id'], $row['nombre']);
            $estados[] = $estado;
        }
        return $estados;
    }

    public static function buscarPorId($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM estado WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            $estado = new Estado($row['id'], $row['nombre']);
            return $estado;
        } else {
            return null;
        }
    }
    
}
