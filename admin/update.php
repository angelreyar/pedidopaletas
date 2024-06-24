<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Paleta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Actualizar Paleta</h1>
        <form action="update.php" method="post">
            <label for="id">ID de la Paleta:</label>
            <input type="text" id="id" name="id" required>
            
            <label for="sabor">Nuevo Sabor:</label>
            <input type="text" id="sabor" name="sabor">

            <label for="precio">Nuevo Precio:</label>
            <input type="text" id="precio" name="precio">

            <label for="imagen">Nueva Imagen:</label>
            <input type="file" id="imagen" name="imagen">

            <input type="submit" name="submit" value="Actualizar">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            include 'db.php';

            $id = $_POST['id'];
            $sabor = $_POST['sabor'];
            $precio = $_POST['precio'];
            $imagen = $_FILES['imagen']['name'];
            $target = "images/".basename($imagen);

            $sql = "UPDATE paletas SET ";
            if (!empty($sabor)) {
                $sql .= "sabor='$sabor', ";
            }
            if (!empty($precio)) {
                $sql .= "precio='$precio', ";
            }
            if (!empty($imagen)) {
                $sql .= "imagen='$imagen' ";
            } else {
                $sql = rtrim($sql, ', ');
            }
            $sql .= "WHERE id='$id'";

            if ($conn->query($sql) === TRUE) {
                echo "Paleta actualizada exitosamente.";
                if (!empty($imagen) && move_uploaded_file($_FILES['imagen']['tmp_name'], $target)) {
                    echo " Imagen subida correctamente.";
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
