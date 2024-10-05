<?php
include('config.php');

// Obtener el ID de la persona a editar
$id_persona = $_GET['id'];

// Obtener los datos de la persona y su propiedad
$sql = "SELECT p.*, pr.ubicacion, pr.tipo_propiedad, pr.superficie, pr.valor_catastral 
        FROM personas p 
        JOIN propiedades pr ON p.id_persona = pr.id_persona 
        WHERE p.id_persona = $id_persona";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona y Propiedad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar Persona y Propiedad</h1>
        <form action="actualizar.php" method="POST">
            <input type="hidden" name="id_persona" value="<?php echo $row['id_persona']; ?>">
            <!-- Datos de la Persona -->
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" value="<?php echo $row['apellido']; ?>" required>
            </div>
            <div class="form-group">
                <label for="ci">Cédula de Identidad</label>
                <input type="text" name="ci" class="form-control" value="<?php echo $row['ci']; ?>" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" class="form-control" value="<?php echo $row['direccion']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo $row['telefono']; ?>" required>
            </div>

            <!-- Datos de la Propiedad -->
            <h2 class="mt-4">Datos de la Propiedad</h2>
            <div class="form-group">
                <label for="ubicacion">Ubicación</label>
                <input type="text" name="ubicacion" class="form-control" value="<?php echo $row['ubicacion']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tipo_propiedad">Tipo de Propiedad</label>
                <input type="text" name="tipo_propiedad" class="form-control" value="<?php echo $row['tipo_propiedad']; ?>" required>
            </div>
            <div class="form-group">
                <label for="superficie">Superficie (m²)</label>
                <input type="number" step="0.01" name="superficie" class="form-control" value="<?php echo $row['superficie']; ?>" required>
            </div>
            <div class="form-group">
                <label for="valor_catastral">Valor Catastral (Bs)</label>
                <input type="number" step="0.01" name="valor_catastral" class="form-control" value="<?php echo $row['valor_catastral']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
