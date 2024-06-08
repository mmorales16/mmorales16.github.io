
<?php
    include ("menu.php");
    ?>
    <!-- Titulos y iconos de herramientas -->
    <div class="subtitulos_botones" style="" id="">      
        <div class="subtitulos_botones" style="" id="">
            <nav style="">  
                <div  style="width: 25%; text-align: center; ">
                    <a  class="btn btn-sm btn-outline-success" type="link" href="menu.php">ATRAS</a>
                </div>
                <div  style="width: 50%; text-align:   ">
                    <div class="" style=" width: 100% ;"><p style="">DASHBOARD</p></div>
                </div>
                <div  style="width: 25%; text-align: center;  ">
                    <input type="submit" class="btn btn-sm btn-outline-success" value="IMPRIMIR"> 
                </div>
            </nav>
        </div>
    </div>  

<?php
// Conexión a la base de datos
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "db_NuRound";

// Conexión a la base de datos
//$servername = "localhost";
//$username = "id19395389_mmorales";
//$password = "@3-6n!M7#|DSUp($";
//$dbname = "id19395389_db_nuround";



// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>

<!-- HTML y JavaScript para mostrar el gráfico -->
<!DOCTYPE html>
<html>
<head>
  <title>DASHBOARD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
  <style>
    canvas {
        max-width: 100%;
        max-height: 100%;
        padding: 2px;
    }

    .container {
        border: 0px solid gray;
        padding: 10px ;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
            text-align: center;
            
		}

 
		

        .box {
			overflow: auto;
            height: 300px;
            width: calc(50% - 10px);
            margin-bottom: 20px;
			border-radius: 5px;
            border: 2px solid black;

}

.iconox {
            width: 34px;
            height: 34px;
            color: #006e29;
            
        }

             /* Estilos para los contenedores de iconos y texto */
.dashboard-item {
            display: inline-block;
            margin-right: 0px;
            border: 1px solid #2d3b41;
            border-radius: 5px;
            font-size:16px ;
            padding: 5px;
            width: 120px;
          
            
        }

        /* Estilos para los iconos */
.dashboard-item .icon {
    
            font-size: 24px;
            margin-right: auto;
            color: #2d3b41;
            display: block;

        }
        .providers {
  display: block;
}


@media screen and (max-width: 768px) {
        .box {
          width: 100%;
          height: 200px;

        }
        .dashboard-item {
          width: 15%;
          font-size:14px ;
          text-align: center;
     
        }



        .iconox {
         width: 26px;
        height: 26px;

        }
        .providers {
    display: none;
  }


      }


        .subtitulos_botones {
            background: #E9EAE7;
            color:#006e29;
            text-align: center;
            padding: 5px 5px;   
            border: 0px solid #024BA3; 
            width: 100%;
            margin: 0px auto;
            font-size:20px ;
            font-weight: bold ;
        }
        body {
            color:#006e29;
            background: #F8F8F8;
            border: 0px solid red;
        }
        nav {
            display: flex; 
            width: 100%;
        } 





  </style>
</head>
<body>
    <?php


// Conexión a la base de datos
$host = "127.0.0.1";
$user = "root";
$password = "";
$dbname = "db_NuRound";

// Conexión a la base de datos
//$host = "localhost";
//$user = "id19395389_mmorales";
//$password = "@3-6n!M7#|DSUp($";
//$dbname = "id19395389_db_nuround";



$conexion = new mysqli($host, $user, $password, $dbname);




$sql11="SELECT *  FROM tb_clientes";
$resultado11 = $conexion->query($sql11);
$cantidad_clientes_totales = mysqli_num_rows($resultado11);

$sql22="SELECT *  FROM tb_proveedores";
$resultado22 = $conexion->query($sql22);
$cantidad_proveedores_totales = mysqli_num_rows($resultado22);

$sql33="SELECT *  FROM tb_usuarios";
$resultado33 = $conexion->query($sql33);
$cantidad_usuarios_totales = mysqli_num_rows($resultado33);

$sql44="SELECT *  FROM tb_articulos";
$resultado44 = $conexion->query($sql44);
$cantidad_articulos_totales = mysqli_num_rows($resultado44);


