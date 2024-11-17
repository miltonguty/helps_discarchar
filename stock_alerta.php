<?php
include 'conexion.php';
$sql = "SELECT * FROM productos WHERE stock < 5"; // Alerta cuando stock es menor a 5
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p>Alerta: El producto '{$row['nombre']}' tiene stock bajo (Solo {$row['stock']} unidades restantes)</p>";
    }
} else {
    echo "<p>No hay productos con stock bajo.</p>";
}

$conn->close();
?>