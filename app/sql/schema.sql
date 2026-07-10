-- ================================================================
-- sql/schema.sql — Esquema de base de datos de Academia Nexus
-- Cada estudiante agrega su sección al mismo archivo.
-- Estudiante 2: tabla cursos
-- ================================================================

USE academia_nexus;

-- ================================================================
-- Tabla: cursos (Estudiante 2)
-- ================================================================
CREATE TABLE IF NOT EXISTS cursos (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    nombre      VARCHAR(100)   NOT NULL,
    categoria   VARCHAR(50)    NOT NULL,
    descripcion TEXT,
    duracion    VARCHAR(30),
    precio      DECIMAL(10, 2) NOT NULL,
    creado_en   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 6 registros de prueba (mínimo requerido: 5)
INSERT INTO cursos (nombre, categoria, descripcion, duracion, precio) VALUES
('HTML y CSS Fundamentos',     'Desarrollo Web',   'Aprende a estructurar y estilizar páginas web con HTML5 y CSS3 desde cero.',      '6 semanas',  35000),
('JavaScript Moderno',          'Desarrollo Web',   'ES6+, manipulación del DOM y eventos. El lenguaje esencial del navegador.',        '8 semanas',  45000),
('PHP y MySQL',                 'Desarrollo Web',   'Desarrollo del lado del servidor con PHP 8 y bases de datos relacionales.',        '10 semanas', 55000),
('Fundamentos de Redes',       'Redes y Sistemas', 'Modelo OSI, TCP/IP, subnetting y configuración básica de dispositivos Cisco.',    '8 semanas',  50000),
('Linux para Administradores', 'Redes y Sistemas', 'Administración de servidores Linux, shell scripting, permisos y servicios.',      '7 semanas',  48000),
('Ciberseguridad Básica',      'Redes y Sistemas', 'Principios de seguridad, análisis de vulnerabilidades y buenas prácticas.',       '9 semanas',  60000);


-- Tabla: contacto - Estudiante 4 Juan Jose Solano Camacho
-- Guarda los mensajes enviados desde el formulario de contacto.
CREATE TABLE IF NOT EXISTS contacto (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    nombre_completo VARCHAR(120) NOT NULL,
    correo          VARCHAR(120) NOT NULL,
    telefono        VARCHAR(20)  NOT NULL,
    asunto          VARCHAR(150) NOT NULL,
    mensaje         TEXT         NOT NULL,
    creado_en       TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 5 registros de prueba (mínimo requerido por la tarea)
INSERT INTO contacto (nombre_completo, correo, telefono, asunto, mensaje) VALUES
('María García López', 'maria.garcia@example.com', '88888888', 'Información de cursos', 'Quisiera recibir más información sobre los cursos de desarrollo web disponibles.'),
('Carlos Hernández Mora', 'carlos.hernandez@example.com', '87777777', 'Horarios disponibles', 'Me interesa conocer los horarios nocturnos para poder matricular un curso.'),
('Ana Rodríguez Solís', 'ana.rodriguez@example.com', '86666666', 'Consulta de matrícula', 'Deseo saber cuáles son los requisitos para iniciar el proceso de matrícula.'),
('Luis Vargas Castro', 'luis.vargas@example.com', '85555555', 'Métodos de pago', 'Necesito información sobre los métodos de pago y posibles facilidades disponibles.'),
('Sofía Jiménez Rojas', 'sofia.jimenez@example.com', '84444444', 'Curso recomendado', 'Me gustaría recibir una recomendación sobre cuál curso tomar para iniciar en programación.');