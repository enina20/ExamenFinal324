<?php include("db.php") ?>

<?php

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'director') {
  header("Location: index.php");
  exit();
}
$ci_estudiante = $_SESSION['CI'];
$query = "SELECT xm.semestre, xm.sigla, xm.nombre, CASE WHEN xi.estado= '0' THEN 'En Revision'
                                                        WHEN xi.estado = '1' THEN 'Inscrito'
                                                        END AS estado
 FROM inscripcion xi, materia xm where xi.CIestudiante = $ci_estudiante and xi.Sigla = xm.sigla";
$resultado = mysqli_query($conn, $query);

?>

<?php include("includes/header.php") ?>

<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title"><?php echo "Materias inscritas"; ?></h1>
              <ol class="breadcrumb">
                <li><a href="index.php">Inicio</a></li>
                <li>Materias inscritas</li>
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
      <div class="col-md-9">
        <div class="row">
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

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="side_bar">
          <div class="side_bar_blog">
            <h4>NOTICIAS RECIENTES</h4>
            <div class="full margin_bottom_30">
              <div class="accordion border_circle">
                <div class="bs-example">
                  <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-bar-chart" aria-hidden="true"></i> Complete Recovery from Local & External Drive<i class="fa fa-angle-down"></i></a> </p>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it
                            over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                            consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-plane"></i> Recovery Photo, Image, Video and Audio<i class="fa fa-angle-down"></i></a> </p>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it
                            over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                            consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-star"></i> Mobile Phone Recovery<i class="fa fa-angle-down"></i></a> </p>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it
                            over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                            consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="fa fa-bar-chart" aria-hidden="true"></i> Complete Recovery from Local & External Drive<i class="fa fa-angle-down"></i></a> </p>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it
                            over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                            consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->
<?php include("includes/footer.php") ?>