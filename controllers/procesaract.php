
<?php
include("../models/crud_usuario.php");/* Indicamos que necesitaremos el siguiente archivo*/
$DNI=$_POST['DNI']; /*Guardamos en la variable DNI el dato que se recibe del formulario con el nombre DNI */
$nombre=$_POST['Nombre'];/*Guardamos en la variable Nombre el dato que se recibe del formulario con el nombre Nombre */
$Apellido=$_POST['Apellido'];/*Guardamos en la variable Apellido el dato que se recibe del formulario con el nombre Apellido */
$Cargo=$_POST['Cargo'];/*Guardamos en la variable  Cargo el dato que se recibe del formulario con el nombre  Cargo*/
$User=$_POST['User'];/*Guardamos en la variable User el dato que se recibe del formulario con el nombre User */
$Pass=$_POST['Pass'];/*Guardamos en la variable Pass el dato que se recibe del formulario con el nombre Pass */


$editar=new crud_usuario();/*A la variable $editar le asignamos la clase DataBaseMysql */
$respuesta=$editar->Editar("usuario",$DNI, $nombre, $Apellido, $Cargo, $User, $Pass);/*asignamos a la variable $respuesta el resultado de la funcion Editar de editar, tambien le pasamos los parametros necesarios */
if($respuesta)/* Dependiendo si se realizo la consulta nos devolvera si es: */
   echo "<script>alert('Usuario Modificado exitosamente!!!');
   window.location= '../views/principal.php'
</script>";/* Verdadero, generamos un mensaje en forma de alerta y nos redirecciona a la direccion indicada */
   die();

echo "<script>alert('Usuario NO Modificado');
window.location= '../views/principal.php'
</script>";/* Falso  generamos un mensaje en forma de alerta y nos redirecciona a la direccion indicada */

?>
