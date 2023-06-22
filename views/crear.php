<?php
session_start();//Escribo nuevamente session_start(), para mantener la SESSION abierta del usuario que accedio a nuestro sistema (el que se logeó). No te se que session_start(); está escrito como primer línea de codigo despues del TAG de PHP. Que sucede si dejamos un espacio en blanco arriba de session_start();
require "../controllers/usersController.php";
$apellido=$_SESSION['Apellido'];//Aqui levanto la SESSION. Es decir la SESSION que creamos en el archivo metadatos.php es levantada con $_SESSION['Apellido'] y asignada a la variable $apellido. En el archivo anterior la creamos y aqui la levantamos.
$nombre=$_SESSION['Nombre'];//Lo mismo que arriba
$cargo=$_SESSION['Cargo'];//Lo mismo que arriba
$user=$_SESSION['User'];//Lo mismo que arriba
$pass=$_SESSION['Pass'];//Lo mismo que arriba
$imagen=$_SESSION['Imagen'];//Lo mismo que arriba
$DNI=$_SESSION['DNI'];//Lo mismo que arriba






//Aqui debemos completar el código que muestre el contenido de las variables que se encuentra arriba 
"Apellido:" . $apellido . "<br>";//Estamos mostrando el contenido de las variables de manera ordenada
"Nombre:" . $nombre . "<br>";//Estamos mostrando el contenido de las variables de manera ordenada
 "Cargo:" . $cargo . "<br>";//Estamos mostrando el contenido de las variables de manera ordenada
 "DNI:" . $DNI;//Estamos mostrando el contenido de las variables de manera ordenada

$imagen=$_SESSION['Imagen'];//La imagen es una foto de perfil del usuario que de logueó

//Porqué cierro PHP aqui y lo abro nuevamente abajo? cerramos php por que introduciremos etiquetas html
?>

<body><!-- Creamos el body -->

	<title>SIGEFLEX</title><!--Estamos agregando un titulo -->
	<meta charset="utf-8"><!--Especifica la codificación de caracteres para el documento HTML -->
<link rel="stylesheet" href="../views/CSS/bootstrap.min.css"><!-- Link Es usado para incorporar estilos, códigos Javascript, imágenes o iconos desde archivos externos. rel relacion entre el documento y el archivo, informa al navegador que tipo de archivo se enviara. href incorpora el archivo querido, con type le dice al navegador a qué tipo de recurso se está vinculando. -->
<link rel="stylesheet" href="../views/CSS/principal.css"><!-- Link Es usado para incorporar estilos, códigos Javascript, imágenes o iconos desde archivos externos. rel relacion entre el documento y el archivo, informa al navegador que tipo de archivo se enviara. href incorpora el archivo querido, con type le dice al navegador a qué tipo de recurso se está vinculando. -->
		<div class="row">
			<div class="col-11 bg-secondary">

				<p class="text-white">SIGEFLEX</p>
			</div>
			<div class="col-1 bg-secondary">
			
				<p class="text-white">DNI:<?php echo $DNI; ?></p>
			</div>
		</div>


		<div class="alinear">
			<div id="wrapper">
			<div id="menu" class="sidebar-expanded col-12 d-none d-md-block">
			<ul class="nav navbar-nav list-group sticky-top sticky-offset">
				   

					<img src="../views/logo.png" width="90" height="100">
				<br>
					<br>
					<br>
				<nav class="navbar navbar-ligth bd-fade">
					<a href="#" class="navbar-brand text-danger"><?php echo " ".$nombre." ". $apellido; ?></a></nav>
					<br><br><br><br><br><br><br><br><br><br><br>
					<li>
					<a href="#"class="d-block p-3 text-warning ">Inicio </a>
					</li>

					<li>
					<a href="#"class="d-block p-3 text-warning ">Mensaje </a>
					</li>
	
					<li>
					<a href="#"class="d-block p-3 text-warning ">Calendario </a>
	
					<li>
					<a href="#"class="d-block p-3 text-warning  ">Archivos </a>
					</li>

					<li>
					<a href="#"class="d-block p-3 text-warning ">Mis Datos </a>
					</li>

					<li>
					<a href="#" class="d-block p-3 text-warning " >Carrera/Plan</a>
					</li>
					<li>
					<a href="#" class="d-block p-3 text-warning ">Cursada </a>
					</li>
					<br><br><br><br>


				</ul>
		</div>
	</div>

