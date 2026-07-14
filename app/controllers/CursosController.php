<?php
// ================================================================
// controllers/CursosController.php — Controlador de cursos
// Estudiante 2 — Academia Nexus
//
// Rutas que maneja:
//   GET  index.php?controller=cursos&action=index
//   GET  index.php?controller=cursos&action=index&categoria=X
// ================================================================

class CursosController {

    private $model;

    public function __construct() {
        $this->model = new CursosModel();
    }

    // ── index() ──
    // Acción principal: lista todos los cursos.
    // Si llega ?categoria=X en la URL, filtra por esa categoría.
    public function index() {

        // Siempre cargar las categorías para el select
        $categorias = $this->model->getCategories();

        // Revisar si el usuario seleccionó una categoría en el select
        if (isset($_GET['categoria']) && $_GET['categoria'] !== '') {
            $categoria_seleccionada = $_GET['categoria'];
            $cursos = $this->model->getByCategory($categoria_seleccionada);
        } else {
            $categoria_seleccionada = '';
            $cursos = $this->model->getAll();
        }

        // Cargar la vista — las variables $cursos, $categorias y
        // $categoria_seleccionada quedan disponibles en cursos.html
        require_once __DIR__ . '/../views/cursos.html';
    }
}