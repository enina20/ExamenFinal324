<?php
$ci_estudiante = $_SESSION['CI'];
$query = "SELECT id, proceso, usuario, CASE WHEN estado= '0' THEN 'En Revision'
WHEN estado = '1' THEN 'Postulación aceptada'
END AS estado FROM flujousuario where CI = $ci_estudiante";
$resultado = mysqli_query($conn, $query);

?>



<div class="col-lg-12 col-md-6 col-sm-12 about_cont_blog" style="padding: 0 15px">
  <div class="full text_align_left">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Id</th>
          <th>Proceso </th>
          <th>Usuario</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($fila = mysqli_fetch_assoc($resultado)) {
          echo "<tr>";
          echo "<td>" . $fila["id"] . "</td>";
          echo "<td>" . $fila["proceso"] . "</td>";
          echo "<td>" . $fila["usuario"] . "</td>";
          echo "<td>" . $fila["estado"] . "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>

    <a href="controlador.php?action=inicio" class="submit btn btn-info">Volver al inicio</a>

  </div>
</div>