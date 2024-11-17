<?php
include 'conexion.php';

// Código para agregar o modificar productos según los parámetros recibidos
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];
    $sql_update = "UPDATE productos SET stock = '$stock', precio = '$precio' WHERE id_producto = '$id'";
    $conn->query($sql_update);
}

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Stock - Discarchar, C.A.</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Gestión de Inventario</h1>
    </header>
    <div class="container">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Acción</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <form method="post" action="stock.php">
                    <input type="hidden" name="id" value="<?php echo $row['id_producto']; ?>">
                    <td><?php echo $row['nombre']; ?></td>
                    <td><input type="number" name="stock" value="<?php echo $row['stock']; ?>"></td>
                    <td><input type="text" name="precio" value="<?php echo $row['precio']; ?>"></td>
                    <td><button type="submit" name="update">Actualizar</button></td>
                </form>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>