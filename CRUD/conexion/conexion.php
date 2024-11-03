<?php
/**Función para la conexión a la base de datos */
function conexionBD(){
    $server = "localhost";
    $usuario = "root";
    $password = "";
    $db = "crud";

    $conex = mysqli_connect($server, $usuario, $password, $db);
    $conex->set_charset('utf8');
    if(!$conex){
        echo 'Conexión fallida' . mysqli_connect_error();
    }

    return $conex;
}
?>