<?php require 'views/header.php'; ?>

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
<link href="form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php
      $fechaActual = date('d-m-Y');
      $mDate=new DateTime();
      $hoy=$mDate->format("H:i:s");
      function calculaedad($fechanacimiento){
        list($ano,$mes,$dia) = explode("-",$fechanacimiento);
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0){
          $ano_diferencia--;
        }
        return $ano_diferencia;
      }
      $cuentapacientes=0;
      //include_once 'models/refepaciente.php';
      //$cuentapacientes=0;
      //foreach($this->refepacientes as $row) {
       // $cuentapacientes=$cuentapacientes+1;
      //};
    ?>   
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Validar Informacion</h2>
      <p class="lead">Los informacion que se muestra es tomada de nuestra base de datos, puede modificar el que usted considere incorrecto, Gracias</p>
    </div>

    <!--AMBOS LADOS-->
    <div class="row g-6">
      
              <div class="card card my-4" id="paciente-result">
                <div class="card-body">
                  <ul id="container"></ul>
                </div>   
              </div>   
              <div class="col-md-6 col-lg-6 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-primary">Expedientes</span>
                  <span class="badge bg-primary rounded-pill"><?php echo $cuentapacientes;?></span>
                </h4>
                <div class="table-responsive">
                <table width="100%" class="table table-success table-striped" id="tabla">
               
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Expedinte</th>
                            <th>Nombre</th>
                            <th></th>
                            

                        </tr>
                    </thead>
                    <tbody id="pacientes">
                   
                    </tbody>
                </table>
                </div>
              </div><!--LADO DERECHO -->      
              
              
              <!--LADO ISQUIERDO -->
              <div class="col-md-6 col-lg-6">
                <h4 class="mb-3">Informacion del derechohabiente</h4>
                  <form id="task-form">
                <form id="task-form" class="needs-validation" novalidate>
                  <input type="hidden" id="taskId">
                  <div class="row g-9" GuardaRef>
                    
                  <!--EXPEDIENTE -->
                    <div class="col-sm-5">
                      <label for="motivor" class="form-label">Expediente</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Expediente" value="<?php echo $this->pacientes->motivo?>" required>
                      <div class="invalid-feedback">
                        Se requiere el Expediente.
                      </div>
                    </div>  
                    <!--NOMBRE -->
                    <div class="col-sm-3">
                      <label for="expediente" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="descripe" name="descripe" placeholder="" value="<?php echo $this->pacientes->nombre?>" required>
                      <div class="invalid-feedback">
                        Se requiere el nombre.
                      </div>
                    </div>

                  </div>                           
              </div> <!--LADO IZQUIERDO -->
    </div><!--AMBOS LADOS-->
                    
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Guardar Referencia</button>
                    </form>
                    <hr class="my-4">
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; Feliciano Figueroa Ontiveros</p>
  </footer>
</div>

<script src="<?php echo constant('URL'); ?>public/js/form-validation.js"></script>
</body>
</html>
