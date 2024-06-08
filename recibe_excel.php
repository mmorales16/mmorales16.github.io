<?php
require('config.php');
$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {
        $datos = explode(";", $linea);

        $id                  = !empty($datos[0])  ? $datos[0] : NULL;
        $rack                = !empty($datos[1])  ? $datos[1] : NULL;
        $location            = !empty($datos[2])  ? $datos[2] : NULL;
        $ax                  = !empty($datos[3])  ? $datos[3] : NULL;
        $description         = !empty($datos[4])  ? $datos[4] : NULL;
        $um                  = !empty($datos[5])  ? $datos[5] : NULL;
        $price               = !empty($datos[6])  ? $datos[6] : NULL;
        $stock               = !empty($datos[7])  ? $datos[7] : NULL;
        $physics             = !empty($datos[8])  ? $datos[8] : NULL;
        $estado              =  0;

        // Preparar la consulta
        $sql = "INSERT INTO tb_stock (id, rack, location, ax, description, um, price, stock, physics, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Preparar la sentencia
        $stmt = mysqli_prepare($con, $sql);

        // Vincular los parámetros
        mysqli_stmt_bind_param($stmt, 'isssssdddi', $id, $rack, $location, $ax, $description, $um, $price, $stock, $physics, $estado);

        // Ejecutar la sentencia
        mysqli_stmt_execute($stmt);

        // Cerrar la sentencia
        mysqli_stmt_close($stmt);
    }

    echo '<div>'. $i . "). " . htmlspecialchars($linea) . '</div>';
    $i++;
}

// Redirigir a la página "lista_articulos.php" después de 5 segundos
header("refresh:0;url=lista_articulos.php");
?>

