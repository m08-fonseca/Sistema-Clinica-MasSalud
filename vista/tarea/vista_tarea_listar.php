<script type="text/javascript" src="../js/tarea.js?rev=<?php echo time();?>"></script>

<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">TAREA</h3>
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
            <table id="tabla_tarea" class="display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tarea</th>
                    <th>Fecha de registro</th>
                    <th>Estatus</th>
                    <th>Acci&oacute;n</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Tarea</th>
                    <th>Fecha de registro</th>
                    <th>Estatus</th>
                    <th>Acci&oacute;n</th>
                </tr>
            </tfoot>
            </table>
        </div>
                    
    </div>
</div>
<!-- ABRE MODAL -->
<div class="modal fade" id="modal_registro" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Registro De Tarea</b></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- CAMBIO -->
            <div class="modal-body">
                <div class="col-lg-12">
                    <label for="">Tarea</label>
                    <textarea id="txt_tarea" class="form-control" rows="10" cols="100"placeholder="Ingrese su tarea"></textarea>
                </div>
                <div class="col-lg-12">
                    <label for="">Estatus</label>
                    <select class="js-example-basic-single"  name="state" id="cbm_estatus" style="width:100%;">
                        <option value="COMPLETADO">COMPLETADO</option>
                        <option value="INCOMPLETO">INCOMPLETO</option>
                        <option value="PROCESANDO">PROCESANDO</option>
                    </select><br><br>
                </div>
                

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Registrar_Tarea()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
    </div>
</div>
<!-- Modificar Tarea-->
<div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Modificar De Tarea</b></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- CAMBIO -->
            <div class="modal-body">
                <div class="col-lg-12">
                <input type="text" id="txtidtarea" hidden>
                    <label for="">Tarea</label>
                    <textarea id="txt_tarea_editar" class="form-control" rows="10" cols="100"placeholder="Ingrese su tarea"></textarea>
                </div>
                <div class="col-lg-12">
                    <label for="">Estatus</label>
                    <select class="js-example-basic-single"  name="state" id="cbm_estatus_editar" style="width:100%;">
                        <option value="COMPLETADO">COMPLETADO</option>
                        <option value="INCOMPLETO">INCOMPLETO</option>
                        <option value="PROCESANDO">PROCESANDO</option>
                    </select><br><br>
                </div>
                

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Modificar_Tarea()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    listar_tarea();
    $('.js-example-basic-single').select2();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_tarea").focus();  
    })
} );
</script>