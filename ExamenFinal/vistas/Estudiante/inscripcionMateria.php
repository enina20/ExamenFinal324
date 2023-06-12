<form action="crud_persona/crear_inscripcion_materia.php" method="post">
    <h3>Materias que desea inscribirse</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sigla</th>
                    <th>Materia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ci_estudiante = $_SESSION['CI'];
                $query = "SELECT xm.sigla, xm.nombre FROM persona xp, materia xm WHERE xp.ci = $ci_estudiante AND xp.semestre = xm.semestre";

                $resultado = mysqli_query($conn, $query);
                while ($persona = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $persona['sigla'] ?></td>
                        <td><?php echo $persona['nombre'] ?></td>
                        <td>
                            <button type="button" onclick="inscribirse(this)" value="<?php echo $persona['sigla'] ?>">Inscribirse</button>
                            <button type="button" onclick="retirarse(this)" value="<?php echo $persona['sigla'] ?>" class="oculto retirado">Retirarse</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <input type="hidden" id="materiasSeleccionadas" name="materiasSeleccionadas" value="">

    <input type="submit" name="submit" class="submit btn btn-info" value="Guardar materias" />
</form>