<?php

    // CAMBIO

    class Modelo_Medico{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }

        // Procedimiento almacenado de listar usuario
        function listar_medico(){
            $sql = "call SP_LISTAR_MEDICO()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;

				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        function listar_combo_especialidad(){
            $sql = "call SO_LISTAR_COMBO_ESPECIALIDAD()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                    $arreglo[]=$consulta_VU;

				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }
        

        

    }
?>