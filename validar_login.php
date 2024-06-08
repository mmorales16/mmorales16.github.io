<?php 
    include("conexion.php");
    $con=conectar();
    $id_usuario= mysqli_real_escape_string($con, $_POST['id_usuario']) ;
    $pass=md5 ( mysqli_real_escape_string($con, $_POST['pass']));
    session_start();
    $_SESSION['id_usuario']=$id_usuario;
    $sql="SELECT *  FROM tb_usuarios WHERE id_usuario='$id_usuario' AND pass='$pass'";
    $query=mysqli_query($con,$sql);

    

$filas=mysqli_num_rows($query);
if($filas){
    
session_start();
$iduser = $_SESSION['id_usuario'];



$Object = new DateTime();  
$Object->setTimezone(new DateTimeZone('America/Costa_Rica'));
$DateAndTime = $Object->format("Y-m-d h:i:s");
$fec=$DateAndTime;
$id_bitacora='';
$id_usuario="$iduser";
$fecha=$DateAndTime;
$pantalla='Lista Usuarios';
$comentario='login';

$sql="INSERT INTO tb_bitacora VALUES('$id_bitacora','$id_usuario','$fecha','$pantalla','$comentario')";
$query= mysqli_query($con,$sql);





header("Location: bienvenidos.php");
 }else{  

   ?>
    <?php
    include ("index.php");
    session_destroy();
    ?>
    
    <div class="alert alert-danger" role="alert">
   <strong>¡Error de autenticacion!</strong>
</div>
    <?php

 }
 //mysqli_free_result($query);
 mysqli_close($con);

