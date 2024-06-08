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
$pantalla='Lista Usuarios';
$comentario='acertado';

$sql="INSERT INTO tb_bitacora VALUES('$id_bitacora','$id_usuario','$fecha','$pantalla','$comentario')";
$query= mysqli_query($con,$sql);
?> 
<!-- FIN GUARDADO EN BITACORA -->

<?php 
$id="1";    

$sql="SELECT * FROM tb_parametros WHERE id_compania='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>


<?php 

    $sql="SELECT *  FROM tb_usuarios";
    $query=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>VENTAS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./assets/css/loader.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="style_list.css">  
        <style type="text/css">
* {
    margin:0px;
	padding:0px;
  }
			 
        body {
                font-family: 'Century Gothic', sans-serif;
                background: #FFFFFF;
            }

            .subtitulos_botones {
                background: #E9EAE7;
                color: <?php echo $row['header_colorfondo'] ?>;
                text-align: center;
                padding: 5px 5px;   
                border: 0px solid #024BA3; 
                width: 100%;
                margin: 0px auto;
                font-size:22px ;
                font-weight: bold ;
            }

.titulos_busqueda {
                font-weight: bold ;
                font-size:14px ;
                color: <?php echo $row['header_colorfondo'] ?>;
                text-align: left;
                background: #E9EAE7;
                border: 0px solid #024BA3;
                padding: 3px 10px;
            }

            #busqueda {
                font-weight: bold ;
                font-size:14px ;
                color:#006e29;
                text-align: center;
                background: #E9EAE7;
                border: 0px solid red;
                padding: 5px 10px;
                height: 50px 
            }
            .encabezado {

                color: <?php echo $row['header_colorfondo'] ?>;
                background: #E9EAE7;
                border: 0px solid red;

            }
  
            .img-avatar {
          border-radius: 35px;
          padding:3px;
            }

            .personalizado-btn {
    color: <?php echo $row['header_colorfondo'] ?>;
    border: 1px solid <?php echo $row['header_colorfondo'] ?>;
  }

  .personalizado-btn:hover {
    background-color: <?php echo $row['header_colorfondo'] ?>; /* Color de fondo al hacer hover */
    color: <?php echo $row['header_colorfuente'] ?>;; /* Color de texto al hacer hover */
    border: 1px solid #FFFFFF;
  }            
</style>

    </head>
    <body>
        
<!-- INCIO SUBMENU -->
<div class="encabezado" style="padding: 0px 0px; width: 100% ; border: 0px solid #006e29;">
<div class="subtitulos_botones" style=" width: 100% ;"><p style="">USUARIOS REGISTRADOS</p></div>

<!-- icono de cargador y efecto 
        <div id="demo-content">
          <div id="loader-wrapper">
            <div id="loader"></div>
                <div class="loader-section section-right"></div> 
            </div>
          <div id="content"> </div>
        </div>
 -->       
<!-- INCIO SUBMENU FILTROS -->
<form action="" method="get">
    <div class="encabezado" style=" margin: 0px auto; width: 100%;" id="">
        <nav style=" max-width: 100%; display: flex;">
            <div style=" width: 140px; padding: 0px 0px;"; >
                <div class="titulos_busqueda">
                    <a>Estado</a>    
                </div> 
                <div id="busqueda" class="input-group input-group-sm mb-3">
                    <select style="height:33px ; font-size: 15px; border-radius: 15px 0px 15px 0px; border: 1px solid <?php echo $row['header_colorfondo'] ?>;" name="estado" class="form-select form-select-sm">
                       <option value="" selected="estado">Todas</option>
                       <option value="1">Activo</option>
                       <option value="0">Inactivo</option>
                    </select>
                </div> 
            </div>

            <div style=" width: 150px; padding: 0px 0px;"; >
                <div class="titulos_busqueda">
                    <a>Tipo</a>    
                </div> 
                <div id="busqueda" class="input-group input-group-sm mb-3"> 
                    <select style="height:33px ; font-size: 15px; border-radius: 15px 0px 15px 0px; border: 1px solid <?php echo $row['header_colorfondo'] ?>;" name="tipo" class="form-select form-select-sm">
                       <option value="" selected="tipo">Todas</option>
                       <option value="S">Super Usuario</option>
                       <option value="A">Administrador</option>
                       <option value="I">Invitado</option>
                    </select>   
                </div>
            </div>
   <!-- Titulos y iconos de herramientas -->
            <div style=" width: 200px; padding: 0px 0px;"; >
                <div class="titulos_busqueda">
                    <a>Buscar</a>    
                </div> 
                <div id="busqueda" class="input-group input-group-sm mb-3" style="">   
                    <input style=" border-radius: 15px 0px 15px 0px; height:33px ; border: 1px solid <?php echo $row['header_colorfondo'] ?>; padding: 0px 0px;" name="busqueda" type="text"  class="form-control mb-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div> 
            </div>

            <div style=" width: 90px; padding: 0px 0px;"; >
                <div class="titulos_busqueda" style=" color: #E9EAE7; ">
                    <a >.</a>    
                </div> 
                <div id="busqueda" class="input-group input-group-sm mb-3">     
                    <input class="btn btn-sm btn-outline-success personalizado-btn" style="  height:33px ; " type="submit" name="enviar" value="BUSCAR"  > 
                </div> 
            </div>

                <?php                
                    $sql="SELECT *  FROM tb_usuarios";
                    $query=mysqli_query($con,$sql);  
                ?>
               <?php 
                $busqueda='';
                $estatus='';

                if (isset($_GET["enviar"])) {
                   $busqueda=$_GET['busqueda'];
                   $estatus=$_GET['estado'];

                    $sql="SELECT *  FROM tb_usuarios WHERE nombre LIKE '%$busqueda%' AND estado LIKE '%$estatus%'";
                    $query=mysqli_query($con,$sql);  
                 }  
                ?>

            <div style=" width: 110px;"; >
                <div class="titulos_busqueda" style=" color: #E9EAE7; ">
                    <a>.</a>    
                </div> 
                <div id="busqueda" class="input-group input-group-sm mb-3">
                     <a style="height:33px ; padding: 3px 6px ; font-size:16px ;" class="btn btn-sm personalizado-btn" type="link" href="crear_usuario.php">AGREGAR</a>
                </div>
            </div>
        </nav>
    </div>    
