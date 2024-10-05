<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combo Dependiente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Registro de Persona</h1>
        <form>
            <div class="form-group">
                <label for="distritos">Seleccione un Distrito:</label>
                <select id="distritos" class="form-control">
                <option value="">Seleccione un distrito</option>
    <!-- Aquí se llenarán los distritos desde PHP -->
    <option value="1">Distrito 1</option>  <!-- Ejemplo de un distrito -->
    <option value="2">Distrito 2</option>                    <!-- Aquí se llenarán los distritos desde PHP -->
                </select>
            </div>
            <div class="form-group">
                <label for="zonas">Seleccione una Zona:</label>
                <select id="zonas" class="form-control">
                    <option value="">Seleccione una zona</option>
                    <!-- Aquí se llenarán las zonas desde AJAX -->
                </select>
            </div>
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
                console.log("Distrito ID:", distrito_id);
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
