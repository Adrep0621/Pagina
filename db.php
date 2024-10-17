<?php
function conn(){
    $hostname="localhost";
    $usuariodb="root";
    $password="";
    $dbname="pagina";

    $conectar = mysqli_connect($hostname,$usuariodb,$password,$dbname);
    return $conectar;
}


?>
