<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
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
            <h1>Área Restringida</h1>
            <nav>
                <a href="index.php">Inicio</a>
                <a href="catalogo.php">Catálogo</a>
                <a href="proveedores.php">Proveedores</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <h2>Bienvenido, <?php echo $_SESSION['username']; ?></h2>
            <p>Esta página es solo para usuarios autenticados.</p>
            <a href="agregar_producto.php">Agregar Productos al Inventario</a>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Discarchar, C.A. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>