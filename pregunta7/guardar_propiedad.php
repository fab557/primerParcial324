<?php
include('config.php');

// Obtener el ID de la persona desde la URL
$id_persona = $_GET['id'];

// Recoger los datos del formulario
$ubicacion = $_POST['ubicacion'];
$tipo_propiedad = $_POST['tipo_propiedad'];
$superficie = $_POST['superficie'];
$valor_catastral = $_POST['valor_catastral'];
$codigo_catastral = $_POST['codigo_catastral']; // Nuevo campo

// Insertar los datos en la tabla propiedades
$sql_propiedad = "INSERT INTO propiedades (ubicacion, tipo_propiedad, superficie, valor_catastral, codigo_catastral, id_persona) 
                  VALUES ('$ubicacion', '$tipo_propiedad', '$superficie', '$valor_catastral', '$codigo_catastral', '$id_persona')";

if ($conn->query($sql_propiedad) === TRUE) {
    // Redirigir a la lista de propiedades después de guardar correctamente
    header("Location: propiedades.php?id=$id_persona");
    exit();
} else {
    echo "Error al guardar la propiedad: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
