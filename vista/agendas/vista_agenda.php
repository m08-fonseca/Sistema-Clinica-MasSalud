<head>
<!-- <link rel="stylesheet" href="../CalendarioWeb/css/boostrapcdn.css"> -->

</head>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">CALENDARIO</h3>

        </div>
		<div class ="container">
			<div class="row p-5">
				<div class="col"></div>
				<div class="col-7"><div id="CalendarioWeb"></div></div>
				<div class="col" ></div>
			</div>
		</div>
        
    </div>
</div>


<script src="../CalendarioWeb/js/moment.min.js"></script>
<script src="../CalendarioWeb/js/fullcalendar.min.js"></script>

<script>
	$(document).ready(function(){
		$('#CalendarioWeb').fullCalendar({
			header:{
				left:'today,prev,next,Miboton',
				center:'title',
				right:'month, basicWeek, basicDay, agendaWeek, agendaDay'
			},
			customButtons:{
				Miboton:{
					text:"Boton 1",
					click: function(){
						alert("Acción del botón");
					}
				}
			},
			dayClick:function(date,jsEvent,view){
				alert("Valor seleccionado:" +date.format());
				alert("Vista actual:" +view.name);
				$(this).css('background-color','red');
				
				
				
			}
		});
	});
</script>

<!-- Modal -->
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
            
        </div>
    </div>
</div>


<script src="../CalendarioWeb/js/es.js"></script>
