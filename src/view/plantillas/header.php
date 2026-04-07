<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'COMOND'; ?></title>
    <link href="<?php echo BASE_URL; ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/assets/css/main-style.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo BASE_URL; ?>/index.php?view=login">
                    <img src="<?php echo BASE_URL; ?>/assets/img/logo.png" alt="COMOND Logo" width="100" height="100" class="d-inline-block align-text-top">
                    COMOND
                </a>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/index.php?view=usuarios">Usuarios</a>
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/index.php?view=logout">Cerrar Sesión</a>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <main class="container mt-4">

