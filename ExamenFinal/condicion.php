<?php
$flujo = $_GET["flujo"];
$proceso = $_GET["proceso"];
$sql = "SELECT * FROM flujo ";
$sql .= "WHERE flujo='$flujo' and proceso='$proceso'";
$resultado = mysqli_query($con, $sql);
$registros = mysqli_fetch_array($resultado);
$tipo = $registros["tipo"];
if ($tipo == "C" && isset($_GET["Siguiente"])) {
    $sql = "SELECT * FROM flujocondicion ";
    $sql .= "WHERE flujo='$flujo' and proceso='$proceso'";
    $resultado = mysqli_query($con, $sql);
    $registros = mysqli_fetch_array($resultado);
    if (isset($_GET["Si"])) {
        $procesoSiguiente = $registros["ProcesoSi"];
        header("Location: mflujo.php?flujo=$flujo&proceso=$procesoSiguiente");
        exit;
    }
    if (isset($_GET["No"])) {
        $procesoSiguiente = $registros["ProcesoNo"];
        header("Location: mflujo.php?flujo=$flujo&proceso=$procesoSiguiente");
        exit;
    }
}
