<?php
include('config.php');

$sql = "SELECT p.id_persona, p.nombre, p.apellido, pr.ubicacion, pr.tipo_propiedad 
        FROM personas p 
        JOIN propiedades pr ON p.id_persona = pr.id_persona";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personas y Propiedades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Personas y Propiedades</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Ubicación Propiedad</th>
                    <th>Tipo de Propiedad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['apellido']; ?></td>
                    <td><?php echo $row['ubicacion']; ?></td>
                    <td><?php echo $row['tipo_propiedad']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['id_persona']; ?>" class="btn btn-warning">Editar</a>
                        <a href="eliminar.php?id=<?php echo $row['id_persona']; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
