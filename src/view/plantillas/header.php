<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'COMOND'; ?></title>
    <link href="../public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/assets/css/main-style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/img/logo.png" alt="COMOND Logo" width="100" height="100" class="d-inline-block align-text-top">
            </a>
            <?php if (isset($_SESSION['usuario'])): ?>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="?view=usuarios">Usuarios</a>
                    <a class="nav-link" href="?view=logout.php">Cerrar Sesión</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</header>
