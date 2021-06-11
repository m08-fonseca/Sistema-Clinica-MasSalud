<?php
session_start();
    class Modelo_Usuario{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }

        // Procedimiento almacenado de la base de datos 
        function VerificarUsuario($usuario,$contra){

            $sql = "call SP_VERIFICAR_USUARIO('$usuario')";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)){
                while($consulta_VU = mysqli_fetch_array($consulta)){
                   
                    if($contra == $consulta_VU["usu_contrasenna"] and $usuario==$consulta_VU["usu_nombre"])
                    {

                        $arreglo[] = $consulta_VU;
                    }
                } 
                return $arreglo;
                $this->conexion->cerrar();
            }
        }

        // Procedimiento almacenado de listar usuario
        function listar_usuario(){
            $sql = "call SP_LISTAR_USUARIO()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                    $arreglo["data"][]=$consulta_VU;

				}
				return $arreglo;
				$this->conexion->cerrar();
			}
        }

        // Procedimiento almacenado de los rollers
        function listar_combo_rol(){
            $sql = "call SP_LISTAR_COMBO_ROL()";
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();
			}
		}
		
        // Procedimiento almacenado de modificar usuario
        function Modificar_Estatus_Usuario($idusuario,$estatus){
            $sql = "call SP_MODIFICAR_ESTATUS_USUARIO('$idusuario','$estatus')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
				
			}else{
				return 0;
			}
        }

        // Procedimiento almacenado de actualizar usuario
        function Modificar_Datos_Usuario($idusuario,$sexo,$rol){
            $sql = "call SP_MODIFICAR_DATOS('$idusuario','$sexo', '$rol')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
				
			}else{
				return 0;
			}
        }
        // Procedimiento almacenado de registrar usuario
        function Registrar_Usuario($usuario,$contra,$sexo,$rol){
            $sql = "call SP_REGISTRAR_USUARIO('$usuario','$contra','$sexo','$rol')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }

        // Traer Datos
      
        function TraerDatos($usuario){
            $sql = "call SP_VERIFICAR_USUARIO('$usuario')";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)){
                while($consulta_VU = mysqli_fetch_array($consulta)){
                    
                    
                    $arreglo[] = $consulta_VU;
                    
                } 
                return $arreglo;
                $this->conexion->cerrar();
            }
        }

        // Modificar Contraseña 
        function Modificar_Contra_Usuario($idusuario,$contranu){
            $sql = "call SP_MODIFICAR_CONTRA_USUARIO('$idusuario','$contranu')";
          
			if ($consulta = $this->conexion->conexion->query($sql)) {
				return 1;
				
			}else{
				return 0;
			}
        }


        // Restablecer Contraseña
        function Restablecer_Contra($email,$contra){
            $sql = "call SP_RESTABLECER_CONTRA('$email','$contra')";
			if ($consulta = $this->conexion->conexion->query($sql)) {
				if ($row = mysqli_fetch_array($consulta)) {
                        return $id= trim($row[0]);
				}
				$this->conexion->cerrar();
			}
        }
    }
?>

