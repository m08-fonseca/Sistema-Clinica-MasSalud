<script type="text/javascript" src="../js/medico.js?rev=<?php echo time();?>"></script>

<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">REGISTRAR MEDICO</h3>

            <!-- <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div> -->
            <!-- /.box-tools -->
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
            <table id="tabla_medico" class="display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Número médico</th>
                    <th>Médico</th>
                    <th>Número Colegiatura</th>
                    <th>Especialidad</th>
                    <th>Sexo</th>
                    <th>Teléfono 1</th>
                    <th>Teléfono 2</th>
                    <th>Acci&oacute;n</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Número médico</th>
                    <th>Médico</th>
                    <th>Número Colegiatura</th>
                    <th>Especialidad</th>
                    <th>Sexo</th>
                    <th>Teléfono 1</th>
                    <th>Teléfono 2</th>
                    <th>Acci&oacute;n</th>
                </tr>
            </tfoot>
            </table>
        </div>
                    
    </div>
</div>

<!-- Registro del medico -->
<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modal_registro" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            
            <h4 class="modal-title" style="margin-right:70%"><b>Registrar Médico</b></h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="txt_medico" placeholder="Ingresar nombre del médico"><br>
                </div>
               <div class="d-flex">
                   <div class="col-lg-6">
                        <label for="">Primer Apellido</label>
                        <input type="text" class="form-control" id="txt_apepat" placeholder="Ingresar primer apellido"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Segundo Apellido</label>
                        <input type="text" class="form-control" id="txt_apemat" placeholder="Ingresar segundo apellido"><br>
                    </div>
               </div>

                <div class="d-flex">
                    <div class="col-lg-4">
                        <label for="">Sexo</label>
                        <!-- cbm_sexo -->
                        <select class="js-example-basic-single" name="state" id="cbm_sexo_medico" style="width:100%;">
                            <option value="M">MASCULINO</option>
                            <option value="F">FEMENINO</option>
                        </select><br><br>
                    </div>

                    <div class="col-lg-4">
                        <label for="">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="txt_nacimiento"><br>
                        <!-- cont2 -->
                    </div>

                    <div class="col-lg-4">
                        <label for="">Indentificación</label>
                        <input type="text" class="form-control" id="txt_identificacion" placeholder="Indentificación"><br>
                        <!-- cont1 -->
                    </div>
                </div>
            
                <div class="d-flex">
                    <div class="col-lg-4 ">
                        <label for="">Teléfono 1</label>
                        <input type="text" class="form-control" id="txt_tel1" placeholder="Teléfono"><br>
                    </div>
                    
                    <div class="col-lg-4">
                        <label for="">Teléfono 2</label>
                        <input type="text" class="form-control" id="txt_tel2" placeholder="Teléfono 2"><br>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="txt_mail" placeholder="Email"><br>
                    </div>
                </div>

                <div class="col-lg-12">
                    <label for="">Dirección</label>
                    <input type="text" class="form-control" id="txt_direccion" placeholder="Ingresar dirección"><br>
                </div>

                <div class="d-flex">
                    <div class="col-lg-4">
                        <label for="">Código Activo</label>
                        <input type="text" class="form-control" id="txt_documento" placeholder="Código Activo"><br>
                    </div>

                    <div class="col-lg-4">
                    <!-- cbm_rol -->
                        <label for="">Especialidad</label>
                        <select class="js-example-basic-single" name="state" id="cbm_especialidad" style="width:100%;">
                        </select><br><br>
                    </div>

                   <div class="col-lg-4">
                        <label for="">Estatus</label>
                        <select class="js-example-basic-single" name="state" id="cbm_estatus_editar" style="width:100%;">
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select><br><br>
                    </div>
                    
                </div>
                
                <div class="col-lg-12">
                    <label for="">Colegiatura</label>
                    <input type="text" class="form-control" id="txt_ncol" placeholder="Ingresar colegiatura"><br>
                </div>
                <div class="col-lg-12" style="margin-left:45%">
                    <b>DATOS USUARIO</b>
                </div>
                <div class="d-flex">
                    <div class="col-lg-4">
                        <label for="">Usuario</label>
                        <input type="text" class="form-control" id="txt_usu" placeholder="Ingresar usuario"><br>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Contrase&ntilde;a</label>
                        <input type="password" class="form-control" id="txt_con1" placeholder="Ingresar contrase&ntilde;a"><br>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Rol</label>
                        <select class="js-example-basic-single" name="state" id="cbm_rol" style="width:100%;">
                        </select><br><br>
                    </div>
                </div>
                

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Registrar_Medico()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    listar_medico();
    $('.js-example-basic-single').select2();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_medico").focus();  
    })
} );
</script>