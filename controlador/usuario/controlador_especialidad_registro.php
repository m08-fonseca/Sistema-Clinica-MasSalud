<?php
    require '../../modelo/modelo_especialidad.php';
    // Aquí se envian las variables de la data del procedimiento.js
    $ME = new Modelo_Especialidad();
    $especialidad = htmlspecialchars($_POST['esp'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['e_s'],ENT_QUOTES,'UTF-8');
    $consulta = $ME->Registrar_Especialidad($especialidad,$estatus);
    echo $consulta;

?>