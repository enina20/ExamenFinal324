<?php include("../db.php") ?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $fecha_nac = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $created_at = date('Y-m-d H:i:s');

    // Query para insertar la nueva persona
    $sql = "UPDATE persona SET nombre = '$nombre', fecha_nacimiento = '$fecha_nac', telefono = '$telefono' WHERE ci = $ci";

    if ($conn->query($sql) !== TRUE) {
        die("Query Failed");
    }

    $_SESSION['mensaje'] = "Registro realizado exitosamente!";
    $_SESSION['tipo_mensaje'] = "success";

    header('Location: ../motor.php?codFlujo=F1&codProceso=P2');
    $conn->close();
}
?>


