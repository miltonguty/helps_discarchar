<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores - Discarchar, C.A.</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Proveedores de Discarchar</h1>
            <nav>
                <a href="index.php">Inicio</a>
                <a href="catalogo.php">Catálogo</a>
                <a href="acceso_restringido.php">Acceso Restringido</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <section class="proveedores">
                <h2>Proveedores de nuestros productos</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre Empresa</th>
                            <th>Contacto</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'conexion.php';
                        $sql = "SELECT * FROM proveedores";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['nombre_empresa']}</td>
                                        <td>{$row['contacto']}</td>
                                        <td>{$row['direccion']}</td>
                                        <td>{$row['telefono']}</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No se encontraron proveedores.</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
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