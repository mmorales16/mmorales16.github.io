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
        $pantalla='Crear Articulo';
        $comentario='acertado';

        $sql="INSERT INTO tb_bitacora VALUES('$id_bitacora','$id_usuario','$fecha','$pantalla','$comentario')";
        $query= mysqli_query($con,$sql);
    ?> 
    <!-- FIN GUARDADO EN BITACORA -->  

    <?php 
$id=$_GET['id'];  

$sql="SELECT * FROM tb_articulos WHERE id_articulo='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>USUARIOS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script type="text/javascript" src="js/functions.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
       
 
        <style type="text/css">
* 

.prevPhoto {
    display: flex;
    justify-content: space-between;
    width: 160px;
    height: 150px;
    border: 1px solid #CCC;
    position: relative;
    cursor: pointer;
    background: url(../images/uploads/user.png);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    margin: auto;
}
.prevPhoto label{
	cursor: pointer;
	width: 100%;
	height: 100%;
	position: absolute;
	top: 0;
	left: 0;
	z-index: 2;
}
.prevPhoto img{
	width: 100%;
	height: 100%;
}
.upimg, .notBlock{
	display: none !important;
}
.errorArchivo{
	font-size: 16px;
	font-family: arial;
	color: #cc0000;
	text-align: center;
	font-weight: bold; 
	margin-top: 10px;
}
.delPhoto{
	color: #FFF;
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	justify-content: center;
	align-items: center;
	border-radius: 50%;
	width: 25px;
	height: 25px;
	background: red;
	position: absolute;
	right: -10px;
	top: -10px;
	z-index: 10;
}
#tbl_list_productos img{
	width: 50px;
}
.imgProductoDelete{
	width: 175px;
}	
</style>
    </head>
    <body>
        
        <!-- INCIO TITULO -->
        <div style="">
            <h4 style="font-family: sans-serif; margin-top: 15px; text-align: center; width: 100%">NUEVO ARTICULO </h4>
        </div>
        <!-- FIN TITULO --> 

        <!-- INCIO OPCIONES DE HERRAMIENTAS -->
        <div style="padding: 2px 2px; margin: 0px auto; text-align: center; border: 0px solid #024BA3; width: 300px;" id="">
                <nav style=" padding: 0px 14px;  display: flex; text-transform: uppercase; width: 100%; ">  
                    <div style="padding: 0px 0px; border: 0px solid #024BA3; width: 100% ">
                        
                    </div>
                    <div style="width: 50px; padding: 0px 0px; border: 0px solid #024BA3; ">
                        <a  class="btn btn-sm btn-outline-primary" type="link" href="lista_articulos.php">ATRAS</a>
                    </div>
                </nav>
        </div>
        <!-- FIN OPCIONES DE HERRAMIENTAS -->        
        
        <!-- INGRESO DE DATOS -->
        <div style="padding: 8px 8px; margin: 10px auto; width: 300px;  opacity: 0.90; border: 0px solid #024BA3; " id=" main-container">
            <div style="padding: 8px 14px;background: #FFFFFF;text-align: center; border-radius: 6px; border: 1px solid #024BA3;">
            <form action="insertar_articulo.php" method="POST" enctype="multipart/form-data">
         <input type="hidden" name="codigo" value="<?php echo $row['id_articulo']  ?>">
         <input type="text" class="form-control mb-3" name="id_articulo" readonly onmousedown="return false;" placeholder="" value="<?php $codigo=$_GET['id']; echo "$codigo";?>">
         <input type="text" class="form-control mb-3" name="fecha_creacion" readonly onmousedown="return false;" placeholder="" required minlength="5" required maxlength="100"value="<?php echo $row['fecha_creacion']  ?>"> 
            <input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion" required minlength="5" required maxlength="100"value="<?php echo $row['descripcion']  ?>">            
            <input type="text" class="form-control mb-3" name="descripcion_corta" placeholder="Descripcion corta" required minlength="8" required maxlength="13" value="<?php echo $row['descripcion_corta']  ?>">
             <!-- OPTION PROVEEDORES -->
             <?php 
                $sql="SELECT *  FROM tb_proveedores";
                $query=mysqli_query($con,$sql);
            ?> 
            <select name="id_proveedor" class="form-select form-control mb-3">   
                <option>Todos</option>
                    <?php
                    while($row=mysqli_fetch_array($query))  {         
                    ?>
                <option > <?php  echo $row['id_proveedor']," - ", $row['nombre'] ?> </option> 
                <?php   } 
                ?>  
            </select>     
            <!-- OPTION PROVEEDORES -->



            <!-- Opcion Categoria -->
            <div style="background: #FFFFFF;text-align: center; border: 0px solid #024BA3;">
            <select name="categoria" class="form-control mb-3" aria-label=".form-select-sm example">
            <option value="Perfumes">Perfumes</option>
            <option value="Perfumes">Cremas</option>
            <option value="Calzones">Calzones</option>
            <option value="Camisas">Camisas</option>
            <option value="Pantalonetas">Pantalonetas</option>
            <option value="Boxers">Boxers</option>
            </select>
            </div>
           <!-- Opcion gravado -->
           <div style="background: #FFFFFF;text-align: center; border: 0px solid #024BA3;">
            <select name="gravado" class="form-control mb-3" aria-label=".form-select-sm example">
            <option value="E">Exento</option>
            <option value="G">Gravado</option>
            </select>
            </div>

            <input type="text" class="form-control mb-3" name="invent_inicial" placeholder="Inventario inicial" required minlength="1" required maxlength="10">
            <input type="number" class="form-control mb-3" name="precio_compra_incial" placeholder="precio_compra_incial" required minlength="1" required maxlength="10">
            <input type="number" class="form-control mb-3" name="precio_venta" placeholder="precio_venta" >
            <input type="number" class="form-control mb-3" name="descuento" placeholder="Descuento"   maxlength="3">
            <input type="text" class="form-control mb-3" name="observaciones" placeholder="Observaciones"  maxlength="100">
       <!-- Opcion Estado -->
       <div style="background: #FFFFFF;text-align: center; border: 0px solid #024BA3;">
            <select name="estado" class="form-control mb-3" aria-label=".form-select-sm example">
            <?php if ($row['estado'] == "1") {
                    ?> 
                        <option value="1" selected="estado">Activo</option>
                        <option value="0">Inactivo</option> 
                    <?php 
                    }  elseif ($row['estado'] == "0") {  
                    ?> 
                        <option value="1">Activo</option> 
                        <option value="0" selected="estado" >Inactivo</option>
                    <?php
                    } 
                    ?>
            </select>
            </div>
             <!-- para copiar el formato del css de carga de imagen ver video  https://www.youtube.com/watch?v=LwjoL58Lhhg&list=PL3b9xmg86NTLHvul_VxsDda31xH6u8OdI&index=27 -->
            
                <?php
                $foto = '';
                $classRemove = 'notBlock';
                If ($row['foto'] != 'img_producto.png'){
                    $classRemove = '';
                    $foto =  '<img id="img" src="img/uploads/'. $row['foto'].'" alt="">';
                }
                ?>
            
                <div>
                    <label class="custom-file-label" for="foto">Foto</label>
                    <div class="prevPhoto">
                        <spam class="delPhoto notBlock"> X </spam>
                        <label for="foto"> </label>
                        <?php echo $foto;?>
                    </div>
                    <div class="upimg">
                        <input type="file" name= "foto" id="foto">
                    </div>
                    <div id="form_alert"> </div>
            </div>
            <input type="submit" class="btn btn-primary">
            </form>
         
            </div>
        </div>
        <br>
        <!-- FIN INGRESO DE DATOS -->
    </body>
</html>