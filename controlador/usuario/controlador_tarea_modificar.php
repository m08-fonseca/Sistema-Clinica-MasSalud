<?php
    require '../../modelo/modelo_tarea.php';

    $MI = new Modelo_Tarea();
    $idtarea = htmlspecialchars($_POST['idtarea'],ENT_QUOTES,'UTF-8');
    $tarea = htmlspecialchars($_POST['tarea'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MI->Modificar_Tarea($idtarea,$tarea,$estatus);
    echo $consulta;

?>