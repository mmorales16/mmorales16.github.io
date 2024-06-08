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
$pantalla='Lista Inventario';
$comentario='acertado';

$sql="INSERT INTO tb_bitacora VALUES('$id_bitacora','$id_usuario','$fecha','$pantalla','$comentario')";
$query= mysqli_query($con,$sql);
?> 
<!-- FIN GUARDADO EN BITACORA -->

<?php 
    $sql="SELECT *  FROM tb_articulos";
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

  .container {
    
            padding: 0px 0px;
            border: 0px solid black;
			/*justify-content: space-between;*/
            text-align: center;
            background: #E9EAE7;
             
		}

        .dashboard-item {
            display: inline-block;
            border: 0px solid #2d3b41;
            border-radius: 5px;
            font-size:14px ;
            padding: 0px 0px;
            width: 160px;
            font-weight: bold ;
            text-align: left;
        }

        .dashboard-item2 {
            display: inline-block;
            border: 0px solid #2d3b41;
            border-radius: 5px;
            font-size:14px ;
            padding: 0px 0px;
            width: 160px;
            font-weight: bold ;
            text-align: left;
        }

        .dashboard-item .icon {
    
    font-size: 20px;
    margin-right: auto;
    color: #2d3b41;


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
          width: 100%;
          font-size:14px ;
          text-align: center;
        
        }
        .dashboard-item2 {
          width: 25%;
          font-size:14px ;
          text-align: center;
        
        }


        .iconox {
         width: 26px;
        height: 26px;

        }
        .providers {
    display: none;
    padding: 3px 10px;
    
  }


      }
			 
        body {
                font-family: 'Century Gothic', sans-serif;
                background: #FFFFFF;
            }

.subtitulos {
                background: #E9EAE7;
                font-weight: bold ;
                font-size:24px ;
                color:#006e29;
                text-align: center;
                padding: 10px 0px;
                border: 0px solid #024BA3;
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
              
            }
            .encabezado {
                background: #E9EAE7;
                border: 0px solid red;
            }
                
    tbody tr:nth-child(even) {
      background-color: #ffffff; 

    }

  
    
</style>

    </head>
    <body>
        
<!-- INCIO SUBMENU -->
<div class="encabezado" style="padding: 0px 0px; width: 100% ; border: 0px solid #006e29;">
<div class="subtitulos" style=" width: 100% ;"><p style="">ARTICULOS REGISTRADOS</p></div>


<form action="" method="get">
        <div class="container">
  
    <div style="" class="dashboard-item">
        <div class="titulos_busqueda">
            <a>Estado</a>    
        </div> 
        <div id="busqueda" class="input-group input-group-sm mb-3">
            <select style="height:33px ; font-size: 15px; border-radius: 15px 0px 15px 0px; border: 1px solid #006e29;" name="estado" class="form-select form-select-sm">
                <option value="" selected="estado">Todas</option>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div> 
    </div>

        <div style="" class="dashboard-item">


            <div class="titulos_busqueda">
                <a>Tipo</a>    
            </div> 
      
                <div id="busqueda" class="input-group input-group-sm mb-3"> 
                    <select style="height:33px ; font-size: 15px; border-radius: 15px 0px 15px 0px; border: 1px solid #006e29;" name="tipo" class="form-select form-select-sm">
                       <option value="" selected="tipo">Todas</option>
                       <option value="F">Opcion 1</option>
                       <option value="O">Opcion 2</option>
                       <option value="N">Opcion 3</option>
                    </select>   
                </div>
        </div>

        <div style="" class="dashboard-item">
        <div class="titulos_busqueda">
                <a>Buscar</a>    
            </div> 
                <div id="busqueda" class="" style="">   
                    <input style="height:33px ; font-size: 15px; border-radius: 15px 0px 15px 0px; border: 1px solid #006e29;" name="busqueda" type="text"  class="form-control sm"  >
                </div> 
        </div>


        <div class="dashboard-item2">
            <div class="providers" style=" color: #E9EAE7; ">
                <a >.</a>    
            </div> 
            <div id="busqueda" class="input-group input-group-sm mb-3">     
            <button id="myButton" class="btn btn-primary" type="submit" disabled name="enviar" value="BUSCAR">
            <span id="spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" type="submit" name="enviar" value="BUSCAR"></span>
            Buscar
        </button>
            </div> 
        </div>

 



        <div class="dashboard-item2">
            <div class="providers" style=" color: #E9EAE7; ">
                <a >.</a>    
            </div> 
            <div id="busqueda" class="input-group input-group-sm mb-3">
                <a style="height:33px ; padding: 3px 6px ;  color: #ffffff; font-size:16px ;" class="btn btn-sm btn-success" type="link" href="crear_articulo.php">AGREGAR</a>
            </div>
        </div>

    </div>
    </form>

