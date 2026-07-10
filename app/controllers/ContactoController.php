<?php

// Estudiante 4
// Muestra el formulario y guarda los mensajes enviados desde contacto.


class ContactoController {

    private $model;

    public function __construct() {
        $this->model = new ContactoModel();
    }

    public function index() {
        $mensaje_exito = '';

        if (isset($_GET['success']) && $_GET['success'] === '1') {
            $mensaje_exito = 'Mensaje enviado correctamente. Gracias por contactarnos, pronto te responderemos.';
        }

        require_once 'views/contacto.html';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=contacto&action=index');
            exit;
        }

        $old = [
            'fullname' => trim($_POST['fullname'] ?? ''),
            'email'    => trim($_POST['email'] ?? ''),
            'phone'    => trim($_POST['phone'] ?? ''),
            'subject'  => trim($_POST['subject'] ?? ''),
            'message'  => trim($_POST['message'] ?? '')
        ];

        $errores = $this->validar($old);

        if (!empty($errores)) {
            $mensaje_error = 'Revisa los campos marcados antes de enviar el mensaje.';
            require_once 'views/contacto.html';
            return;
        }

        try {
            $this->model->create($old);
            header('Location: index.php?controller=contacto&action=index&success=1');
            exit;
        } catch (PDOException $e) {
            $mensaje_error = 'No se pudo guardar el mensaje. Intenta nuevamente.';
            require_once 'views/contacto.html';
        }
    }

    private function validar($datos) {
        $errores = [];

        if (strlen($datos['fullname']) < 5 || !preg_match('/^[\p{L}\s]+$/u', $datos['fullname'])) {
            $errores['fullname'] = 'El nombre debe tener mínimo 5 caracteres y solo letras.';
        }

        if (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'Digite un correo electrónico válido.';
        }

        if (!preg_match('/^[0-9]{8,}$/', $datos['phone'])) {
            $errores['phone'] = 'El teléfono debe tener solo números y mínimo 8 dígitos.';
        }

        if (strlen($datos['subject']) < 3) {
            $errores['subject'] = 'El asunto debe tener mínimo 3 caracteres.';
        }

        if (strlen($datos['message']) < 20) {
            $errores['message'] = 'El mensaje debe tener mínimo 20 caracteres.';
        }

        return $errores;
    }
}