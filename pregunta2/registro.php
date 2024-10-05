<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Persona y Propiedad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Registrar Persona y Propiedad</h1>
        <form action="guardar.php" method="POST">
            <!-- Datos de la Persona -->
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ci">Cédula de Identidad</label>
                <input type="text" name="ci" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" required>
            </div>

            <!-- Datos de la Propiedad -->
            <h2 class="mt-4">Datos de la Propiedad</h2>
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

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</body>
</html>
