<?php
session_start(); 
$email = $_SESSION['email'];
if(!isset($email)){
    header("location: ../views/sesion.phtml");
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comenzamos...</title>
    <link rel="shortcut icon" href="../img/ICONO.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <div class="container col-10" >
        <nav class="navbar navbar-expand-md" >

            <a class="navbar-brand" href="start.php">
                <label class="form-inline">
                    <img src="../img/ICONO.svg" class="d-inline-block align-top"> 
                 </label>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="../icons/menu.svg">
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
                <ul class="nav nav-tabs nav-justified-center" id="myTab" role="tablist">
                    <li>
                       <a class="nav-link" href="../controller/proyecto.php">Proyecto</a> 
                    <li>
                        <a class="nav-link" href="../controller/arquitectura.php">Arquitectura</a>
                    </li> 
                    <li>
                        <a class="nav-link" href="#personajes">Personajes</a>
                    </li> 
                    <li>
                        <a class="nav-link" href="#Lugares">Lugares</a>
                    </li> 
                    <li>
                        <a class="nav-link" href="#Objetos">Objetos</a>
                    </li> 
                    <li>
                        <a class="nav-link" href="#Sustancias">Sustancias</a>
                    </li> 
                    <li>
                        <a class="nav-link" href="#Capitulos">Capítulos</a>
                    </li> 
                    <li>
                        <a class="nav-link" href="#Sustancias" style="color: #573de7;">Guardar y volver</a>
                    </li> 
                 </ul>
  
            
            </div>
            <form class="form-inline my-2 my-lg-0">
        

        
            </form>
        </nav>


        <?php require_once($contenido); ?>

    </div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>