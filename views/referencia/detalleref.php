<?php require 'views/header.php';?>
<h1 class="center">Bienvenido a Referencias</h1>

<div class="container-fluid">
        <table class="table table-success table-striped" id="tabla">
            <thead>
                <tr>
                    <th>Expediente</th>
                    <th>Nombre</th>
                    <th>Servicio</th>
                    <th>Motivo</th>
                    <th>Fechffa</th>
                    <th>Seleccionar</th>
                </tr>
            </thead>

            <tbody id="tbody-alumnos">
            
        <?php
            include_once 'models/paciente.php';
            foreach ($this->pacientes as $row) {
                $paciente = new Paciente();
                $paciente = $row;
        ?>
                <tr id="fila-<?php echo $paciente->id; ?>">
                    <td><?php echo $paciente->expediente; ?></td>
                    <td><?php echo $paciente->nombre; ?></td>
                    <td><?php echo $paciente->servicio1; ?></td>
                    <td><?php echo $paciente->motivo; ?></td>
                    <td><?php echo $paciente->lafecha; ?></td>
                    
                    
                    <td><a href="<?php echo constant('URL') . 'referencia/verreferencia/' . $paciente->id; ?>">Seleccionar</a></td>
                    
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