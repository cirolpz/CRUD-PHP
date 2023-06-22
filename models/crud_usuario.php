<?php
include("../db/claseMysql.php");  /*Indicamos que utilizaremos el archivo mencionado */

class crud_usuario{/*Crearemos la clase crud_usuario que luego sera utilizadas en otros archivos */
   
public function __construct()/* Se Crea una funcion publica llamada __construct, esta contiene la conexion a la base de datos*/
{
    $miconexion5= new DataBaseMysql();/* Indicamos que la variable $miconexion5 sera una clase DataBaseMysql()*/
    $this->db= $miconexion5->conectar("localhost", "root", "", "basededatos");/* Nos conrectaremos a la base de datos atravez de la nueva clase $miconexion5 y asignaremos el resultado en la variable db */
    $this->db->set_charset("utf8");/*Indicamos que utilizaremso caracteres "utf8" */
}

    public function Nuevo($tabla,$id, $nom, $ape, $car,$use,$pas){    /* Se Crea una funcion publica llamada Nuevo y se recibira las variables $tabla,$id, $nom, $ape, $car,$use,$pas como paramtero para ser utilizadas dentro de la funcion*/
        $sql= "INSERT INTO $tabla(DNI,Nombre,Apellido,Cargo,User,Pass) VALUES ('$id', '$nom', '$ape', '$car', '$use', '$pas')";
        return $this->db->query($sql);/*Se realiza la consulta que sera retornado el resultado, esto se hace conectandonos a la base de datos y con query(la variable que contiene la consulta, en este caso $sql)*/ 

}
    public function Eliminar($tabla,$DNI){ /* Se Crea una funcion publica llamada Eliminar y se recibira las variables $tabla,$DNI como paramteros para ser utilizadas dentro de la funcion*/
        $sql="DELETE FROM $tabla WHERE DNI='$DNI'";/* Se redacta la consulta*/
        return $this->db->query($sql);/*Se realiza la consulta que sera retornado el resultado, esto se hace conectandonos a la base de datos y con query(la variable que contiene la consulta, en este caso $sql)*/ 
      
    }

    public function Editar($tabla,$id, $nom, $ape, $car,$use,$pas){    /* Se Crea una funcion publica llamada Editar y se recibira las variables $tabla,$id, $nom, $ape, $car,$use,$pas como paramtero para ser utilizadas dentro de la funcion*/
        $sql="UPDATE $tabla SET Nombre='".$nom."', Apellido= '".$ape."', Cargo='".$car."', User= '".$use."', Pass= '".$pas."' WHERE DNI='".$id."' ";/* Se redacta la consulta*/
        return $this->db->query($sql);/*Se realiza la consulta que sera retornado el resultado, esto se hace conectandonos a la base de datos y con query(la variable que contiene la consulta, en este caso $sql)*/ 
    }

    public function Buscar($tabla,$condicion){    /* Se Crea una funcion publica llamada Buscar y se recibira las variables $tabla,$condicion como paramteros para ser utilizadas dentro de la funcion*/
        $sql = "SELECT * FROM $tabla WHERE $condicion";/* Se redacta la consulta*/
        return $this->db->query($sql);/*Se realiza la consulta que sera retornado el resultado, esto se hace conectandonos a la base de datos y con query(la variable que contiene la consulta, en este caso $sql)*/ 
}
    public function getAllUsers($tabla)/* Se Crea una funcion publica llamada getAllUsers y se recibira la variable $tabla como paramtero para ser utilizadas dentro de la funcion*/
{
      $sql= "SELECT * FROM $tabla";/* Se redacta la consulta*/
     return $this->db->query($sql);/*Se realiza la consulta que sera retornado el resultado, esto se hace conectandonos a la base de datos y con query(la variable que contiene la consulta, en este caso $sql)*/ 
}

    public function getOneUsers($tabla,$DNI)/* Se Crea una funcion publica llamada Editar y se recibira las variables $tabla,$id, $nom, $ape, $car,$use,$pas como paramtero para ser utilizadas dentro de la funcion*/
{
        $sql= "SELECT * FROM $tabla WHERE DNI = '$DNI'";/* Se redacta la consulta*/
        return $this->db->query($sql);/*Se realiza la consulta que sera retornado el resultado, esto se hace conectandonos a la base de datos y con query(la variable que contiene la consulta, en este caso $sql)*/ 
}
    public function __destruct()/* Se Crea una funcion publica llamada Editar y se recibira las variables $tabla,$id, $nom, $ape, $car,$use,$pas como paramtero para ser utilizadas dentro de la funcion*/
{
    $this->db->close();/*le asignamos a db la propiedad de la funcion close()*/
}
    public function getBrowserUsers($tabla,$busqueda)/* Se Crea una funcion publica llamada Editar y se recibira las variables $tabla,$id, $nom, $ape, $car,$use,$pas como paramtero para ser utilizadas dentro de la funcion*/
{
        $sql= "SELECT * FROM $tabla WHERE  DNI LIKE '%$busqueda%' OR Nombre LIKE '%$busqueda%' OR Apellido LIKE '%$busqueda%' OR User LIKE '%$busqueda%' OR Cargo LIKE '%$busqueda%' OR Pass LIKE '%$busqueda%'";/* Se redacta la consulta*/
        return $this->db->query($sql);/*Se realiza la consulta que sera retornado el resultado, esto se hace conectandonos a la base de datos y con query(la variable que contiene la consulta, en este caso $sql)*/ 
}
    public function Mostrar($tabla,$condicion){   /* Se Crea una funcion publica llamada Editar y se recibira las variables $tabla,$id, $nom, $ape, $car,$use,$pas como paramtero para ser utilizadas dentro de la funcion*/ 
        $sql= "SELECT * FROM $tabla WHERE $condicion";/* Se redacta la consulta*/
        return $this->db->query($sql);/*Se realiza la consulta que sera retornado el resultado, esto se hace conectandonos a la base de datos y con query(la variable que contiene la consulta, en este caso $sql)*/ 
}
}
?>