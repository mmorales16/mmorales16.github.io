<?php
include("conexion.php");
$con=conectar();
$id=$_POST['id'];
$ax=$_POST['ax'];
$description=$_POST['description'];
$um=$_POST['um'];
$price=$_POST['price'];
$stock=$_POST['stock'];
$physics=$_POST['physics'];
$estado=1;
$var=($price*$physics)-($price*$stock);

// Verificar si el campo physics está vacío y establecerlo en NULL
if (empty($physics)) {
    $physics = NULL;
}

//echo " EL detalle de la prueba es --> $id";
//exit;

$sql="UPDATE tb_stock SET ax='$ax', um='$um', physics='$physics', estado='$estado', var='$var'  WHERE id='$id'";
$query=mysqli_query($con,$sql);

$stmt = $con->prepare($sql);

if ($stmt->execute()) {
    Header("Location: lista_articulos.php");
} else {
    echo "Error actualizando el registro: " . $stmt->error;
}

// Cerrar la consulta y la conexión
$stmt->close();
$con->close();
?>

