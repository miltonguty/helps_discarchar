<?php
include 'conexion.php'; // Incluir el archivo de conexión a la base de datos

// Consulta para obtener todos los productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - Discarchar, C.A.</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Catálogo de Productos</h1>
            <nav>
                <a href="index.php">Inicio</a>
                <a href="acceso_restringido.php">Acceso Restringido</a>
                <a href="proveedores.php">Proveedores</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <section class="productos">
                <h2>Nuestro Catálogo</h2>
                <?php
                if ($result->num_rows > 0) {
                    // Mostrar cada producto
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="producto">';
                        echo '<img src="imagenes/' . $row["imagen"] . '" alt="' . $row["nombre"] . '">';
                        echo '<h3>' . $row["nombre"] . '</h3>';
                        echo '<p>' . $row["descripcion"] . '</p>';
                        echo '<p>Precio: $' . number_format($row["precio"], 2) . '</p>';
                        echo '<p>Stock: ' . $row["stock"] . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo "No hay productos disponibles.";
                }

                $conn->close();
                ?>
            </section>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Discarchar, C.A. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>