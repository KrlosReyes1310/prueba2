<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
    exit;
}
include '../db.php';

$stmt = $conn->query("SELECT * FROM usuarios");
$admins = $stmt->fetchAll();
?>

<h2>Lista de Administradores</h2>
<a href="usuario_create.php">Crear Nuevo Usuario</a>
<a href="../dashboard.php">Regresar al Menu</a>
<table border="1">
<tr>
<th>cedula</th><th>Nombre Completo</th><th>Mail</th><th>Direccion</th><th>Telefono</th><th>Acciones</th>
</tr>
<?php foreach ($admins as $a): ?>
<tr>
<td><?= htmlspecialchars($a['cedula']) ?></td>
<td><?= htmlspecialchars($a['nombre_completo']) ?></td>
<td><?= htmlspecialchars($a['mail']) ?></td>
<td><?= htmlspecialchars($a['direccion']) ?></td>
<td><?= htmlspecialchars($a['telefono']) ?></td>
<td>
<a href="admin_update.php?cedula=<?= $a['cedula'] ?>">Editar</a>
<form action="admin_delete.php" method="post" style="display:inline;">
<input type="hidden" name="cedula" value="<?= $a['cedula'] ?>" />
<button type="submit" onclick="return confirm('¿Eliminar administrador?')">Eliminar</button>
</form>
</td>
</tr>
<?php endforeach; ?>
</table>