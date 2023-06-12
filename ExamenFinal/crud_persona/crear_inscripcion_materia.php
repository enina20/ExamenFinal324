<?php include("../db.php") ?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ci = $_SESSION['CI'];
    $created_at = date('Y-m-d H:i:s');

    // Recorrer los campos ocultos de las materias inscritas y obtener sus valores
    $materiasSeleccionadas = $_POST['materiasSeleccionadas'];

    $materias = explode(',', $materiasSeleccionadas);
    $materias = array_filter($materias);

    foreach ($materias as $sigla) {
        $sql_inscripcion = "INSERT INTO inscripcion (CIestudiante, Sigla, Created_at) VALUES ('$ci', '$sigla', '$created_at')";

        if ($conn->query($sql_inscripcion) !== TRUE) {
            die("Query Failed");
        }
    }

    $_SESSION['mensaje'] = "Registro realizado exitosamente!";
    $_SESSION['tipo_mensaje'] = "success";

    header('Location: ../motor.php?codFlujo=F1&codProceso=P3');
    $conn->close();
}
?>


