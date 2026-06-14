<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../../config/database.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error'] = "Acceso no permitido.";
    header("Location:../views/auth/register.php");
    exit;
}

$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

$_SESSION['old_nombre'] = $nombre;
$_SESSION['old_email'] = $email;

if (empty($nombre) || empty($email) || empty($password) || empty($confirmPassword)) {
    $_SESSION['error'] = "Todos los campos son obligatorios.";
    header("Location:../views/auth/register.php");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Ingrese un correo válido.";
    header("Location:../views/auth/register.php");
    exit;
}

if (
    strlen($password) < 8 ||
    !preg_match('/[A-Z]/', $password) ||
    !preg_match('/[a-z]/', $password) ||
    !preg_match('/[0-9]/', $password) ||
    !preg_match('/[^A-Za-z0-9]/', $password)
) {
    $_SESSION['error'] = "La contraseña no cumple los requisitos de seguridad.";
    header("Location:../views/auth/register.php");
    exit;
}

if ($password !== $confirmPassword) {
    $_SESSION['error'] = "Las contraseñas no coinciden.";
    header("Location:../views/auth/register.php");
    exit;
}

$sql = "SELECT id FROM usuarios WHERE email=?";
$stmt = mysqli_prepare($conexion, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "s",
    $email
);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) > 0) {
    $_SESSION['error'] = "Error, el correo ya está registrado.";
    header("Location:../views/auth/register.php");
    exit;
}

$passwordHash = password_hash(
    $password,
    PASSWORD_DEFAULT
);

$sql = "INSERT INTO usuarios(nombre_completo,email,password)VALUES(?,?,?)";

$stmt = mysqli_prepare(
    $conexion,
    $sql
);

mysqli_stmt_bind_param(
    $stmt,
    "sss",
    $nombre,
    $email,
    $passwordHash
);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old_nombre']);
    unset($_SESSION['old_email']);

    $_SESSION['success'] = "Usuario registrado correctamente. Ahora iniciá sesión.";
    $_SESSION['redirect_login'] = true;
    header("Location:../views/auth/login.php");

} else {
    $_SESSION['error'] = "Ocurrió un error al registrar el usuario.";
}

header("Location:../views/auth/register.php");
exit;
