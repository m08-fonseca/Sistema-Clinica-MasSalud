// Esta funcion sirve para realizar las validaciones del login
function VerificarUsuario(){
    var usu = $("#txt_usu").val();
    var con = $("#txt_con").val();

    if(usu.length==0 || con.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }
    $.ajax({
        url:'../controlador/usuario/controlador_verificar_usuario.php',
        type:'POST',
        data:{
            user:usu,
            pass:con
        }
    }).done(function(resp){
       
        if(resp==0){
            Swal.fire("Mensaje De Error",'Usuario y/o contrase\u00f1a incorrecta',"error");
        }else{
            var data= JSON.parse(resp);
            if(data[0][5]==='INACTIVO'){
                return Swal.fire("Mensaje De Advertencia","Lo sentimos el usuario "+usu+" se encuentra suspendido, comuniquese con el administrador","warning");
            }
            $.ajax({
                url:'../controlador/usuario/controlador_crear_session.php',
                type:'POST',
                data:{
                    idusuario:data[0][0],
                    user:data[0][1],
                    rol:data[0][6]
                }
            }).done(function(resp){
                let timerInterval
                Swal.fire({
                title: 'BIENVENIDO AL SISTEMA',
                html: 'Usted sera redireccionado en <b></b> milisegundos.',
                timer: 2000,
                timerProgressBar: true,
                onBeforeOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                        b.textContent = Swal.getTimerLeft()
                        }
                    }
                    }, 100)
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    location.reload();
                }
})
            })
           
        }
    })
}

// Lista a todos los usuarios que estan guardados en la data
var table;
function listar_usuario(){
     table = $("#tabla_usuario").DataTable({
       "ordering":false,   
       "bLengthChange":false,
       "searching": { "regex": false },
       "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
       "pageLength": 10,
       "destroy":true,
       "async": false ,
       "processing": true,
       "ajax":{
           "url":"../controlador/usuario/controlador_usuario_listar.php",
           type:'POST'
       },
       "columns":[
           {"data":"posicion"},
           {"data":"usu_nombre"},
           {"data":"roll_nombre"},
           {"data":"usu_sexo",
                render: function (data, type, row ) {
                    if(data=='M'){
                        return "MASCULINO";                   
                    }else{
                        return "FEMENINO";                 
                    }
                }
           }, 
           {"data":"usu_estatus",
             render: function (data, type, row ) {
               if(data=='ACTIVO'){
                   return "<span class='label btn btn-success'>"+data+"</span>";                   
               }else{
                 return "<span class='label btn btn-danger'>"+data+"</span>";                 
               }
             }
           },  
           {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary ml-1'><i class='fa fa-edit'></i></button><button style='font-size:13px;' type='button' class='desactivar btn btn-danger ml-1'><i class='fa fa-trash'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-success'><i class='fa fa-check'></i></button>"}
       ],

       "language":idioma_espanol,
       select: true
   });
   document.getElementById("tabla_usuario_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });

}

// Añade un modal a los botones, estilo y llama a la función modificar
$('#tabla_usuario').on('click','.activar',function(){
    var data = table.row($(this).parents('tr')).data();
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    Swal.fire({
        title: 'Esta seguro de activar al usuario?',
        text: "Una vez hecho esto el usuario  tendra acceso al sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.value) {
            Modificar_Estatus(data.usu_id,'ACTIVO');
        }
      })
})

// Añade un modal a los botones, estilo y llama a la función modificar
$('#tabla_usuario').on('click','.desactivar',function(){
    var data = table.row($(this).parents('tr')).data();
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    Swal.fire({
        title: 'Esta seguro de desactivar al usuario?',
        text: "Una vez hecho esto el usuario no tendra acceso al sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.value) {
            Modificar_Estatus(data.usu_id,'INACTIVO');
        }
      })
})


// ACTUALIZAR
$('#tabla_usuario').on('click','.editar',function(){
    var data = table.row($(this).parents('tr')).data();
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#txtidusuario").val(data.usu_id);
    $("#txtusu_editar").val(data.usu_nombre);
    $("#cbm_sexo_editar").val(data.usu_sexo).trigger("change");
    $("#cbm_rol_editar").val(data.rol_id).trigger("change");
    
})

// Modifica si el usuario esta activo o inactivo

function Modificar_Estatus(idusuario,estatus){
    var mensaje ="";
    if(estatus=='INACTIVO'){
        mensaje="desactivo";
    }else{
        mensaje="activo";
    }
    $.ajax({
        "url":"../controlador/usuario/controlador_modificar_estatus_usuario.php",
        type:'POST',
        data:{
            idusuario:idusuario,
            estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
            Swal.fire("Mensaje De Confirmacion","El usuario se "+mensaje+" con exito","success")            
            .then ( ( value ) =>  {
                table.ajax.reload();
            }); 
        }
    })


}

// Funcion que sirve como filtro global
function filterGlobal() {
    $('#tabla_usuario').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

// Modal de Sweetalert
function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
}

// Funcion para listar los rollers en SELECT
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
            $("#cbm_rol_editar").html(cadena);
        }else{
            cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#cbm_rol").html(cadena);
            $("#cbm_rol_editar").html(cadena);
        }
    })
}

