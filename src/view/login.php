<?php
$title = 'Login - COMOND';
require_once __DIR__ . '/plantillas/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Iniciar Sesión</h3>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
                <?php endif; ?>
                <!-- El formulario envía al front controller public/index.php. -->
                <form action="<?php echo BASE_URL; ?>/index.php" method="POST">
                    <div class="mb-3">
                        <label for="nom_usuario" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="nom_usuario" name="nom_usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="pass_usuario" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="pass_usuario" name="pass_usuario" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/plantillas/footer.php'; ?>