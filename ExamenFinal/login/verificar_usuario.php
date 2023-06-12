<?php include("../db.php") ?>
<?php
$username = $_POST['usuario'];
$password = $_POST['password'];

$query = "SELECT * FROM usuario WHERE Usuario = '$username'";
$resultado = mysqli_query($conn, $query);

if ($resultado->num_rows == 1) {
    $row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    if (password_verify($password, $row['Password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['role'] = $row['role'];
        $_SESSION['CI'] = $row['CI'];

        header('Location: ../index.php');
        exit;
    } else {
        header("Location: login.php");
        die();
        mysqli_close($con);
    }
} else {
    header("Location: login.php");
    die();
    mysqli_close($con);
}
?>