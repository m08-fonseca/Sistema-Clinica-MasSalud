<script type="text/javascript" src="../js/usuario.js?rev=<?php echo time();?>"></script>



<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">CONFIGURACIÓN</h3>

        </div>
        <div>
            <ul>
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" onclick= AbrirModalEditarContra()><i class="fas fa-spinner pr-2"></i>Configuración de Contraseña</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modal_editar_contra" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"><b>Modificar Contraseña</b></h4>
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>
            <div class="modal-body">
                <!-- <div class="col-lg-12"> -->
                    <!-- <input type="text" id="txtcontra_db" >  -->
                    <!-- <label for="">Contrase&ntilde;a  Actual</label>
                    <input type="password" class="form-control" id="txtcontra_actual" placeholder="Ingrese contrase&ntilde;a actual"><br>
                </div> -->
                <div class="col-lg-12">
                    <label for="">Nueva Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="txtcontra_nueva" placeholder="Nueva contrase&ntilde;a"><br>
                </div>
                
                <div class="col-lg-12">
                    <label for="">Repetir Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="txtcontra_repetir" placeholder="Repita contrase&ntilde;a"><br>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="EditarContrasena()"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>
</form>