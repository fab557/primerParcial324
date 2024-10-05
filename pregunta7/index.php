<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAM-LP - Área de Catastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Encabezado -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">HAM-LP Catastro</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Área de Catastro de la HAM-LP</h1>
        <p class="text-center">Bienvenido al portal de Catastro de la Honorable Alcaldía Municipal de La Paz. Aquí podrá encontrar los trámites y servicios relacionados con el registro y control de propiedades.</p>
        
        <!-- Tipos de Trámites -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Registro de Usuario</h5>
                        <p class="card-text">Realiza el registro oficial de una propiedad y su usuario.</p>
                        <a href="registro.php" class="btn btn-primary">Iniciar trámite</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ver listado de personas</h5>
                        <p class="card-text">Lista las personas y se puede ver sus propiedades.</p>
                        <a href="listar_personas.php" class="btn btn-primary">Iniciar trámite</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Consulta de Impuestos</h5>
                        <p class="card-text">Verifica los impuestos pendientes y realiza el pago correspondiente.</p>
                        <a href="#" class="btn btn-primary">Iniciar trámite</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de Página -->
    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="container p-4">
            <p>&copy; 2024 HAM-LP - Área de Catastro. Todos los derechos reservados.</p>
            <p>Contactos: <a href="mailto:catastro@ham-lp.gob.bo">catastro@ham-lp.gob.bo</a> | Tel: 2-2444544</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
