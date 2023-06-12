<?php include("../db.php") ?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ci = $_POST['ci'];
    $usuario = $_POST['nombre'];
    $celular = $_POST['telefono'];
    $fechainicio = date('Y-m-d H:i:s');
    $codFlujo = $_POST["codFlujo"];
    $codProceso = $_POST["codProceso"];

    // Query para insertar la nueva persona
    $sql = "INSERT INTO flujousuario (flujo, proceso, CI, usuario, fechainicio, celular)
        VALUES ('$codFlujo', '$codProceso', '$ci', '$usuario', '$fechainicio', '$celular')";


    if ($conn->query($sql) !== TRUE) {
        die("Query Failed");
    }

    $_SESSION['mensaje'] = "Registro realizado exitosamente!";
    $_SESSION['tipo_mensaje'] = "success";

    header('Location: ../motor.php?codFlujo=F2&codProceso=P10');
    $conn->close();
}
?>


