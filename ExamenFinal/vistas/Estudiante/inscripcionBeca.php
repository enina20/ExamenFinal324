<?php
$ci_estudiante = $_SESSION['CI'];
$query = "SELECT * FROM persona where ci = $ci_estudiante";

$codFlujo = $_GET["codFlujo"];
$codProceso = $_GET["codProceso"];

$resultado = mysqli_query($conn, $query);

$persona = mysqli_fetch_assoc($resultado)

?>
<h3>PRESENTACIÓN DE DOCUMENTOS DE LA BECA COMEDOR</h3>
<div class="card card-body">

    <form action="crud_persona/inscripcion_beca.php" method="post">
        <h3>Datos personales</h3>
        <div class="form-group mt-2 mb-3">
            <label for="ci">CI:</label>
            <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $_SESSION['CI']; ?>" disabled>
            <input type="hidden" name="ci" value="<?php echo $_SESSION['CI']; ?>">
        </div>
        <div class="form-group mt-2 mb-3">
            <label for="nombre">Nombre completo:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $persona['nombre']; ?>" required>
        </div>
        <div class="form-group mt-2 mb-3">
            <label for="telefono">Celular:</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $persona['telefono']; ?>">
        </div>
        <input type="hidden" id="codFlujo" name="codFlujo" value="<?php echo $codFlujo; ?>">
        <input type="hidden" id="codProceso" name="codProceso" value="<?php echo $codProceso; ?>">

        <input type="submit" name="submit" class="submit btn btn-info" value="Actualizar datos" />
    </form>


</div>
<?php include("includes/footer.php") ?>