<?php
include('config.php');

// Recoger los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$ci = $_POST['ci'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$ubicacion = $_POST['ubicacion'];
$tipo_propiedad = $_POST['tipo_propiedad'];
$superficie = $_POST['superficie'];
$valor_catastral = $_POST['valor_catastral'];

// Insertar los datos en la tabla personas
$sql_persona = "INSERT INTO personas (nombre, apellido, ci, direccion, telefono) VALUES ('$nombre', '$apellido', '$ci', '$direccion', '$telefono')";
if ($conn->query($sql_persona) === TRUE) {
    $id_persona = $conn->insert_id; // Obtener el ID de la persona registrada
    
    // Insertar los datos en la tabla propiedades
    $sql_propiedad = "INSERT INTO propiedades (ubicacion, tipo_propiedad, superficie, valor_catastral, id_persona) 
                      VALUES ('$ubicacion', '$tipo_propiedad', '$superficie', '$valor_catastral', '$id_persona')";
    
    if ($conn->query($sql_propiedad) === TRUE) {
        echo "Registro guardado correctamente.";
    } else {
        echo "Error al guardar la propiedad: " . $conn->error;
    }
} else {
    echo "Error al guardar la persona: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
