<?php
//Utilizaremos codigo php, de esta manera lo indicamos
class conectar{// se crea la clase conectar
	public static function conexion(){//se crea un metodo estatico para solo utilizar el nombre de la clase para llamar al metodo
try{//aqui estara todo el codigo, dentro de este bloque
	$conexion=new PDO('mysql:host-localhost; dbname=login', 'root','');//se crea una variable con la libreia pdo y con todos los datos de nuestra base de datos
	$conexion->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Establece el valor de un atributo en el elemento indicado ($conexion), en este caso ATTR_ERRMODE es un atributo para informar errores ERRMODE_EXCEPTION establecerá sus propiedades para reflejar el error y la información del mismo. Con esto podemos estructurar mejor el manejo de errores.
	$conexion->exec("SET CHARACTER SET UTF8");//establecer tipo de caracteres
}catch(Exception $e){// se captura una posible excepcion
	die("Error" . $e->getMessage());//en caso de que la conexion no tenga exito nos saltara el mesaje del error gracias a getMessage()
	echo "Linea del error" . $e->getLine();//nos dira donde estara la linea del error con getLine()
}//cierra la etiqueta catch
return $conexion;//nos devolvera la conexion si ah tenifo exito
}//cerramos la llave de public static
}//Cerramos las llave de la clase
require_once("views/login.html");//Con require_once Se esta indicando que se agregara el archivo login.html ubicado en la carpeta views
?><!--Cerramos el cofigo PHP-->