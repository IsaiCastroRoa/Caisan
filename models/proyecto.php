<?php
    session_start(); 
    if(!isset($_SESSION['email'])){
        header("location: ../views/sesion.phtml");
    }
    mysqli_set_charset($conexion, "utf8");
    $email = $_SESSION['email'];
      


    include_once('conexion.php');

    $sql= "SELECT id FROM usuarios WHERE email= '$email';";
    $resultado= mysqli_query($conexion, $sql);  
    $id=mysqli_fetch_array($resultado);

   

    $nombre=$_POST['nombre'];
    
    $sql="INSERT INTO proyectos (nombre, fecha_creacion, id_usu) 
    VALUES ('$nombre', now(), $id[0])";

    $resultado= $conexion->query("$sql");
    if (mysqli_affected_rows($conexion)>0){
        echo " <script>
        alert('Se guardo correctamente');
        window.location.href='../controller/start.php';
        </script>
        ";
    }else{
        echo " <script>
        alert('No se guardó');
        window.location.href='../controller/home.php';
        </script>
        ";
    } 

    