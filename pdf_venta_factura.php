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
	$pantalla='PDF Factura Venta';
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


	$pdf = new PDF_Code128('P','mm','Letter');
	$pdf->SetMargins(17,17,17);
	$pdf->AddPage();

	# Logo de la empresa formato png #
	$pdf->Image('./pictures/logo_vane.png',160,12,40,30,'PNG');

	# Encabezado y datos de la empresa #
	$pdf->SetFont('Arial','B',16);
	$pdf->SetTextColor(0, 110, 41);
	$pdf->Cell(150,10,utf8_decode(strtoupper("DISEÑOS VANE MIRANDA")),0,0,'L');

	$pdf->Ln(9);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(150,9,utf8_decode("RUC: 0000000000"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Boca de Arenal de Cutris"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Teléfono: 8864-4258"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Email: vanemj@hotmail.com"),0,0,'L');

	$pdf->Ln(10);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(30,7,utf8_decode("Fecha de emisión:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(116,7,utf8_decode(date("d/m/Y h:i:s A", strtotime($fecha))),0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(35,7,utf8_decode(strtoupper("Factura No: ")),0,0,'C');

	$pdf->Ln(7);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(12,7,utf8_decode("Cajero:"),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(134,7,utf8_decode("Vanessa Miranda"),0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,utf8_decode(strtoupper($idx)),0,0,'C');

	$pdf->Ln(10);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,utf8_decode("Cliente:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,utf8_decode($clientex),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(18,7,utf8_decode("Id Cliente: "),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,utf8_decode($id_clientex),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(7,7,utf8_decode("Tel:"),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,utf8_decode($telefonox),0,0);
	$pdf->SetTextColor(39,39,51);

	$pdf->Ln(7);

	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(18,7,utf8_decode("Direcciòn:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(109,7,utf8_decode("No aplica"),0,0);

	$pdf->Ln(9);

	# Tabla de productos #
	$pdf->SetFont('Arial','',9);
	$pdf->SetFillColor(0, 110, 41);
	$pdf->SetDrawColor(39,39,51);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(107,8,utf8_decode("Descripción"),1,0,'L',true);
	$pdf->Cell(15,8,utf8_decode("Cantidad"),1,0,'C',true);
	$pdf->Cell(20,8,utf8_decode("Precio"),1,0,'C',true);
	$pdf->Cell(20,8,utf8_decode("Descuento"),1,0,'C',true);
	$pdf->Cell(20,8,utf8_decode("Total"),1,0,'C',true);

	$pdf->Ln(8);

	
	$pdf->SetTextColor(39,39,51);


	$pdf->SetFont('Arial','',8);
	/*----------  Detalles de la tabla  ----------*/

    $sql="SELECT * FROM tb_articulos_vendidos WHERE id_venta = $idx";
    $query2=mysqli_query($con,$sql);
  

    while ($dataRow2 = mysqli_fetch_array($query2)) {
        $pdf->Cell(107,6,utf8_decode($dataRow2['nombre']),1,0,'L');
        $pdf->Cell(15,6,($dataRow2['cantidad']),1,0,'C');
        $pdf->Cell(20,6,utf8_decode("¢ ").number_format(($dataRow2['precio'])),1,0,'C');
		$pdf->Cell(20,6,utf8_decode("¢ ").number_format(($dataRow2['descuento'])),1,0,'C');
        $pdf->Cell(20,6,utf8_decode("¢ ").number_format(($dataRow2['total'])),1,1,'C');
       

    }
 

	
	/*----------  Fin Detalles de la tabla  ----------*/


	
	$pdf->SetFont('Arial','B',9);
	
	# Impuestos & totales #


	$query="SELECT subtotal, SUM(subtotal) FROM tb_articulos_vendidos WHERE id_venta='$id' ";
	$resultado1=mysqli_query($con, $query);
		while($row = mysqli_fetch_array($resultado1)){
			$subtotalx = "". round($row['SUM(subtotal)'],2)."";
					}
	$pdf->Cell(100,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(32,7,utf8_decode("SUBTOTAL"),'T',0,'C');
	$pdf->Cell(34,7,utf8_decode("¢ ").number_format(($subtotalx)),'T',0,'C');

	$pdf->Ln(7);

	$query="SELECT monto_iva, SUM(monto_iva) FROM tb_articulos_vendidos WHERE id_venta='$id' ";
	$resultado2=mysqli_query($con, $query);
		while($row = mysqli_fetch_array($resultado2)){
			$monto_ivax = "". round($row['SUM(monto_iva)'],2)."";
					}


	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode("IVA (13%)"),'',0,'C');
	$pdf->Cell(34,7,utf8_decode("¢ ").number_format(($monto_ivax)) ,'',0,'C');

	$pdf->Ln(7);


	$query="SELECT descuento, SUM(descuento) FROM tb_articulos_vendidos WHERE id_venta='$id' ";
	$resultado3=mysqli_query($con, $query);
		while($row = mysqli_fetch_array($resultado3)){
			$descuentox = "". round($row['SUM(descuento)'],2)."";
					}

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');

	$pdf->Cell(32,7,utf8_decode("DESCUENTO"),'T',0,'C');
	$pdf->Cell(34,7,utf8_decode("¢ ").number_format(($descuentox)) ,'T',0,'C');

	$pdf->Ln(7);


	$query="SELECT total, SUM(total) FROM tb_articulos_vendidos WHERE id_venta='$id' ";
	$resultado4=mysqli_query($con, $query);
		while($row = mysqli_fetch_array($resultado4)){
			$totalx = "". round($row['SUM(total)'],2)."";
					}
	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode("TOTAL PAGADO"),'',0,'C');
	$pdf->Cell(34,7,utf8_decode("¢ ").number_format(($totalx)),'',0,'C');

	$pdf->Ln(7);

	
	$pdf->Ln(7);

	

	$pdf->Ln(12);

	$pdf->SetFont('Arial','',9);

	$pdf->SetTextColor(39,39,51);
	$pdf->MultiCell(0,9,utf8_decode("*** Precios de productos incluyen impuestos ***"),0,'C',false);

	$pdf->Ln(9);

	# Codigo de barras #
	$pdf->SetFillColor(39,39,51);
	$pdf->SetDrawColor(23,83,201);
	$pdf->Code128(72,$pdf->GetY(),"($idx)",70,20);
	$pdf->SetXY(12,$pdf->GetY()+21);
	$pdf->SetFont('Arial','',12);
	$pdf->MultiCell(0,5,utf8_decode($idx),0,'C',false);

	# Nombre del archivo PDF #
	$pdf->Output("I","Factura_No ".$idx.".pdf",true);