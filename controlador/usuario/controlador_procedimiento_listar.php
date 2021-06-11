<?php
    require '../../modelo/modelo_procedimiento.php';
    // CAMBIO
    $MP= new Modelo_Procedimiento();
    $consulta = $MP->listar_procedimiento();
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