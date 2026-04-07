<?php
session_start();

$view = $_GET['view'] ?? 'login';

switch ($view) {
    case 'login':
        include '../src/view/login.php';
        break;
    case 'usuarios':
        include '../src/view/usuarios.php';
        break;
    default:
        include '../src/view/login.php';
        break;
}
?>