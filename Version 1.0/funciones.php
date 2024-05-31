<?php
function obtenientoFoto($id)
{
    try
    {
        
        $conexion = new mysqli('localhost', 'root', '', 'spacey');
        if($conexion->connect_error)
        {
            header('Location: error.php');
        }
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE Nombre = ?');
        $statement->bind_param('s',$id);
        $statement->execute();
        $resultado = $statement->get_result();
        if($resultado->num_rows > 0)
        {
            $fila = $resultado->fetch_assoc();
            $statement->close();
            $conexion->close();
            return $fila['Imagen'];
        }
        else
        {
            return '';
        }
    }
    catch(MYSQLI_SQL_EXCEPTION $e) 
    {
        #ENVIAR A PAGINA DE ERROR
    }
    
}
?>