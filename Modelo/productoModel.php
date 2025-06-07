<?php

class Producto {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registrar($nombre, $cantidad, $precio_unitario) {
        $query = "INSERT INTO productos (nombre, cantidad, precio_unitario) VALUES (:nombre, :cantidad, :precio_unitario)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':precio_unitario', $precio_unitario);
        return $stmt->execute();
    }


    public function listar() {
        $query = "SELECT * FROM productos";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
