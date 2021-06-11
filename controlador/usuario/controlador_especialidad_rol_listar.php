<?php
    require '../../modelo/modelo_medico.php';
    $MM = new Modelo_Medico();
    $consulta = $MM->listar_combo_especialidad();
    echo json_encode($consulta);
?>