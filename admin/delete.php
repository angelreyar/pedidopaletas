<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Paleta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Eliminar Paleta</h1>
        <form action="delete.php" method="post">
            <label for="id">ID de la Paleta:</label>
            <input type="text" id="id" name="id" required>

            <input type="submit" name="submit" value="Eliminar">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            include 'db.php';

            $id = $_POST['id'];
            $sql = "DELETE FROM paletas WHERE id='$id'";

            if ($conn->query($sql) === TRUE) {
                echo "Paleta eliminada exitosamente.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
