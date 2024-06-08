<?php

include("conexion.php");
$con=conectar();

$codigo=$_POST['codigo'];
$pass=md5($_POST['pass']);
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$tipo=$_POST['tipo'];
$estado=$_POST['estado'];

$sql="UPDATE tb_usuarios SET  pass='$pass',nombre='$nombre',correo='$correo',tipo='$tipo',estado='$estado' WHERE id_usuario='$codigo'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: lista_usuarios.php");
    }
?>