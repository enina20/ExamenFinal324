<?php include("../db.php") ?>
<?php
$codFlujo = $_GET["codFlujo"];
$codProceso = $_GET["codProceso"];
$id = $_GET['id'];

$sql = "SELECT * FROM proceso ";
$sql .= "WHERE codFlujo='$codFlujo' and codProceso='$codProceso'";
$resultado = mysqli_query($conn, $sql);
$registros = mysqli_fetch_array($resultado);
$tipo = $registros["tipo"];

if ($tipo == "C") {
    $sql = "SELECT * FROM procesocondicionante ";
    $sql .= "WHERE Flujo='$codFlujo' and Proceso='$codProceso'";
    $resultado = mysqli_query($conn, $sql);
    $registros = mysqli_fetch_array($resultado);

    if (isset($_GET["action"])) {

        $action = $_GET["action"];
        if ($action == "Si") {
            $procesoSiguiente = $registros["ProcesoSI"];

            $sql = "UPDATE flujousuario SET estado = 1 WHERE id = $id";

            if ($conn->query($sql) !== TRUE) {
                die("Query Failed!");
            }
            $status = true;

            header("Location: ../motor.php?codFlujo=$codFlujo&codProceso=$procesoSiguiente");
            exit;
        }

        $procesoSiguiente = $registros["ProcesoNO"];

        $sql = "UPDATE flujousuario SET estado = 2 WHERE id = $id";

        if ($conn->query($sql) !== TRUE) {
            die("Query Failed!");
        }
        $status = true;
        header("Location: ../motor.php?codFlujo=$codFlujo&codProceso=$procesoSiguiente");
        echo $procesoSiguiente;
        echo "no";
        exit;
    }
}
