<?php include("../db.php") ?>
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Query para insertar la nueva persona
    $sql = "UPDATE inscripcion SET estado = 2 WHERE id = $id";

    if ($conn->query($sql) !== TRUE) {
        die("Query Failed!");
    }
    $status = true;
    header("Location: ../motor.php?codFlujo=F1&codProceso=P7");
}

$_SESSION['mensaje'] = "Inscripcion denegada correctamente!";
$_SESSION['tipo_mensaje'] = "danger";

header('Location: ../motor.php?codFlujo=F1&codProceso=P7');
$conn->close();
?>
