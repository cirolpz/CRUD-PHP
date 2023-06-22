<?php
class model
{
    protected $db;/* Creamos una variable protected llamada $db*/
    public function __construct()/* Crearemos la funcion construct*/
{

    
    $this->db = new Mysqli("localhost", "root", "", "basededatos");/* la variable db pasara a ser una clase Mysqli, pasaremos los parametros indicados para conectarnos a la base de datos*/
    $this->db->set_charset("utf8");/* Utilizaremos caractreres UTF8*/
}

public function getAllUsers()/* creamos una funcion llamada getAllUsers de tipo publica */
{
    $sql= "SELECT * FROM usuario";/* a la variable sql se utilizara para guardar una consulta*/
    return $this->db->query($sql);/*Esta funcion reotrnara el resultado de la consulta */
}
public function __destruct()/* Crearenos la funcion __destruct*/
{
    $this->db->close();/* Esta funcion nos sacara de la base de datos*/
}
}
?>