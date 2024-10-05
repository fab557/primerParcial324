<?php
include('config.php');

// Obtener el ID de la persona a eliminar
$id_persona = $_GET['id'];

// Eliminar primero de la tabla propiedades
$sql_eliminar_propiedad = "DELETE FROM propiedades WHERE id_persona = $id_persona";

if ($conn->query($sql_eliminar_propiedad) === TRUE) {
    // Luego eliminar de la tabla personas
    $sql_eliminar_persona = "DELETE FROM personas WHERE id_persona = $id_persona";

    if ($conn->query($sql_eliminar_persona) === TRUE) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar la persona: " . $conn->error;
    }
} else {
    echo "Error al eliminar la propiedad: " . $conn->error;
}

// Cerrar conexión
$conn->close();

// Redirigir a la lista después de eliminar
header("Location: listar.php");
exit();
?>
