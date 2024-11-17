<?php
include 'conexion.php';
$sql = "SELECT * FROM productos WHERE fecha_vencimiento <= CURDATE() + INTERVAL 7 DAY";
$result = $conn->query($sql);
?>

<div class="container">
    <h2>Alertas de Productos Próximos a Vencer</h2>
    <?php if ($result->num_rows > 0): ?>
        <div class="alert">
            <p>Algunos productos están próximos a vencer en los próximos 7 días:</p>
            <ul>
                <?php while($row = $result->fetch_assoc()): ?>
                    <li><?php echo $row['nombre'] . " - Vence el: " . $row['fecha_vencimiento']; ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php else: ?>
        <p>No hay productos próximos a vencer.</p>
    <?php endif; ?>
</div>