<?php
include("db.php");
include("includes/header.php");

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$codFlujo = $_GET["codFlujo"];
$codProceso = $_GET["codProceso"];

$query = "SELECT * FROM proceso WHERE codFlujo = '$codFlujo' AND codProceso = '$codProceso'";

$resultado = mysqli_query($conn, $query);
$fila = mysqli_fetch_assoc($resultado);

$procesoSig = $fila['procesoSig'];
$archivo = "vistas/" . $fila['rol'] . "/" . $fila['pantalla'] . ".php";



$actionAnterior = ($fila['codProceso'] == "P1") ? "inicio" : "anterior";
$actionSiguiente = ($procesoSig == 'Fin') ? "Fin" : "siguiente";
?>

<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title">Curso de temporada</h1>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Inicio</a></li>
                                <li>Curso de temporada</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section padding_layout_1">

    <div class="container center">

        <div class="col-md-12 p-6">
            <?php if (isset($_SESSION['mensaje'])) { ?>
                <div class="alert alert-<?= $_SESSION["tipo_mensaje"] ?> alert-dismissible fade  show" role="alert">
                    <?= $_SESSION['mensaje'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php unset($_SESSION['mensaje']);
            } ?>
            <?php include $archivo; ?>
            <?php if ($actionSiguiente !== 'Fin') : ?>
                <a href="controlador.php?codFlujo=<?php echo $codFlujo ?>&codProceso=<?php echo $codProceso ?>&procesoSig=<?php echo $procesoSig ?>&action=<?php echo $actionAnterior ?>" class="submit btn btn-danger">anterior</a>
                <a href="controlador.php?codFlujo=<?php echo $codFlujo ?>&codProceso=<?php echo $codProceso ?>&procesoSig=<?php echo $procesoSig ?>&action=<?php echo $actionSiguiente ?>" class="submit btn btn-success">siguiente</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>