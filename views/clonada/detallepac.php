<?php require 'views/header.php';
//es un listado de pacientes que coinciden con el criterio de busqueda
//pacientes que no han tenido refercias anteriores
?>
<h1 class="center">Bienvenido a Detalle Pacientes</h1>

<div class="container-fluid">
        <table class="table table-success table-striped" id="tabla">
            <thead>
                <tr>
                    <th>Expediente</th>
                    <th>Nombre</th>
                    <th>Sexo</th>
                    <th>Telefono</th>
                    <th>Fecha Nac</th>
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
                <tr id="fila-<?php echo $paciente->idpaciente; ?>">
                    <td><?php echo $paciente->expediente; ?></td>
                    <td><?php echo $paciente->nombre; ?></td>
                    <td><?php echo $paciente->sexo; ?></td>
                    <td><?php echo $paciente->telefono; ?></td>
                    <td><?php echo $paciente->nacio; ?></td>
                    
                    <!--manda el idpaciente a referencia/verpaciente para que triaga sus datos -->
                    <td><a href="<?php echo constant('URL') . 'referencia/verpaciente/' . $paciente->idpaciente; ?>">Seleccionar</a></td>
                    
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