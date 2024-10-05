<?php
include('config.php');

// Obtener el ID de la persona desde la URL
$id_persona = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nueva Propiedad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Registrar Nueva Propiedad</h1>
        <form action="guardar_propiedad.php?id=<?php echo $id_persona; ?>" method="POST">
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
            <div class="form-group">
                <label for="codigo_catastral">Código Catastral</label>
                <input type="text" name="codigo_catastral" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Propiedad</button>
        </form>
        <a href="propiedades.php?id=<?php echo $id_persona; ?>" class="btn btn-secondary mt-3">Volver a Propiedades</a>
    </div>
</body>
</html>
