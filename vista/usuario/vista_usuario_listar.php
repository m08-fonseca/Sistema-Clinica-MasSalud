<script type="text/javascript" src="../js/usuario.js?rev=<?php echo time();?>"></script>

<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">CONTROL DE USUARIO</h3>
            
        </div>
        <!-- DATATABLES -->
        <div class="box-body">
            <!-- Form-group da la parte estetica del filtro y del bóton de reguistrar -->
           <div class="form-group d-flex">
                <div class="col-lg-10">
                    <div class="input-group">
                        <input type="text" class="global_filter form-control" id="global_filter" placeholder="Ingresar dato a buscar">
                        <span class="input-group-addon"></span>
                    </div>
                </div>
                <div class="col-lg-2 ">
                    <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i class="glyphicon glyphicon-plus"></i>Nuevo Registro</button>
                </div>
            </div>
            <!-- Aquí inicia la tabla de usuario,me indica que urario utiliza el sistema y quien ya no puede utilizar el sistema -->
            <table id="tabla_usuario" class="display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Sexo</th>
                    <th>Estatus</th>
                    <th>Acci&oacute;n</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Sexo</th>
                    <th>Estatus</th>
                    <th>Acci&oacute;n</th>
                </tr>
            </tfoot>
            </table>
        </div>
                    
    </div>
</div>

<!-- Registro control de usuario -->
<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modal_registro" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Registro Control Usuario</b></h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <label for="">Usuario</label>
                    <input type="text" class="form-control" id="txt_usu" placeholder="Ingrese usuario"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="txt_con1" placeholder="Ingrese contrase&ntilde;a"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Repita la Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="txt_con2" placeholder="Repita contrase&ntilde;a"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Sexo</label>
                    <select class="js-example-basic-single" name="state" id="cbm_sexo" style="width:100%;">
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                    </select><br><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Rol</label>
                    <select class="js-example-basic-single" name="state" id="cbm_rol" style="width:100%;">
                    </select><br><br>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Registrar_Usuario()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>
</form>

<!-- Reguistro de modificar usuario -->
<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modal_editar" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Editar Control Usuario</b></h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                   
                    <input type="text" id="txtidusuario" hidden>
                    <label for="">Usuario</label>
                    <input type="text" class="form-control" id="txtusu_editar" placeholder="Ingrese usuario" disabled><br>
                </div>
               
                <div class="col-lg-12">
                    <label for="">Sexo</label>
                    <select class="js-example-basic-single" name="state" id="cbm_sexo_editar" style="width:100%;">
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                    </select><br><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Rol</label>
                    <select class="js-example-basic-single" name="state" id="cbm_rol_editar" style="width:100%;">
                    </select><br><br>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Modificar_Usuario()"><i class="fa fa-check"><b>&nbsp;Modificar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>
</form> 



<script>
$(document).ready(function() {
    listar_usuario();
    $('.js-example-basic-single').select2();
    listar_combo_rol();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_usu").focus();  
    })
} );
</script>


