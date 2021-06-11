// Lista a todos los usuarios que estan guardados en la data
var tabletarea;
// CAMBIO
function listar_tarea(){
    tabletarea = $("#tabla_tarea").DataTable({
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
           "url":"../controlador/usuario/controlador_tarea_listar.php",
           type:'POST'
        //    CAMBIO
       },
       "order":[[1,"asc"]], 
       "columns":[
        //    CAMBIO
           {"defaultContent":""},
           {"data":"tarea_texto"},
           {"data":"tarea_fregistro"},
           {"data":"tarea_estatus",
                render: function (data, type, row ) {
                    if(data=='COMPLETADO'){
                        return "<span class='label btn btn-success'>"+data+"</span>";                   
                    }
                    if(data=='INCOMPLETO'){
                        return "<span class='label btn btn-danger'>"+data+"</span>";                 
                    }
                    if(data=='PROCESANDO'){
                        return "<span class='label btn btn-info'>"+data+"</span>";                 
                    }
                }
           },  
           {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary ml-1'><i class='fa fa-edit'></i></button>"}
       ],

       "language":idioma_espanol,
       select: true
   });
//    CAMBIO
   document.getElementById("tabla_tarea_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });

    // CAMBIO,Contador de id
    tabletarea.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_tarea').DataTable().page.info();
        tabletarea.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );
}

function filterGlobal() {
    $('#tabla_tarea').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

// Modal de Sweetalert
function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
}

function Registrar_Tarea(){
    var tarea = $("#txt_tarea").val();
    var estatus = $("#cbm_estatus").val();
    // CAMBIO
    if(tarea.length==0 || estatus.length==0 ){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
   
    // CAMBIO
    $.ajax({
        "url":"../controlador/usuario/controlador_tarea_registro.php",
        type:'POST',
        data:{
            tarea:tarea,
            estatus:estatus
        }
    }).done(function(resp){
      
        if(resp>0){
            if(resp==1){
               
                $("#modal_registro").modal('hide');
                listar_tarea();
                Swal.fire("Mensaje De Confirmacion","Datos correctamente, Nuevo tarea Registrado","success")            
                .then ( ( value ) =>  {
                    LimpiarTarea();
                    tabletarea.ajax.reload();
                }); 
            }else{
                return Swal.fire("Mensaje De Advertencia","Lo sentimos, la tarea ya se encuentra en nuestra base de datos","warning");
            }
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos, no se pudo completar el registro","error");
        }
    })


}

//Modificar 

// ACTUALIZAR
$('#tabla_tarea').on('click','.editar',function(){
    var data = tabletarea.row($(this).parents('tr')).data();
    if(tabletarea.row(this).child.isShown()){
        var data = tabletarea.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#txtidtarea").val(data.tarea_id);
    $("#txt_tarea_editar").val(data.tarea_texto);
    $("#cbm_estatus_editar").val(data.tarea_estatus).trigger("change");
})

// MODIFICAR 
function Modificar_Tarea(){
    var idtarea = $("#txtidtarea").val();
    var tarea = $("#txt_tarea_editar").val();
    var estatus= $("#cbm_estatus_editar").val();
    if(idtarea.length==0 ||tarea.length==0 ||estatus.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }

    $.ajax({
        "url":"../controlador/usuario/controlador_tarea_modificar.php",
        type:'POST',
        data:{
            idtarea:idtarea,
            tarea:tarea,
            estatus:estatus
        }
    }).done(function(resp){
        
        if(resp>0){
           
            $("#modal_editar").modal('hide');
            Swal.fire("Mensaje De Confirmacion","Datos Actualizados correctamente","success")            
            .then ( ( value ) =>  {
                LimpiarTarea();
                tabletarea.ajax.reload();
            }); 
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos, no se pudo completar el registro","error");
        }
    })


}

function LimpiarTarea(){
    $("#txt_tarea").val("");
    $("#txt_tarea_editar").val("");
}