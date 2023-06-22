<?php
error_reporting(0);//Investigue para que sirve esta funcion. Que ocurre si no estuviese? Esta funcion es la que establece cuáles errores de PHP son notificados, al utilizar ésta función se define el nivel de duración (tiempo de ejecución) de sus scripts. Si el parámetro opcional level no se define, la función error_reporting() sólo devolverá el nivel actual de notificación de error. En este caso estamos desactivando toda la notificacion de error, gracias a esto no nos mostrara un mensaje de error, si no estuviese nos mostraria una notidificacion de error
function Conexion ($Con){//Crea la funcion llamada Conexion con el parametro $Con
	$link=mysqli_connect("localhost","root","",$Con)//Realiza una nueva conexion con los parametros (configuracion) necesaria. Cual es esta configuracion? Explique. Estamos asignandole la operacion a $link de conectarnos a la base de datos, para eso tendremos que indicarle los valores de la misma que son los siguientes: localhost= Nombre del dominio  root=Usuario  ""=clave  $Con=Nombre de base de datos 

	or die("Error de conexion");//En caso de que exista un error se mostrara este cartel. En que casos puede aparecer este cartel? Puede aparecer este error si escribimos mal la conexion o si hay problemas con la base de datos
	return $link;//A donde me lleva esta linea de codigo?. Que contiene $link? Ahora estamos retornando la variable $link que previamente habiamos indicado que la utilizaremos para dirigirnos a nuestra base de datos, y eso es lo que hara, nos dirigiremos a la base de datos que tiene indicada esta variable
}
function Ejecutar_Consulta ($link,$Con){//Que parametros recibe esta funcion? Que archivo llama a esta funcion? Esta recibiendo 2 parametros, uno es la variable link con los datos de nuestra base de datos, y otro es $Con con el nombre de nuestra base de datos, $Con tendria que tener la consulta que haremos
	$R=mysqli_query($link,$Con);//se esta asignando a la variable R una consulta del valor de $link, $Con en este caso tendria que ser nuestra consulta
	return $R;//Nos devolvera el resultado de la consulta
}

// La caché sí funciona
function Ejecutar_Consulta1 ($link){
$hoy = date("Y-m-d");
$r = mysql_query($link,"SELECT basededatos FROM usuario WHERE registro >= ‘$hoy’");
}
?>