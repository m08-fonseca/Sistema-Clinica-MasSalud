<?php
    require '../../modelo/modelo_insumo.php';

    $MI = new Modelo_Insumo();
    $idinsumo = htmlspecialchars($_POST['idinsumo'],ENT_QUOTES,'UTF-8');
    $stockinsumo = htmlspecialchars($_POST['stockinsumo'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'],ENT_QUOTES,'UTF-8');
    $consulta = $MI->Modificar_Insumo($idinsumo,$stockinsumo,$estatus);
    echo $consulta;

?>