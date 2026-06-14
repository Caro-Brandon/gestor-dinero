<nav id="navbar">

    <div class="logo">
        <h2>Gestor de Gastos</h2>
    </div>

    <div class="user">

        <span>
            <i class="bi bi-person-circle"></i>
            <?= htmlspecialchars($_SESSION['usuario_nombre']) ?>
        </span>

       <a href="logout.php" class="logout">
            Salir
        </a>

        <button
            class="menu-toggle"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#menuLateral"
            aria-controls="menuLateral">

            <i class="bi bi-list"></i>

        </button>

    </div>

</nav>

<div
    class="offcanvas offcanvas-start text-bg-dark"
    tabindex="-1"
    id="menuLateral"
    aria-labelledby="menuLateralLabel">

    <div class="offcanvas-header">

        <h5
            class="offcanvas-title"
            id="menuLateralLabel">

            Gestor de Gastos

        </h5>

        <button
            type="button"
            class="btn-close btn-close-white"
            data-bs-dismiss="offcanvas"
            aria-label="Close">
        </button>

    </div>

    <div class="offcanvas-body">

        <a href="index.php" class="menu-link">
            <i class="bi bi-house-door"></i>
            Dashboard
        </a>

        <hr>

        <div class="menu-section">
            Movimientos
        </div>

        <a href="ingresos.php" class="menu-link">
            <i class="bi bi-arrow-down-circle"></i>
            Ingresos
        </a>

        <a href="gastos.php" class="menu-link">
            <i class="bi bi-arrow-up-circle"></i>
            Gastos
        </a>

        <hr>

        <div class="menu-section">
            Organización
        </div>

        <a href="categorias.php" class="menu-link">
            <i class="bi bi-tags"></i>
            Categorías
        </a>

        <a href="reportes.php" class="menu-link">
            <i class="bi bi-bar-chart"></i>
            Reportes
        </a>

        <hr>

        <div class="menu-section">
            Cuenta
        </div>

        <a href="perfil.php" class="menu-link">
            <i class="bi bi-person"></i>
            Mi Perfil
        </a>

        <hr>

        <a
            href="logout.php"
            class="menu-link logout-link">

            <i class="bi bi-box-arrow-right"></i>
            Cerrar Sesión

        </a>

    </div>

</div>