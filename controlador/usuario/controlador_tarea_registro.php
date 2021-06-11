<?php
    require '../../modelo/modelo_tarea.php';
    // Aquí se envian las variables de la data del procedimiento.js
    $MT= new Modelo_Tarea();
    $tarea = htmlspecialchars($_POST['tarea'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MT->Registrar_Tarea($tarea,$estatus);
    echo $consulta;

?>