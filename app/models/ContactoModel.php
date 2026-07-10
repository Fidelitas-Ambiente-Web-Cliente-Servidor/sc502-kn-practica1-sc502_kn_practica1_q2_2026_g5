<?php
// Estudiante 4
// Guarda los mensajes del formulario de contacto en MySQL usando PDO.

class ContactoModel {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function create($datos) {
        $sql = "INSERT INTO contacto
                (nombre_completo, correo, telefono, asunto, mensaje)
                VALUES
                (:nombre_completo, :correo, :telefono, :asunto, :mensaje)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nombre_completo' => $datos['fullname'],
            ':correo'          => $datos['email'],
            ':telefono'        => $datos['phone'],
            ':asunto'          => $datos['subject'],
            ':mensaje'         => $datos['message']
        ]);
    }
}