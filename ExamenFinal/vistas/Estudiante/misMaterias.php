<?php
$ci_estudiante = $_SESSION['CI'];
$query = "SELECT xm.semestre, xm.sigla, xm.nombre, CASE WHEN xi.estado= '0' THEN 'En Revision'
                                                        WHEN xi.estado = '1' THEN 'Inscrito'
                                                        END AS estado
 FROM inscripcion xi, materia xm where xi.CIestudiante = $ci_estudiante and xi.Sigla = xm.sigla";
$resultado = mysqli_query($conn, $query);

?>



<div class="col-lg-12 col-md-6 col-sm-12 about_cont_blog" style="padding: 0 15px">
  <div class="full text_align_left">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Semestre</th>
          <th>Sigla </th>
          <th>Materia</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($fila = mysqli_fetch_assoc($resultado)) {
          echo "<tr>";
          echo "<td>" . $fila["semestre"] . "</td>";
          echo "<td>" . $fila["sigla"] . "</td>";
          echo "<td>" . $fila["nombre"] . "</td>";
          echo "<td>" . $fila["estado"] . "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>

    <a href="controlador.php?action=inicio" class="submit btn btn-info">Volver al inicio</a>

  </div>
</div>