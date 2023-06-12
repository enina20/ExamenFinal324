<?php

$codFlujo = $_GET["codFlujo"];
$codProceso = $_GET["codProceso"];

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    echo "<script>toastr.success('La persona ha sido eliminada correctamente.');</script>";
}

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'director') {
    header("Location: index.php");
    exit();
}
$query = "SELECT * from flujousuario";

$resultado = mysqli_query($conn, $query);

?>

<!-- section -->
<div class="container">
    <div class="row">
        <div class="col-md-12 p-6">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Flujo</th>
                                <th>Proceso</th>
                                <th>CI</th>
                                <th>Usuario</th>
                                <th>Telefono</th>
                                <th>Fecha</th>
                                <th>Cumple con la documentación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($persona = mysqli_fetch_assoc($resultado)) { ?>
                                <tr>
                                    <td><?php echo $persona['id'] ?></td>
                                    <td><?php echo $persona['flujo'] ?></td>
                                    <td><?php echo $persona['proceso'] ?></td>
                                    <td><?php echo $persona['CI'] ?></td>
                                    <td><?php echo $persona['usuario'] ?></td>
                                    <td><?php echo $persona['celular'] ?></td>
                                    <td><?php echo $persona['fechainicio'] ?></td>
                                    <td>
                                        <?php if ($persona["estado"] !== '2') : ?>
                                            <a href="crud_persona/revisar_postulacion.php?id=<?php echo $persona['id'] ?>&codFlujo=<?php echo $codFlujo; ?>&codProceso=<?php echo $codProceso ?>&action=Si" class=" btn btn-success">Si</a>
                                        <?php endif; ?>

                                        <?php if ($persona["estado"] !== '1') : ?>
                                            <a href="crud_persona/revisar_postulacion.php?id=<?php echo $persona['id'] ?>&codFlujo=<?php echo $codFlujo; ?>&codProceso=<?php echo $codProceso ?>&action=No" class=" btn btn-danger">No</a>
                                        <?php endif; ?>





                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>