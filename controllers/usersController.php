<?php

require_once "../models/crud_usuario.php";/*Indicamos que se necesitara el archivo mensionado*/ 

class usersController{/*Creamos una clase para despues ser utilizada en otros archivos*/

    private $model;/*Creamos una variable que solo podra ser utilizada en esta clase y nadie podra cambiarla*/

    public function __construct()/*Craemos una funcion publica llamada __construct()*/
    {
        $this->model = new crud_usuario();/*le asignamos a $model los valores de la clase crud_usuario(), lo estamos haciendo con una funcion flecha*/
    }
    public function getBrowserUsers($tabla,$busqueda)/*Craemos una funcion publica llamada __getBrowserUsers(), ademas pasaremos como parametro las variables $tabla y $busqueda*/
    {
        $ret = $this->model->getBrowserUsers($tabla,$busqueda)->fetch_all(MYSQLI_ASSOC);/*le asignamos a $model los valores de la clase __cgetBrowserUsers(), lo estamos haciendo con una funcion flecha*/
         return $ret;/*Retornaremos los valores de la variable $ret*/
    }
    public function getAllUsers($tabla)/*Craemos una funcion publica llamada getAllUsers() ademas pasaremos como parametro las variables $tabla*/
    {
        $ret = $this->model->getAllUsers($tabla)->fetch_all(MYSQLI_ASSOC);/*le asignamos a $model los valores de la clase getAllUsers(), lo estamos haciendo con una funcion flecha*/
         return $ret;/*Retornaremos los valores de la variable $ret*/
    }
        
    public function getOneUsers($tabla,$DNI)/*Craemos una funcion publica llamada getOneUsers(), ademas pasaremos como parametro las variables $tabla y $DNI*/
    {
        $ret = $this->model->getOneUsers($tabla,$DNI)->fetch_all(MYSQLI_ASSOC);/*le asignamos a $model los valores de la clase getOneUsers(), lo estamos haciendo con una funcion flecha*/
         return $ret;/*Retornaremos los valores de la variable $ret*/
    }

    }
    ?>