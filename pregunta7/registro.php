<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Persona y Propiedad</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Registrar Persona y Propiedad</h1>
        <form action="guardar.php" method="POST">
            <!-- Datos de la Persona -->
            <h2 class="mt-4">Datos de la Persona</h2>
            <div class="form-group">
                <label for="distritos">Seleccione un Distrito:</label>
                <select id="distritos" class="form-control">
                    <option value="">Seleccione un distrito</option>
                    <!-- Aquí se llenarán los distritos desde PHP -->
                </select>
            </div>
            <div class="form-group">
                <label for="zonas">Seleccione una Zona:</label>
                <select id="zonas" class="form-control">
                    <option value="">Seleccione una zona</option>
                    <!-- Aquí se llenarán las zonas desde AJAX -->
                </select>
            </div>
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

    <script>
        $(document).ready(function() {
            // Cargar distritos desde PHP
            $.ajax({
                url: 'distritos.php', // Archivo PHP que obtiene distritos
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(key, value) {
                        $('#distritos').append('<option value="' + value.id_distrito + '">' + value.nombre + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error al cargar distritos:", error);
                }
            });

            $('#distritos').change(function() {
                var distrito_id = $(this).val();
                $.ajax({
                    url: 'zona.php', // Archivo PHP que obtiene zonas
                    type: 'POST',
                    data: { distrito_id: distrito_id },
                    dataType: 'json',
                    success: function(data) {
                        $('#zonas').empty(); // Limpiar zonas anteriores
                        $('#zonas').append('<option value="">Seleccione una zona</option>');
                        $.each(data, function(key, value) {
                            $('#zonas').append('<option value="' + value.id + '">' + value.nombre + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error al cargar zonas:", error);
                    }
                });
            });
        });
    </script>
</body>
</html>
