<?php
   session_start();
	include 'php/metodos.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>prueba 1!</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<h1>TITULO DE LA PÁGINA</h1>
	</header>
	<nav id="contenido">
		<section>
		<?php
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){  
				echo '<tr>
						Hola, '.$_SESSION["name"].'. <br>
					</tr>
					<tr>
						&pointint; <a href="">
							Cambiar Contraseña
						</a><br>
						&pointint; <a href="">
							Cambiar Foto
						</a><br><br>
						<a href="php/logout.php">
							Cerrar Sesion
						</a>
					</tr>';
			} else {
				echo '<form action="php/login.php" method="post">
						<table>
							<tr>
								<h3>
									INICIAR SESIÓN
								</h3>
							</tr>
							<tr>
								<label>Nombre</label>
							</tr>
							<tr>
								<input type="text" name="name">
							</tr>
							<tr>
								<label>Contraseña</label>
							</tr>
							<tr>
								<input type="password" name="pass">
							</tr>
							<tr>
								<input type="submit" value="ENTRAR">
							</tr>
							<tr>
								<br><br>
								<a href="">REGISTRO</a>
							</tr>
						</table>
					</form>';
			}
			
			?>
		</section>
		<section>
			<table>
				<tr>
					<td>
						ID
					</td>
					<td>
						Nombre
					</td>
					<td>
						Contraseña
					</td>
					<td>
						Foto
					</td>
				</tr>
				<?php
					$consulta = mostrarDatos();
					while($dato = $consulta->fetch_assoc()){
				?>
				<tr>
					<td>
						<?php echo $dato['id']; ?>
					</td>
					<td>
					<?php echo $dato['nombre']; ?>
					</td>
					<td>
					<?php echo $dato['pass']; ?>
					</td>
					<td>
						<img src="<?php 
						if($dato['foto'] == 'null'){
							echo 'img/null.png';
						}else{
						echo $dato['foto']; 
						}?>">
					</td>
				</tr>
				<?php
                	}
            	?>
			</table>
			<hr>
			<?php
				if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
					echo '<table>
							<form action="" method="post">
								<tr>
									<td>NOMBRE</td>
									<td><input type="text" name="newName"></td>
									<td>CONTRASEÑA</td>
									<td><input type="text" name="newPass"></td>
								</tr>
								<tr>
									<td>FOTO</td>
									<td><input type="text" name="newFoto"></td>
									<td><input type="submit" value="AGREGAR"></td>
								</tr>
			
							</form>
						</table>';
				}
			?>
			
		</section>
	</nav>
	<footer>
		Andrés Cárdenas &COPY; 2018
	</footer>
	<script src="js/index.js"></script>
</body>
</html>
