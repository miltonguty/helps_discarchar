<?php
// Configuración de conexión a la base de datos
$host = 'localhost';
$db = 'discharchar1';
$user = 'root';
$pass = '123456';

try {
    // Conexión a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener los productos próximos a vencer en los próximos 7 días
    $query = "
        SELECT id_producto, nombre, fecha_vencimiento 
        FROM productos 
        WHERE fecha_vencimiento IS NOT NULL 
          AND fecha_vencimiento <= DATE_ADD(CURDATE(), INTERVAL 7 DAY)
    ";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $productos_vencimiento = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Devolver los resultados en formato JSON para usar en el frontend
    echo json_encode($productos_vencimiento);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alertas de Vencimiento</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>Productos próximos a vencer</h1>
    <div id="alertasVencimiento"></div>

    <script>
        // Llama al archivo PHP y obtiene los productos próximos a vencer
        fetch('productos_vencimiento.php')
            .then(response => response.json())
            .then(data => {
                const alertasDiv = document.getElementById('alertasVencimiento');

                if (data.length > 0) {
                    data.forEach(producto => {
                        const alerta = document.createElement('p');
                        alerta.textContent = Producto: $ {
                            producto.nombre
                        } - Vence el: $ {
                            producto.fecha_vencimiento
                        };
                        alerta.style.color = 'red'; // Puedes estilizarlo como prefieras
                        alertasDiv.appendChild(alerta);
                    });
                } else {
                    alertasDiv.textContent = "No hay productos próximos a vencer.";
                }
            })
            .catch(error => {
                console.error('Error al obtener productos próximos a vencer:', error);
            });
    </script>
</body>

</html>