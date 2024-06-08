<!DOCTYPE html>
<html lang="en">
    <head>
        <title>STOCK</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./assets/css/loader.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="style_list.css">  
        
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/cargando.css">
    <link rel="stylesheet" type="text/css" href="css/cssGenerales.css">
 
 <?php
    require('config.php');
    ?>
<!-- FIN GUARDADO EN BITACORA -->
<!-- modificar para el codigo de la compañia salga de perfil -->
<?php 
$id="1";    

$sql="SELECT * FROM tb_parametros WHERE id_compania='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<?php 

    $sql="SELECT *  FROM tb_stock";
    $query=mysqli_query($con,$sql);
?>


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
                color:#006e29;
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

                color:#006e29;
                background: #E9EAE7;
                border: 0px solid red;

            }
  
            .img-avatar {
          border-radius: 35px;
          padding:3px;
            }
                /* Estilos para el input de archivo */
        .file-input {
            display: none;
        }

        .file-input-label {
            display: none;
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .file-input-label:hover {
            background-color: #0056b3;
        }

        /* Estilos para el botón de envío */
        .btn-enviar {
            padding: 10px 20px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-enviar:hover {
            background-color: #218838;
        }

        /* Estilo para centrar el contenido del formulario */




</style>

    </head>
    <body>    
<!-- INCIO SUBMENU -->
<div class="encabezado" style="padding: 0px 0px; width: 100% ; border: 0px solid #006e29;">
<div class="subtitulos_botones" style=" width: 100% ;"><p style="">INVENTARY</p></div>

<!-- INCIO SUBMENU FILTROS -->
<form action="" method="get">
    <div class="encabezado" style=" margin: 0px auto; width: 100%;" id="">
        <nav style=" max-width: 100%; display: flex;">
            <div style=" width: 120px; padding: 0px 0px;"; >
                <div class="titulos_busqueda">
                    <a>Rack</a>    
                </div> 
                <div id="busqueda" class="input-group input-group-sm mb-3"> 
                    <select style="height:33px ; font-size: 15px; border-radius: 15px 0px 15px 0px; border: 1px solid #006e29;" name="tipo" class="form-select form-select-sm">
                       <option value="" selected="tipo">Todas</option>
                       <option value="F">01</option>
                       <option value="O">02</option>
                       <option value="N">03</option>
                    </select>   
                </div>
        </div>

            <div style=" width: 120px; padding: 0px 0px;"; >
                <div class="titulos_busqueda">
                    <a>Estado</a>    
                </div> 
                <div id="busqueda" class="input-group input-group-sm mb-3">
                    <select style="height:33px ; font-size: 15px; border-radius: 15px 0px 15px 0px; border: 1px solid #006e29;" name="estado" class="form-select form-select-sm">
                       <option value="" selected="estado">Todas</option>
                       <option value="1">OK</option>
                       <option value="0">Pend</option>
                    </select>
                </div> 
            </div>

            <div style=" width: 150px; padding: 0px 0px;"; >
                <div class="titulos_busqueda">
                    <a>Buscar</a>    
                </div> 
                <div id="busqueda" class="input-group input-group-sm mb-3" style="">   
                    <input style=" border-radius: 15px 0px 15px 0px; height:33px ; border: 1px solid #006e29; padding: 0px 0px;" name="busqueda" type="text"  class="form-control mb-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div> 
            </div>

            <div style=" width: 90px; padding: 0px 0px;"; >
                <div class="titulos_busqueda" style=" color: #E9EAE7; ">
                    <a >.</a>    
                </div> 
                <div id="busqueda" class="input-group input-group-sm mb-3">     
                    <input class="btn btn-success" style="  height:33px ; " type="submit" name="enviar" value="BUSCAR"  > 
                </div> 
            </div>

                <?php                
                    $sql="SELECT *  FROM tb_stock";
                    $query=mysqli_query($con,$sql);  
                ?>
               <?php 
                $busqueda='';
                $estatus='';

                if (isset($_GET["enviar"])) {
                   $busqueda=$_GET['busqueda'];
                   $estatus=$_GET['estado'];

                    $sql="SELECT *  FROM tb_stock WHERE description LIKE '%$busqueda%' AND estado LIKE '%$estatus%'";
                    $query=mysqli_query($con,$sql);  
                 }  
                ?>
        </nav>
    </div>    
</form>


<!-- carga el excel -->
  

<!-- TABLA DE ARTICULOS DE STOCK -->
    <div style="padding: 2px 10px; border: 0px solid #024BA3; width: 100%">
        <table style="margin-top:5px; text-align: center; width: 100% ">
        <thead class="" >
                <tr style="background: #3C3838; color: #ffffff;">
              
      
                <th style=" border: 1px solid #ffffff;">Cod</th>
                <th style="  border: 1px solid #ffffff;">Descripcion</th>
              
               
                <th style="  border: 1px solid #ffffff;">UM</th>
              <th style="  border: 1px solid #ffffff;">Estado</th>
    
                <th style="  border: 1px solid #ffffff;">Capturar</th>
                </tr>
                </thead>
                <tbody class="">
                        <?php
                        while($row=mysqli_fetch_array($query)){
                        ?>
                <tr>
                   <td style=""><?php  echo $row['ax']?></td>
                   <td style=""><?php  echo $row['description']?></td>
                   <td style=""><?php  echo $row['um']?></td>
                   
                    <!-- INICIO ASIGNAR BUSQUEDA A UNA VARAIBLE -->
                       
                   <?php if ($row['estado'] == "1") {
                    ?> 
                       <td style="padding: 3px 2px; "><button style="width: 50px" type="button" class="btn btn-success btn-sm">OK</button></td> 
                    <?php }  else {    
                    ?> 
                       <td style="padding: 3px 2px; "><button style="width: 50px" type="button" class="btn btn-danger btn-sm">PEND</button></td> 
                    <?php  } 

                    $cost = $row['stock'] * $row['price']; 
                    //echo "$cost";
                    ?>   

                    <!-- BOTON EDITAR btn btn-info-->
                    <th ><a style=" padding: 0px 0px;  " href="actualizar_articulo.php?id=<?php echo $row['id'] ?>" class="">
                    <img src="icon/Editar_circulo_VERDE.png" width="36px" height="36px;  ">
                    </a> </th>

                        <?php   }
                        ?>    
                </tbody>
    </table>        
    </div>
    </body>
</html>