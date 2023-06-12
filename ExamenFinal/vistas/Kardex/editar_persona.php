<?php include("db.php")?>

<?php

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $query = "SELECT * FROM persona WHERE CI = $id";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $nombre = $row['Nombre_completo'];
            $fecha_nac = $row['fecha_nacimiento'];
            $telefono = $row['telefono'];
            $departamento = $row['departamento'];            
        }
    }

    if (isset($_POST['actualizar_persona'])){
        $ci = $_GET['id'];
        $nombre = $_POST['nombre'];
        $fecha_nac = $_POST['fecha_nacimiento'];
        $telefono = $_POST['telefono'];
        $depto = $_POST['departamento'];

        // Query para insertar la nueva persona
        $sql = "UPDATE persona SET `Nombre_completo` = '$nombre', `fecha_nacimiento` = '$fecha_nac', telefono = '$telefono', departamento = '$depto' WHERE CI = $id";
        
        if ($conn->query($sql) !== TRUE) {
            die("Query Failed");
        }

        $_SESSION['mensaje'] = "Información actualizada correctamente!";
        $_SESSION['tipo_mensaje'] = "success";

        header('Location: persona_page.php');
        $conn->close();
    }




?>
<!-- section -->
<?php include("includes/header.php"); ?>
    <div class="container">
        <div class="col-md-4 mx-auto mt-6">
            <h4>EDITAR INFORMACION DE LA PERSONA</h4>
            <div class="card card-body">
                <form action="editar_persona.php?id=<?php echo $_GET["id"]; ?>" method="post">
                    <div class="form-group mt-2 mb-3">
                        <label for="ci">CI:</label>
                        <input type="text" class="form-control" id="ci" name="ci" 
                            value="<?php echo $id?>" required disabled>
                    </div>
                    <div class="form-group mt-2 mb-3">
                        <label for="nombre">Nombre completo:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" 
                            value="<?php echo $nombre?>" required>
                    </div>
                    <div class="form-group mt-2 mb-3">
                        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $fecha_nac?>" required>
                    </div>
                    <div class="form-group mt-2 mb-3">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono"        value="<?php echo $telefono?>" required>
                    </div>
                    <div class="form-group mt-2 mb-3">
                        <label for="departamento">Departamento:</label>
                        <select class="form-control" id="departamento" name="departamento" 
                         required>
                            <option value="">Seleccione un departamento</option>  
                            
                            <option value="LP" 
                            <?php if ($departamento == "LP") echo "selected"; ?>>La Paz</option>
                            <option value="CB"
                            <?php if ($departamento == "CB") echo "selected"; ?>>Cochabamba</option>
                            <option value="SC"
                            <?php if ($departamento == "SC") echo "selected"; ?>>Santa Cruz</option>
                            <option value="OR"
                            <?php if ($departamento == "OR") echo "selected"; ?>>Oruro</option>
                            <option value="PT"
                            <?php if ($departamento == "PT") echo "selected"; ?>>Potosí</option>
                            <option value="CH"
                            <?php if ($departamento == "CH") echo "selected"; ?>>Chuquisaca</option>
                            <option value="TJ"
                            <?php if ($departamento == "TJ") echo "selected"; ?>>Tarija</option>
                            <option value="PD"
                            <?php if ($departamento == "PD") echo "selected"; ?>>Pando</option>
                            <option value="BE"
                            <?php if ($departamento == "BE") echo "selected"; ?>>Beni</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="actualizar_persona">Actualizar</button>

                    <a class="btn btn-danger btn-block" href="persona_page.php"> Volver</a>
                </form>                                   
            </div>
        </div>
    </div>

<!-- end section -->
<?php include("includes/footer.php")?>
