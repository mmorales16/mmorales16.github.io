
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ru_Round</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    		<!-- Agregar los estilos CSS de Bootstrap -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <!-- Agregar los estilos CSS de Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css" integrity="sha512-WJ0I8PHl5mygLnC+5AAn0iqfg5o+KNnBf7/g94c1ZbJ7lbNNn+BoGUK1VFGhOXyB/E7nMNrWfDmQ+MYTjaJhGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Agregar los scripts JS de Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    
 	<!-- Agregar los estilos CSS personalizados -->   
    <style>
		body {
			background-color: #f2f2f2;
		}
		form {
			background-color: #fff;
			border: 1px solid #ddd;
			padding: 20px;
			width: 300px;
			margin: 0 auto;
			margin-top: 20px;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            text-align: center;
		}
		label {
			display: block;
			margin-bottom: 10px;
		}
		input[type="text"],
		input[type="password"] {
			padding: 5px;
			border: 1px solid #ccc;
			border-radius: 5px;
			width: 100%;
			margin-bottom: 20px;
			box-sizing: border-box;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
			margin-bottom: 20px;
		}
		input[type="submit"]:hover {
			background-color: #45a049;
		}

        .button {
			text-align: center;
			}
	</style>
    </head>
    <body>
        <div style=""><h3 style="font-family: sans-serif; margin-top: 10px; text-align: center; width: 100%">BIENVENIDOS </h3></div>
        <div align="center"><img src="pictures/logox.png" width="100px" height="120px;  "></div>
        
        <!-- INGRESO DE SATOS "form-control mb-3"-->
        <form action="validar_login.php" method="POST">
            <a style="font-family: sans-serif; color: #B22305; text-align: center; width: 100%"><b>USUARIO</b></a>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
</svg></i></span>
			</div>
			<input type="text" id="username" name="id_usuario" class="form-control" name="id_usuario" required>
		</div>

        <a style="font-family: sans-serif; color: #B22305; text-align: center; width: 100%"><b>CONTRASEÑA</b></a>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg></i></span>
			</div>
			<input type="password" id="password" name="pass" class="form-control">
		</div>
        <div class="button">
                 <input class="btn btn-primary" type="submit" value="Ingresar">
                </div> 
                 <div class="">
			    <?php
                    $Object = new DateTime();  
                    $Object->setTimezone(new DateTimeZone('America/Costa_Rica'));
                    $DateAndTime = $Object->format("Y-m-d h:i:s");   
                    echo "$DateAndTime";     
                ?>
		</div>
		<div class="">
            <a style="font-family: sans-serif; font-size:12px ;color: black; margin-top: 10px; text-align: center; width: 100%">Created by Michael Morales Cubillo</a>
		</div>
        </form>

    </body>
</html>