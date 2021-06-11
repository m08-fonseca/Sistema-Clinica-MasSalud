<?php
// Aquí me permite verificar si el usuario existe y me redirecciona a la página principal
session_start();
if(isset($_SESSION['S_IDUSUARIO'])){
	header('Location: ../vista/index.php');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/maine.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				
					<span class="login100-form-logo">
						<!-- METER EL LOGO -->
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						INICIAR SESI&Oacute;N
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter usern ame">
						<input class="input100" type="text" name="username" placeholder="Usuario" id="txt_usu" autocomplete = "new-password">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Contraseña" id="txt_con">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" onclick ="VerificarUsuario()">
							Ingresar
						</button>
					</div>

					<div class="text-center p-t-90">
						<a href="#" onclick="AbrirModalRestablecer()">
						¿Has olvidado tu contraseña?
						</a>
					</div>
				
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	<!-- RESTABLECER CONTRASEÑA -->
	<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modal_restablecer_contra" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="text-align:left;">
            
            <h4 class="modal-title"><b>Restablecer contraseña</b></h4>
			<button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <label for=""><b>Ingrese el email registrado en el usuario para enviarle su contraseña restablecida</b></label>
                    <input type="text" class="form-control" id="txt_email" placeholder="Ingrese email"><br>
                </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Restablecer_Contra()"><i class="fa fa-check"><b>&nbsp;Enviar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>	
        </div>
        </div>
    </div>
	</form>

	
<!--===============================================================================================-->
<script src="vendor/sweetalert2/sweetalert29.js"></script>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!--===============================================================================================-->
	<script src="../js/usuario.js"></script>	
<script>
	 
txt_usu.focus()
</script>
</body>
</html>