</form>
</div> 

<!-- FIN SUBMENU FILTROS -->

<!-- INICIO LISTADO CAPACITACIONES -->
    <div style="padding: 2px 10px; border: 0px solid #024BA3; width: 100%">
        <table style="margin-top:5px; text-align: center; width: 100% ">
                <thead class="" >
                <tr style="background: #3C3838; color: #ffffff;">
                <th style="margin: 15px; padding: 8px 1px; border: 1px solid #ffffff;width: 10%"></th>
                <th style="margin: 15px; padding: 8px 1px; border: 1px solid #ffffff;width: 15%">USUARIO</th>
                <th style="margin: 15px; padding: 8px 1px; border: 1px solid #ffffff;width: 49%">NOMBRE</th>
                <th style="margin: 15px; padding: 8px 1px; border: 1px solid #ffffff;width: 8%">TIPO</th>
                <th style="margin: 15px; padding: 8px 1px; border: 1px solid #ffffff;width: 7%">ESTADO</th>
                <th style="margin: 15px; padding: 8px 1px; border: 1px solid #ffffff;width: 5%">EDITAR</th>
                <th style="margin: 15px; padding: 8px 1px; border: 1px solid #ffffff;width: 6%">HISTORY</th>
                    </tr>
                </thead>
                <tbody class="">
                        <?php
                        while($row=mysqli_fetch_array($query)){
                        ?>
                <tr>
                <div ><td style=""><img class="img-avatar" src="img/avatar/<?php echo $row['foto'] ?>" width="50px" height="50px;  "> </td> </div>
                   <td style=""><?php  echo $row['id_usuario']?></td>
                   <td style=""><?php  echo $row['nombre']?></td>
                   <td style=""><?php  echo $row['tipo']?></td>
                    <?php if ($row['estado'] == "1") {
                    ?> 
                       <td style="padding: 3px 2px; "><button style= "width: 65px" type="button" class="btn btn-outline-success btn-sm">Activo</button></td> 
                    <?php }  else {    
                    ?> 
                       <td style="padding: 3px 2px; "><button style="width: 70px" type="button" class="btn btn-outline-danger btn-sm">Inactivo</button></td> 
                    <?php  } 
                    ?> 
                              
                    <!-- BOTON EDITAR btn btn-info-->
                    <th><a style=" padding: 2px 7px;  " href="actualizar_usuario.php?id=<?php echo $row['id_usuario'] ?>" class="">
                    <img src="icon/Editar_circulo_VERDE.png" width="36px" height="36px;  ">
                    </a> </th>
                    <!-- BOTON historial btn btn-info-->
                    <th><a style=" padding: 2px 7px;  " href="buscar_asignar_bitacora.php?id=<?php echo $row['id_usuario'] ?>" class="">
                    <img src="icon/Historial_circulo_VERDE.png" width="36px" height="36px;  ">
                    </a> </th>
                        <?php            }
                        ?>  
                </tbody>
            </table> 
        </tbody>
    </table>        
    </div>

<!-- CARGADOR 
<div class="spinner-grow text-primary" role="status">
  <span class="visually-hidden">Loading...</span>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="assets/js/material.min.js"></script>
        <script>
        $(function() {
        setTimeout(function(){
            $('body').addClass('loaded');
        }, 100);

    function loaderF(statusLoader){
        console.log(statusLoader);
        if(statusLoader){
        $("#loaderFiltro").show();
        $("#loaderFiltro").html('<img class="img-fluid" src="assets/img/cargando.svg" style="left:50%; right: 50%; width:25px;">');
        }else{
        $("#loaderFiltro").hide();
        }
    }
    });
    </script>
-->

    </body>
</html>