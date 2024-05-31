<?php
session_start();

 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $errores = '';
    $usuario = filter_var(strtolower($_POST['user']), FILTER_SANITIZE_STRING);
    $pass = $_POST['password'];
    $pass2 = $_POST['password2'];


    $errores .= validandoDatos($usuario, $pass, $pass2);

    $errores .= validandoPassword($pass, $pass2);

    $errores .= validandoNombreRepetido($usuario);

    if($errores == '')
    {
        enviandoDatos($usuario, $pass);
    }
    
   

}


function validandoDatos($nombre, $pas, $pas2)
{
   $errores = '';
    if($nombre == '' || $pas == '' || $pas2 == '')
    {
         $errores .= 'Todos los campos son obligatorios';
      
    }
    return $errores;
}


function validandoPassword($contra1, $contra2)
{

    $errores = '';

    if($contra1 != $contra2)
    {
        $errores .= 'Las contrasenas no coinciden';
    }

    return $errores;

}


function validandoNombreRepetido($usuario)
{

    $errores = '';
    try
    {
        $conexion = new mysqli('localhost', 'root', '','spacey');
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE Nombre = ? LIMIT 1');
        $statement->bind_param('s', $usuario);
        $statement->execute();
        $resultado = $statement->get_result();
        if(isset($resultado) && $resultado->num_rows > 0)
        {
            $errores .= 'El usuario ya existe';
        }

        return $errores;

    }
    catch(MYSQLI_SQL_EXCEPTION $e)
    {
        echo 'Hubo un error, por favor intentalo mas tarde';
    }
}




function enviandoDatos($usuario, $pass)
{
    $pass = password_hash($pass, PASSWORD_BCRYPT);

    try
        {
            $conexion = new mysqli('localhost', 'root', '','spacey');
            $statement = $conexion->prepare('INSERT INTO usuarios(Nombre, Password) VALUES (?,?)');
            $statement->bind_param('ss',$usuario,$pass);
            $statement->execute();
            header('Location: registroexitoso.html');

        }
        catch(MYSQLI_SQL_EXCEPTION $e)
        {
            echo 'hubo un error ';
        }
}








include('views/registrate.view.php');
?>