<?php
include('config.php');

// Obtener el ID de la propiedad desde la URL
$id_propiedad = $_GET['id'];

// Obtener la información de la propiedad
$sql_propiedad = "SELECT * FROM propiedades WHERE id_propiedad = $id_propiedad";
$result_propiedad = $conn->query($sql_propiedad);
$propiedad = $result_propiedad->fetch_assoc();

// Verificar si se obtuvo la propiedad
if (!$propiedad) {
    die("Propiedad no encontrada.");
}

// Manejar la actualización de la propiedad
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['actualizar'])) {
    $ubicacion = $_POST['ubicacion'];
    $tipo_propiedad = $_POST['tipo_propiedad'];
    $superficie = $_POST['superficie'];
    $valor_catastral = $_POST['valor_catastral'];

    $sql_update = "UPDATE propiedades SET ubicacion='$ubicacion', tipo_propiedad='$tipo_propiedad', superficie='$superficie', valor_catastral='$valor_catastral' WHERE id_propiedad = $id_propiedad";

    if ($conn->query($sql_update) === TRUE) {
        echo "Propiedad actualizada correctamente.";
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Propiedad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar Propiedad</h1>
        <form action="editar_propiedad.php?id=<?php echo $id_propiedad; ?>" method="POST">
            <div class="form-group">
                <label for="ubicacion">Ubicación</label>
                <input type="text" name="ubicacion" class="form-control" value="<?php echo $propiedad['ubicacion']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tipo_propiedad">Tipo de Propiedad</label>
                <input type="text" name="tipo_propiedad" class="form-control" value="<?php echo $propiedad['tipo_propiedad']; ?>" required>
            </div>
            <div class="form-group">
                <label for="superficie">Superficie</label>
                <input type="number" name="superficie" class="form-control" value="<?php echo $propiedad['superficie']; ?>" required>
            </div>
            <div class="form-group">
                <label for="valor_catastral">Valor Catastral</label>
                <input type="number" name="valor_catastral" class="form-control" value="<?php echo $propiedad['valor_catastral']; ?>" required>
            </div>
            <button type="submit" name="actualizar" class="btn btn-primary">Actualizar Propiedad</button>
        </form>
        <a href="editar.php?id=<?php echo $propiedad['id_persona']; ?>" class="btn btn-secondary mt-3">Volver</a>
    </div>
</body>
</html>
