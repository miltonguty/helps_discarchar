
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['tipo_usuario'] != 'admin') {
    header("Location: login.php");
    exit;
}

include 'conexion.php'; // Incluir la conexión a la base de datos

// Manejo del formulario de agregar producto
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    
    // Manejo de la imagen
    $imagen = $_FILES['imagen']['name'];
    $imagen_temp = $_FILES['imagen']['tmp_name'];
    move_uploaded_file($imagen_temp, "imagenes/$imagen");

    // Insertar el producto en la base de datos
    $query = "INSERT INTO productos (nombre, descripcion, precio, stock, imagen) 
              VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$imagen')";
    $result = mysqli_query($conexion, $query);

    if ($result) {
        echo "Producto agregado con éxito.";
    } else {
        echo "Error al agregar el producto: " . mysqli_error($conexion);
    }
}
?>

<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['tipo_usuario'] != 'admin') {
    header("Location: login.php");
    exit;
}

include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $imagen = $_FILES['imagen']['name'];
    $imagen_temp = $_FILES['imagen']['tmp_name'];
    move_uploaded_file($imagen_temp, "imagenes/$imagen");

    $query = "INSERT INTO productos (nombre, descripcion, precio, stock, imagen) 
              VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$imagen')";
    $result = mysqli_query($conexion, $query);

    if ($result) {
        echo "Producto agregado con éxito.";
    } else {
        echo "Error al agregar el producto: " . mysqli_error($conexion);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto - Discarchar, C.A.</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Agregar Producto</h1>
            <nav>
                <a href="index.php">Inicio</a>
                <a href="catalogo.php">Catálogo</a>
                <a href="logout.php">Cerrar sesión</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <form action="agregar_producto.php" method="POST" enctype="multipart/form-data">
                <label for="nombre">Nombre del producto:</label>
                <input type="text" name="nombre" required>

                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" required></textarea>

                <label for="precio">Precio:</label>
                <input type="number" name="precio" required>

                <label for="stock">Cantidad en stock:</label>
                <input type="number" name="stock" required>

                <label for="imagen">Imagen del producto:</label>
                <input type="file" name="imagen" required>

                <button type="submit">Agregar Producto</button>
            </form>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Discarchar, C.A. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>