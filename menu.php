 
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">

<?php           
 require_once 'validar_session.php';
?>
            <?php
              include("session.php");
            ?>

            
<?php 
$sql="SELECT * FROM tb_parametros WHERE id_compania=1";
$query=mysqli_query($con,$sql);
$row=mysqli_fetch_array($query);
?>

                     

 
  <style type="text/css">
* {
				margin:0px;
				padding:0px;
			}
			
      header {
  width: 100%;
  padding: 10px;
  color: white;
  text-align: center;
  background: #3C3838;
}

			
			ul, ol {
				list-style:none;
			}
			
			.nav > li {
				float:left;
			}
	
			.nav li a {
        background-color: <?php echo $row['header_colorfondo'] ?>;
				color:#fff;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#006e29;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:100px;
        text-align: left;
        
			}
			
			.nav li:hover > ul {
				display:block;
        
			}

      ul li:hover {
      background: #112d4e;
      }

			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-100px;
				top:0px;
			}

      body {
  font-family: 'Century Gothic', sans-serif;
}
nav ul li ul {

  z-index: 999; /* valor alto */
}

.menu-container {
  display: flex;
  justify-content: center;
  width: 100%;
}

</style>

</head>

<body>
  
<header>
<!-- INCIO SUBMENU -->

</header>
<!-- MENU--> 
<!-- #000 Color negro--> 
<!-- #3C3838 Color Gris-Oscuro--> 
<!-- #006e29 Color Verde Oscuro--> 
<!-- #FFFFFF Color Blanco--> 

<div style="width: 100%;">
  <nav style="color: black; background: <?php echo $row['header_colorfondo']  ?>;">
  <div class="menu-container">
  <ul class="nav">
        <li style="font-size: 15px;"><a href="#"> Configuracion<img src="icon/menu_pescado.png" width="20px" height="15px;"></a>
          <ul>
            <li style="font-size: 16px;"><a href="actualizar_parametros.php?id=1">Parametros</a>
            <li style="font-size: 16px;"><a href="lista_usuarios.php">Usuarios</a>
            <li style="font-size: 16px;"><a href="dashboardx.php">Dashboard</a>
          </ul>
        </li>
        <li style="font-size: 15px;"><a href="#"> Articulos<img src="icon/menu_pescado.png" width="20px" height="15px;"></a>
          <ul>
            <li style="font-size: 16px;"><a href="crear_articulo.php">Nuevo Articulo</a>
            <li style="font-size: 16px;"><a href="lista_articulos.php">Articulos</a>
            <li style="font-size: 16px;"><a href="lista_articulos_resumen.php">Inventario</a>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</div> 
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script>
    $(".hide").on('click', function() {
      $("nav ul").toggle('slow');
    })
  </script>

</body>
</html>