<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambia este valor si tienes otro usuario
$password = "";     // Cambia este valor si tienes una contraseña para el usuario
$dbname = "saveme";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los valores del formulario
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validar si las contraseñas coinciden
    if ($password !== $confirmPassword) {
        echo "Las contraseñas no coinciden.";
    } else {
        // Encriptar la contraseña
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Preparar la consulta SQL para insertar los datos
        $sql = "INSERT INTO registro (username, email, password) VALUES ('$username', '$email', '$passwordHash')";

        if ($conn->query($sql) === TRUE) {
            header( "Location: index.html");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Cerrar la conexión
$conn->close();
?>
