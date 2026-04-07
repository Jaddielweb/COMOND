<?php
session_start();

// BASE_URL se usa en las vistas para enlazar assets y rutas desde cualquier vista.
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$basePath = dirname($_SERVER['SCRIPT_NAME']);
$basePath = rtrim(str_replace('\\', '/', $basePath), '/');
$basePath = preg_replace('@/public$@', '', $basePath);
define('BASE_URL', $protocol . '://' . $_SERVER['HTTP_HOST'] . $basePath);

// El parámetro view controla qué vista se muestra.
$view = $_GET['view'] ?? 'login';
// El parámetro action se usa para acciones que procesan formularios.
$action = $_GET['action'] ?? null;

// Si es una solicitud POST (probablemente login), procesamos el controlador de login.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include __DIR__ . '/../src/controller/control-login.php';
    exit();
}

switch ($view) {
    case 'login':
        include __DIR__ . '/../src/view/login.php';
        break;
    case 'usuarios':
        include __DIR__ . '/../src/view/usuarios.php';
        break;
    case 'logout':
        include __DIR__ . '/../src/view/logout.php';
        break;
    default:
        include __DIR__ . '/../src/view/login.php';
        break;
}
?>