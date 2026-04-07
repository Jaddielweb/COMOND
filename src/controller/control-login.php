<?php
session_start();
require_once("../model/entidad/usuario.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_usuario = $_POST['nom_usuario'];
    $pass_usuario = $_POST['pass_usuario'];

    $usuario = new Usuario();
    $usuario->__activate(1);
    $auth = $usuario->autenticarUsuario($nom_usuario, $pass_usuario);
    $usuario->__destruct();

    if ($auth) {
        $_SESSION['usuario'] = $auth;
        header('Location: ../../public/index.php?view=usuarios');
        exit();
    } else {
        $_SESSION['error'] = 'Credenciales incorrectas.';
        header('Location: ../../public/index.php?view=login');
        exit();
    }
} else {
    header('Location: ../../public/index.php?view=login');
    exit();
}
?>