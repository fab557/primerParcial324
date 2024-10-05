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
$codigo_catastral = $_POST['codigo_catastral']; // Nuevo campo para el código catastral

// Insertar los datos en la tabla personas
$sql_persona = "INSERT INTO personas (nombre, apellido, ci, direccion, telefono) VALUES ('$nombre', '$apellido', '$ci', '$direccion', '$telefono')";
if ($conn->query($sql_persona) === TRUE) {
    $id_persona = $conn->insert_id; // Obtener el ID de la persona registrada
    
    // Insertar los datos en la tabla propiedades
    $sql_propiedad = "INSERT INTO propiedades (ubicacion, tipo_propiedad, superficie, valor_catastral, codigo_catastral, id_persona) 
                      VALUES ('$ubicacion', '$tipo_propiedad', '$superficie', '$valor_catastral', '$codigo_catastral', '$id_persona')";
    
    if ($conn->query($sql_propiedad) === TRUE) {
        header("Location: index.php"); // Cambia 'success.php' por la URL a la que deseas redirigir
    exit();
    } else {
        echo "Error al guardar la propiedad: " . $conn->error;
    }
} else {
    echo "Error al guardar la persona: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
