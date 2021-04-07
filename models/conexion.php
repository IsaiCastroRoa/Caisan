<?php
$server="localhost";
$user="root";
$db="writer";
$conexion= mysqli_connect($server,$user,"",$db);

mysqli_set_charset($conexion, "utf8");

/* if(!isset($conexion)){
    echo "no";
}else{
    echo "si";
}
 */
?>