<?php
include('config.php');

// Obtener el ID de la propiedad desde la URL
$id_propiedad = $_GET['id'];

// Consultar para verificar si la propiedad existe
$sql_check = "SELECT * FROM propiedades WHERE id_propiedad = $id_propiedad";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Si existe, proceder a eliminar
    $sql_delete = "DELETE FROM propiedades WHERE id_propiedad = $id_propiedad";

    if ($conn->query($sql_delete) === TRUE) {
        echo "Propiedad eliminada correctamente.";
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
} else {
    echo "Propiedad no encontrada.";
}

// Redireccionar de nuevo a la página de propiedades de la persona
header("Location: editar.php?id=" . $_GET['id_persona']);
exit;
?>
