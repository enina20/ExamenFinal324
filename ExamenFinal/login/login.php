<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style_login.css" />

  <title>Inicio Sesión</title>
</head>

<body background="../images/background_login.jpg">
  <div class="login-page">
    <div class="form">
      <form class="login-form" action="verificar_usuario.php" method="POST">
        <h1>Iniciar Sesión</h1>
        <input type="text" placeholder="usuario" name="usuario" />
        <input type="password" placeholder="password" name="password" />

        <input class="button" type="submit" value="INICIAR SESIÓN">
        <a href="register.php">Crear cuenta</a></p>
      </form>
    </div>
  </div>
</body>

</html>