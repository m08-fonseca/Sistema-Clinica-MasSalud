<?php
    require '../../modelo/modelo_tarea.php';
    // CAMBIO
    $MT= new Modelo_Tarea();
    $consulta = $MT->listar_tarea();
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