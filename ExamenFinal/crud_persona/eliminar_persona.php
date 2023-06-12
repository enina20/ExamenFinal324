<?php include("../db.php")?>
<?php

    if(isset($_GET['id'])){
        $ci = $_GET['id'];  
        // Query para insertar la nueva persona
        $sql = "DELETE FROM persona WHERE CI = $ci";
        
        if ($conn->query($sql) !== TRUE) {
            die("Query Failed!");
        } 
        $status = true;
        header("Location: ../persona_page.php");
    }    

    $_SESSION['mensaje'] = "Persona eliminada correctamente!";
    $_SESSION['tipo_mensaje'] = "danger";

    header('Location: ../persona_page.php');
    $conn->close();
?>