$sql55="SELECT *  FROM tb_articulos_vendidos";
$resultado55 = $conexion->query($sql55);
$cantidad_ventas_totales = mysqli_num_rows($resultado55);







    // Obtener la cantidad de clientes, proveedores y usuarios


    ?>
<div class="container">
<div class="container">


    <div class="dashboard-item">
            <span class="bi bi-truck icon"><svg class="iconox"  xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
</svg></span>
            <span class="providers">CLIENTES</span>
            <span><?php echo $cantidad_clientes_totales; ?></span>
        </div>

        <div class="dashboard-item">
            <span class="bi bi-truck icon"><svg class="iconox"  xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-building-fill" viewBox="0 0 16 16">
  <path d="M3 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h3v-3.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V16h3a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H3Zm1 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Z"/>
</svg></span>
<span class="providers">PROVEEDORES</span>
            <span><?php echo $cantidad_proveedores_totales; ?></span>
        </div>

        <div class="dashboard-item">
            <span class="bi bi-person icon"><svg class="iconox" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg></span>
            <span class="providers">USUARIOS</span>
            <span><?php echo $cantidad_usuarios_totales; ?></span>
        </div>


        <div class="dashboard-item">
            <span class="bi bi-person icon"><svg class="iconox" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
  <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
</svg></span>
            <span class="providers">ARTICULOS</span>
            <span><?php echo $cantidad_articulos_totales; ?></span>
        </div>

        <div class="dashboard-item">
            <span class="bi bi-person icon"><svg class="iconox"  xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
  <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
</svg></span>
            <span class="providers">VENTAS</span>
            <span><?php echo $cantidad_ventas_totales; ?></span>
        </div>

    </div>
    </div>



<div class="container">
		<div class="box"> 

        <?php
        // Consulta para obtener datos de ventas por mes
$sql = "SELECT WEEK(fecha) AS semana, SUM(total) AS total_semana FROM tb_ventas GROUP BY WEEK(fecha)";

// Ejecutar consulta SQL
$resultado = mysqli_query($conn, $sql);

// Crear arrays para los datos del gráfico
$semanas = array();
$totales_semana = array();

while ($fila = mysqli_fetch_assoc($resultado)) {
    $semanas[] = $fila['semana'];
    $totales_semana[] = $fila['total_semana'];
}

// Configuración del gráfico
$datos_grafico = array(
    "type" => "line",
    "data" => array(
        "labels" => $semanas,
        "datasets" => array(
            array(
                "label" => "Ventas por semana",
                
                "data" => $totales_semana,
                "backgroundColor" => "#2EC02E",
                "borderColor" => "rgba(0, 0, 0, 1)",
                "borderWidth" => 2,
                "pointRadius" => 6
 
            )
        )
    ),
    "options" => array(
        "scales" => array(
            "yAxes" => array(
                array(
                    "ticks" => array(
                        "beginAtZero" => true
                    ),
                    "scaleLabel" => array(
                        "display" => true,
                        "labelString" => "Ventas",
                        "font" => array(
                            "color" => "#FF0000" // Cambiar color del título del eje vertical
                        )
                    )
                )
            ),
            "xAxes" => array(
                array(
                    "type" => "time",
                    "time" => array(
                        "unit" => "week"
                    ),
                    "scaleLabel" => array(
                        "display" => true,
                        "labelString" => "Semanas",
                        "font" => array(
                            "color" => "#00FF00" // Cambiar color del título del eje horizontal
                        )
                    )
                )
            )
        )
    )
);

// Convertir datos del gráfico a formato JSON
$json_grafico = json_encode($datos_grafico);

?>

          <canvas id="grafico"></canvas>
             <script>
                var ctx = document.getElementById('grafico').getContext('2d');
                var grafico = new Chart(ctx, <?php echo $json_grafico; ?>);
             </script>
        </div>

        
		<div class="box">

        <?php
// Conexión a la base de datos
$host = "127.0.0.1";
$user = "root";
$password = "";
$dbname = "db_NuRound";

