<?php
include('config.php');

// Obtener el ID de la persona desde la URL
$id_persona = $_GET['id'];

// Obtener la lista de propiedades asociadas a esa persona
$sql_propiedades = "SELECT * FROM propiedades WHERE id_persona = $id_persona";
$result_propiedades = $conn->query($sql_propiedades);

// Obtener información de la persona
$sql_persona = "SELECT * FROM personas WHERE id_persona = $id_persona";
$result_persona = $conn->query($sql_persona);
$persona = $result_persona->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propiedades de <?php echo $persona['nombre'] . ' ' . $persona['apellido']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Propiedades de <?php echo $persona['nombre'] . ' ' . $persona['apellido']; ?></h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ubicación</th>
                    <th>Tipo</th>
                    <th>Superficie</th>
                    <th>Valor Catastral</th>
                    <th>codigo_catastral</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($propiedad = $result_propiedades->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $propiedad['id_propiedad']; ?></td>
                        <td><?php echo $propiedad['ubicacion']; ?></td>
                        <td><?php echo $propiedad['tipo_propiedad']; ?></td>
                        <td><?php echo $propiedad['superficie']; ?></td>
                        <td><?php echo $propiedad['valor_catastral']; ?></td>
                        <td><?php echo $propiedad['codigo_catastral']; ?></td>
                        <td>
                            <a href="editar_propiedad.php?id=<?php echo $propiedad['id_propiedad']; ?>" class="btn btn-warning">Editar</a>
                            <a href="eliminar_propiedad.php?id=<?php echo $propiedad['id_propiedad']; ?>&id_persona=<?php echo $id_persona; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="registrar_propiedad.php?id=<?php echo $id_persona; ?>" class="btn btn-primary">Registrar Nueva Propiedad</a>
        <a href="listar_personas.php" class="btn btn-secondary mt-3">Volver a Listado de Personas</a>
    </div>
</body>
</html>
