<?php
$ci_estudiante = $_SESSION['CI'];
$query = "SELECT * FROM persona where ci = $ci_estudiante";

$resultado = mysqli_query($conn, $query);

$persona = mysqli_fetch_assoc($resultado)

?>
<h3>INSCRIPCION AL CURSO DE TEMPORADA</h3>
<div class="card card-body">

    <form action="crud_persona/crear_inscripcion.php" method="post">
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
            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $persona['fecha_nacimiento']; ?>">
        </div>
        <div class="form-group mt-2 mb-3">
            <label for="telefono">Celular:</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $persona['telefono']; ?>">
        </div>

        <input type="submit" name="submit" class="submit btn btn-info" value="Actualizar datos" />
    </form>


</div>
<?php include("includes/footer.php") ?>