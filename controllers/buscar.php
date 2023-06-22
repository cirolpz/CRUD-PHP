<?php
session_start();//Escribo nuevamente session_start(), para mantener la SESSION abierta del usuario que accedio a nuestro sistema (el que se logeó). No te se que session_start(); está escrito como primer línea de codigo despues del TAG de PHP. Que sucede si dejamos un espacio en blanco arriba de session_start();
include("../controllers/usersController.php");/*Indicamos que utilizaremos el archivo mensionado*/ 


$apellido=$_SESSION['Apellido'];//Aqui levanto la SESSION. Es decir la SESSION que creamos en el archivo metadatos.php es levantada con $_SESSION['Apellido'] y asignada a la variable $apellido. En el archivo anterior la creamos y aqui la levantamos.
$nombre=$_SESSION['Nombre'];//Lo mismo que arriba
$cargo=$_SESSION['Cargo'];//Lo mismo que arriba
$DNI=$_SESSION['DNI'];//Lo mismo que arriba

//Aqui debemos completar el código que muestre el contenido de las variables que se encuentra arriba 
"Apellido:" . $apellido . "<br>";//Estamos mostrando el contenido de las variables de manera ordenada
"Nombre:" . $nombre . "<br>";//Estamos mostrando el contenido de las variables de manera ordenada
 "Cargo:" . $cargo . "<br>";//Estamos mostrando el contenido de las variables de manera ordenada
 "DNI:" . $DNI;//Estamos mostrando el contenido de las variables de manera ordenada

$imagen=$_SESSION['Imagen'];//La imagen es una foto de perfil del usuario que de logueó



$busqueda=strtolower($_REQUEST['busqueda']);/* Le asignamos a la variable busqueda lo que recibimos de la pagina principal con el nombre de 'busqueda', tambien estamos cambiando este valor para que sea en minuscula*/
if(empty($busqueda))/*Si la variable busqueda esta vacia */
{
    header("location: ../views/principal.php");/* Nos redirecciona a la pagina principal */
}

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
	<div class="col-8"></div>
	<div class="col-4">
<form action="../controllers/buscar.php" method="get" class="form-inline"><!-- Pasaremos la informacion con el metodo get al archivo mencionado -->
<input class="form-control mr-sm-2" type="text" name="busqueda" id="busqueda" placeholder="Busqueda" aria-label="Search" value="<?php echo $busqueda; ?>"><!-- se crea la barra de busqueda, tambien nos mostrara el valor escrito anteriormente -->
<input type="submit" value="Buscar" class='btn btn-success'><!-- Creamos un boton al que indicamos que sera de tipo submit, le proporcionamos una clase y nos mostrara la palabra Buscar -->

</form>

</div>

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

	if (class_exists("usersController")){/*si existe la clase usersController */
		$tabla='usuario';/*En la variable tabla le asignaremos los valores de 'usuario' */
		$users = new usersController();/*Le asignamos la clase usersConroller() a $users */
		$allUsers = $users->getBrowserUsers($tabla,$busqueda);/*$allUsers recibiera los resultados de los cambios realizados a los parametros que seran enviados a la funcion getBrowserUsers de $users */
		
		foreach ($allUsers as $user){/*Se reccorrera el array y cada valor se le asignara a $user */
		echo "<tr>";/*Crearemos una fila de una nueva tabla*/
		echo "<td>" . $user['DNI'] . "</td>";/*Se muestra los valores de $user que fueron asignados por el array, en forma de tabla*/
		echo "<td>" . $user['Nombre'] . "</td>";/*Se muestra los valores de $user que fueron asignados por el array*/
		echo "<td>" . $user['Apellido'] . "</td>";	/*Se muestra los valores de $user que fueron asignados por el array*/
		echo "<td>" . $user['Cargo'] . "</td>";/*Se muestra los valores de $user que fueron asignados por el array*/
		echo "<td>" . $user['User'] . "</td>";/*Se muestra los valores de $user que fueron asignados por el array*/
		echo "<td>" . $user['Pass'] . "</td>";/*Se muestra los valores de $user que fueron asignados por el array*/
		echo "<td>" . $user['Imagen'] . "</td>";/*Se muestra los valores de $user que fueron asignados por el array*/
	
		echo "<td><a href='../views/actualizar.php?DNI=".$user['DNI']."''><button type='button' class='btn btn-success'>Editar</button></a> ";/*Se crea un boton e indicamos que este al ser presionado enviaremos los datos del $user['DNI'] a la direccion indicada en el href*/
		echo " <a href='../controllers/eliminar.php?DNI=".$user['DNI']."''><button type='button' class='btn btn-danger'>Eliminar</button></a> </td>";/*Se crea un boton e indicamos que este al ser presionado enviaremos los datos del $user['DNI'] a la direccion indicada en el href*/
		}
	}
	  echo " <a href='../views/crear.php?DNI= ><button type='button' class='btn btn-warning'>Crear User</button></a>";/*Se crea un boton e indicamos que este al ser presionado nos redireccionara a la direccion indicada en el href*/
	?>		
		</tr>

	
</table>
</div>
</div>
</div>


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