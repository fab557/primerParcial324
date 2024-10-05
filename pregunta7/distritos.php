<?php
// Conexión a la base de datos
$connection = new mysqli("localhost", "root", "", "dbfabricio2");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$query = "SELECT * FROM distritos";
$result = $connection->query($query);

$distritos = [];
while ($row = $result->fetch_assoc()) {
    $distritos[] = $row;
}

echo json_encode($distritos);
?>
