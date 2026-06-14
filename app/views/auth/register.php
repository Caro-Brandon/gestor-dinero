<?php

session_start();

$error = $_SESSION['error'] ?? '';
$success = $_SESSION['success'] ?? '';

$oldNombre = $_SESSION['old_nombre'] ?? '';
$oldEmail = $_SESSION['old_email'] ?? '';

$redirectLogin = $_SESSION['redirect_login'] ?? false;

unset($_SESSION['error']);
unset($_SESSION['success']);
unset($_SESSION['old_nombre']);
unset($_SESSION['old_email']);
unset($_SESSION['redirect_login']);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../../../public/css/register.css">
    <script src="../../../public/js/register.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<?php if ($redirectLogin): ?>

    <script>
        setTimeout(() => {

            window.location.href = "login.php";

        }, 2500);
    </script>

<?php endif; ?>

<body>

    <main class="register-page">

        <section class="register-card">

            <h1 class="register-title">Crear Cuenta</h1>

            <p class="register-subtitle">
                Gestiona tus ingresos y gastos de manera inteligente
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

            <form action="../../controllers/registerController.php" method="POST" class="register-form">

                <div class="input-group">
                    <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($oldNombre) ?>" required>
                    <label for="nombre">Nombre Completo</label>
                </div>

                <div class="input-group">
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($oldEmail) ?>" required>
                    <label for="email">Correo Electrónico</label>
                </div>

                <div class="input-group">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Contraseña</label>

                    <div class="password-rules">

                        <div class="rule" id="rule-length">
                            <i class="bi bi-x-circle-fill"></i>
                            <span>Mínimo 8 caracteres</span>
                        </div>

                        <div class="rule" id="rule-uppercase">
                            <i class="bi bi-x-circle-fill"></i>
                            <span>Una letra mayúscula</span>
                        </div>

                        <div class="rule" id="rule-lowercase">
                            <i class="bi bi-x-circle-fill"></i>
                            <span>Una letra minúscula</span>
                        </div>

                        <div class="rule" id="rule-number">
                            <i class="bi bi-x-circle-fill"></i>
                            <span>Un número</span>
                        </div>

                        <div class="rule" id="rule-special">
                            <i class="bi bi-x-circle-fill"></i>
                            <span>Un carácter especial</span>
                        </div>

                    </div>
                </div>

                <div class="input-group">
                    <input type="password" id="confirm_password" name="confirm_password" required>
                    <label for="confirm_password">Confirmar Contraseña</label>
                </div>

                <button type="submit" class="register-button">
                    Registrarse
                </button>

            </form>

            <div class="register-footer">
                <span>¿Ya tienes una cuenta?</span>
                <a href="login.php">Iniciar Sesión</a>
            </div>

        </section>

    </main>


</body>

</html>