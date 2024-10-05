<?php
include('config.php');

// Obtener la lista de personas
$sql_personas = "SELECT * FROM personas";
$result_personas = $conn->query($sql_personas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Listado de Personas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>CI</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($persona = $result_personas->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $persona['id_persona']; ?></td>
                        <td><?php echo $persona['nombre']; ?></td>
                        <td><?php echo $persona['apellido']; ?></td>
                        <td><?php echo $persona['ci']; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $persona['id_persona']; ?>" class="btn btn-warning">Editar</a>
                            <a href="eliminar_persona.php?id=<?php echo $persona['id_persona']; ?>" class="btn btn-danger">Eliminar</a>
                            <a href="listar_propiedades.php?id=<?php echo $persona['id_persona']; ?>" class="btn btn-info">Ver Propiedades</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="registro.php" class="btn btn-primary">Registrar Persona</a>
    </div>
</body>
</html>
