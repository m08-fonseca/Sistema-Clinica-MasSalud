<?php
    require '../../modelo/modelo_especialidad.php';

    $ME = new Modelo_Especialidad();
    $idespecialidad = htmlspecialchars($_POST['idespecialidad'],ENT_QUOTES,'UTF-8');
    $especialidad = htmlspecialchars($_POST['especialidad'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $ME->Modificar_Especialidad($idespecialidad,$especialidad,$estatus);
    echo $consulta;

?>