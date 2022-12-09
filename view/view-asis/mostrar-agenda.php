<?php
require '../../controller/conexion.php';
$abog = $_SESSION['idabo'];

$consulta_agenda = "SELECT *  FROM agenda WHERE IdAbo='$abog'";
$resultado_agenda = mysqli_query($con, $consulta_agenda);
$proceso = mysqli_fetch_array($resultado_agenda);
$idAgen = $proceso['IdAgen'];

$consulta_eventos = "SELECT * FROM evento WHERE IdAgen='$idAgen'";
$resultado_eventos = mysqli_query($con, $consulta_eventos);
?>

<html lang="es">
<link href='css/fullcalendar.min.css' rel='stylesheet' />

<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<!-- CSS only -->
<!-- CSS only -->

<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script src='locale/es-es.js'></script>
<script src='locale/locales-all.js'></script>
<script src='locale/locales-all.min.js'></script>
<script src='locale/main.js'></script>
<script src='locale/main.min.js'></script>

<script>
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
				locale: 'es',
				language: 'es',
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: Date(),
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			eventClick: function(event) {

				$('#visualizar #id').text(event.id);
				$('#visualizar #title').text(event.title);
				$('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
				$('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
				$('#visualizar').modal('show');
				return false;

			},

			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				$('#cadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
				$('#cadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'));
				$('#cadastrar').modal('show');
			},
			events: [
				<?php
				while ($registros_eventos = mysqli_fetch_array($resultado_eventos)) {
				?> {
						id: '<?php echo $registros_eventos['IdEven']; ?>',
						title: '<?php echo $registros_eventos['titulo']; ?>',
						start: '<?php echo $registros_eventos['fecha_inicio']; ?>',
						end: '<?php echo $registros_eventos['fecha_fin']; ?>',
						color: '<?php echo $registros_eventos['color']; ?>',
					},
				<?php
				}
				?>
			]
		});
	});

	//Mascara para o campo data e hora
	function DataHora(evento, objeto) {
		var keypress = (window.event) ? event.keyCode : evento.which;
		campo = eval(objeto);
		if (campo.value == '00/00/0000 00:00:00') {
			campo.value = ""
		}

		caracteres = '0123456789';
		separacao1 = '/';
		separacao2 = ' ';
		separacao3 = ':';
		conjunto1 = 2;
		conjunto2 = 5;
		conjunto3 = 10;
		conjunto4 = 13;
		conjunto5 = 16;
		if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
			if (campo.value.length == conjunto1)
				campo.value = campo.value + separacao1;
			else if (campo.value.length == conjunto2)
				campo.value = campo.value + separacao1;
			else if (campo.value.length == conjunto3)
				campo.value = campo.value + separacao2;
			else if (campo.value.length == conjunto4)
				campo.value = campo.value + separacao3;
			else if (campo.value.length == conjunto5)
				campo.value = campo.value + separacao3;
		} else {
			event.returnValue = false;
		}
	}

	$(function() {
		$('#form').submit(function() {
			var data = $(this).serialize();
			$.post('consulta.php', data, function(respuesta) {
				$('#cadastrar').modal('hide');
				$('#cadastrar1').modal('open');
			});
			return false;
		});
	});
</script>



<!-- Collect the nav links, forms, and other content for toggling -->

<!-- /.navbar-collapse -->
</div>
<!-- /.container-fluid -->
</nav>
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="panel-body">
				<!--Inicio elementos contenedor-->

				<?php
				if (isset($_SESSION['mensaje'])) {
					echo $_SESSION['mensaje'];
					unset($_SESSION['mensaje']);
				}
				?>

				<div id='calendar'></div>
			</div>

			<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title text-center">Datos del Evento</h4>
							
						</div>
						<div class="modal-body">
							<dl class="dl-horizontal">
								<dt>ID de Evento</dt>
								<dd id="id"></dd>
								<dt>Titulo de Evento</dt>
								<dd id="title"></dd>
								<dt>Inicio de Evento</dt>
								<dd id="start"></dd>
								<dt>Fin de Evento</dt>
								<dd id="end"></dd>
								<dt>Descripcion</dt>
								<dd id="descripcion"></dd>

							</dl>
							

						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title text-center">Registrar Evento</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" method="POST" action="proceso.php">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="titulo" placeholder="Titulo de evento">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Color</label>
									<div class="col-sm-10">
										<select name="color" class="form-control" id="color">
											<option value="">Selecione</option>
											<option style="color:#FFD700;" value="#FFD700">Amarillo</option>
											<option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
											<option style="color:#FF4500;" value="#FF4500">Naranja</option>
											<option style="color:#8B4513;" value="#8B4513">Marron</option>
											<option style="color:#1C1C1C;" value="#1C1C1C">Negro</option>
											<option style="color:#436EEE;" value="#436EEE">Azul Real</option>
											<option style="color:#A020F0;" value="#A020F0">Purpura</option>
											<option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
											<option style="color:#228B22;" value="#228B22">Verde</option>
											<option style="color:#8B0000;" value="#8B0000">Rojo</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="inicio" id="start" onKeyPress="DataHora(event, this)">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Data Final</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="fin" id="end" onKeyPress="DataHora(event, this)">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Descripción</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="descripcion" id="descripcion">
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-success">Registrar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>


				<!-- Modal -->
				<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								...
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>

