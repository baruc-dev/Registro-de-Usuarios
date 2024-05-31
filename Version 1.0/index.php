<?php
session_start();
require('funciones.php');


if(isset($_SESSION['usuario']))
{
    $usuario = $_SESSION['usuario'];
    $fotoRuta = obtenientoFoto($usuario);
}


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $errores = '';
    $usuario = filter_var(strtolower($_POST['user']), FILTER_SANITIZE_STRING);
    $password = $_POST['pass'];

    $errores .= validandoCampos($usuario, $password);
    if($errores == '')
    {
        $errores .= validandoUsuario($usuario);
    }

    if($errores == '')
    {
        $errores .= validarPassword($usuario, $password);
    }




}


function validandoCampos($usuario, $password)
{
    $errores = '';

    if($usuario == '' || $password == '')
    {
        $errores .= 'Todos los campos son obligatorios';
    }

    return $errores;
}



function validandoUsuario($usuario)
{
    $errores = '';
    try
    {
        $conexion = new mysqli('localhost', 'root', '', 'spacey');
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE Nombre = ? LIMIT 1');
        $statement->bind_param('s', $usuario);
        $statement->execute();
        $resultado = $statement->get_result();
        if($resultado->num_rows > 0)
        {
            
        }
        else
        {
            $errores .= 'El Usuario o la Contrasena son Incorrectos';
        }

        return $errores;
    
    }
    catch(MYSQLI_SQL_EXCEPTION $e)
    {
       #REDIRIGIR A UNA PAGINA DE ERROR
    }
 

}


function validarPassword($usuario, $password)
{

    $errores = '';

    try
    {
        $conexion = new mysqli('localhost', 'root', '', 'spacey');
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE Nombre = ? LIMIT 1');
        $statement->bind_param('s', $usuario);
        $statement->execute();
        $resultado = $statement->get_result();
        if($resultado->num_rows > 0)
        {
           
            $datos = $resultado->fetch_assoc();
         
            if(password_verify($password, $datos['Password']))
            {
                $_SESSION['usuario'] = $usuario;
                header('Location: index.php');
            }
            else
            {
                $errores .= 'El usuario o la Contrasena son Incorrectos';
            }
            
            return $errores;
        }
       
    
    }
    catch(MYSQLI_SQL_EXCEPTION $e)
    {
       #REDIRIGIR A UNA PAGINA DE ERROR
    }

}








require('views/index.view.php');
?>