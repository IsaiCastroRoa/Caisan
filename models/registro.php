<?php
    include_once('conexion.php');
    mysqli_set_charset($conexion, "utf8");
    $contraseña = $_POST['contraseña'];
    $contraseña_conf= $_POST['contraseña_conf'];

    if($contraseña==$contraseña_conf){
       

        $nombre= $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $email= $_POST['email'];
        $contraseña= password_hash($contraseña, PASSWORD_DEFAULT);
        $sexo= $_POST['sexo'];
    
    
            $sql="INSERT INTO usuarios (nombre, apellido, email, contraseña, sexo, id_roles) ";
            $sql.="VALUES ('$nombre', '$apellido', '$email', '$contraseña', '$sexo', 1);";
            
        
    
        $resultado= $conexion->query("$sql");
        if (mysqli_affected_rows($conexion)>0){
            echo " <script>
            alert('Se guardo correctamente');
            window.location.href='../views/sesion.phtml';
            </script>
            ";
        }else{
            echo " <script>
            alert('No se guardó');
            window.location.href='../views/registro.phtml';
            </script>
            ";
        }
        

    }else{
        echo "
        <script>
        alert('Las contraseñas no coinciden, Intentelo de nuevo.');
        window.location.href='../views/registro.phtml';
        </script>
        ";
    }
    
    mysqli_free_result($resultado);
    mysqli_close($conexion);