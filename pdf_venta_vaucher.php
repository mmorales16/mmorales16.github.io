<?php
	# Incluyendo librerias necesarias #
    require "./code128.php";
    include("conexion.php");

    session_start();
             
	$iduser = $_SESSION['id_usuario'];
	$con2=conectar();
	$id=$iduser;  
	$sql="SELECT * FROM tb_usuarios WHERE id_usuario='$id'";
	$query=mysqli_query($con2,$sql);

	while($row=mysqli_fetch_array($query)){
		$codigox=$row['id_usuario'];
		$nombrex=$row['nombre'];
	}
	$Object = new DateTime();  
	$Object->setTimezone(new DateTimeZone('America/Costa_Rica'));
	$DateAndTime = $Object->format("Y-m-d h:i:s");
	$fec=$DateAndTime;
	$id_bitacora='';
	$id_usuario="$codigox";
	$fecha=$DateAndTime;
	$pantalla='PDF Factura Vaucher';
	$comentario='acertado';

	$sql="INSERT INTO tb_bitacora VALUES('$id_bitacora','$id_usuario','$fecha','$pantalla','$comentario')";
	$query= mysqli_query($con2,$sql);

    # Conecta con la base de datos de la tb ventas
    $con=conectar();
    $idx = $_GET['id'];

    $id=$_GET['id'];  
    //echo " El numero de factura es--> $id";
    $sql="SELECT * FROM tb_ventas WHERE id_venta='$id'";
    $query=mysqli_query($con,$sql);  

while($row=mysqli_fetch_array($query)){

$id_ventax=$row['id_venta'];
$fechax=$row['fecha'];
$telefonox=$row['telefono'];
$id_clientex=$row['id_cliente'];
$clientex=$row['cliente'];
$totalx=$row['total'];
$estadox=$row['estado'];
 }
    $Object = new DateTime();  
    $Object->setTimezone(new DateTimeZone('America/Costa_Rica'));
    $DateAndTime = $Object->format("Y-m-d h:i:s");
    $fec=$DateAndTime;
    $id_bitacora='';
    $fecha=$DateAndTime;

    $pdf = new PDF_Code128('P','mm',array(80,258));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();
    
    # Encabezado y datos de la empresa #
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("DISEÑOS VANE MIRANDA")),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,utf8_decode("RUC: 0000000000"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Boca de Arenal de Custris"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: 8864-4258"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Email: vanemj@hotmail.com"),0,'C',false);
    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);
    $pdf->MultiCell(0,5,utf8_decode("Fecha: ".date("d/m/Y h:i:s A", strtotime($fecha))),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Caja No: 1"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Cajero: vanessa Miranda"),0,'C',false);
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Ticket Nro: ").($idx)),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    //$pdf->Write(0, 'Canal: '. $idx);
 
    $pdf->MultiCell(0,5,utf8_decode("Cliente: ").($clientex),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Codico: ").($id_clientex),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: ").($telefonox),0,'C',false);
    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    # Tabla de productos #
    $pdf->Cell(8,5,utf8_decode("Cant."),0,0,'C');
    $pdf->Cell(20,5,utf8_decode("Precio"),0,0,'C');
    $pdf->Cell(30,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(15,5,utf8_decode("Total"),0,0,'C');
    $pdf->Ln(3);
    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);
    $pdf->SetFont('helvetica','',10);


    /*----------  Detalles de la tabla  ----------*/
    $sql="SELECT * FROM tb_articulos_vendidos WHERE id_venta = $idx";
    $query2=mysqli_query($con,$sql);

    while ($dataRow2 = mysqli_fetch_array($query2)) {
       
        $idy=$dataRow2['id_articulo'];  
        $sql="SELECT * FROM tb_articulos WHERE id_articulo='$idy'";
        $queryy=mysqli_query($con,$sql);
        while($row2=mysqli_fetch_array($queryy)){
            $id_articulox=$row2['id_articulo'];
            $descripcion_cortax=$row2['descripcion_corta'];
            $pdf->Cell(50,6,($descripcion_cortax),0,1,'L');
            }       
        $pdf->Cell(8,6,($dataRow2['cantidad']),0,0,'C');
        $pdf->Cell(5,6,("X"),0,0,'C');
        $pdf->Cell(15,6,utf8_decode("¢").number_format(($dataRow2['precio'])),0,0,'C');
        $pdf->Cell(25,6,(""),0,0,'C');
        $pdf->Cell(18,6,utf8_decode("¢").number_format(($dataRow2['total'])),0,1,'R');
    }

    $pdf->Ln(7);
    /*----------  Fin Detalles de la tabla  ----------*/
    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
        $pdf->Ln(5);

    # Impuestos & totales #
    $query="SELECT subtotal, SUM(subtotal) FROM tb_articulos_vendidos WHERE id_venta='$id' ";
	$resultado1=mysqli_query($con, $query);
		while($row = mysqli_fetch_array($resultado1)){
			$subtotalx = "". round($row['SUM(subtotal)'],2)."";
					}

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("SUBTOTAL"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("¢ ").number_format(($subtotalx)),0,0,'C');

    $pdf->Ln(5);

	$query="SELECT monto_iva, SUM(monto_iva) FROM tb_articulos_vendidos WHERE id_venta='$id' ";
	$resultado2=mysqli_query($con, $query);
		while($row = mysqli_fetch_array($resultado2)){
			$monto_ivax = "". round($row['SUM(monto_iva)'],2)."";
					}
    
    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("IVA (13%)"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("¢ ").number_format(($monto_ivax)),0,0,'C');

    $pdf->Ln(5);
    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

	$query="SELECT descuento, SUM(descuento) FROM tb_articulos_vendidos WHERE id_venta='$id' ";
	$resultado3=mysqli_query($con, $query);
		while($row = mysqli_fetch_array($resultado3)){
			$descuentox = "". round($row['SUM(descuento)'],2)."";
					}

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("DESCUENTO"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("¢ ").number_format(($descuentox)),0,0,'C');

    $pdf->Ln(5);
    $query="SELECT total, SUM(total) FROM tb_articulos_vendidos WHERE id_venta='$id' ";
	$resultado4=mysqli_query($con, $query);
		while($row = mysqli_fetch_array($resultado4)){
			$totalx = "". round($row['SUM(total)'],2)."";
					}

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(22,5,utf8_decode("TOTAL A PAGAR"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("¢ ").number_format(($totalx)),0,0,'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,utf8_decode("*** Precios de productos incluyen impuestos***"),0,'C',false);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,utf8_decode("Gracias por su compra"),'',0,'C');
    $pdf->Ln(9);

    # Codigo de barras #
    $pdf->Code128(5,$pdf->GetY(),"($idx)",70,20);
    $pdf->SetXY(0,$pdf->GetY()+21);
    $pdf->SetFont('Arial','',14);
    $pdf->MultiCell(0,5,utf8_decode($idx),0,'C',false);
    
    # Nombre del archivo PDF #
    $pdf->Output("I","Vaucher_venta_No ".$idx.".pdf",true);

    ?> 
    
