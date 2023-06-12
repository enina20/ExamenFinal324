<?php include("db.php") ?>

<?php

if (!isset($_SESSION['username'])) {
  header("Location: login/login.php");
  exit();
}
?>


<?php
$json = file_get_contents('data/carreras.json');
$data = json_decode($json, true);
$carreras = $data['carreras'];

$json = file_get_contents('data/facultad.json');
$facultad = json_decode($json, true);

?>

<?php include("includes/header.php") ?>

<?php include("includes/slider.php") ?>

<!-- section -->
<div class="section padding_layout_1" id="carreras">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_center">
            <h2>Nuestras Carreras</h2>
            <p class="large">FACULTAD DE CIENCIAS PURAS Y NATURALES</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <?php foreach ($carreras as $carrera) : ?>
        <?php $id = $carrera['id']; ?>
        <?php $imagen = $carrera['imagen']; ?>
        <?php $nombre = $carrera['nombre']; ?>
        <?php $descripcion = $carrera['descripcion']; ?>
        <?php include 'includes/carrera_card.php'; ?>
      <?php endforeach; ?>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_center">
            <h2>Conocenos</h2>
            <p class="large">FACULTAD DE CIENCIAS PURAS Y NATURALES</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row" style="margin-top: 35px" id="acerca-de-nosotros">
      <div class="col-md-8">
        <div class="full margin_bottom_30">
          <div class="accordion border_circle">
            <div class="bs-example">
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-university" aria-hidden="true"></i>Antecedentes Históricos de la FCPN<i class="fa fa-angle-down"></i></a> </p>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <p><?php echo $facultad["Historia"]; ?></p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-flag"></i>Misión FCPN<i class="fa fa-angle-down"></i></a> </p>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p><?php echo $facultad["Mision"]; ?></p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-star"></i>Visión FCPN<i class="fa fa-angle-down"></i></a> </p>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p><?php echo $facultad["Vision"]; ?></p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="fa fa-bar-chart" aria-hidden="true"></i>Objetivos FCPN<i class="fa fa-angle-down"></i></a> </p>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <h5>Objetivo General</h5>
                      <p><?php echo $facultad["Objetivo_general"]; ?></p>
                    </div>
                    <div class="panel-body">
                      <h5>Objetivos Específicos</h5>
                      <ol class="list-group list-group-flush">
                        <li class="list-group-item">1.- Consolidar la oferta académica para formar profesionales altamente calificados y comprometidos en las ciencias puras y naturales a nivel pregrado y posgrado.</li>
                        <li class="list-group-item">2.- Generar conocimiento técnico y científico para contribuir al desarrollo de la ciencia universal a partir de equipos de investigadores multi, trans e interdisciplinarios aportando a la solución de problemas y las necesidades de la sociedad.</li>
                        <li class="list-group-item">3.- Promover y difundir la producción científica, la comunicación y el diálogo a todos los niveles de la población de manera formal y no formal.</li>
                      </ol>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="full" style="margin-top: 35px;">
          <h3>Investigación</h3>
          <p>La FCPN está conformada por 7 Institutos dedicados al conocimiento e Investigación, con docentes y estudiantes investigadores de calidad ampliamente reconocida por la sociedad científica, donde el plantel docente cuenta con un nivel de post grado, desarrollando una actividad académica y de investigación de excelencia.</p>
          <p><a class="btn main_bt" href="#">Leer más...</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->

<?php include("includes/footer.php") ?>