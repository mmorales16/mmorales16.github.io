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

<!-- SELECCION TABLA DE USUARIOS --> 
<?php 

    $sql="SELECT *  FROM tb_usuarios";
    $query=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>USUARIOS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
         
        <link rel="stylesheet" href="style_list.css"> 
        
        <style type="text/css">
* {
	margin:0px;
	padding:0px;
  }
			
img {
    opacity: 0.2;
    }

.subtitulos {
                font-weight: bold ;
                font-size:24px ;
                color:#B22305;
    
            }


</style> 



    </head>
    <body>

<!-- INCIO SUBMENU -->
<div style="padding: 10px 10px; border: 0px solid #024BA3; width: 100%">
        <nav style=" max-width: 100%; display: flex; text-transform: uppercase; color: black; ">
            <div style=" width: 50%;  padding: 0px 0px; text-align: center;border: 0px solid #024BA3;">
                <div style="">
                
                </div>
            </div>

            <div style=" width: 450px; padding: 0px 0px;"; >
                <div style="">
                <h5 class="subtitulos" style="font-family: sans-serif; margin-top: 5px; text-align: center; width: 100%">BIENVENIDO</h5> 
                </div>
            </div>

          

            <div style=" width: 50%;  padding: 0px 0px; text-align: center;border: 0px solid #024BA3;">
                <div style="">
                
                </div>
            </div>
        </nav>
    </div>
<!-- FIN SUBMENU -->





        <!-- INICIO LISTADO -->
        <div style="padding: 2px 8px; border: 0px solid #024BA3; width: 100%">
        <!--<div style=" text-align: center; "><img src="pictures/logo_grandex.png" width="580px" height="500px;  "></div>-->
        </div>
        <!-- FIN LISTADO BINES -->
    </body>
</html>