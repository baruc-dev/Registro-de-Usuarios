<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="css/estilos3.css">

   
</head>
<body>

<div id="contenedor">
    <img src="img/bg4.gif">

</div>


<div id="myModal1" class="modal">
    <div class="modal-content">
    
    <div class="secondcontent">

        <div class="carruselmodal">
           <img src="img/astro1.jpg">
          

        </div>

        <div class="infomodal">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" name="register">

            <span>Usuario</span>
            <input type="text" class="inptform" name="user" id="user">

            <span>Password</span>
            <input type="password" class="inptform" name="password" id="password">

            <span>Repetir Password</span>
            <input type="password" class="inptform" name="password2" id="password2">


            <input  type="submit" id="enter" value="Registrarse" disabled >
        </form>

            <p>Ya tienes una cuenta?:</p><a href="index.php" id="Registrarse">Iniciar Sesion</a>
           
           
            <?php if(isset($errores) && $errores != '') :?>
            
                <p class="alerta"><?php echo $errores ?></p>

            <?php endif ?>
            
            
          
            
        </div>


    </div>
    </div>
  </div>



</body>
<script src="js/app.js"></script>
</html>