<?php require 'views/header.php'; ?>
<script src="<?php echo constant('URL'); ?>public/js/typeahead.min.js"></script>
<style>
  .bd-placeholder-img {
     font-size: 0.75 rem;
     text-anchor: middle;
     -webkit-user-select: none;
     -moz-user-select: none;
     user-select: none;
   }
    @media (min-width: 768px) {.bd-placeholder-img-lg {font-size: 3.0rem; }  }
</style>
<!-- Custom styles for this template -->
<link href="<?php echo constant('URL'); ?>public/js/form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container-fluid">
  <div class="row">
    <!-- Aqui Datos del Paciente -->
    <div class="col-9">
        
        <div class="card">
          <div class="card-body">
      
            <form id="paciente-form" class="needs-validation" novalidate>
              <input type="hidden" id="pacienteId">
              
              <!--El pirmer renglon del formulario -->
              <div class="row">
                
                <!-- Expediente -->
                <div class="col-2">
                  <label for="expediente" class="form-label">Expediente</label>
                  <input type="text"  class="text-uppercase form-control fs-15" id="expediente" maxlength="10">
                </div>  
                
                <!-- Tipo de -->
                <div class="col-2">
                  <label for="tipo" class="form-label">Tipo</label>
                  <select id="eltipo" class="form-select" aria-label="Default select example">
                    <option value="10">Trabajador</option>
                    <option value="20">Trabajadora</option>
                    <option value="30">Esposa</option>
                    <option value="31">Concubina</option>
                    <option value="40">Esposo</option>
                    <option value="41">Concubino</option>
                    <option value="50">Padre</option>
                    <option value="51">Abuelo</option>
                    <option value="60">Madre</option>
                    <option value="61">Abuela</option>
                    <option value="70">Hijo</option>
                    <option value="72">SegundoHijo</option>
                    <option value="73">TercerHijo</option>
                    <option value="74">CuartoHijo</option>
                    <option value="80">Hija</option>
                    <option value="82">SegundaHija</option>
                    <option value="83">TerceraHija</option>
                    <option value="84">CuartaHija</option>
                    <option value="90">Pensionado</option>
                    <option value="91">Pensionada</option>
                    <option value="92">PrimerFamiliar</option>
                    <option value="93">SegundoFamiliar</option>
                    <option value="94">TercerFamiliar</option>
                    <option value="95">CuartoFamiliar</option>
                  </select>
                </div>
                
                <!-- Descripe -->
                <div class="col-6">
                  <label for="descripe" class="form-label">Apellido Paterno Materno Nombrea</label>
                  <input type="text" class="form-control" id="nombre" maxlength="40">
                </div>
                
                <!-- Sexo -->
                <div class="col-2">
                  <label for="sexo" class="form-label">Sexo</label>
                  <select id="sexo" class="form-select" aria-label="Default select example">
                    <option value="FEMENINO">FEMENINO</option>
                    <option value="MACULINO">MASCULINO</option>
                  </select>
                </div>
              </div> <!-- Div primer renglon del formulario -->
              
              <!-- El segundo renglon del formulario -->
              <div class="row">
                <!-- Nacio --> 
                <div class="col-3">
                  <label for="nacio" class="form-label">Nacio</label>
                  <input type="date" class="form-control" id="nacio">
                </div> 
                
                <!-- Telefon -->
                <div class="col-3">
                  <label for="telefono" class="form-label">Telefono</label>
                  <input type="text" class="form-control" id="telefono" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>  
                
                <!-- Dependencia -->
                <div class="col-6">
                  <label for="depende" class="form-label">Dependencia</label>
                  <input type="text" class="form-control" id="depende">
                </div>
              </div><!-- Div segundo renglon del formulario -->
              
              <!-- Aqui el boton de guardar -->
              <div class="row">
                <div class="d-grid gap-0 col-6 mx-auto">
                  <BR>
                  <button class="btn btn-primary" type="submit">Guarda DaTos Paciente</button>
                </div>
              </div>
            
            </form>
          </div>
        </div>          
        <BR><BR>
        <div class="alert  alert-success" role="alert">Asegurate de que los datos del paciente esten completos antes de ir a la Referencia  </div>
        <div class="d-grid gap-4 col-6 mx-auto">
            <button id="btn-referencia" class="btn btn-info" >Datos Referencia</button>
        </div>
    </div>      

    <div class="col-3 col align-self-start">
      <table class="table table-success table-striped table table-sm">
        <thead>
          <tr>
            <td>Id</td>
            <td>Expediente</td>
            <td>Tipo</td>
            <td>Nombre</td>
          </tr>
        </thead>
        <tbody id="pacientes"></tbody>
      </table>
    </div>      

  </div>  
</div> 
</BODY> 


<script type="text/javascript" src="<?php echo constant('URL'); ?>public/js/tareas.js"></script>
<script type="text/javascript" src="<?php echo constant('URL'); ?>public/js/form-validation.js"></script>
<?php require 'views/footer.php'; ?>