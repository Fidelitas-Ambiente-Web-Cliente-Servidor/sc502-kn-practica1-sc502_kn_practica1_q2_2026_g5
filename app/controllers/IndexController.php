<?php
// ================================================================
// controllers/IndexController.php — Controlador de inicio
// Estudiante 1 (Allison) — Academia Nexus
//
// Rutas que maneja:
//   GET  index.php?controller=index&action=index
// ================================================================

class IndexController {

    private $model;

    public function __construct() {
        $this->model = new IndexModel();
    }

    // ── index() ──
    // Acción principal: obtiene los cursos destacados desde la BD
    // y los pasa a la vista.
    public function index() {

        $cursos_destacados = $this->model->getAll();

        // Cargar la vista — la variable $cursos_destacados queda
        // disponible dentro de index.html
        require_once 'views/index.html';
    }
}