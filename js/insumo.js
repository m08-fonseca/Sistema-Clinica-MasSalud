
// Lista a todos los usuarios que estan guardados en la data
var tableinsumo;
// CAMBIO
function listar_insumo(){
    tableinsumo = $("#tabla_insumo").DataTable({
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
           "url":"../controlador/usuario/controlador_insumo_listar.php",
           type:'POST'
        //    CAMBIO
       },
       "order":[[1,"asc"]], 
       "columns":[
        //    CAMBIO
           {"defaultContent":""},
           {"data":"insumo_nombre"},
           {"data":"insumo_stock"},
           {"data":"insumo_fregistro"},
           {"data":"insumo_estatus",
                render: function (data, type, row ) {
                    if(data=='ACTIVO'){
                        return "<span class='label btn btn-success'>"+data+"</span>";                   
                    }
                    if(data=='INACTIVO'){
                        return "<span class='label btn btn-danger'>"+data+"</span>";                 
                    }
                    if(data=='AGOTADO'){
                        return "<span class='label btn btn-dark'>"+data+"</span>";                 
                    }
                }
           },  
           {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary ml-1'><i class='fa fa-edit'></i></button>"}
       ],

       "language":idioma_espanol,
       select: true
   });
//    CAMBIO
   document.getElementById("tabla_insumo_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });

    // CAMBIO,Contador de id
    tableinsumo.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_insumo').DataTable().page.info();
        tableinsumo.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );
}

function filterGlobal() {
    $('#tabla_insumo').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

// Modal de Sweetalert
function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
}

// Funcion que registra a los insumos
function Registrar_Insumo(){
    var insumo = $("#txt_insumo").val();
    var stock = $("#txt_stock").val();
    var estatus = $("#cbm_estatus_insumo").val();
    if(stock<0){
        return Swal.fire("Mensaje De Advertencia","El stock no puede ser menor","warning");
    }
    // CAMBIO
    if(insumo.length==0 || stock.length==0 || estatus.length==0 ){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
   
    // CAMBIO
    $.ajax({
        "url":"../controlador/usuario/controlador_insumo_registro.php",
        type:'POST',
        data:{
            in:insumo,
            st:stock,
            es:estatus
        }
    }).done(function(resp){
      
        if(resp>0){
            if(resp==1){
               
                $("#modal_registro").modal('hide');
                listar_insumo();
                Swal.fire("Mensaje De Confirmacion","Datos correctamente, Nuevo Insumo Registrado","success")            
                .then ( ( value ) =>  {
                    LimpiarInsumo()
                    table.ajax.reload();
                }); 
            }else{
                return Swal.fire("Mensaje De Advertencia","Lo sentimos, el nombre del insumo ya se encuentra en nuestra base de datos","warning");
            }
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos, no se pudo completar el registro","error");
        }
    })


}

//Modificar 

// ACTUALIZAR
$('#tabla_insumo').on('click','.editar',function(){
    var data = tableinsumo.row($(this).parents('tr')).data();
    if(tableinsumo.row(this).child.isShown()){
        var data = tableinsumo.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#txtidinsumo").val(data.insumo_id);
    $("#txt_insumo_editar").val(data.insumo_nombre);
    $("#txt_stock_editar").val(data.insumo_stock);
    $("#cbm_estatus_insumo_editar").val(data.insumo_estatus).trigger("change");
})

// MODIFICAR 
function Modificar_Insumo(){
    var idinsumo = $("#txtidinsumo").val();
    var stockinsumo = $("#txt_stock_editar").val();
    var estatus= $("#cbm_estatus_insumo_editar").val();
    if(idinsumo.length==0 ||stockinsumo.length==0 ||estatus.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }

    $.ajax({
        "url":"../controlador/usuario/controlador_insumo_modificar.php",
        type:'POST',
        data:{
            idinsumo:idinsumo,
            stockinsumo:stockinsumo,
            estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
           
            $("#modal_editar").modal('hide');
            Swal.fire("Mensaje De Confirmacion","Datos Actualizados correctamente","success")            
            .then ( ( value ) =>  {
                LimpiarInsumo();
                tableinsumo.ajax.reload();
            }); 
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos, no se pudo completar el registro","error");
        }
    })


}

function LimpiarInsumo(){
    $("#txt_insumo").val("");
    $("#txt_insumo_editar").val("");
    $("#txt_stock").val("");
    $("#txt_stock_editar").val("");
}