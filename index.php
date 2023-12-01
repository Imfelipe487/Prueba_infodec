<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Compras</title>
</head>
<body>
    <h1>Reporte de Compras</h1>

    <?php
    // Conexión a la base de datos (ajusta los valores según tu configuración)
    $servername = "localhost";
    $database = "miempresa";
    $username = "root";
    $password = "";
    // Create connection
    $conexion = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conexion) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Consulta SQL
    $consulta = "SELECT C.Nombre AS NombreCliente, P.Nombre AS NombreProducto, Co.FechaCompra, Co.NumeroPedido, Co.Cantidad, P.PrecioUnitario * Co.Cantidad AS ValorTotal
                 FROM Cliente C
                 JOIN Compra Co ON C.ClienteID = Co.ClienteID
                 JOIN Producto P ON Co.ProductoID = P.ProductoID
                 ORDER BY Co.NumeroPedido";

    // Ejecutar la consulta
    $resultado = $conexion->query($consulta);

    // Verificar si hay resultados
    if ($resultado->num_rows > 0) {
        // Mostrar los resultados en una tabla
        echo "<table border='1'>
                <tr>
                    <th>Nombre Cliente</th>
                    <th>Nombre Producto</th>
                    <th>Fecha de Compra</th>
                    <th>Número de Pedido</th>
                    <th>Cantidad</th>
                    <th>Valor Total</th>
                </tr>";

        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>{$fila['NombreCliente']}</td>
                    <td>{$fila['NombreProducto']}</td>
                    <td>{$fila['FechaCompra']}</td>
                    <td>{$fila['NumeroPedido']}</td>
                    <td>{$fila['Cantidad']}</td>
                    <td>{$fila['ValorTotal']}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron resultados.";
    }

    // Cerrar la conexión
    $conexion->close();
    ?>

</body>
</html>
