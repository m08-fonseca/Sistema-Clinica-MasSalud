<?php
    require '../../modelo/modelo_procedimiento.php';
    // Aquí se envian las variables de la data del procedimiento.js
    $MP = new Modelo_Procedimiento();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $procedimientonuevo = htmlspecialchars($_POST['procedimientonuevo'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MP->Modificar_Procedimiento($id,$procedimientonuevo,$estatus);
    echo $consulta;

?>