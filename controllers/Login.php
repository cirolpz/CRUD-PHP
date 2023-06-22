<?php
//indica que se utilizara php
if ($_SERVER['REQUEST_METHOD']=='POST'){//estamos verificar el método de solicitud  
$usuario=$_POST['User'];//obtiene los datos ingresados y se guardan en la variable usuario
$contrasenia=$_POST['Pass'];//obtiene los datos ingresados y se guardan en la variable contrasenia
//conectar a la base de datos
}
include ("principal.php");//incluimos el archivo de funciones.php para poder utilizar funciones de este archivo
$Conex=Conexion("localhost","root"," ","basededatos");//Asignamos a la variable Conex la fucion Conexion y en parametros mandamos la informacion de nuestra base de datos
$resultado=EjecutarConsulta($Conex,"SELECT * FROM usuarios WHERE usuario='$usuario'and contrasenia='$contrasenia'");//Estamos agregando la funcion EjecutarConsulta adentro de una variable con el nombre resultado para pode rutilizarla en este archivo, se ingresa como parametros la conexion de nuestra base de datos en forma de variable Conex y tambien se envia la realizacion de una consulta sql=  SELECT * FROM usuarios = Que seleccione todo de la tabla usuarios.  WHERE usuario='$usuario' = Donde usario campo sea igual a usuario variable. and contrasenia='$contrasenia' = y que el campo contrasenia sea igual a la variable contrasenia.


$res= MostrarTabla("SELECT * FROM usuarios WHERE usuario='$usuario'and contrasenia='$contrasenia'");
//Estamos utilizando nuestra nueva funcion, le mandamos como parametro la consulta y se almacena el valor que esta retrona en la variable res

$filas=mysqli_num_rows($res); // Validacion, se obtiene el numero de filas, si coincide un uno, si no un 0

if($filas>0){ //se compara la variable filas, si es mayor a 1

header("location:bienvenido.html"); //si el resultado logro pasar el if se redireccionara a esta pagina

}//Llave de cierre
else{//en caso de ser 0
	echo "Problemas de Autenticacion";//da un mensaje de error
}//Llave de cierre
mysqli_free_result($resultado);//cancela el resultado y libera la memoria
mysqli_close($Conex);// cancela la conexion y libera la memoria
?><!--Se cierra el codigo php -->