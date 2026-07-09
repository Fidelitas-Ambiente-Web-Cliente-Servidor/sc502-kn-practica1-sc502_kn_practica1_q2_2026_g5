<?php
// ================================================================
// index.php — Front Controller
// Único punto de entrada. Lee ?controller=X&action=Y de la URL
// y despacha al controlador correspondiente.
// ================================================================

// Cargar configuración de base de datos
require_once 'config/database.php';

// Cargar modelos
require_once 'models/IndexModel.php';
require_once 'models/CursosModel.php';
require_once 'models/ProfesoresModel.php';
require_once 'models/ContactoModel.php';

// Cargar controladores
require_once 'controllers/IndexController.php';
require_once 'controllers/CursosController.php';
require_once 'controllers/ProfesoresController.php';
require_once 'controllers/ContactoController.php';

// Leer parámetros de la URL (por defecto: index)
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'index';
$action     = isset($_GET['action'])     ? $_GET['action']     : 'index';

// Enrutador: instanciar el controlador correcto
switch ($controller) {
    case 'index':
        $ctrl = new IndexController();
        break;
    case 'cursos':
        $ctrl = new CursosController();
        break;
    case 'profesores':
        $ctrl = new ProfesoresController();
        break;
    case 'contacto':
        $ctrl = new ContactoController();
        break;
    default:
        header('Location: index.php?controller=index&action=index');
        exit;
}

// Ejecutar la acción si existe, si no ejecutar index
if (method_exists($ctrl, $action)) {
    $ctrl->$action();
} else {
    $ctrl->index();
}