
// Lista a todos los usuarios que estan guardados en la data
var tablemedico;
// CAMBIO
function listar_medico(){
    tablemedico = $("#tabla_medico").DataTable({
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
           "url":"../controlador/usuario/controlador_medico_listar.php",
           type:'POST'
        //    CAMBIO
       },
       "order":[[1,"asc"]], 
       "columns":[
            //    CAMBIO
            {"defaultContent":""},
            {"data":"medico_ndocumento"},
            {"data":"medico_nombre"},
            {"data":"medico_colegiatura"},
            {"data":"especialidad_nombre"},
            {"data":"medico_sexo",
                render: function (data, type, row ) {
                    if(data=='M'){
                        return "<span class='label'>"+data+"</span>";                   
                    }else{
                    return "<span class='label'>"+data+"</span>";                 
                    }
                }
            }, 
            {"data":"medico_tel1"},
            {"data":"medico_tel2"}, 
            {"defaultContent":"<button style='font-size:13px;' type='button' class='modificar btn btn-primary ml-1'><i class='fa fa-edit'></i></button>"}
        ],

       "language":idioma_espanol,
       select: true
   });
//    CAMBIO
   document.getElementById("tabla_medico_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });

    // CAMBIO,Contador de id
    tablemedico.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_medico').DataTable().page.info();
        tablemedico.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );
}

function filterGlobal() {
    $('#tabla_medico').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

// Modal de Sweetalert
function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
    listar_combo_rol();
    listar_combo_especialidad();
}

// Funcion que registra a los medicos
// function Registrar_medico(){
//     var medico = $("#txt_medico").val();
//     var stock = $("#txt_stock").val();
//     var estatus = $("#cbm_estatus_medico").val();
//     if(stock<0){
//         return Swal.fire("Mensaje De Advertencia","El stock no puede ser menor","warning");
//     }
//     // CAMBIO
//     if(medico.length==0 || stock.length==0 || estatus.length==0 ){
//         return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
//     }
   
//     // CAMBIO
//     $.ajax({
//         "url":"../controlador/usuario/controlador_medico_registro.php",
//         type:'POST',
//         data:{
//             in:medico,
//             st:stock,
//             es:estatus
//         }
//     }).done(function(resp){
      
//         if(resp>0){
//             if(resp==1){
               
//                 $("#modal_registro").modal('hide');
//                 listar_medico();
//                 Swal.fire("Mensaje De Confirmacion","Datos correctamente, Nuevo medico Registrado","success")            
//                 .then ( ( value ) =>  {
//                     // LimpiarRegistro();
//                     table.ajax.reload();
//                 }); 
//             }else{
//                 return Swal.fire("Mensaje De Advertencia","Lo sentimos, el nombre del medico ya se encuentra en nuestra base de datos","warning");
//             }
//         }else{
//             Swal.fire("Mensaje De Error","Lo sentimos, no se pudo completar el registro","error");
//         }
//     })


// }

// Funcion reutilizada
function listar_combo_rol(){
    $.ajax({
        "url":"../controlador/usuario/controlador_combo_rol_listar.php",
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#cbm_rol").html(cadena);
        }else{
            cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
        }
    })
}

function listar_combo_especialidad(){
    $.ajax({
        "url":"../controlador/usuario/controlador_especialidad_rol_listar.php",
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#cbm_especialidad").html(cadena);
        }else{
            cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#cbm_especialidad").html(cadena);
        }
    })
}