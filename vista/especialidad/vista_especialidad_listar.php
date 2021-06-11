<script type="text/javascript" src="../js/especialidad.js?rev=<?php echo time();?>"></script>

<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">CONTROL DE PROCEDIMIENTOS</h3>

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
            <table id="tabla_especialidad" class="display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Estatus</th>
                    <th>Acci&oacute;n</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Estatus</th>
                    <th>Acci&oacute;n</th>
                </tr>
            </tfoot>
            </table>
        </div>
                    
    </div>
</div>

<!-- Registro control de usuario -->
<!-- CAMBIO -->
<div class="modal fade" id="modal_registro" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Registro De Especialidad</b></h4>
            </div>
            <!-- CAMBIO -->
            <div class="modal-body">
                <div class="col-lg-12">
                    <label for="">Nombre de la Especialidad</label>
                    <input type="text" class="form-control" id="txt_especialidad" placeholder="Ingrese la Especialidad"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Estatus</label>
                    <select class="js-example-basic-single" name="state" id="cbm_estatus_especialidad" style="width:100%;">
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                    </select><br><br>
                </div>
                

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Registrar_Especialidad()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
    </div>
</div>

<!-- MODIFICAR -->
<div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Editar Especialidad</b></h4>
            </div>
            <!-- CAMBIO -->
            <div class="modal-body">
                <div class="col-lg-12">
                    <input type="text" id="txtidespecialidad"  hidden>
                    <label for="">Nombre de la Especialidad</label>
                    <input type="text" class="form-control" id="txt_especialidad_editar" placeholder="Ingrese la Especialidad"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Estatus</label>
                    <select class="js-example-basic-single" name="state" id="cbm_estatus_especialidad_editar" style="width:100%;">
                        <option value="ACTIVO">ACTIVO</option>
                        <option value="INACTIVO">INACTIVO</option>
                    </select><br><br>
                </div>
                

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Modificar_Especialidad()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    listar_especialidad();
    $('.js-example-basic-single').select2();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_especialidad").focus();  
    })
} );
</script>