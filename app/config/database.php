<?php
// ================================================================
// config/database.php — Conexión PDO con patrón Singleton
// Credenciales tomadas del docker-compose.yml del proyecto
// ================================================================

class Database {

    // Datos de conexión — deben coincidir con docker-compose.yml
    private $host    = 'db';             // nombre del servicio MySQL en Docker
    private $dbname  = 'academia_nexus'; // MYSQL_DATABASE
    private $user    = 'appuser';        // MYSQL_USER
    private $pass    = 'apppass';        // MYSQL_PASSWORD
    private $charset = 'utf8mb4';

    // Instancia única del Singleton
    private static $instance = null;

    // Objeto PDO
    private $pdo = null;

    // Constructor privado: nadie puede hacer new Database() desde afuera
    private function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";

        $opciones = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $opciones);
        } catch (PDOException $e) {
            die('Error de conexión: ' . $e->getMessage());
        }
    }

    // Punto de acceso único — crea la instancia solo la primera vez
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Retorna el objeto PDO para hacer consultas
    public function getConnection() {
        return $this->pdo;
    }
}