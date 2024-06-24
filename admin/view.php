<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Paletas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Paletas</h1>
        <?php
        include 'db.php';

        $sql = "SELECT * FROM paletas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Sabor</th><th>Precio</th><th>Imagen</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["sabor"]. "</td><td>" . $row["precio"]. "</td><td><img src='images/" . $row["imagen"]. "' alt='" . $row["sabor"] . "' width='100'></td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 resultados";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
