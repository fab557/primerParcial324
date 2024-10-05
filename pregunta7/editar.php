<?php
include('config.php');

// Obtener el ID de la persona desde la URL
$id_persona = $_GET['id'];

// Consultar los datos de la persona
$sql_persona = "SELECT * FROM personas WHERE id_persona = $id_persona";
$result_persona = $conn->query($sql_persona);
$persona = $result_persona->fetch_assoc();

// Verificar si se han enviado datos para editar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $ci = $_POST['ci'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    // Actualizar los datos de la persona
    $sql_update = "UPDATE personas SET nombre='$nombre', apellido='$apellido', ci='$ci', direccion='$direccion', telefono='$telefono' WHERE id_persona=$id_persona";

    if ($conn->query($sql_update) === TRUE) {
        echo "Datos actualizados correctamente.";
        // Redirigir a la página de listado de personas después de la actualización
        header("Location: listar_personas.php");
        exit;
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
    <title>Editar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar Persona</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $persona['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $persona['apellido']; ?>" required>
            </div>
            <div class="form-group">
                <label for="ci">CI</label>
                <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $persona['ci']; ?>" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $persona['direccion']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $persona['telefono']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Datos</button>
            <a href="listar_personas.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
