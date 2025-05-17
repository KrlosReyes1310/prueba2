<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
    exit;
}
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cedula = $_POST['cedula'];
    $nombre_completo = $_POST['nombre_completo'];
    $mail = $_POST['mail'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $stmt = $conn->prepare("INSERT INTO usuarios (cedula, nombre_completo, mail, direccion, telefono) VALUES (:cedula, :nombre_completo, :mail, :direccion, :telefono)");
    $stmt->execute([
        ':cedula' => $cedula,
        ':nombre_completo' => $nombre_completo,
        ':mail' => $mail,
        ':direccion' => $direccion,
        ':telefono' => $telefono,
    ]);
    header('Location: usuario_list.php');
    exit;
}
?>

<h2>Crear Usuario</h2>
<a href="../dashboard.php">Regresar al Menu</a>
<a href="admin_list.php">Regresar al Listar</a>
<form method="post" action="">
<label>Cédula:</label><input type="text" name="cedula" required /><br/>
<label>Nombre Completo:</label><input type="text" name="nombre_completo" required /><br/>
<label>Mail:</label><input type="text" name="mail" required /><br/>
<label>Direccion:</label><input type="text" name="direccion" required /><br/>
<label>Telefono:</label><input type="text" name="telefono" /><br/>
<button type="submit">Guardar</button>
</form>