<?php
include 'db.php';

// Obtener todos los pedidos
$sql = "SELECT * FROM orders ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Pedidos - Paletería</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Pedidos</h1>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre del Cliente</th><th>Dirección</th><th>Total</th><th>Detalles del Pedido</th><th>Fecha</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["customer_name"] . "</td>";
                echo "<td>" . $row["customer_address"] . "</td>";
                echo "<td>$" . $row["total"] . "</td>";
                echo "<td>";
                $order_details = json_decode($row["order_details"], true);
                foreach ($order_details as $detail) {
                    echo $detail['sabor'] . " - $" . $detail['precio'] . "<br>";
                }
                echo "</td>";
                echo "<td>" . $row["created_at"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay pedidos disponibles.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
