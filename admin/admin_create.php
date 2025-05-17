<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
    exit;
}
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $primer_nombre = $_POST['primer_nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $cedula = $_POST['cedula'];
    $mail = $_POST['mail'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("INSERT INTO administradores (cedula, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, mail, password) VALUES (:cedula, :primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :mail, :password)");
    $stmt->execute([
        ':cedula' => $cedula,
        ':primer_nombre' => $primer_nombre,
        ':segundo_nombre' => $segundo_nombre,
        ':primer_apellido' => $primer_apellido,
        ':segundo_apellido' => $segundo_apellido,
        ':mail' => $mail,
        ':password' => $password
    ]);
    header('Location: admin_list.php');
    exit;
}
?>

<h2>Crear Administrador</h2>
<a href="../dashboard.php">Regresar al Menu</a>
<a href="admin_list.php">Regresar al Listar</a>
<form method="post" action="">
<label>Cédula:</label><input type="text" name="cedula" required /><br/>
<label>Primer Nombre:</label><input type="text" name="primer_nombre" required /><br/>
<label>Segundo Nombre:</label><input type="text" name="segundo_nombre" /><br/>
<label>Primer Apellido:</label><input type="text" name="primer_apellido" required /><br/>
<label>Segundo Apellido:</label><input type="text" name="segundo_apellido" /><br/>
<label>Mail:</label><input type="email" name="mail" required /><br/>
<label>Password:</label><input type="password" name="password" required /><br/>
<button type="submit">Guardar</button>
</form>
