<?php

session_start();

require_once __DIR__ . "/../../config/database.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    $_SESSION['error'] = "Acceso no permitido.";

    header("Location: ../views/auth/login.php");
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$_SESSION['old_email'] = $email;

if (
    empty($email) ||
    empty($password)
) {

    $_SESSION['error'] = "Todos los campos son obligatorios.";

    header("Location: ../views/auth/login.php");
    exit;
}

$sql = "SELECT * FROM usuarios WHERE email=?";

$stmt = mysqli_prepare(
    $conexion,
    $sql
);

mysqli_stmt_bind_param(
    $stmt,
    "s",
    $email
);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) === 0) {

    $_SESSION['error'] = "Correo o contraseña incorrectos.";

    header("Location: ../views/auth/login.php");
    exit;
}

$usuario = mysqli_fetch_assoc($resultado);

if (
    !password_verify(
        $password,
        $usuario['password']
    )
) {

    $_SESSION['error'] = "Correo o contraseña incorrectos.";

    header("Location: ../views/auth/login.php");
    exit;
}

unset($_SESSION['old_email']);

$_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['usuario_nombre'] = $usuario['nombre_completo'];
$_SESSION['usuario_email'] = $usuario['email'];

header("Location: ../../index.php");
exit;
