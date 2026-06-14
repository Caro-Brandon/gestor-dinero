<?php

session_start();

$error = $_SESSION['error'] ?? '';
$success = $_SESSION['success'] ?? '';
$oldEmail = $_SESSION['old_email'] ?? '';

unset($_SESSION['error']);
unset($_SESSION['success']);
unset($_SESSION['old_email']);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Iniciar Sesión</title>

    <link rel="stylesheet" href="../../../public/css/register.css">
        <script src="../../../public/js/login.js" defer></script>

</head>

<body>

    <main class="register-page">

        <section class="register-card">

            <h1 class="register-title">Bienvenido</h1>

            <p class="register-subtitle">
                Inicia sesión para continuar
            </p>

            <?php if ($error): ?>
                <div class="message-error message-auto-close">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="message-success message-auto-close">
                    <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>

            <form action="../../controllers/loginController.php" method="POST" class="register-form">

                <div class="input-group">
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($oldEmail) ?>" required>
                    <label for="email">Correo Electrónico</label> 
                     
                </div>

                <div class="input-group">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Contraseña</label>
                </div>

                <button type="submit" class="register-button">
                    Iniciar Sesión
                </button>

            </form>

            <div class="register-footer">
                <span>¿No tienes cuenta?</span>
                <a href="register.php">Registrarse</a>
            </div>

        </section>

    </main>

    <script src="../../../public/js/login.js"></script>

</body>

</html>