<style type="text/css">
* {
    margin:0px;
    padding: 0px 0px;
  }
			 
  .img-avatar {
          border-radius: 35px;

            }
</style>

<?php
            
              include("conexion.php");
              $iduser = $_SESSION['id_usuario'];
              $con=conectar();
              $id=$iduser;  
              $sql="SELECT * FROM tb_usuarios WHERE id_usuario='$id'";
              $query=mysqli_query($con,$sql);

              while($row=mysqli_fetch_array($query)){
            ?>
              <?php
              $codigox=$row['id_usuario'];
              $nombrex=$row['nombre'];
              $fotox=$row['foto']; 
            ?> 
            <nav style=" max-width: 100%; display: flex;  color: white; ">
              <div style="padding: 2px 2px; text-align: left;">
                <img class="img-avatar" src="img/avatar/<?php echo $fotox ?>" width="40px" height="40px;  "> 
              </div>

              <div style="width: 100%">
              <?php
                  echo " $nombrex";
                ?>
              </div>

              <div style=" width: 85px;  padding: 5px 8px;">
                <div style="">
                  <a style=" width: 75px;"  class="btn btn-sm btn-success" type="link" href="actualizar_usuario.php?id=<?php echo $codigox ?>">Cuenta</a>
                </div>
              </div>

              <div style=" width: 85px; padding: 5px 8px;">
                <div style="">
                  <a  style="width: 75px;  " class="btn btn-sm btn-danger" type="link" href="salir.php">Salir</a>
                </div>
              </div>

            </nav>

            
            
<?php }
?>  

<?php 
    $tipo_venta2='Pedido';
    $estado2='Pendiente';
    $sql4="SELECT * FROM tb_articulos_vendidos WHERE estado='$estado2'  AND tipo_venta LIKE '%$tipo_venta2%'";
    $query4=mysqli_query($con,$sql4);
    $num_registros=mysqli_num_rows($query4);
    ?> 