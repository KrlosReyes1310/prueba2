<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
    exit;
}
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $raza = $_POST['raza'];
    $cedula_dueno = $_POST['cedula_dueno'];

    $stmt = $conn->prepare("INSERT INTO mascotas ( nombre, raza, cedula_dueno) VALUES (:nombre, :raza, :cedula_dueno)");
    $stmt->execute([
        ':nombre' => $nombre,
        ':raza' => $raza,
        ':cedula_dueno' => $cedula_dueno,
    ]);
    header('Location: mascota_list.php');
    exit;
}
?>

<h2>Crear Mascota</h2>
<a href="../dashboard.php">Regresar al Menu</a>
<a href="mascota_list.php">Regresar al Listar</a>
<form method="post" action="">
<label>NOMBRE:</label><input type="text" name="nombre" required /><br/>
<label>RAZA:</label><input type="text" name="raza" required /><br/>
<label>CEDULA DEL DUEÑO:</label><input type="text" name="cedula_dueno" required /><br/>
<button type="submit">Guardar</button>
</form>