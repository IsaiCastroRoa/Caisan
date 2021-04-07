<?php
    session_start(); 
    if(!isset($_SESSION['email'])){
        header("location: ../views/sesion.phtml");
    }
      
    $email = $_SESSION['email'];
      


    include_once('conexion.php');

    $pass0=$_POST['pass0'];
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];
    mysqli_set_charset($conexion, "utf8");
        $sql="SELECT contraseña, id FROM usuarios WHERE email='$email';";  //para saber la contraseña
        $resultado1= mysqli_query($conexion, $sql);
                
        $filas=mysqli_fetch_array($resultado1); // la contraseña se almacena en el array $filas[0]
        
        if (password_verify($pass0, $filas[0])){ // proceso de verificación
            
            if ($pass1==$pass2){
                $pass1= password_hash($pass1, PASSWORD_DEFAULT);
               
                
                $sql="UPDATE usuarios SET contraseña = '$pass1' WHERE email = '$email'; ";
                $resultado= $conexion->query("$sql");

                echo $pass1;
                if (mysqli_query($conexion, $sql)) {
                    echo " <script>
                    alert('Se actualizó correctamente la contraseña, Vuelve a iniciar sesión.');
                    window.location.href='../controller/salir.php';
                    </script>
                    ";
                  } else {
                    echo " <script>
                    alert('No se pudo actualizar');
                    window.location.href='../controller/seguridad.php';
                    
                    </script>
                    ";
                  }
               
            

            }else{
                echo "
                <script>
                alert('las contraseñas no coinciden');
                window.location.href='../controller/seguridad.php';
                </script>
                ";
            } 

        }else{
            echo "
            <script>
            alert('la contraseña es incorrecta');
            window.location.href='../controller/seguridad.php';
            </script>
            ";
           
        }
    


        mysqli_free_result($resultado1);
        mysqli_close($conexion);