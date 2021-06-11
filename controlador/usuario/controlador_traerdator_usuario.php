<?php 
    // Llama a la función y sus parametros que contienen los procedimientos almacenados
    require '../../modelo/modelo_usuario.php';
    // Bloquea los caracteres especiales para que no me hagan una inyección
    $MU = new Modelo_Usuario();
    $usuario = htmlspecialchars($_POST['usuario'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->TraerDatos($usuario);
    echo json_encode($consulta);

    

?>