<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Discarchar, C.A.</title>
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
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <h2>Inicio de Sesión</h2>
            <form action="login.php" method="post">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Iniciar Sesión">
            </form>
            <?php
            session_start();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include 'conexion.php';

                $username = $conn->real_escape_string($_POST['username']);
                $password = $conn->real_escape_string($_POST['password']);

                $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$username' AND clave = '$password'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['tipo_usuario'] = 'admin';
                    header("Location: acceso_restringido1.php");
                } else {
                    echo "<p>Usuario o contraseña incorrectos</p>";
                }

                $conn->close();
            }
            ?>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Discarchar, C.A. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>