<div class="container">
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<div class="row">
	<div class="col-10"></div>
	<div class="col-2">

</div>


<form class="container-table container-table--edit" action="../controllers/insertar.php" method="POST"><!-- Nos redireccionara al archivo mensionado y mandara de tipo POST la informacion ingresada por el usuario -->
<div class="row"></div>
	<div class="col-5"></div>
	<div class="col-12">
<div class="table-responsive">
<table class="table table-bordered">
	<tr>
		<th>DNI</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Cargo</th>
		<th>Usuario</th>
		<th>Contrasenia</th>
		<th>Imagen</th>
		<th>Acciones</th>		
	</tr>

	<?php 



		echo "<tr>";
		echo "<td>" ?><input type="number" class="table__item" name="DNI"><?php echo "</td>";/* Crearemos un input en el cual podremos ingresar los datos correspondientes al nuevo usuario, nos indicara cual es el dato es el que hay que guardar */
		?>
	<?php	echo "<td>" ?><input type="text" class="table__item" name="Nombre"><br><?php echo "</td>";/* Crearemos un input en el cual podremos ingresar los datos correspondientes al nuevo usuario, nos indicara cual es el dato es el que hay que guardar */
		?>
		<?php	echo "<td>" ?><input type="text" class="table__item" name="Apellido"><?php	echo "</td>";/* Crearemos un input en el cual podremos ingresar los datos correspondientes al nuevo usuario, nos indicara cual es el dato es el que hay que guardar */
		?>
		<?php	echo "<td>" ?><input type="text" class="table__item" name="Cargo"><?php echo "</td>";/* Crearemos un input en el cual podremos ingresar los datos correspondientes al nuevo usuario, nos indicara cual es el dato es el que hay que guardar */
		?>
		<?php	echo "<td>" ?><input type="text" class="table__item" name="User"><?php echo "</td>";/* Crearemos un input en el cual podremos ingresar los datos correspondientes al nuevo usuario, nos indicara cual es el dato es el que hay que guardar */
		?>
		<?php	echo "<td>" ?><input type="text" class="table__item" name="Pass"><?php echo "</td>";/* Crearemos un input en el cual podremos ingresar los datos correspondientes al nuevo usuario, nos indicara cual es el dato es el que hay que guardar */
		?>
		<?php	echo "<td>" ?><?php echo "</td>";/* Crearemos un input en el cual podremos ingresar los datos correspondientes al nuevo usuario, nos indicara cual es el dato es el que hay que guardar */
		?>
		
		<td><button type="submit" class="btn btn-success">Guardar</button></td><!-- Crearemos un boton el cual contendra el texto Guardar -->


	</tr>
</table>
</div>
</div>
</div>
</form>

<div class="row"></div>
	<div class="col-4"></div>
	<div class="col-10">
<br><br>
<nav aria-label="Ejemplo de paginacion">
	<ul class="pagination justify-content-center">

		<li class="page-item active">
			<span class="page-link">Pagina 1-3</span>
		</li>

		<li class="page-item disabled">
			<a href="#" class="page-link">Anterior</a>
		</li>
		<li class="page-item active">
			<span class="page-link">1</span>
		</li>
		<li class="page-item">
			<a href="#" class="page-link">2</a>
		</li>
		<li class="page-item">
			<a href="#" class="page-link">3</a>
		</li>
		<li class="page-item">
			<a href="#" class="page-link">Siguiente</a>
		</li>
</ul>
</nav>
</div>
</div>
</div>
</div>
</div>
<?php
//Aqui trabajaremos el contenido de nuestro archivo principal en un proximo trabajo
?>	
</div><!--Estamos cerrando la etiqueta div -->
</body><!--Estamos cerrando la etiqueta body -->