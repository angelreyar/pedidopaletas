<?php
include '../admin/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['confirm'])) {
        // Paso 2: Confirmar el pedido
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $paletas = json_decode($_POST['paletas'], true);
        $total = $_POST['total'];

        // Insertar la orden en la base de datos
        $order_details_json = json_encode($paletas);
        $sql = "INSERT INTO orders (customer_name, customer_address, total, order_details) VALUES ('$nombre', '$direccion', '$total', '$order_details_json')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='container'>";
            echo "<div class='message success'>Pedido realizado con éxito</div>";
            echo "</div>";
        } else {
            echo "<div class='container'>";
            echo "<div class='message error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            echo "</div>";
        }
    } else {
        // Paso 1: Calcular el total
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $paletas = $_POST['paletas'];

        // Obtener los detalles de las paletas seleccionadas
        $order_details = [];
        $total = 0;
        foreach ($paletas as $paleta_id) {
            $sql = "SELECT sabor, precio FROM paletas WHERE id = $paleta_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $order_details[] = $row;
                $total += $row['precio'];
            }
        }

        // Mostrar el total y confirmar el pedido
        echo "<div class='container confirm-container'>";
        echo "<h2>Confirmar Pedido</h2>";
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>Dirección:</strong> $direccion</p>";
        echo "<h3>Detalles del Pedido</h3>";
        echo "<ul>";
        foreach ($order_details as $detail) {
            echo "<li>" . $detail['sabor'] . " - $" . $detail['precio'] . "</li>";
        }
        echo "</ul>";
        echo "<p><strong>Total:</strong> $$total</p>";
        echo "<form action='order.php' method='post' class='confirm-form'>";
        echo "<input type='hidden' name='nombre' value='$nombre'>";
        echo "<input type='hidden' name='direccion' value='$direccion'>";
        echo "<input type='hidden' name='total' value='$total'>";
        echo "<input type='hidden' name='paletas' value='" . json_encode($order_details) . "'>";
        echo "<input type='submit' name='confirm' value='Confirmar Pedido' class='btn'>";
        echo "</form>";
        echo "</div>";
    }
    $conn->close();
}
?>