// Conexión a la base de datos
//$host = "localhost";
//$user = "id19395389_mmorales";
//$password = "@3-6n!M7#|DSUp($";
//$dbname = "id19395389_db_nuround";

$conexion = new mysqli($host, $user, $password, $dbname);




$sql2 = "SELECT nombre, SUM(cantidad) AS cantidades_vendidas FROM tb_articulos_vendidos GROUP BY nombre ORDER BY cantidades_vendidas DESC LIMIT 10";
$resultado2 = $conexion->query($sql2);

// Preparar los datos para el gráfico
$labels = array();
$data = array();
while ($fila = $resultado2->fetch_assoc()) {
    $labels[] = $fila['nombre'];
    $data[] = $fila['cantidades_vendidas'];
}

// Crear el arreglo de datos para el gráfico
$datos_grafico = array(
    'labels' => $labels,
    'datasets' => array(
        array(
            'label' => 'Articulos mas vendidos',
            'backgroundColor' => "#2EC02E",
            'borderColor' => "#273027",
            "borderWidth" => 1,
            'data' => $data,
        ),
    ),
);

// Configuración del gráfico
$opciones_grafico = array(
    'scales' => array(
        'xAxes' => array(
            array(
                'ticks' => array(
                    'beginAtZero' => true,
                ),
            ),
        ),
        'yAxes' => array(
            array(
                'ticks' => array(
                    'reverse' => true,
                ),
            ),
        ),
    ),
);

// Generar el código JavaScript para el gráfico
$script_grafico = "
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js'></script>
    
    
    <script>
        var ctx = document.getElementById('miGrafico').getContext('2d');
        var miGrafico = new Chart(ctx, {
            type: 'horizontalBar',
            data: " . json_encode($datos_grafico) . ",
            options: " . json_encode($opciones_grafico) . ",
        });
    </script>
";
?>

    <canvas id='miGrafico'></canvas>
    <?php echo $script_grafico; ?>

        </div>



        <div class="box">
<?php
// Conexión a la base de datos
$host = "127.0.0.1";
$user = "root";
$password = "";
$dbname = "db_NuRound";

// Conexión a la base de datos
//$host = "localhost";
//$user = "id19395389_mmorales";
//$password = "@3-6n!M7#|DSUp($";
//$dbname = "id19395389_db_nuround";

$conexion3 = new mysqli($host, $user, $password, $dbname);




$sql3 = "SELECT cliente, SUM(total) AS cantidades_vendidas FROM tb_ventas GROUP BY cliente ORDER BY cantidades_vendidas DESC LIMIT 10";
$resultado3 = $conexion3->query($sql3);

// Preparar los datos para el gráfico
$labels3 = array();
$data3 = array();
while ($fila3 = $resultado3->fetch_assoc()) {
    $labels3[] = $fila3['cliente'];
    $data3[] = $fila3['cantidades_vendidas'];
}

// Crear el arreglo de datos para el gráfico
$datos_grafico3 = array(
    'labels' => $labels3,
    'datasets' => array(
        array(
            'label' => 'Clientes con mas compras',
            'backgroundColor' => "#2EC02E",
            'borderColor' => "#273027",
            "borderWidth" => 1,
            'data' => $data3,
        ),
    ),
);

// Configuración del gráfico
$opciones_grafico3 = array(
    'scales' => array(
        'xAxes' => array(
            array(
                'ticks' => array(
                    'beginAtZero' => true,
                ),
            ),
        ),
        'yAxes' => array(
            array(
                'ticks' => array(
                    'reverse' => true,
                ),
            ),
        ),
    ),
);

// Generar el código JavaScript para el gráfico
$script_grafico3 = "
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js'></script>
    
    
    <script>
        var ctx = document.getElementById('miGrafico4').getContext('2d');
        var miGrafico4 = new Chart(ctx, {
            type: 'horizontalBar',
            data: " . json_encode($datos_grafico3) . ",
            options: " . json_encode($opciones_grafico3) . ",
        });
    </script>
";
?>

    <canvas id='miGrafico4'></canvas>
    <?php echo $script_grafico3; ?>
    </div>


		<div class="box">
            En proceso....
        </div>
	</div>


</body>


</html>