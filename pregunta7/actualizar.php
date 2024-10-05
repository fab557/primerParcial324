<?php
include('config.php');

// Recoger los datos del formulario
$id_persona = $_POST['id_persona'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$ci = $_POST['ci'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$ubicacion = $_POST['ubicacion'];
$tipo_propiedad = $_POST['tipo_propiedad'];
$superficie = $_POST['superficie'];
$valor_catastral = $_POST['valor_catastral'];

// Actualizar los datos en la tabla personas
$sql_persona = "UPDATE personas SET nombre='$nombre', apellido='$apellido', ci='$ci', direccion='$direccion', telefono='$telefono' WHERE id_persona=$id_persona";

if ($conn->query($sql_persona) === TRUE) {
    // Actualizar los datos en la tabla propiedades
    $sql_propiedad = "UPDATE propiedades SET ubicacion='$ubicacion', tipo_propiedad='$tipo_propiedad', superficie='$superficie', valor_catastral='$valor_catastral' WHERE id_persona=$id_persona";

    if ($conn->query($sql_propiedad) === TRUE) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar la propiedad: " . $conn->error;
    }
} else {
    echo "Error al actualizar la persona: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
