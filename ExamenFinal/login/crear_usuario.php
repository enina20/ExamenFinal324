<?php include("../db.php") ?>
<?php

$username = $_POST['usuario'];
$password = $_POST['password'];
$ci = $_POST['ci'];
$role = $_POST['rol'];

// Hash de la contraseña
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Query para insertar los datos en la tabla 'usuario'
$sql = "INSERT INTO usuario (CI, Usuario, Password, Created_at, role) VALUES ('$ci', '$username', '$password_hash', current_timestamp(), '$role')";

if ($role === 'Estudiante') {
    $insert_persona = "INSERT INTO persona (ci, `nombre`, `fecha_nacimiento`, telefono, semestre, departamento, Created_at) 
    VALUES ('$ci', '$username', null, null, 1, null, current_timestamp())";
    $conn->query($insert_persona);
}

// Ejecuta el query
if ($conn->query($sql) === TRUE) {
    header('Location: ../index.php');
    exit;
} else {
    echo "Error al crear el registro: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();

?>