// Funcion que registra a los usuarios
function Registrar_Usuario(){
    var usu = $("#txt_usu").val();
    var contra = $("#txt_con1").val();
    var contra2 = $("#txt_con2").val();
    var sexo = $("#cbm_sexo").val();
    var rol = $("#cbm_rol").val();
    if(usu.length==0 || contra.length==0 || contra.length==0 || contra2.length==0 || sexo.length==0 || rol.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }

    if(contra != contra2){
        return Swal.fire("Mensaje De Advertencia","Las contraseñas deben coincidir","warning");        
    }

    $.ajax({
        "url":"../controlador/usuario/controlador_usuario_registro.php",
        type:'POST',
        data:{
            usuario:usu,
            contrasena:contra,
            sexo:sexo,
            rol:rol
        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                $("#modal_registro").modal('hide');
                Swal.fire("Mensaje De Confirmacion","Datos correctamente, Nuevo Usuario Registrado","success")            
                .then ( ( value ) =>  {
                    LimpiarRegistro();
                    table.ajax.reload();
                }); 
            }else{
                return Swal.fire("Mensaje De Advertencia","Lo sentimos, el nombre del usuario ya se encuentra en nuestra base de datos","warning");
            }
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos, no se pudo completar el registro","error");
        }
    })


}

// MODIFICAR USUARIO
function Modificar_Usuario(){
    var idusuario = $("#txtidusuario").val();
    var sexo = $("#cbm_sexo_editar").val();
    var rol = $("#cbm_rol_editar").val();
    if(idusuario.length==0 ||sexo.length==0 || rol.length==0){
        return Swal.fire("Mensaje De Advertencia","Llene los campos vacios","warning");
    }

    $.ajax({
        "url":"../controlador/usuario/controlador_usuario_modificar.php",
        type:'POST',
        data:{
            idusuario:idusuario,
            sexo:sexo,
            rol:rol
        }
    }).done(function(resp){
        if(resp>0){
            Traer_DatosUsuario();
            $("#modal_editar").modal('hide');
            Swal.fire("Mensaje De Confirmacion","Datos Actualizados correctamente","success")            
            .then ( ( value ) =>  {
                table.ajax.reload();
                
            }); 
        }else{
            Swal.fire("Mensaje De Error","Lo sentimos, no se pudo completar el registro","error");
        }
    })


}
// Funcion de limpieza para el registro
function LimpiarRegistro(){
    $("#txt_usu").val("");
    $("#txt_con1").val("");
    $("#txt_con2").val("");
}

// MODAL DE RESTABLECER
function AbrirModalRestablecer(){
    $("#modal_restablecer_contra").modal({backdrop:'static',keyboard:false})
    $("#modal_restablecer_contra").modal('show');
    $("#modal_restablecer_contra").on('shown.bs.modal',function(){
        $("#txt_email").focus();
    })
}

// FUNCION DE RESTABECER

function Restablecer_Contra(){
    var email = $("#txt_email").val();
    if(email.length == 0){
        return Swal.fire("Mensaje de Advertencia","Llene los campos en blanco", "warning");
    }
    // Estos caracteres me permiten brindar una contraseña aleatoria
    var caracteres ="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ2345678";
    var contrasena ="";
    for( var i = 0; i < 6; i++){
        contrasena+=caracteres.charAt(Math.floor(Math.random(hash+256)*caracteres.length));
    }
   
    $.ajax({
        url:'../controlador/usuario/controlador_restablecer_contra.php',
        type:'POST',
        data:{
            email:email,
            contrasena:contrasena
        }
    }).done(function(resp){
        alert(resp);
    })
    
}


// Transferir datos
function Traer_DatosUsuario(){
   var usuario = $("#usuarioprincipal").val();
   $.ajax({
       "url":"../controlador/usuario/controlador_traerdator_usuario.php",
       type:'POST',
       data:{
           usuario:usuario
       }
   }).done(function(resp){
      
       var data = JSON.parse(resp);
       
        $("#txtcontra_actual").val(data[0][2]);   
       
   })
   
}



// Funcion de editar contraseña abre el modal
function AbrirModalEditarContra(){
    $("#modal_editar_contra").modal({backdrop:'static',keyboard:false})
    $("#modal_editar_contra").modal('show');
    $("#modal_editar_contra").on('shown.bs.modal',function(){
        $("#txtcontra_actual").focus();  
    })
}

function EditarContrasena(){
    var idusuario = $("#txtidprincipal").val();
    var contrabd = $("#txtcontra_db").val();
    var contraescrita = $("#txtcontra_actual").val();
    var contranu = $("#txtcontra_nueva").val();
    var contrare = $("#txtcontra_repetir").val();
    if( contranu.length == 0 || contrare.length == 0){
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios","warning");
    }

    if(contranu != contrare){
        return Swal.fire("Mensaje De Advertencia", "Debes ingresar la misma clave dos veces para confirmarla","warning");
    }

    $.ajax({
        url:'../controlador/usuario/controlador_contra_modificar.php',
        type:'POST',
        data:{
            // idusuario:idusuario,
            // contrabd:contrabd,
            // contraescrita:contraescrita,
            // contranu:contranu
            contranu:contranu,
            contrare: contrare
        }
    }).done(function(resp){
        
        if(resp > 0){

            if(resp == 1){
                $("#modal_editar").modal('hide');
                LimpiarEditarContra();
                Swal.fire("Mensaje De Confirmacion","Contraseña Actualizada correctamente","success")            
                .then ( ( value ) =>  {
                    Traer_DatosUsuario();
                   
                    
                });
            }else{
                Swal.fire("Mensaje De Error,","La contraseña actual ingresada no coincide con la base de datos", "error");
            }

        }else{
            Swal.fire("Mensaje De Error,","No se pudo actualizar la contraseña", "error");
        }
    })
}

function LimpiarEditarContra(){
    $("#txtcontra_actual").val("");
    $("#txtcontra_nueva").val("");
    $("#txtcontra_repetir").val("");
   
}