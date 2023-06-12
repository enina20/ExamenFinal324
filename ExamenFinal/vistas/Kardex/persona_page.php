<?php include("db.php") ?>

<?php
include("includes/header.php");

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    echo "<script>toastr.success('La persona ha sido eliminada correctamente.');</script>";
    // if ($status ) {
    // }
}

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'director') {
    header("Location: index.php");
    exit();
}
$query = "SELECT ci, nombre, fecha_nacimiento, telefono, CASE
                WHEN persona.departamento = 'LP' THEN 'La Paz'
                WHEN persona.departamento = 'CH' THEN 'Chuquisaca'
                WHEN persona.departamento = 'CB' THEN 'Cochabamba'
                WHEN persona.departamento = 'RU' THEN 'Oruro'
                WHEN persona.departamento = 'PT' THEN 'Potosí'
                WHEN persona.departamento = 'TA' THEN 'Tarija'
                WHEN persona.departamento = 'SC' THEN 'Santa Cruz'
                WHEN persona.departamento = 'BE' THEN 'Beni'
                WHEN persona.departamento = 'PD' THEN 'Pando'
                END AS departamento FROM `persona`";

$resultado = mysqli_query($conn, $query);

?>
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <h1 class="page-title"><?php echo "Notas por departamento"; ?></h1>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Inicio</a></li>
                                <li>Notas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end inner page banner -->
<!-- section -->
<div class="section padding_layout_1">
    <div class="container">
        <div class="row">
            <div class="col-md-9 p-6">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>CI</th>
                                    <th>Nombre completo</th>
                                    <th>Fecha de nacimiento</th>
                                    <th>Teléfono</th>
                                    <th>Departamento</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($persona = mysqli_fetch_assoc($resultado)) { ?>
                                    <tr>
                                        <td><?php echo $persona['ci'] ?></td>
                                        <td><?php echo $persona['nombre'] ?></td>
                                        <td><?php echo $persona['fecha_nacimiento'] ?></td>
                                        <td><?php echo $persona['telefono'] ?></td>
                                        <td><?php echo $persona['departamento'] ?></td>
                                        <td>
                                            <a href="editar_persona.php?id= <?php echo $persona['ci'] ?>"><i class='fa fa-edit m-3'></i></a>

                                            <a href="crud_persona/eliminar_persona.php?id= <?php echo $persona['ci'] ?>"><i class='fa fa-trash'></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-6">

                <?php if (isset($_SESSION['mensaje'])) { ?>
                    <div class="alert alert-<?= $_SESSION["tipo_mensaje"] ?> alert-dismissible fade  show" role="alert">
                        <?= $_SESSION['mensaje'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php unset($_SESSION['mensaje']);
                } ?>

                <h4>CREAR UNA NUEVA PERSONA</h4>
                <div class="card card-body">
                    <form action="crud_persona/crear_persona.php" method="post">
                        <div class="form-group mt-2 mb-3">
                            <label for="ci">CI:</label>
                            <input type="text" class="form-control" id="ci" name="ci" required>
                        </div>
                        <div class="form-group mt-2 mb-3">
                            <label for="nombre">Nombre completo:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group mt-2 mb-3">
                            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                        </div>
                        <div class="form-group mt-2 mb-3">
                            <label for="telefono">Teléfono:</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <div class="form-group mt-2 mb-3">
                            <label for="departamento">Departamento:</label>
                            <select class="form-control" id="departamento" name="departamento" required>
                                <option value="">Seleccione un departamento</option>
                                <option value="LP">La Paz</option>
                                <option value="CB">Cochabamba</option>
                                <option value="SC">Santa Cruz</option>
                                <option value="OR">Oruro</option>
                                <option value="PT">Potosí</option>
                                <option value="CH">Chuquisaca</option>
                                <option value="TJ">Tarija</option>
                                <option value="PD">Pando</option>
                                <option value="BE">Beni</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block"></input>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->
<?php include("includes/footer.php") ?>