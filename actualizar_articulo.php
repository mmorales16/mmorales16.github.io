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
        $pantalla='Actualizar Articulo';
        $comentario='acertado';

        $sql="INSERT INTO tb_bitacora VALUES('$id_bitacora','$id_usuario','$fecha','$pantalla','$comentario')";
        $query= mysqli_query($con,$sql);
    ?> 
    <!-- FIN GUARDADO EN BITACORA -->
<?php 
$id=$_GET['id'];  
$sql="SELECT * FROM tb_stock WHERE id='$id'";
$query=mysqli_query($con,$sql);
$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Actualizar</title>
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
#combox_select{
    padding: 0px 15px;
    border: 1px solid #024BA3;
	width: 50%;

}

.formulario{
    
    border: 1px solid #024BA3;
    padding: 0px 10px;
    width: 50%;
}

body {
                color:#006e29;
                background: #F8F8F8;
                border: 0px solid #024BA3;
            }
.subtitulos_botones {
                background: #E9EAE7;
                color:#006e29;
                text-align: center;
                padding: 5px 5px;   
                border: 0px solid #024BA3; 
                width: 100%;
                margin: 0px auto;
                font-size:22px ;
                font-weight: bold ;
            }

.cuadro_ingreso {
  
    

                padding: 8px 5px; 
                margin: 10px auto; 
                width: 470px;  
                opacity: 0.90; 
                border: 0px solid red;
            }
.mini_cuadro_ingreso {
    
 
                margin: 10px auto;
                padding: 10px 10px; 
                text-align: center; 
                border-radius: 6px; 
                border: 2px <?php echo $row['header_colorfondo'] ?>; 
                background: #FFFFFF;
            }   
#input_cuadro {
                width: 100%;  
                padding: 0px 5px;
                background: #FFFFFF;
                text-align: center; 
                border-radius: 6px;
                border: 0px solid blue; 
            }  

 #input_cuadro2 {
                width: 100%;  
                padding: 0px 5px;
                background: #FFFFFF;
                text-align: center; 
                border-radius: 6px;
                border: 0px solid blue; 
                height: 95px; 
            }  


            
#input {
                border: 1px solid #757070;
                color: black;
                 
                
            }  

#input2 {
                border: 1px solid #757070;
                color: black;
                 font-size: 40px; /* Añadir esta línea para especificar el tamaño de la letra */
                 height: 90px; 
            }  

nav {
                display: flex; 
                width: 100%;
            }   
                     
</style>    
    </head>
    <body>


        <script>
            function validarFormulario() {
                var physicsValue = document.getElementById("input2").value;
                if (physicsValue.trim() == "") {
                    alert("El campo 'Fisico' no puede estar en blanco");
                    return false;
                }
                return true;
            }
        </script>


    <form action="update_articulo.php" method="POST"  enctype="multipart/form-data" onsubmit="return validarFormulario();">    
        <!-- Titulos y iconos de herramientas -->
        <div class="subtitulos_botones" style="" id="">      
            <div class="subtitulos_botones" style="" id="">
                <nav style=""> 

                    <div  style="width: 25%; text-align: center; ">
                        <a  class="btn btn-sm btn-outline-success" type="link" href="lista_articulos.php">ATRAS</a>
                    </div>

                    <div  style="width: 50%; text-align:   ">
                        <div class="" style=" width: 100% ;"><p style="">ACTUALIZAR ARTICULO</p></div>
                    </div>

                    <div  style="width: 25%; text-align: center;  ">
                        <input type="submit" class="btn btn-sm btn-outline-success" value="ACTUALIZAR">
                    </div>
                </nav>
            </div>
        </div>

 


        <!-- Ingreso de datos de Descricpion -->
        <div class="cuadro_ingreso" style="" id="">      
            <div class="mini_cuadro_ingreso" style="" >
                <div id=""  style="" class="">          
                    <input type="hidden" name="codigo" value="<?php echo $row['id']  ?>">
                    <input type="text" class="form-control mb-3" name="id" readonly onmousedown="return false;" placeholder="" value="<?php $codigo=$_GET['id']; echo "$codigo";?>">
                    <input type="text" class="form-control mb-3" name="ax" readonly onmousedown="return false" placeholder="" required minlength="5" required maxlength="100"value="<?php echo $row['ax']  ?>"> 
                </div>
                <div id="input_cuadro"  style="" class="form-floating mb-3"> 
                    <input id="input" type="text" class="form-control mb-3" name="description" readonly onmousedown="return false" placeholder="Description" value="<?php echo htmlspecialchars($row['description'])  ?>">
                    <label for="floatingInput" style="text-align: left;"> Descripcion</label> 
                </div> 
                <div  id="input_cuadro" style="" class="form-floating mb-3">
                    <input id="input" type="text" class="form-control mb-3" name="um" readonly onmousedown="return false" placeholder="Unidad medida"  value="<?php echo htmlspecialchars($row['um'])  ?>">
                    <label for="floatingInput" style="text-align: left;"> Unidad de medida</label>  
                </div>
                <div  id="input_cuadro2" style="" class="form-floating mb-3">
                    <input id="input2" type="text" class="form-control mb-3" name="physics" placeholder="Fisico"  value="<?php echo htmlspecialchars($row['physics'])  ?>" required>
                    <label for="floatingInput" style="text-align: left;"> Fisico</label>  
                </div>

                <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                <input type="hidden" name="stock" value="<?php echo $row['stock']; ?>">

                
            </div>
        </div>
    </form>
    </body>
</html>