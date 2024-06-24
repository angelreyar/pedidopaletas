<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Paletería</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>Admin Login</h1>
        <form action="login.php" method="post">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Iniciar Sesión">
        </form>
        <?php
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            // Datos de inicio de sesión predefinidos (cámbialos según sea necesario)
            $correct_username = 'admin';
            $correct_password = 'admin123';
            if ($username == $correct_username && $password == $correct_password) {
                $_SESSION['loggedin'] = true;
                header('Location: index.php');
                exit;
            } else {
                echo '<p>Usuario o contraseña incorrectos.</p>';
            }
        }
        ?>
    </div>
</body>
</html>
