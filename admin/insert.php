<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Paleta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Paleta</h1>
        <form action="insert.php" method="post" enctype="multipart/form-data">
            <label for="sabor">Sabor:</label>
            <input type="text" id="sabor" name="sabor" required>
            
            <label for="precio">Precio:</label>
            <input type="text" id="precio" name="precio" required>

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" required>

            <input type="submit" name="submit" value="Agregar">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            include 'db.php';

            $sabor = $_POST['sabor'];
            $precio = $_POST['precio'];
            $imagen = $_FILES['imagen']['name'];
            $target = "images/".basename($imagen);

            $sql = "INSERT INTO paletas (sabor, precio, imagen) VALUES ('$sabor', '$precio', '$imagen')";

            if ($conn->query($sql) === TRUE) {
                echo "Nueva paleta agregada exitosamente.";
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target)) {
                    echo " Imagen subida correctamente.";
                } else {
                    echo " Error al subir la imagen.";
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
