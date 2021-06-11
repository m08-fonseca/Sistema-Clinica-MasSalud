
// Lista a todos los especialidas que estan guardados en la data
var table_especialidad;
// CAMBIO
function listar_especialidad(){
    table_especialidad = $("#tabla_especialidad").DataTable({
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
           "url":"../controlador/usuario/controlador_especialidad_listar.php",
           type:'POST'
        //    CAMBIO
       },
       "order":[[1,"asc"]], 
       "columns":[
        //    CAMBIO
           {"defaultContent":""},
           {"data":"especialidad_nombre"},
           {"data":"especialidad_fregistro"},
           {"data":"especialidad_estatus",
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
   document.getElementById("tabla_especialidad_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });

    // CAMBIO,Contador de id
    table_especialidad.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_especialidad').DataTable().page.info();
        table_especialidad.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );
}

function filterGlobal() {
    $('#tabla_especialidad').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

// Modal de Sweetalert
function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
}

// Funcion que registra a los usuarios
function Registrar_Especialidad(){
    var especialidad = $("#txt_especialidad").val();
    var estatus = $("#cbm_estatus_especialidad").val();
    // CAMBIO
    if(especialidad.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    // CAMBIO
    $.ajax({
        "url":"../controlador/usuario/controlador_especialidad_registro.php",
        type:'POST',
        data:{
            esp:especialidad,
            e_s:estatus
        }
    }).done(function(resp){
      
        if(resp>0){
            if(resp==1){
               
                $("#modal_registro").modal('hide');
                listar_especialidad();
                Swal.fire("Mensaje De Confirmacion","Datos correctamente, Nuevo Especialidad Registrado","success")            
                .then ( ( value ) =>  {
                    LimpiarEspecialidad();
                    table_especialidad.ajax.reload();
                }); 
            }else{
                return Swal.fire("Mensaje De Advertencia","Lo sentimos, el nombre de la especialidad ya se encuentra en nuestra base de datos","warning");
            }
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos, no se pudo completar el registro","error");
        }
    })


}

// ACTUALIZAR
$('#tabla_especialidad').on('click','.editar',function(){
    var data = table_especialidad.row($(this).parents('tr')).data();
    if(table_especialidad.row(this).child.isShown()){
        var data = table_especialidad.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#txtidespecialidad").val(data.especialidad_id);
    $("#txt_especialidad_editar").val(data.especialidad_nombre);
    $("#cbm_estatus_especialidad_editar").val(data.especialidad_estatus).trigger("change");
    
})

// MODIFICAR especialida
function Modificar_Especialidad(){
    var idespecialidad = $("#txtidespecialidad").val();
    var especialidad = $("#txt_especialidad_editar").val();
    var estatus = $("#cbm_estatus_especialidad_editar").val();
    if(idespecialidad.length==0 ||estatus.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }

    $.ajax({
        "url":"../controlador/usuario/controlador_especialida_modificar.php",
        type:'POST',
        data:{
            idespecialidad:idespecialidad,
            especialidad: especialidad,
            estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
           
            $("#modal_editar").modal('hide');
            Swal.fire("Mensaje De Confirmacion","Datos Actualizados correctamente","success")            
            .then ( ( value ) =>  {
                LimpiarEspecialidad();
                table_especialidad.ajax.reload();
            }); 
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos, no se pudo completar el registro","error");
        }
    })


}

function LimpiarEspecialidad(){
    $("#txt_especialidad").val("");
    $("#txt_especialidad_editar").val("");
}