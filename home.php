<?php
session_start();

if (!isset($_SESSION['username_id'])) {
    header("Location: index.html"); // Redirigir al login si no hay sesión iniciada
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['username']; ?></h1>
    <div class="options">
    <a href="login/login-process.php?action=logout">Cerrar Sesión</a>
	</div>
</body>
</html>