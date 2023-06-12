<?php include("../db.php") ?>
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Query para insertar la nueva persona
    $sql = "UPDATE inscripcion SET estado = 1 WHERE id = $id";

    if ($conn->query($sql) !== TRUE) {
        die("Query Failed!");
    }
    $status = true;
    header("Location: ../motor.php?codFlujo=F1&codProceso=P5");
}

$_SESSION['mensaje'] = "Inscripcion habilitada correctamente!";
$_SESSION['tipo_mensaje'] = "success";

header('Location: ../motor.php?codFlujo=F1&codProceso=P6');
$conn->close();
?>
