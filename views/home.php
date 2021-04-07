<?php
    include_once('../models/conexion.php');
      
    
    $email = $_SESSION['email'];
    
    $sql="SELECT id FROM usuarios WHERE email='$email';";  //para saber la contraseña
    $resultado= mysqli_query($conexion, $sql);            
    $id=mysqli_fetch_array($resultado);

    $consulta="SELECT nombre FROM proyectos WHERE id_usu= '$id[0]'";
    $resultado1= mysqli_query($conexion, $consulta);            
   
    
?>

<div class="container col-md-8"> 

<div class="jumbotron" id="home">
  <h1 class="display-md-4">Hola, Bienvenido!</h1>
  <p class="lead">Espero que estes listo para dejar fluir tu cretividad, 
  no olvides que un escritor profesional es aquel amateur que nunca se dio por vencido. <br></p>
  <hr class="my-4">
  <p>- Escribir es un oficio que se aprende escribiendo... <br>
  Recuerda que dejamos algunos consejos para ti, los cuales te serán de gran ayuda. <br>
  <a href="../controller/consejo.php">Leer consejos...</a></p>
  
  <button class="btn btn-primary btn-md-lg" data-toggle="modal" data-target="#abrir">Abrir un proyecto</button>
  <button class="btn btn-secondary btn-md-lg" data-toggle="modal" data-target="#crear">Crear nuevo proyecto</button>
</div>
    
</div>

<div class="modal fade" id="abrir">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-body">
   
    <div class="col">
    <table class="table">
      <?php
      while ($proyectos=mysqli_fetch_array($resultado1)){
        echo "
        <tr>
          <td>
        ";
         
          echo $proyectos[0];
        echo"
        </td>
      </tr>
        ";
          
      } 
    ?>
        
    
    </table>
    
    
    </div>
    
      </div>
    </div>
  </div>
</div>    





<div class="modal fade" id="crear">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-body">
        <h2>Crear nuevo proyecto</h2>
        <hr>
        <form method="post" action="../models/proyecto.php">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre del proyecto</label>
            <input type="text" class="form-control" id="recipient-name" name="nombre">
          </div>
          
          <div class="modal-footer">
            <input type="submit"  class="btn btn-primary" value="Crear">
        </form>    
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>    