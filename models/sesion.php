<?php

include_once('conexion.php');

$email=$_POST['email'];
$contraseña=$_POST['contraseña'];     //Datos recibidas por medio de post

mysqli_set_charset($conexion, "utf8");

$sql="SELECT COUNT(*) AS contar FROM usuarios WHERE email='$email'; "; //Mi metodo para saber si el correo existe
$resultado= mysqli_query($conexion, $sql);

$filas=mysqli_fetch_array($resultado);

if($filas['contar']>0){
    $sql="SELECT contraseña, id FROM usuarios WHERE email='$email';";  //para saber la contraseña

    $resultado1= mysqli_query($conexion, $sql);

    $filas=mysqli_fetch_array($resultado1); // la contraseña se almacena en el array $filas[0]

    if (password_verify($contraseña, $filas[0])){ // proceso de verificación
        session_start(); 
        $_SESSION['email']=$email;
        
        $login="INSERT INTO logins VALUES(now(), now(), $filas[1]);";
        $resultado2 = $conexion->query("$login");
        if (mysqli_affected_rows($conexion)>0){

        echo "
        <script>
        alert('Guardao crack');
       
        </script>
        ";
        }
        header("location: ../controller/home.php");
    }else{
        echo "
        <script>
        alert('la contraseña es incorrecta');
        window.location.href='../views/sesion.phtml';
        </script>
        ";
    }

}else {
    echo "
        <script>
        alert('El correo no existe');
        window.location.href='../views/sesion.phtml';
        </script>
        ";

} 
mysqli_free_result($resultado);
mysqli_close($conexion);
 