<!-- ACCION FILTRO BUSQUEDA -->
                <?php                
                    $sql="SELECT *  FROM tb_articulos";
                    $query=mysqli_query($con,$sql);  
                ?>
               <?php 
                $busqueda='';
                $estatus='';

                if (isset($_GET["enviar"])) {
                   $busqueda=$_GET['busqueda'];
                   $estatus=$_GET['estado'];

                    $sql="SELECT *  FROM tb_articulos WHERE descripcion LIKE '%$busqueda%' AND estado LIKE '%$estatus%'";
                    $query=mysqli_query($con,$sql);  
                 }  
                ?>
<!-- ACCION FILTRO BUSQUEDA -->

<!-- INICIO LISTADO CAPACITACIONES -->
    <div style="padding: 2px 10px; border: 0px solid #024BA3; width: 100%">
        <table style="margin-top:5px; text-align: center; width: 100% ">
        <thead class="" >
                <tr style="background: #3C3838; color: #ffffff;">
                <th style=" border: 1px solid #ffffff; width: 10%; height: 40px;">Cod</th>
                <th style=" border: 1px solid #ffffff; width: 40%">Nombre</th>
                <th style="  border: 1px solid #ffffff; width: 10%">Stock</th>
                <th style="  border: 1px solid #ffffff; width: 10%">Precio</th>
                <th style="  border: 1px solid #ffffff; width: 10%">Foto</th>
        
                </tr>
                </thead>
                <tbody class="">
                        <?php
                        while($row=mysqli_fetch_array($query)){
                        ?>
                <tr style="font-size:12px ;">
                <td style=" border: 1px solid #ffffff; height: 80px;"><?php  echo $row['id_articulo']?></td>
                <td style=" border: 1px solid #ffffff; height: 80px;"><?php  echo $row['descripcion']?></td>
                  
                   
                   <?php 
                 
                    $con=conectar();
                    $idy=$row['id_proveedor'];  

                    $sql="SELECT * FROM tb_proveedores WHERE id_proveedor='$idy'";
                    $queryy=mysqli_query($con,$sql);
                    ?>
                    <!-- INICIO ASIGNAR BUSQUEDA A UNA VARAIBLE -->
                    <?php
                    while($row2=mysqli_fetch_array($queryy)){
                    ?>
                    <?php
                    $id_proveedorx=$row2['id_proveedor'];
                    $nombrex=$row2['nombre'];
                
                    ?> 
                    <?php }
                    ?>         
             
                   <!-- cuenta la cantidad de arcticulos ventidos en la tabla tb_compras-->
                    <?php
                        $idx=$row['id_articulo'];
                
                        $query4="SELECT cantidad, SUM(cantidad) FROM tb_compras WHERE id_articulo='$idx'";
                        $resultado4=mysqli_query($con, $query4);
                            while($row4 = mysqli_fetch_array($resultado4)){
                               // echo "". round($row4['SUM(cantidad)'],2).""; 
                                $cantidad_articulos_comprados =  round($row4['SUM(cantidad)'],2);
                                        }
                    ?>
                     <!-- cuenta la cantidad de arcticulos ventidos en la tabla tb_articulos_vendidos-->
                   <?php
                        $idx=$row['id_articulo'];
                
                        $query4="SELECT cantidad, SUM(cantidad) FROM tb_articulos_vendidos WHERE id_articulo='$idx'";
                        $resultado4=mysqli_query($con, $query4);
                            while($row4 = mysqli_fetch_array($resultado4)){
                                //echo "". round($row4['SUM(cantidad)'],2).""; 
                                $cantidad_articulos_vendidos =  round($row4['SUM(cantidad)'],2);
                                        }
                    ?>

                    <td style=" border: 1px solid #ffffff; height: 80px;"><?php 
                   $stock = $row['invent_inicial'] + $cantidad_articulos_comprados - $cantidad_articulos_vendidos;
                   echo "$stock"; 

                    ?></td>
                   <td style=" border: 1px solid #ffffff; height: 80px;"><?php   echo "". "₡". number_format($row['precio_venta']);
            
                    $precio_venta =  $row['precio_venta'];
                    
                   ?></td> 

                   <?php 
                   $costo_venta=$precio_venta*$stock;
                   //echo "$costo_venta"; 
  
                    ?>
                <div >
                <td style=" border: 1px solid #ffffff; height: 80px;"><img src="img/uploads/<?php echo $row['foto'] ?>" width="75px" height="75px;  "> </td> </div>
                    </form>
                        <?php            }
                        ?>    
                </tbody>
            </table> 
        </tbody>
    </table>        
    </div>




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
        }, 100);
    </script>


    </body>
</html>