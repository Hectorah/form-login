<?php
$conn = new mysqli("127.0.0.1", "root", "", "usuarios_db");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_POST>0) {
		
      $username=$_POST["username"];
	  $email=$_POST["email"];
	  $password=$_POST["password"]; // Contraseña que se va a hashear
	  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
	  $stmt = $conn->prepare("INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $username, $email, $hashed_password);
 	if ($stmt->execute()) {

    // Redirigir a una URL específica
    header("Location: ../index.html?mensaje=exito");
    exit; // Importante: detener la ejecución del script después de la redirección
	}

}else {
    header("Location: ../index.html?mensaje=error");
    exit;
	}

$stmt->close();
$conn->close();
?>