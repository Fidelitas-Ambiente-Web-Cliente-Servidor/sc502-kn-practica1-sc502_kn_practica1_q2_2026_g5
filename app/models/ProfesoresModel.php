<?php
// ================================================================
// models/ProfesoresModel.php — Modelo de profesores
// Estudiante 3 (Valery) — Academia Nexus
//
// Acceso a datos exclusivamente mediante PDO + prepared statements.
// ================================================================

class ProfesoresModel {

    private $pdo;

    public function __construct() {
        // Obtener la conexión PDO desde el Singleton
        $this->pdo = Database::getInstance()->getConnection();
    }

    // ── getAll() ──
    // Retorna todos los profesores para el listado del equipo
    public function getAll() {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM profesores ORDER BY id"
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // ── getById($id) ──
    // Retorna un único profesor para la vista de detalle.
    // Usa prepared statement para evitar SQL Injection.
    public function getById($id) {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM profesores WHERE id = ? LIMIT 1"
        );
        $stmt->execute([$id]);
        $resultado = $stmt->fetch();
        return $resultado !== false ? $resultado : null;
    }
}