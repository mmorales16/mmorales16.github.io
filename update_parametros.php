





<?php

include("conexion.php");
$con=conectar();

$codigo=$_POST['id_compania'];
$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$direccion=$_POST['direccion'];
$header_colorfondo=$_POST['header_colorfondo'];
$header_colorfuente=$_POST['header_colorfuente'];
$menu_colorfondo=$_POST['menu_colorfondo'];
$menu_colorfuente=$_POST['menu_colorfuente'];
$body_colorfondo=$_POST['body_colorfondo'];
$body_colorfuente=$_POST['body_colorfuente'];

//echo "Color de fondo del encabezado: $header_colorfondo<br>";

$sql="UPDATE tb_parametros SET  nombre='$nombre',telefono='$telefono',correo='$correo',direccion='$direccion',header_colorfondo='$header_colorfondo',header_colorfuente='$header_colorfuente',menu_colorfondo='$menu_colorfondo',menu_colorfuente='$menu_colorfuente',body_colorfondo='$body_colorfondo' ,body_colorfuente='$body_colorfuente'
WHERE id_compania='$codigo'";
$query=mysqli_query($con,$sql);


  

$Object = new DateTime();  
$Object->setTimezone(new DateTimeZone('America/Costa_Rica'));
$DateAndTime = $Object->format("Y-m-d h:i:s");
$fec=$DateAndTime;
$id_bitacora='';
$id_usuario=$_POST['usuario'];
$fecha=$DateAndTime;
$pantalla='Guardar parametros';
$comentario= 'Nombre Compañia = ' . $_POST['nombre'] .' / '.'Telefono = ' . $_POST['telefono'] .' / '.'Correo = ' . $_POST['correo'] .' / '.'Direccion = ' . $_POST['direccion'] .' / '. 'Colores Header =' . $_POST['header_colorfondo'] .' & '. $_POST['header_colorfuente'];

$sql2="INSERT INTO tb_bitacora VALUES('$id_bitacora','$id_usuario','$fecha','$pantalla','$comentario')";
$query2= mysqli_query($con,$sql2);


//echo "Color de fondo del encabezado: $pantalla<br>";
//echo "Color de fondo del encabezado: $id_usuario<br>";
//echo "Color de fondo del encabezado: $DateAndTime<br>";


//exit;



    if($query){
        Header("Location: actualizar_parametros.php?id=1");


    }else {
        // Manejar el caso de error
        echo "Error al actualizar los datos. Por favor, inténtelo de nuevo.";
    }




?>



