<?php include("db.php") ?>

<?php

$codFlujo = $_GET["codFlujo"];
$codProceso = $_GET["codProceso"];
$procesoSig = $_GET["procesoSig"];

$action = $_GET["action"];

if (isset($_GET["action"])) {
    $action = $_GET["action"];

    switch ($action) {
        case "anterior":
            if ($codProceso == "P13" || $codProceso == "P14") {
                $query = "SELECT * FROM proceso WHERE codFlujo = '$codFlujo' AND procesoSig = 'Fin'";
                break;
            }
            $query = "SELECT * FROM proceso WHERE codFlujo = '$codFlujo' AND procesoSig = '$codProceso'";
            break;

        case "siguiente":
            $query = "SELECT * FROM proceso WHERE codFlujo = '$codFlujo' AND codProceso = '$procesoSig'";
            break;

        case "inicio":
            header("Location: " . "index.php");
            break;

        case "fin":
            $query = "SELECT * FROM proceso WHERE codFlujo = '$codFlujo' AND codProceso = '$procesoSig'";
            break;

        default:
            // Acción desconocida, realiza alguna acción adicional o muestra un mensaje de error
            break;
    }
}

echo $query;

$resultado = mysqli_query($conn, $query);
$fila = mysqli_fetch_assoc($resultado);

$codProcesoEnvia = $fila['codProceso'];

$archivo = "motor.php?codFlujo=" . $codFlujo . "&codProceso=" . $codProcesoEnvia;

header("Location: " . $archivo);

?>