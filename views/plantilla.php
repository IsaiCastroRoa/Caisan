<?php
include_once('../models/conexion.php');

session_start(); 
  
if(!isset($_SESSION['email'])){
  header("location: ../views/sesion.phtml");
}

$email = $_SESSION['email'];

  $sql= "SELECT nombre, apellido FROM usuarios WHERE email= '$email';";
  $resultado=$conexion->query($sql);

  $row=$resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Writers Caisan</title>
    <link rel="shortcut icon" href="../img/ICONO.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<div class="container col" >
<nav class="navbar navbar-expand-md" id="nav">

      <a class="navbar-brand" href="../controller/home.php">
      <label class="form-inline">
            <img src="../img/LOGO.svg" class="d-inline-block align-top">
      </label>
        </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <img src="../icons/menu.svg">
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="#">¿Quiénes somos?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../controller/consejo.php">Consejos</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#">Contacto</a>
      </li>
    </ul>
    
  </div>
 
  <li class="form-inline nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php
        echo utf8_decode($row['nombre']);
        echo ' ';
        echo utf8_decode($row['apellido']); ?>
        <img src="../icons/perfil.svg">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Perfil</a>
          <a class="dropdown-item" href="#">Configuración</a>
          <a class="dropdown-item" href="../views/secure/seguridad.phtml">Seguridad</a>
          <div class="dropdown-divider"></div>
          <a class="nav-link" href="../controller/salir.php" id="out">Salir</a>
        </div>
      </li>
</nav>

<?php require_once($contenido); ?>
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>