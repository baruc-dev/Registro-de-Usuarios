<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de <?php if(isset($_SESSION['usuario'])) : ?>
    <?php $usuario = $_SESSION['usuario']; echo $usuario?>
    <?php endif ?>
    </title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>


<div class="actualizar">

        <div class="formActualizar">
            <img src="<?php if(isset($fotoRuta) && $fotoRuta != ''){echo $fotoRuta;} if($fotoRuta == ''){echo 'img/users/user.png';} ?>" id="imageChange">
            <a href="cerrar.php" id="cerrarsesion">Cerrar Sesion</a>
            <div id="cambios">
                <form method="POST" enctype="multipart/form-data" name="subirdatos" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">

                
                <p>Cambiar Imagen:</p> <input type="file" name="imagenuser">

               

                <input type="submit"> 
                </form>
                
            </div>
            <a id="inicio" href="index.php">Ir al Inicio</a>
        </div>

</div>

    
</body>
</html>