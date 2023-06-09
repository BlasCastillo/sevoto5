<?php
require_once "Estado.php";

class Municipio extends Estado {
    private $fk_estado;

    public function __construct($id, $nombre, $fk_estado) {
        parent::__construct($id, $nombre);
        $this->fk_estado = $fk_estado;
    }

    public function getFkEstado() {
        return $this->fk_estado;
    }

    public function setFkEstado($fk_estado) {
        $this->fk_estado = $fk_estado;
    }

    public function crear() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO municipio (nombre, fk_estado) VALUES (?, ?)");
        $stmt->execute([$this->getNombre(), $this->getFkEstado()]);
        $this->setId($pdo->lastInsertId());
    }

    public function editar() {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE municipio SET nombre = ?, fk_estado = ? WHERE id = ?");
        $stmt->execute([$this->getNombre(), $this->getFkEstado(), $this->getId()]);
    }

    public function eliminar() {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM municipio WHERE id = ?");
        $stmt->execute([$this->getId()]);
    }

    public static function mostrarTodos() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM municipio");
        $stmt->execute();
        $municipios = [];
        while ($row = $stmt->fetch()) {
            $municipio = new Municipio($row['id'], $row['nombre'], $row['fk_estado']);
            $municipios[] = $municipio;
        }
        return $municipios;
    }

    public static function buscarPorId($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM municipio WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            $municipio = new Municipio($row['id'], $row['nombre'], $row['fk_estado']);
            return $municipio;
        } else {
            return null;
        }
    }

    public function buscarPorEstado($fk_estado) {
        global $pdo;
        // Corregido el nombre de la tabla en la consulta SQL
        $sql = "SELECT * FROM municipio WHERE fk_estado = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$fk_estado]);
        $municipios = array();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $municipio = new Municipio($fila['id'], $fila['nombre'], $fila['fk_estado']);
            array_push($municipios, $municipio);
        }
        return $municipios;
    }
    
    public function getEstadoNombre() {
        $estado = Estado::buscarPorId($this->fk_estado);
        return $estado->getNombre();
    }
    
    
    
}
