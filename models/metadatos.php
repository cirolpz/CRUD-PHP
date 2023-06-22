<?php
//indica que se utilizara php
session_start();//Inicio de sesion. Esto lo hacemos en todas las paginas que necesitamos mantener la sesion abierta del usuario que accede a nuestro sistema. De esta manera esta siempre dentificado con su perfil propio (Nombre, Apellido, DNI, etc...).
include("../db/claseMysql.php");

if(isset($_POST['User']))//Chequeo o valido con un if que la variante $_POST['User'], contenga un valor. Este valor es el que el usuario final ingreso en la caja de texto con el name "User",del archivo login.html
	$UserIngresado=$_POST['User'];//Si se cumple la condicion del if ( que la caja con el name "User"), contenga datos, es decir que haya escrito (cualquier cosa)

else $UserIngresado;//si no tiene valor, es decir si tiene valor NULL, guardo un espacio vacio. Esto lo hago para evitar un error en el navegador.

if (isset($_POST['Pass']))//Lo mismo para los datos que vienen de la otra caja de texto, es decir que se haya ingresado cualquier cosa y no sea NULL (vacio)

$PassIngresado=$_POST['Pass'];//En caso contrario

else $PassIngresado='';//si no hay valor




$miconexion = new DataBaseMysql;/* le asignamos a $miconexion la clase DataBaseMysql */
$miconexion->conectar("localhost", "root", "", "basededatos");/*a la nueva clase micoxion indicamosa que utilizaremos la funcion conextar y pasaremos los parametros indicados */
$Respuesta = $miconexion->consulta(" SELECT * FROM usuario WHERE User='$UserIngresado' AND Pass='$PassIngresado'");/*Guardaremos los resultado de la consulta indicada en la variable $Respuesta */



$matriz=mysqli_fetch_array($Respuesta);//Convierte a la $Respuesta en una matriz. Esta matriz la debemos imaginar como el conjunto de las filas y columnas de nuestra tabla usuario.
if($matriz){//Verifico con un if, que la matriz contenga datos. Estos datos son los de la tabla usuario de nuestra base de datos: Estos significa que los datos ingresados en las dos cajas de texto del login coinciden.
	$DNI=$matriz['DNI'];//De la matriz completa (nustra tabla usuarios), solo tomo el DNI:$matriz['DNI'] y el valor se lo asigno a la variable $DNI
	$nombre=$matriz['Nombre'];//Igual que arriba pero tomo el Nombre. Es importante escribir Exactamente el nombre de los campos tal cual estan en nuestra tabla usuario, de lo contrario nos aparecera un error
	$apellido=$matriz['Apellido'];//Igual que arriba pero tomo el aplellido. Es importante escribir Exactamente el nombre de los campos tal cual estan en nuestra tabla usuario, de lo contrario nos aparecera un error
	$cargo=$matriz['Cargo'];//Igual que arriba pero tomo el Cargo. Es importante escribir Exactamente el nombre de los campos tal cual estan en nuestra tabla usuario, de lo contrario nos aparecera un error
	$imagen=$matriz['Imagen'];//Igual que arriba pero tomo la Imagen. Es importante escribir Exactamente el nombre de los campos tal cual estan en nuestra tabla usuario, de lo contrario nos aparecera un error

	$UserBase=$matriz['User'];//Igual que arriba pero tomo la UserBase. Es importante escribir Exactamente el nombre de los campos tal cual estan en nuestra tabla usuario, de lo contrario nos aparecera un error
	$PassBase=$matriz['Pass'];//Igual que arriba pero tomo PassBase. Es importante escribir Exactamente el nombre de los campos tal cual estan en nuestra tabla usuario, de lo contrario nos aparecera un error
//A partir de aqui asigno (guardo) el valor obtenido en cada variable $apellido, $nombre, $DNI, $cargo, $imagen en una variable de session distinta, respectivamente:
$_SESSION['Apellido']=$apellido;//De esta manera ESTOY CREANDO una variable de SESSION llamada $_SESSION['Apellido'] y le asigno (guardo) el valor obtenido en la variable $apellido que fue tomado de la $matriz
$_SESSION['Nombre']=$nombre;//Igual que arriba. Creo otra variable de Session para el Nombre (parte del perfil de Usuario como explicamos al principio de este documento). Es importante destacar que el 'Nombre' de la variable $_SESSION['Nombre'], es una variable que podemos llamar como querramos, pero es conveniente mantener nombres significativos
$_SESSION['Cargo']=$cargo;//Igual que arriba. Creo otra variable de Session para el Cargo
$_SESSION['DNI']=$DNI;//Igual que arriba. Creo otra variable de Session para el DNI
$_SESSION['User']=$UserBase;//Igual que arriba. Creo otra variable de Session para UserBase
$_SESSION['Pass']=$PassBase;//Igual que arriba. Creo otra variable de Session para PassBase
}
if ($UserIngresado==$UserBase){// Comparo con un if, lo que ingreso el usuario en la caja de texto con lo que esta guardado en la base de datos. Si coinciden, me voy (redirecciono), directamente el archivo principal, utilizando la funcion location.href de JavaScript} 
//Observe que utilizando JavaScript para validar, dentro de PHP? Realice las pruevas necesarias y comente la experiencia que diferencia hay entre $UserIngresado==$UserBase y $UserIngresado=$UserBase ? Explique la diferencia. La diferencia es que con $UserIngresado==$UserBase estamos comparando las variables y con $UserIngresado=$UserBase estamos asignando el valor de $UserBase a la variable $UserIngresado

echo "<SCRIPT language='JavaScript'>
	location.href='../views/principal.php';
	</SCRIPT>";
}
//Si coinciden, limpio la variable $UserBase=" ", es decir, guardo un espacio y me logeo de nuevo. Tenemos que limpiar la variable para que no se quede guardado el valor y asi poder loguearnos de nuevo. 
else{ $UserBase=" ";//cerramos el php por que escribiremos codigo java script, luego sera abierto para seguir o terminar el codigo php ?>
	<SCRIPT language='JavaScript'>
	alert("El Nombre de Usuario y Contraseña es Incorrecto");
	location.href='../index.php';
	</SCRIPT> <?php
}
if ($PassIngresado==$PassBase){//Se compara si $PassIngresado es igual a $PassBase, si se cumple entonces se mostrara el echo de abajo
	echo "La Contraseña es ".$PassBase;// Claramente no es seguro hacer esto para un usuario no autorizadao, ya que estariamos revelando la contraseña y haciendo que este pueda verla y asi darle la posibilidad de que ingresara a una cuenta con acceso 
}
else{	$PassBase=" ";//cerramos el php por que escribiremos codigo java script, luego sera abierto para seguir o terminar el codigo php ?>
<SCRIPT language='JavaScript'>
	alert("El nombre de usuario y Contraseña es Incorrecto");
	location.href='../index.php';
	</SCRIPT> <?php

}
//Validar User y Pass ($UserIngresado, $PassIngresado, $UserBase, $matriz); Esta funcion es opcional y reemplaza el codigo de arriba de la validacion, es interesante si alguien la quiere implementar
?><!--Se cierra el codigo php -->