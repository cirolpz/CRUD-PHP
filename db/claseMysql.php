<?php /*Etiqueta de apertura, de nuestro codigo php */
error_reporting(0);
class DataBaseMysql{
    var $BaseDatos;
    var $Servidor;
    var $Usuario;
    var $Clave;
    var $Conexion_ID = 0;
    var $Consulta_ID = 0;
    var $Errno = 0;
    var $Error = "";

    public function __construct($host = "localhost", $user = "root", $pass = "", $bd = "basededatos") {
    
        $this->Servidor = $host;
        $this->Usuario = $user;
        $this->Clave = $pass;
        $this->BaseDatos = $bd;
    }

    /*Conexión a la base de datos*/

function conectar($host, $user, $pass, $bd){

    if ($host != "") $this->Servidor = $host;
    
    if ($user != "") $this->Usuario = $user;
    
    if ($pass != "") $this->Clave = $pass;

    if ($bd != "") $this->BaseDatos = $bd;
     
    
    // Conectamos al servidor

    $this->Conexion_ID = mysqli_connect($this->Servidor, $this->Usuario, $this->Clave, $this->BaseDatos);
    
    if (!$this->Conexion_ID) {
    
    $this->Error = "Ha fallado la conexión.";
    
    return 0;
    
    } 
    
    /* Si hemos tenido éxito conectando devuelve 
    
    el identificador de la conexión, sino devuelve 0 */
    
    return $this->Conexion_ID;
    
    }
   
   /* Ejecuta un consulta */

function consulta($sql = ""){

    if ($sql == "") {
    
    $this->Error = "No ha especificado una consulta SQL";
    
    return 0;
    
    }
    
    //ejecutamos la consulta
    $this->Consulta_ID = @mysqli_query($this->Conexion_ID, $sql);

     
    
    if (!$this->Consulta_ID) {
    
    $this->Errno = mysqli_errno();
    
    $this->Error = mysqli_error();
    
    }
    
    /* Si hemos tenido éxito en la consulta devuelve el identificador de la conexión, sino devuelve 0 */
    return $this->Consulta_ID;
    }
    
    /* Devuelve el número de campos de una consulta */
    function numcampos() {
    return mysqli_num_fields($this->Consulta_ID);
    }

    /* Devuelve el número de registros de una consulta */
    function numregistros(){
    return mysqli_num_rows($this->Consulta_ID);
    }
    
    /* Devuelve el nombre de un campo de una consulta */
    function nombrecampo($numcampo) {
    return mysqli_field_name($this->Consulta_ID, $numcampo);
    }
    
    
    /* Muestra los datos de una consulta */
    function verconsulta() {
    echo "<table border=1>\n";

    // mostramos los nombres de los campos
    for ($i = 0; $i < $this->numcampos(); $i++){
    echo "<td><b>".$this->nombrecampo($i)."</b></td>\n";
    }
    
    echo "</tr>\n";
    
    // mostrarmos los registros
    
    while ($row = mysqli_fetch_row($this->Consulta_ID)) {
    
    echo "<tr> \n";
    
    for ($i = 0; $i < $this->numcampos(); $i++){
    
    echo "<td>".$row[$i]."</td>\n";
    
    }
    
    echo "</tr>\n";
    
    }
    }
}
    

?> <!--Etiqueta de cierre de nuestro codigo php. -->

