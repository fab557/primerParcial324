<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Lista de Personas por Tipo de Impuesto</title>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Lista de Personas por Tipo de Impuesto</h2>
    <table class="table table-striped table-bordered mt-3">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Impuesto Alto</th>
                <th>Impuesto Medio</th>
                <th>Impuesto Bajo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Conexión a la base de datos
            $servername = "localhost";
            $username = "root"; // Cambia esto si es necesario
            $password = ""; // Cambia esto si es necesario
            $database = "dbfabricio";

            $conn = new mysqli($servername, $username, $password, $database);

            // Verifica la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Realiza la consulta
            $sql = "
                SELECT p.nombre, 
                       MAX(CASE WHEN ip.tipo_impuesto = 1 THEN ip.monto END) AS 'Impuesto Alto',
                       MAX(CASE WHEN ip.tipo_impuesto = 2 THEN ip.monto END) AS 'Impuesto Medio',
                       MAX(CASE WHEN ip.tipo_impuesto = 3 THEN ip.monto END) AS 'Impuesto Bajo'
                FROM personas p
                LEFT JOIN impuestos_pagados ip ON p.id_persona = ip.id_persona
                GROUP BY p.id_persona;
            ";

            $result = $conn->query($sql);

            // Verifica si hay resultados
            if ($result->num_rows > 0) {
                // Salida de cada fila
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . ($row["Impuesto Alto"] ? $row["Impuesto Alto"] : '0') . "</td>";
                    echo "<td>" . ($row["Impuesto Medio"] ? $row["Impuesto Medio"] : '0') . "</td>";
                    echo "<td>" . ($row["Impuesto Bajo"] ? $row["Impuesto Bajo"] : '0') . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No se encontraron resultados.</td></tr>";
            }

            // Cierra la conexión
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
