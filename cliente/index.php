<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paletería - Clientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenidos a la Paletería</h1>
        <h2>Nuestras Paletas</h2>
        <?php
        include '../admin/db.php';

        $sql = "SELECT * FROM paletas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<form action='order.php' method='post'>";
            echo "<table><tr><th>Seleccionar</th><th>Sabor</th><th>Precio</th><th>Imagen</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td><input type='checkbox' name='paletas[]' value='" . $row["id"] . "'></td><td>" . $row["sabor"]. "</td><td>" . $row["precio"]. "</td><td><img src='../images/" . $row["imagen"]. "' alt='" . $row["sabor"] . "' width='100'></td></tr>";
            }
            echo "</table>";
            echo "<label for='nombre'>Nombre:</label><input type='text' id='nombre' name='nombre' required>";
            echo "<label for='direccion'>Dirección:</label><input type='text' id='direccion' name='direccion' required>";
            echo "<input type='submit' name='submit' value='Realizar Pedido'>";
            echo "</form>";
        } else {
            echo "No hay paletas disponibles.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
