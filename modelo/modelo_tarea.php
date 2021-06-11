<?php

    // CAMBIO

    class Modelo_Tarea{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }

        // Procedimiento almacenado de listar usuario
        function listar_tarea(){
            $sql = "call SP_LISTAR_TAREA()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;

				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

    
        // Procedimiento almacenado de registrar usuario
        function Registrar_Tarea($tarea,$estatus){
           
            $sql = "call SP_REGISTRAR_TAREA('$tarea','$estatus')";
	

            if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }
        // Procedimiento almacenado de modificar insumo
        function Modificar_Tarea($idtarea,$tarea,$estatus){
            $sql = "call SP_MODIFICAR_TAREA('$idtarea','$tarea','$estatus')";
            if ($consulta = $this->conexion->conexion->query($sql)) {
                return 1;
                
            }else{
                return 0;
            }
        }
      

    }
?>