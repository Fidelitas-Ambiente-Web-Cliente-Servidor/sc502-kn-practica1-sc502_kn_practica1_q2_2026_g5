<?php
// ================================================================
// models/IndexModel.php — Estudiante 1 (Allison)
// Obtiene los cursos destacados que se muestran en la página de inicio.
// ================================================================

class IndexModel {

    private $pdo;

    public function __construct() {
        // Obtener la conexión PDO desde el Singleton
        $this->pdo = Database::getInstance()->getConnection();
    }

    // ── getAll() ──
    // Retorna todos los cursos destacados para el home
    public function getAll() {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM cursos_destacados ORDER BY id"
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }
}