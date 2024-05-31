<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Space Y</title>
</head>
<body>

    <div class="container">
        <div id="nav">
            <img src="img/logo.png" id="logo">

            <div id="contenidonav">
            <button  class="btnSesion" id="btnContenido"><a href="contenido.php">Ver Contenido</a></button>

            <?php if(!isset($_SESSION['usuario'])) : ?>
            <button id="btnSesion" class="btnSesion">Iniciar Sesion</button>
            <?php endif ?>


            <?php if(isset($_SESSION['usuario'])) : ?>
            <a id="enlaceuser" href="profile.php?user=<?php echo $usuario ?>"><img src="<?php if($fotoRuta != ''){echo $fotoRuta;}else{echo 'img/users/user.png';} ?>" class="userimage"></a>
            <?php endif ?>
           
           
            </div>
            
        </div>

        

        <div id="info">
            <h1>Y空间，从地球到星星</h1>
            <p>让我们一起彻底改变太空运输方式。我们是月球和火星旅游的理想公司. >由巴鲁克制成 (Baruc.dev) </p>
            

        </div>

       
       
    </div>

    <section id="mision">

        <img src="img/eureka.jpg" class="imgcover">

    </section>
        
        
    
    
</body>




<div id="myModal1" class="modal">
    <div class="modal-content">
    <button id="botonx"  onclick="closeModal()">X</button>
    <div class="secondcontent">

        <div class="carruselmodal">
           <img src="img/bg2.jpg">
          

        </div>

        <div class="infomodal">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" name="login">


                <span>Usuario:</span>
                <input type="text" class="inptform" name="user" id="userInput">


                <span>Password:</span>
                <input type="password" class="inptform" name="pass" id="passwordInput">

                <input type="submit" id="enter" value="Iniciar" disabled>

            </form>

            <p>No tienes cuenta?</p><a href="registrarse.php" id="Registrarse">Registrate Aqui</a>
           
            <?php if(isset($errores) && $errores != '') : ?>
            
                <p><?php echo $errores ?></p>

            <?php endif ?>
            
            
          
            
        </div>


    </div>
    </div>
  </div>

  <script src="js/script.js"></script>

</html>