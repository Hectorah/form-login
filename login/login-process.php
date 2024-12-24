<?php
// registro de usuario

session_start(); // Iniciar la sesión

require_once '../database/config.php'; // Incluir la configuración de la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['username'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE username = :username");
        $stmt->bindParam(':username', $usuario);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) { // Verificar la contraseña hasheada
            $_SESSION['username_id'] = $user['id']; // Guardar el ID del usuario en la sesión
            $_SESSION['username'] = $usuario; //Guardar el nombre de usuario
            header("Location: ../home.php"); // Redirigir a la página principal
            exit;
        } else {
            header("Location: ../index.php?error=1"); // Redirigir al formulario de login con un mensaje de error
            exit;
        }
    } catch (PDOException $e) {
        die("Error en la consulta: " . $e->getMessage());
    }
}

//funcion para cerrar sesion
function logout(){
session_start(); // Iniciar la sesión
session_destroy();
header("Location: ../index.html?mensaje=logout");
exit;
}
session_start(); // Iniciar la sesión antes de verificar si se debe cerrar sesión
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    logout();
}

// funcion para olvido de contraseña
function recovery_password(){

}

?>