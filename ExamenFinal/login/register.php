<?php include("../db.php") ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style_login.css" />

  <title>Crear cuenta</title>
</head>

<body background="../images/background_login.jpg">
  <div class="login-page">
    <div class="form">
      <form class="login-form" action="crear_usuario.php" method="POST">
        <h1>Crear cuenta</h1>
        <input type="text" placeholder="usuario" name="usuario" />
        <input type="text" placeholder="carnet de identidad" name="ci" />
        <input type="text" placeholder="rol" name="rol" />
        <input type="password" placeholder="password" name="password" />

        <input class="button" type="submit" value="CREAR CUENTA">
      </form>
      <a href="login.php">Ya estoy registrado, ingresar a la cuenta</a></p>
    </div>
  </div>
</body>

</html>