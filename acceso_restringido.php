<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}

// Redirige automáticamente a agregar_producto.php si el usuario es admin
if ($_SESSION['tipo_usuario'] == 'admin') {
    header("Location: agregar_producto1.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Restringido - Discarchar, C.A.</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Acceso Restringido</h1>
            <nav>
                <a href="index.php">Inicio</a>
                <a href="catalogo.php">Catálogo</a>
                <a href="proveedores.php">Proveedores</a>
                <a href="logout.php">Cerrar sesión</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <h2>Bienvenido al área restringida</h2>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Discarchar, C.A. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>

