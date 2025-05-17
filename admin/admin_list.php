<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
    exit;
}
include '../db.php';

$stmt = $conn->query("SELECT * FROM administradores");
$admins = $stmt->fetchAll();
?>

<h2>Lista de Administradores</h2>
<a href="admin_create.php">Crear Nuevo Administrador</a>
<a href="../dashboard.php">Regresar al Menu</a>
<table border="1">
<tr>
<th>Primer Nombre</th><th>Segundo Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Cédula</th><th>Mail</th><th>Acciones</th>
</tr>
<?php foreach ($admins as $a): ?>
<tr>
<td><?= htmlspecialchars($a['primer_nombre']) ?></td>
<td><?= htmlspecialchars($a['segundo_nombre']) ?></td>
<td><?= htmlspecialchars($a['primer_apellido']) ?></td>
<td><?= htmlspecialchars($a['segundo_apellido']) ?></td>
<td><?= htmlspecialchars($a['cedula']) ?></td>
<td><?= htmlspecialchars($a['mail']) ?></td>
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
