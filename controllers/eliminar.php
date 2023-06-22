<?php
include("../models/crud_usuario.php");/*Indicamos que utilizaremos el archivo mensionado*/ 

$DNI=$_GET['DNI'];/* Le asignamos a la variable DNI lo que recibimos de 'DNI', lo que es enviado desde la pagina principal */
$eliminar=new crud_usuario();/**Le asignamos a $eliminar las propiedades de la clase crud_usuario()*/
$respuesta=$eliminar->Eliminar("usuario",$DNI);/*asignamos a la variable $respuesta el resultado de la funcion Editar de editar, tambien le pasamos los parametros necesarios */
if($respuesta)/* Dependiendo si se realizo la consulta nos devolvera si es: */
echo "<script>alert('Usuario Eliminado!!!');
window.location= '../views/principal.php'
</script>";/* Verdadero, generamos un mensaje en forma de alerta y nos redirecciona a la direccion indicada */
die();

echo "<script>alert('Usuario NO Modificado');
window.location= '../views/principal.php'
</script>";/* Falso  generamos un mensaje en forma de alerta y nos redirecciona a la direccion indicada */