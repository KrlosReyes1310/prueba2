<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Dashboard</title>
</head>
<body>
<h1>Bienvenido al Sistema</h1>
<p><a href="admin/admin_list.php">Administradores</a></p>
<p><a href="usuarios/usuario_list.php">Usuarios</a></p>
<p><a href="mascotas/mascota_list.php">Mascotas</a></p>
<p><a href="logout.php">Cerrar Sesión</a></p>
</body>
</html>
