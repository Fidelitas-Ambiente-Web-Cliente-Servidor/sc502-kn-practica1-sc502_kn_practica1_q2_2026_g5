<?php
// ================================================================
// controllers/ProfesoresController.php — Controlador de profesores
// Estudiante 3 (Valery) — Academia Nexus
//
// Rutas que maneja:
//   GET  index.php?controller=profesores&action=index
//   GET  index.php?controller=profesores&action=show&id=X
//
// Ambas acciones usan la misma vista (views/profesores.html) y le
// indican, mediante la variable $vista, si debe mostrar el listado
// completo o el detalle de un solo profesor.
// ================================================================

class ProfesoresController {

    private $model;

    public function __construct() {
        $this->model = new ProfesoresModel();
    }

    // ── index() ──
    // Acción principal: lista todos los profesores desde la BD.
    public function index() {

        $vista = 'listado';
        $profesores = $this->model->getAll();

        // Cargar la vista — las variables $vista y $profesores quedan
        // disponibles dentro de profesores.html
        require_once __DIR__ . '/../views/profesores.html';
    }

    // ── show() ──
    // Vista de detalle individual de un profesor.
    // Espera ?controller=profesores&action=show&id=X
    public function show() {

        $vista = 'detalle';
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        $profesor = $id > 0 ? $this->model->getById($id) : null;

        // Cargar la misma vista — las variables $vista y $profesor
        // quedan disponibles dentro de profesores.html (puede ser null
        // si no se encontró el profesor, la vista lo maneja)
        require_once __DIR__ . '/../views/profesores.html';
    }
}