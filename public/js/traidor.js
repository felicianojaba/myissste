$(document).ready(function (){
	let edit = false;
	console.log("jqueery chambeando. . ");	
	$('#paciente-result').hide();
	//Capture el evento del elemto o input con id=search 
	
/*
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
                /*		
				success: function (response) {
				let pacientes = JSON.parse(response);
				let template ='';
				pacientes.forEach(paciente =>{
					template += `<tr pacienteid="${paciente.id}">
					<td>${paciente.id}</td>
					<td>
						<a href="#" class="paciente-expediente">${paciente.expediente}</a>
					</td>
					<td>${paciente.nombre}</td>
					<td>
						<button class="task-delete btn btn-danger">
						Borrar
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
			id : $('#pacienteId').val()
		};

		let laurl =	edit === false ? 'tarea/grabar' : 'tarea/actualizarte';
		

		$.post(laurl, postData,function (response) { 
		console.log(response);
		obtenerTareas();
		$('#paciente-form').trigger('reset');
		console.log(response);
		});
		e.preventDefault();
	});

	function obtenerTareas(){
		$.ajax({
			url: "tarea/mostrart",
			type: "GET",
			success: function (response) {
				let pacientes = JSON.parse(response);
				let template ='';
				pacientes.forEach(paciente =>{
					template += `<tr pacienteid="${paciente.id}">
					<td>${paciente.id}</td>
					<td>
						<a href="#" class="paciente-expediente">${paciente.expediente}</a>
					</td>
					<td>${paciente.nombre}</td>
					<td>
						<button class="task-delete btn btn-danger">
						Borrar
					</td>
					</tr>`});
				$('#pacientes').html(template);
				}
		});
	}	
	
	$(document).on('click','.task-delete', function () {
		if(confirm('Desea borrar esta tarea . . ?')){
			let element = $(this)[0].parentElement.parentElement;
			let id = $(element).attr('taskid');
			$.post('tarea/borarrte',{id}, function (response){
			obtenerTareas();	

			});
		}
	});

	$(document).on('click','.paciente-expediente', function () {
		let element = $(this)[0].parentElement.parentElement;
		let id = $(element).attr('pacienteid');
		$.post('tarea/cambiarte', {id}, function (response){	
			const paciente = JSON.parse(response);
		$('#expediente').val(paciente.expediente);
		$('#eltipo').val(paciente.eltipo);
		$('#nombre').val(paciente.nombre);
		$('#pacienteId').val(paciente.id);
		edit = true;	
		});
	});	

*/
});