<?php

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    echo "<script>toastr.success('La persona ha sido eliminada correctamente.');</script>";
}

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'director') {
    header("Location: index.php");
    exit();
}
$query = "SELECT xi.id, xi.CIestudiante as ci, xp.nombre as nombre, xp.fecha_nacimiento, xp.telefono, xp.semestre, xm.sigla, xm.nombre as materia, CASE WHEN xi.estado= '0' THEN 'En Revision' WHEN xi.estado = '1' THEN 'Inscrito' END AS estado from inscripcion xi, persona xp, materia xm where xi.estado = 0 and xi.CIestudiante = xp.ci and xi.Sigla = xm.sigla;";

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
                                <th>CI</th>
                                <th>Nombre completo</th>
                                <th>Fecha de nacimiento</th>
                                <th>Teléfono</th>
                                <th>Semestre</th>
                                <th>Sigla</th>
                                <th>Materia</th>
                                <th>Estado</th>
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
                                    <td><?php echo $persona['semestre'] ?></td>
                                    <td><?php echo $persona['sigla'] ?></td>
                                    <td><?php echo $persona['materia'] ?></td>
                                    <td><?php echo $persona['estado'] ?></td>
                                    <td>
                                        <a href="crud_persona/habilitar_inscripcion.php?id=<?php echo $persona['id'] ?>" class=" btn btn-success">Habilitar</a>
                                        <a href="crud_persona/denegar_inscripcion.php?id=<?php echo $persona['id'] ?>" class=" btn btn-danger">Inhabilitar</a>


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