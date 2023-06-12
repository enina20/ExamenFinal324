<?php include("../db.php")?>
<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ci = $_POST['ci'];
        $nombre = $_POST['nombre'];
        $fecha_nac = $_POST['fecha_nacimiento'];
        $telefono = $_POST['telefono'];
        $depto = $_POST['departamento'];
        $created_at = date('Y-m-d H:i:s');
        
        // Query para insertar la nueva persona
        $sql = "INSERT INTO persona (CI, `Nombre_completo`, `fecha_nacimiento`, telefono, departamento, Created_at) VALUES ('$ci', '$nombre', '$fecha_nac', '$telefono', '$depto', '$created_at')";
        
        if ($conn->query($sql) !== TRUE) {
            die("Query Failed");
        }

        $_SESSION['mensaje'] = "Persona creada correctamente!";
        $_SESSION['tipo_mensaje'] = "success";

        header('Location: ../persona_page.php');
        $conn->close();
  }
?>


