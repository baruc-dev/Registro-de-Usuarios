<?php
session_start();
require('funciones.php');

if(!$_SESSION['usuario'])
{
    header('Location: index.php');
    
}

if(isset($_SESSION['usuario']))
{
    $usuario = $_SESSION['usuario'];
    $fotoRuta = obtenientoFoto($usuario);
}


$id = validandoGet();
$id = htmlspecialchars($id);
$id = filter_var($id, FILTER_SANITIZE_STRING);
validandoID($id);

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES))
{
    
    if(isset($_FILES['imagenuser']) && $_FILES['imagenuser']['error'] == 0)
    {
        $errores = '';
        $allowed = ['jpg', 'jpeg', 'png', 'gif']; // Extensiones permitidas
        $filename = $_FILES['imagenuser']['name'];
        $filetype = $_FILES['imagenuser']['type'];
        $filesize = $_FILES['imagenuser']['size'];


        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array(strtolower($ext), $allowed))
        {
            $errores .= 'ERROR';
            header('Location: error.php');
         
        }


        
        $check = getimagesize($_FILES['imagenuser']['tmp_name']);
        if($check === false)
        {

            $errores .= 'ERROR';
            header('Location: error.php');
            
        }


        if($filesize > 500000)// Tamaño máximo en bytes
        { 

            $errores .= 'ERROR';
            header('Location: error.php');
            
        }

        $newfilename = md5(time() .$filename) .'.' .$ext; // Generar un nuevo nombre de archivo
        $carpeta_destino = 'img/users/';
        $archivo_subido = $carpeta_destino . $newfilename;
        $id = $_SESSION['usuario'];

        if($errores == '')
        {
            try
            {
                $conexion = new mysqli('localhost', 'root', '', 'spacey');
                move_uploaded_file($_FILES['imagenuser']['tmp_name'], $archivo_subido);
                $statement = $conexion->prepare('UPDATE usuarios SET Imagen = ? WHERE Nombre = ?');
                $statement->bind_param('ss', $archivo_subido, $id);
                $statement->execute();
                header('Location: profile.php?user='.$id);
            }
            catch(MYSQLI_SQL_EXCEPTION $e)
            {
                header('Location: error.php');
            }
            
        }
        
    
    }




}


















function validandoGet()
{
    $id = '';
    if(isset($_GET['user']))
    {
        $id = $_GET['user'];
        return $id;
    }
    else
    {
        $id = $_SESSION['usuario'];
        header('Location: profile.php?user=' .$id);
    }
}


function validandoID($id)
{
    
    $usuario =  $_SESSION['usuario'];
    if($id != $usuario)
    {
        header('Location: profile.php?user=' .$usuario);
    }

    
}








require('views/profile.view.php');
?>