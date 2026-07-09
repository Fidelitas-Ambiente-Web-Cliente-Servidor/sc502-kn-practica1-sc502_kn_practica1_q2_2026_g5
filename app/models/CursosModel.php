<?php
// ================================================================
// models/CursosModel.php — Modelo de cursos
// Estudiante 2 — Academia Nexus
// ================================================================

class CursosModel {

    private $pdo;

    public function __construct() {
        // Obtener la conexión PDO desde el Singleton
        $this->pdo = Database::getInstance()->getConnection();
    }

    // ── getAll() ──
    // Retorna todos los cursos ordenados por categoría y nombre
    public function getAll() {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM cursos ORDER BY categoria, nombre"
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // ── getByCategory($categoria) ──
    // Retorna solo los cursos de una categoría específica
    // Usa prepared statement para evitar SQL Injection
    public function getByCategory($categoria) {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM cursos WHERE categoria = ? ORDER BY nombre"
        );
        $stmt->execute([$categoria]);
        return $stmt->fetchAll();
    }

    // ── getCategories() ──
    // Retorna las categorías únicas para llenar el select del filtro
    public function getCategories() {
        $stmt = $this->pdo->prepare(
            "SELECT DISTINCT categoria FROM cursos ORDER BY categoria"
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }
}