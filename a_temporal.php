<?php
    include ("menu.php");
?>

<!-- INICIO GUARDADO EN BITACORA -->    
<?php
$Object = new DateTime();  
$Object->setTimezone(new DateTimeZone('America/Costa_Rica'));
$DateAndTime = $Object->format("Y-m-d h:i:s");
$fec=$DateAndTime;
$id_bitacora='';
$id_usuario="$codigox";
$fecha=$DateAndTime;
$pantalla='Actualizar Factura';
$comentario='acertado';

$sql="INSERT INTO tb_bitacora VALUES('$id_bitacora','$id_usuario','$fecha','$pantalla','$comentario')";
$query= mysqli_query($con,$sql);
?> 
<!-- FIN GUARDADO EN BITACORA -->

<head>
    <title>FACTURAS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/functions.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spinners de Carga con Tiempo de Ocultación</title>
    <!-- Agrega los enlaces a los archivos de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex justify-content-center" style="padding: 10px 12px;">
        <!-- Spinner de carga con color primario (azul) -->
        <div id="spinner-primary" class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        
        <!-- Spinner de carga con color secundario (gris) -->
        <div id="spinner-secondary" class="spinner-grow text-secondary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>

        <!-- Spinner de carga con color de éxito (verde) -->
        <div id="spinner-success" class="spinner-grow text-success" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>

        <!-- Spinner de carga con color de error (rojo) -->
        <div id="spinner-danger" class="spinner-grow text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>

        <!-- Spinner de carga con color de advertencia (amarillo) -->
        <div id="spinner-warning" class="spinner-grow text-warning" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>

        <!-- Spinner de carga con color de información (azul claro) -->
        <div id="spinner-info" class="spinner-grow text-info" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>



        <!-- Spinner de carga con color de fondo oscuro -->
        <div id="spinner-dark" class="spinner-grow text-dark" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>


    <div class="container mt-5">
        <!-- Botón con spinner que se detiene después de 3 segundos -->
        <button id="myButton" class="btn btn-primary" type="button" disabled>
            <span id="spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
        </button>
    </div>

    <!-- Agrega el enlace al archivo de Bootstrap JavaScript (opcional) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script> -->

    <script>
        // Función para ocultar un spinner por su ID
        function ocultarSpinnerPorId(id) {
            var spinner = document.getElementById(id);
            spinner.style.display = 'none'; // Oculta el spinner
        }

        // Define el tiempo en milisegundos después del cual se ocultará cada spinner (2 segundos)
        var tiempoDeOcultacion = 2000;

        // Inicia la temporización para ocultar cada spinner después del tiempo definido
        setTimeout(function() {
            ocultarSpinnerPorId('spinner-primary');
        }, tiempoDeOcultacion);

        setTimeout(function() {
            ocultarSpinnerPorId('spinner-secondary');
        }, tiempoDeOcultacion);

        setTimeout(function() {
            ocultarSpinnerPorId('spinner-success');
        }, tiempoDeOcultacion);

        setTimeout(function() {
            ocultarSpinnerPorId('spinner-danger');
        }, tiempoDeOcultacion);

        setTimeout(function() {
            ocultarSpinnerPorId('spinner-warning');
        }, tiempoDeOcultacion);

        setTimeout(function() {
            ocultarSpinnerPorId('spinner-info');
        }, tiempoDeOcultacion);


        setTimeout(function() {
            ocultarSpinnerPorId('spinner-dark');
        }, tiempoDeOcultacion);
    </script>

<script>
        // Función para detener el spinner y habilitar el botón
        function detenerSpinner() {
            var spinner = document.getElementById('spinner');
            spinner.style.display = 'none'; // Oculta el spinner

            var myButton = document.getElementById('myButton');
            myButton.removeAttribute('disabled'); // Habilita el botón
        }

        // Inicia la temporización para detener el spinner después de 3 segundos (3000 milisegundos)
        setTimeout(function() {
            detenerSpinner();
        }, 3000);
    </script>
</body>
</html>

