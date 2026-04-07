<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Este archivo se incluye desde public/index.php cuando se envía el formulario de login.
require_once __DIR__ . '/../model/entidad/usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_usuario = trim($_POST['nom_usuario'] ?? '');
    $pass_usuario = trim($_POST['pass_usuario'] ?? '');

    if ($nom_usuario === '' || $pass_usuario === '') {
        $_SESSION['error'] = 'Debes ingresar usuario y contraseña.';
        header('Location: ' . BASE_URL . '/index.php?view=login');
        exit();
    }

    $usuario = new Usuario();
    $usuario->__activate(1);
    $auth = $usuario->autenticarUsuario($nom_usuario, $pass_usuario);
    $usuario->__destruct();

    if ($auth) {
        session_regenerate_id(true);

        // Guardar solo datos simples en sesión para evitar serializar objetos.
        $_SESSION['usuario'] = [
            'id_usuario' => $auth->getIdUsuario(),
            'nom_usuario' => $auth->getNomUsuario(),
            'user_usuario' => $auth->getUserUsuario()
        ];

        header('Location: ' . BASE_URL . '/index.php?view=usuarios');
        exit();
    } else {
        $_SESSION['error'] = 'Credenciales incorrectas.';
        header('Location: ' . BASE_URL . '/index.php?view=login');
        exit();
    }
} else {
    header('Location: ' . BASE_URL . '/index.php?view=login');
    exit();
}
?>