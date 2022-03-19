<?php require 'views/header.php'; ?>
<div class="alert alert-primary d-flex align-items-center" role="alert">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
  <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
  <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
</svg>
  <div>
    Selecciona el paciente para hacer su referencia
  </div>
</div>
    <div id="main">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Sección de consulta</h1>

        <table width="100%" id="tabla">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Expediente</th>
                    <th>Motivo</th>
                    <th>Servicio</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="tbody-articulos">
            
        <?php
            include_once 'models/paciente.php';
            foreach ($this->pacientes as $row) {
                $paciente = new Paciente();
                $paciente = $row;
        ?>
                <tr id="fila-<?php echo $paciente->id; ?>">
                    <td><?php echo $paciente->id; ?></td>
                    <td><?php echo $paciente->expediente; ?></td>
                    <td><?php echo $paciente->motivo; ?></td>
                    <td><?php echo $paciente->servicio1; ?></td>
                    
                    <td><a href="<?php echo constant('URL') . 'consultaArti/verArticulo/' . $paciente->id; ?>">Referenciar</a></td>
                    <td><button class="bEliminar" data-matricula="<?php echo $paciente->id; ?>">Eliminar</button></td> 
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
    <?php require 'views/footer.php'; ?>
    <script>
$(document).ready(function (){
	console.log("jqueery chambeando en false. . ");	
  $('#trabajar').hide();
	$('#search').hide();
});
</script> 