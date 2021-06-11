
// Lista a todos los usuarios que estan guardados en la data
var tableprocedimiento;
// CAMBIO
function listar_procedimiento(){
    tableprocedimiento = $("#tabla_procedimiento").DataTable({
        //  CAMBIO
       "ordering":false,   
       "bLengthChange":false,
       "searching": { "regex": false },
       "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
       "pageLength": 10,
       "destroy":true,
       "async": false ,
       "processing": true,
       "ajax":{
           "url":"../controlador/usuario/controlador_procedimiento_listar.php",
           type:'POST'
        //    CAMBIO
       },
       "order":[[1,"asc"]], 
       "columns":[
        //    CAMBIO
           {"defaultContent":""},
           {"data":"procedimiento_nombre"},
           {"data":"procedimiento_fregistro"},
           {"data":"procedimiento_estatus",
                render: function (data, type, row ) {
                    if(data=='ACTIVO'){
                        return "<span class='label btn btn-success'>"+data+"</span>";                   
                    }else{
                    return "<span class='label btn btn-danger'>"+data+"</span>";                 
                    }
                }
           },  
           {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary ml-1'><i class='fa fa-edit'></i></button>"}
       ],

       "language":idioma_espanol,
       select: true
   });
//    CAMBIO
   document.getElementById("tabla_procedimiento_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });

    // CAMBIO,Contador de id
    tableprocedimiento.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_procedimiento').DataTable().page.info();
        tableprocedimiento.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );
}

// MODIFICAR PROCEDIMIENTO imprime el dato en el modal
$('#tabla_procedimiento').on('click','.editar',function(){
    var data = tableprocedimiento.row($(this).parents('tr')).data(); //Detecta a que fila hago click y me captura los datos en la variable
    if(tableprocedimiento.row(this).child.isShown()){ //Cuando esta tamaño responsive
        var data = tableprocedimiento.row(this).data();
    }
    // Abre el modal
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#txt_idprocedimiento").val(data.procedimiento_id);
    $("#txt_procedimiento_nuevo_editar").val(data.procedimiento_nombre);
    $("#cbm_estatus_editar").val(data.procedimiento_estatus).trigger("change");
})

// Modifica Procedimiento
function Modificar_Procedimiento(){
    var id =  $("#txt_idprocedimiento").val();
    var procedimientonuevo =  $("#txt_procedimiento_nuevo_editar").val();
    var estatus =  $("#cbm_estatus_editar").val();
    if(id.length==0){
        Swal.fire("Mensaje de Advertencia", "El id del campo esta vacio", "warning");
    }

    if(procedimientonuevo.length == 0){
        Swal.fire("Mensaje de Advertencia", "Debe ingresar un procedimiento", "warning"); 
    }

    $.ajax({
        url:'../controlador/usuario/controlador_procedimiento_editar.php',
        type:'POST',
        data:{
            id:id,
            procedimientonuevo:procedimientonuevo,
            estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
           
            $("#modal_editar").modal('hide');
            Swal.fire("Mensaje De Confirmacion","Datos Actualizados correctamente","success")            
            .then ( ( value ) =>{
                LimpiarProcedimiento();
                tableprocedimiento.ajax.reload();
            }); 
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos, no se pudo completar el registro","error");
        }
    })
}


function filterGlobal() {
    $('#tabla_procedimiento').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

// Modal de Sweetalert
function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
}

// Funcion que registra a los usuarios
function Registrar_Procedimiento(){
    var procedimiento = $("#txt_procedimiento").val();
    var estatus = $("#cbm_estatus").val();
    // CAMBIO
    if(procedimiento.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    // CAMBIO
    $.ajax({
        "url":"../controlador/usuario/controlador_procedimiento_registro.php",
        type:'POST',
        data:{
            p:procedimiento,
            e:estatus
        }
    }).done(function(resp){
      
        if(resp>0){
            if(resp==1){
               
                $("#modal_registro").modal('hide');
                listar_procedimiento();
                Swal.fire("Mensaje De Confirmacion","Datos correctamente, Nuevo Procedimiento Registrado","success")            
                .then ( ( value ) =>  {
                    LimpiarProcedimiento();
                    tableprocedimiento.ajax.reload();
                }); 
            }else{
                return Swal.fire("Mensaje De Advertencia","Lo sentimos, el nombre del procedimiento ya se encuentra en nuestra base de datos","warning");
            }
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos, no se pudo completar el registro","error");
        }
    })


}

// Funcion de limpieza para el registro
function LimpiarProcedimiento(){
    $("#txt_procedimiento").val("");
    $("#txt_procedimiento_nuevo_editar").val("");
}