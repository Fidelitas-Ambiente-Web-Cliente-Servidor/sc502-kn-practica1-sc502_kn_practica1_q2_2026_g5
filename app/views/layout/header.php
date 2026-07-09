<?php
// ================================================================
// views/layout/header.php — Navbar compartida
// Se incluye al inicio de cada vista con require_once
// ================================================================

// Detectar qué controller está activo para marcar el enlace del navbar
$controller_activo = isset($_GET['controller']) ? $_GET['controller'] : 'index';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Academia Nexus</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/cursos.css">
</head>
<body>

<nav class="navbar navbar-expand-lg nexus-navbar">
  <div class="container-fluid px-4">
    <a class="navbar-brand nexus-brand" href="index.php?controller=index&action=index">
      ⬡ Academia Nexus
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link <?php echo ($controller_activo === 'index') ? 'active-page' : ''; ?>"
            href="/practica1/app/index.php?controller=index&action=index">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($controller_activo === 'cursos') ? 'active-page' : ''; ?>"
            href="/practica1/app/index.php?controller=cursos&action=index">Cursos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($controller_activo === 'profesores') ? 'active-page' : ''; ?>"
            href="/practica1/app/index.php?controller=profesores&action=index">Profesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($controller_activo === 'contacto') ? 'active-page' : ''; ?>"
            href="/practica1/app/index.php?controller=contacto&action=index">Contacto</a>
        </li>
      </ul>
    </div>
  </div>
</nav>