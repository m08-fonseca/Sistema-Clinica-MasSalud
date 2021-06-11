<?php
    require '../../modelo/modelo_procedimiento.php';
    // Aquí se envian las variables de la data del procedimiento.js
    $MP = new Modelo_Procedimiento();
    $procedimiento = htmlspecialchars($_POST['p'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['e'],ENT_QUOTES,'UTF-8');
    $consulta = $MP->Registrar_Procedimiento($procedimiento,$estatus);
    echo $consulta;

?>