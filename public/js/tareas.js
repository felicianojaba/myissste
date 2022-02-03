$(document).ready(function (){
	let edit = false;

	if (edit){
	console.log("jqueery chambeando true. . ");	
	}else{
		console.log("jqueery chambeando en false. . ");	
	}

	$('#paciente-result').hide();
	//Capture el evento del elemto o input con id=search 
	

	obtenerTareas()
	$('#search').keyup(function(e){
		
		if($('#search').val()){
			let search = $('#search').val();
			$.ajax({
				url : "tarea/responder",
				type : "POST",
				data : {search},
				/*success: function (response){
						let tasks = JSON.parse(response);
						let template ='';
						tasks.forEach(task =>{
							template += `<li>${task.nombre}</li>`});
						$('#container').html(template);
						$('#task-result').show();
				}*/		
				success: function (response) {
				let pacientes = JSON.parse(response);
				let template ='';
				pacientes.forEach(paciente =>{
					template += `<tr pacienteid="${paciente.id}">
					<td>${paciente.id}</td>
					<td>
						<a href="#" class="paciente-expediente">${paciente.expediente}</a>
					</td>
					<td>${paciente.eltipo}</td>
					<td>${paciente.nombre}</td>
					<td>${paciente.nacio}</td>
					<td>${paciente.telefono}</td>
					<td>${paciente.depende}</td>
					<td>
						<button class="task-delete btn btn-success">
						Editars
					</td>
					</tr>`});
				$('#pacientes').html(template);
				}
			})
		}	

	});

	$('#paciente-form').submit(function(e){
		const postData = {
			expediente : $('#expediente').val(),
			nombre : $('#nombre').val(),
			eltipo : $('#eltipo').val(),
			telefono : $('#telefono').val(),
			colonia : $('#colonia').val(),
			depende : $('#depende').val(),
			sexo : $('#sexo').val(),
			nacio : $('#nacio').val(),
			id : $('#pacienteId').val()
		};

		let laurl =	edit === false ? 'tarea/grabar' : 'tarea/actualizarte';
		

		$.post(laurl, postData,function (response) { 
		
		obtenerTareas();
		$('#paciente-form').trigger('reset');
		console.log(response);
		});
		e.preventDefault();
		edit = false;
	});

	function obtenerTareas(){
		$.ajax({
			url: "tarea/mostrart",
			type: "GET",
			success: function (response) {
				let pacientes = JSON.parse(response);
				let template ='';
				pacientes.forEach(paciente =>{
					template += `<tr pacienteid="${paciente.idpaciente}">
					<td>${paciente.idpaciente}</td>
					<td>
						<a href="#" class="paciente-expediente">${paciente.expediente.substring(0,10)}</a>
					</td>
					<td>${paciente.expediente.substring(10,12)}</td>
					<td>${paciente.nombre}</td>
					<td>${paciente.nacio}</td>
					<td>${paciente.telefono}</td>
					<td>${paciente.depende}</td>
					
					</tr>`});
				$('#pacientes').html(template);
				}
		});

	}	
	
	$(document).on('click','.task-delete', function () {
		if(confirm('Desea anotar a este paciente. . ?')){
			let fcons= $('#fconsulta').val();
			let element = $(this)[0].parentElement.parentElement;
			let id = $(element).attr('pacienteid');
						
			$.post('tarea/borrarte',{id,fcons}, function (response){
			//obtenerTareas();	
			console.log(response);

			});
		}
	});

	$(document).on('click','.paciente-expediente', function () {
		let element = $(this)[0].parentElement.parentElement;
		let id = $(element).attr('pacienteid');
		$.post('tarea/cambiarte', {id}, function (response){	
			const paciente = JSON.parse(response);
		$('#expediente').val(paciente.expediente);
		$('#eltipo').val(paciente.expediente.substring(10,12));
		$('#nacio').val(paciente.nacio);
		$('#nombre').val(paciente.nombre);
		$('#telefono').val(paciente.telefono);
		$('#colonia').val(paciente.colonia);
		$('#sexo').val(paciente.sexo);
		$('#depende').val(paciente.depende);
		$('#pacienteId').val(paciente.id);
		edit = true;	
		});
	});	


});		
