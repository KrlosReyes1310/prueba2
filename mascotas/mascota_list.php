<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
    exit;
}
include '../db.php';

$stmt = $conn->query("SELECT * FROM mascotas");
$admins = $stmt->fetchAll();
?>

<h2>Lista de Mascotas</h2>
<a href="mascotas_create.php">Crear Nueva mascota</a>
<a href="../dashboard.php">Regresar al Menu</a>
<table border="1">
<tr>
<th>ID</th><th>NOMBRE</th><th>RAZA</th><th>CEDULA DEL DUEÑO</th><th>ACCIONES</th>
</tr>
<?php foreach ($admins as $a): ?>
<tr>
<td><?= htmlspecialchars($a['id']) ?></td>
<td><?= htmlspecialchars($a['nombre']) ?></td>
<td><?= htmlspecialchars($a['raza']) ?></td>
<td><?= htmlspecialchars($a['cedula_dueno']) ?></td>
<td>
<a href="admin_update.php?cedula=<?= $a['id'] ?>">Editar</a>
<form action="admin_delete.php" method="post" style="display:inline;">
<input type="hidden" name="id" value="<?= $a['id'] ?>" />
<button type="submit" onclick="return confirm('¿Eliminar administrador?')">Eliminar</button>
</form>
</td>
</tr>
<?php endforeach; ?>
</table>