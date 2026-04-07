<?php
$title = 'Usuarios - COMOND';
require_once("plantillas/header.php");

if (!isset($_SESSION['usuario'])) {
    header('Location: ?view=login');
    exit();
}

require_once("../model/entidad/usuario.php");
$usuarioModel = new Usuario();
$usuarioModel->__activate(1);
$usuarios = $usuarioModel->consultarTodosUsuarios();
$usuarioModel->__destruct();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Lista de Usuarios</h1>
    <a href="?view=crear_usuario" class="btn btn-primary">Crear Usuario</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id_usuario']); ?></td>
            <td><?php echo htmlspecialchars($user['nom_usuario']); ?></td>
            <td><?php echo htmlspecialchars($user['user_usuario']); ?></td>
            <td>
                <a href="?view=editar_usuario&id=<?php echo $user['id_usuario']; ?>" class="btn btn-sm btn-warning">Editar</a>
                <a href="?view=eliminar_usuario&id=<?php echo $user['id_usuario']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once("plantillas/footer.php"); ?>