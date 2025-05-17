<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = $_POST['mail'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM administradores WHERE mail = :mail AND password = :password");
    $stmt->execute([':mail' => $mail, ':password' => $password]);
    $admin = $stmt->fetch();

    if ($admin) {
        $_SESSION['admin'] = $admin['cedula'];
        header('Location:dashboard.php');
        exit;
    } else {
        $error = "Credenciales incorrectas.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Login</title>
</head>
<body>
<h2>Iniciar Sesión</h2>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="post" action="">
    <label for="mail">Mail:</label>
    <input type="email" name="mail" required />
    <br/>
    <label for="password">Password:</label>
    <input type="password" name="password" required />
    <br/>
    <button type="submit">Ingresar</button>
</form>
</body>
</html>