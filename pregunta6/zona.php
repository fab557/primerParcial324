<?php
if (isset($_POST['distrito_id'])) {
    $distrito_id = $_POST['distrito_id'];

    // Conexión a la base de datos
    $connection = new mysqli("localhost", "root", "", "dbfabricio2");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $query = "SELECT * FROM zonas WHERE distrito_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $distrito_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $zonas = [];
    while ($row = $result->fetch_assoc()) {
        $zonas[] = $row;
    }

    echo json_encode($zonas);
}
?>
