<?php
include('config.php');

// Obtener el ID de la persona
$id_persona = $_GET['id_persona'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger datos del formulario
    $ubicacion = $_POST['ubicacion'];
    $tipo_propiedad = $_POST['tipo_propiedad'];
    $superficie = $_POST['superficie'];
    $valor_catastral = $_POST['valor_catastral'];

    // Insertar nueva propiedad
    $sql = "INSERT INTO propiedades (id_persona, ubicacion, tipo_propiedad, superficie, valor_catastral) 
            VALUES ($id_persona, '$ubicacion', '$tipo_propiedad', $superficie, $valor_catastral)";

    if ($conn->query($sql) === TRUE) {
        echo "Propiedad añadida correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Propiedad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Agregar Nueva Propiedad</h1>
        <form action="agregar_propiedad.php?id_persona=<?php echo $id_persona; ?>" method="POST">
            <div class="form-group">
                <label for="ubicacion">Ubicación</label>
                <input type="text" name="ubicacion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tipo_propiedad">Tipo de Propiedad</label>
                <input type="text" name="tipo_propiedad" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="superficie">Superficie (m²)</label>
                <input type="number" step="0.01" name="superficie" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="valor_catastral">Valor Catastral (Bs)</label>
                <input type="number" step="0.01" name="valor_catastral" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Propiedad</button>
        </form>
    </div>
</body>
</html>
