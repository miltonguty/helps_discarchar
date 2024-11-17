<?php
include 'conexion.php'; 
$sql = "SELECT * FROM productos LIMIT 5";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Discarchar, C.A.</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Bienvenido a Discarchar, C.A.</h1>
            <nav>
                <a href="index.php">Inicio</a>
                <a href="catalogo.php">Catálogo</a>
                <a href="acceso_restringido.php">Acceso Restringido</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <h2>Productos Destacados</h2>
            <div class="productos">
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="producto">';
                        echo '<img src="imagenes/' . $row["imagen"] . '" alt="' . $row["nombre"] . '">';
                        echo '<h3>' . $row["nombre"] . '</h3>';
                        echo '<p>' . $row["descripcion"] . '</p>';
                        echo '<p>Precio: $' . number_format($row["precio"], 2) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo "No hay productos disponibles.";
                }
                ?>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Discarchar, C.A. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>