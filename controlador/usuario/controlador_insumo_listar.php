<?php
    require '../../modelo/modelo_insumo.php';
    // CAMBIO
    $MP= new Modelo_Insumo();
    $consulta = $MP->listar_insumo();
    if($consulta){
        echo json_encode($consulta);
    }else{

        // Cuando no hay datos ete echo me dice que no hay datos y no permite mensajes de error en la consola.
        echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';
    }

?>