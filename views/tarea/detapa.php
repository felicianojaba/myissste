<?php require 'views/header.php'; ?>
<script src="<?php echo constant('URL'); ?>public/js/jquery.min.js"></script>
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
      include_once 'models/refepaciente.php';
      $cuentapacientes=0;
      foreach($this->refepacientes as $row) {
        $cuentapacientes=$cuentapacientes+1;
      };
    ?>   
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Validar Informacion</h2>
      <p class="lead">Los informacion que se muestra es tomada de nuestra base de datos, puede modificar el que usted considere incorrecto, Gracias</p>
    </div>

    <!--AMBOS LADOS-->
    <div class="row g-6">
      
              
              <div class="col-md-6 col-lg-6 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-primary">Traslados en el Año</span>
                  <span class="badge bg-primary rounded-pill"><?php echo $cuentapacientes;?></span>
                </h4>
                <div class="table-responsive">
                <table width="100%" class="table table-success table-striped" id="tabla">
               
                    <thead>
                        <tr>
                            <th>Icsd</th>
                            <th>Fecha</th>
                            <th>Motivo</th>
                            <th>Servicio</th>
                            <th></th>
                            

                        </tr>
                    </thead>
                    <tbody id="tbody-alumnos">
                    <?php
                        include_once 'models/refepaciente.php';
                        $cuentapacientes=0;
                        foreach($this->refepacientes as $row) {
                            $Refepaciente = new Refepaciente();
                            $Refepaciente = $row;
                            $expediente = $Refepaciente->expediente;
                            $motivo = $Refepaciente->motivo;
                            $cuentapacientes=$cuentapacientes+1;
                    ?>
                            <tr id="fila-<?php echo $Refepaciente->id; ?>">
                            
                              <td><?php echo $Refepaciente->id; ?></td>
                              <td><?php echo $Refepaciente->lafecha; ?></td>
                              <td><?php echo $Refepaciente->motivo; ?></td>
                              <td><?php echo $Refepaciente->servicio1; ?></td>
                              <td><a href="<?php echo constant('URL') . 'referencia/ClonaRef/' . $Refepaciente->id.'/'. $expediente; ?>">Clonar</a></td>
                            </tr>
                            <?php 
                        }; ?>
                    </tbody>
                </table>
                </div>
              </div><!--LADO DERECHO -->      
              
              
              <!--LADO ISQUIERDO -->
              <div class="col-md-6 col-lg-6">
                <h4 class="mb-3">Informacion del paciente</h4>

                <form action="GuardaRef" method="POST" class="needs-validation" novalidate>
                  <div class="row g-9" GuardaRef>
                    
                  <!--MOTIVO DE LA REFERENCIA -->
                    <div class="col-sm-5">
                      <label for="motivor" class="form-label">Motivo de la Referencia</label>
                      <input type="text" class="form-control" id="motivor" name="motivor" placeholder="Motivo de la Referencia" value="<?php echo $this->pacientes->motivo?>" required>
                      <div class="invalid-feedback">
                        Se requiere el motivo.
                      </div>
                    </div>  
                  <!--DIA -->
                    <div class="col-sm-4">
                      <label for="lafecha" class="form-label">Dia Mes Año</label>
                      <input type="date" id="lafecha" class="form-control" name="lafecha" value="<?php echo date("Y-m-d");?>" required>
                      <div class="invalid-feedback">
                        Se reuiere la fecha.
                      </div>
                    </div>
                    
                    <!--HORA -->
                    <div class="col-sm-3">
                      <label for="lahora" class="form-label">Hora</label>
                      <input type="time" class="form-control" id="lahora" name="lahora" value="<?php echo $hoy ?>" required>
                      <div class="invalid-feedback">
                        La hora es requerida.
                      </div>
                    </div>
                                
                    
                    <!--EXPEDIENTE -->
                    <div class="col-sm-3">
                      <label for="expediente" class="form-label">Expediente</label>
                      <input type="text" class="form-control" id="expediente" name="expediente" placeholder="" value="<?php echo $this->pacientes->expediente?>" required>
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>

                    <!--NOMBRE -->
                    <div class="col-sm-9">
                      <label for="lastName" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="" value="<?php echo $this->pacientes->nombre?>" required>
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
                    <!--SEXO  -->
                    <div class="col-md-4">
                      <label for="sexo" class="form-label">Sexo</label>
                      <select class="form-select" id="sexo" name="sexo" required>
                        <option value="<?php echo $this->pacientes->sexo;?>"><?php echo $this->pacientes->sexo;?></option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                        
                      </select>
                      <div class="invalid-feedback">
                        Selecciona el sexo
                      </div>
                    </div>

                     <!--Fecha Nac -->
                     <div class="col-sm-4">
                      <label for="nacfecha" class="form-label">F.nacio</label>
                      <input type="date" id="nacfecha" class="form-control" name="nacfecha" value="<?php echo $this->pacientes->nacio;?>" required>
                      <div class="invalid-feedback">
                        Fecha de Nacimiento es Requerida.
                      </div>
                    </div>      
                    
                    <!--Telefono -->
                    <div class="col-sm-4">
                      <label for="telefono" class="form-label">Telefono</label>
                      <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $this->pacientes->telefono;?>" required>
                      <div class="invalid-feedback">
                        El telefono es requerido.
                      </div>
                    </div>
                    <hr class="my-4">
     
                     <h4 class="mb-3">Datos de la Referencia</h4>
                    
                     <!--Receptora  -->
                     <div class="col-md-6">
                      <label for="receptora" class="form-label">UM Receptora</label>
                      <select class="form-select" id="receptora" name="receptora"  required>
                        <option selected><?php echo $this->pacientes->umreceptora;?></option>
                        <option value="Hospital Fernando Ocaranza">Hospital Fernando Ocaranza</option>
                        <option value="Hospital General">Hospital General</option>
                        <option value="CENTRO DE SALUD URBANO DE CABORCA">CENTRO DE SALUD URBANO DE CABORCA</option>
                        <option value="CMN 20 DE NOVIEMBRE">CMN 20 DE NOVIEMBRE</option>
                        <option value="LABORATORIOS SALAZAR">LABORATORIOS SALAZAR</option>
                      </select>
                      <div class="invalid-feedback">
                        Selecciona UMR
                      </div>
                    </div>

                    <!--Refiere  -->
                    <div class="col-md-6">
                      <label for="refiere" class="form-label">Se refiere a</label>
                      <select class="form-select" id="ciudad" name="ciudad" required>
                        <option selected><?php echo $this->pacientes->ciudad;?></option>
                        <option value="Hermosillo, Son">Hermosillo, Son</option>
                        <option value="Caborca, Son">Caborca,Son</option>
                        <option value="Mexico, D.F">Mexico, D.F                                                                                                                      </option>
                      </select>
                      <div class="invalid-feedback">
                        Selecciona a donde se refiere
                      </div>
                    </div>
                    
                    <!--Tipo a lo que va -->
                    <div class="col-md-5">
                      <label for="tipo" class="form-label">Tipo</label>
                      <select class="form-select" id="areamedica" value="<?php echo $this->pacientes->areamedica;?>" name="areamedica" required>
                        <option selected><?php echo $this->pacientes->areamedica;?></option>
                        <option value="Consulta Externa Espc">Consulta Externa Espc</option>
                        <option value="Hospitalizacion">Hospitalizacion</option>
                        <option value="Estudios Auxiliares de Diagnostico y Tratamiento">Estudios Auxiliares de Diagnostico y Tratamiento</option>
                        <option value="Rehabilitacion Fisica">Rehabilitacion Fisica</option>
                      </select>
                      <div class="invalid-feedback">
                        Selecciona el tipo a que va
                      </div>
                    </div>

                    <!--servicio1 -->
                    <div class="col-sm-7">
                      <label for="servicio1" class="form-label">Servicio</label>
                      <input type="text" class="form-control" id="servicio1" name="servicio1" placeholder="" value="<?php echo $this->pacientes->servicio1;?>" required>
                      <div class="invalid-feedback">
                        El servicio es requerido.
                      </div>
                    </div>

                    <!--Tipo de Traslado1  -->
                    <div class="col-md-4">
                      <label for="situacion" class="form-label">Tipo de Traslado</label>
                      <select class="form-select" id="situacion" name="situacion" required>
                        <option value="Primera Vez">Primera Vez</option>
                        <option value="Subsecuente">Subsecuente</option>
                      </select>
                      <div class="invalid-feedback">
                        Selecciona Primera o Subsecuente
                      </div>
                    </div>
                    <!--DIA consulta 1 -->
                    <div class="col-sm-4">
                      <label for="fconsulta" class="form-label">Dia Mes Año</label>
                      <input type="date" id="fconsulta" class="form-control" name="fconsulta" value="">
                     <!-- <div class="invalid-feedback">
                        Valida la Fecha de la consulta.
                      </div>-->
                    </div>
                    
                    <!--HORA Consulta 1 -->
                    <div class="col-sm-4">
                      <label for="conshora" class="form-label">Hora</label>
                      <input type="time" class="form-control" id="conshora" name="conshora">
                    </div>
                    

                  <!--servicio2 -->
                    <div class="col-sm-4">
                      <label for="servicio2" class="form-label">Servicio 2</label>
                      <input type="text" class="form-control" id="servicio2" name="servicio2" placeholder="" value="">
                    </div>

                    <!--DIA consulta 2 -->
                    <div class="col-sm-4">
                      <label for="fconsulta2" class="form-label">Dia Mes Año</label>
                      <input type="date" id="fconsulta2" class="form-control" name="fconsulta2" value="">
                     </div>
                    
                    <!--HORA Consulta 2 -->
                    <div class="col-sm-4">
                      <label for="conshora2" class="form-label">Hora</label>
                      <input type="time" class="form-control" id="conshora2" name="conshora2">
                    </div>
                  </div>                           
              </div> <!--LADO IZQUIERDO -->
    </div><!--AMBOS LADOS-->
                    <hr class="my-4">
                    <h4 class="mb-3">Presentacion del caso</h4>
                    
                    <!--servicio1 -->
                    <div class="col-sm-12">
                      <input type="text" maxlength="120" class="form-control" id="presenta1" name="presenta1" placeholder="" value="<?php echo $this->pacientes->presenta1;?>" required>
                      <input type="text" maxlength="120" class="form-control" id="presenta2" name="presenta2" placeholder="" value="<?php echo $this->pacientes->presenta2;?>">
                      <input type="text" maxlength="120" class="form-control" id="presenta3" name="presenta3" placeholder="" value="<?php echo $this->pacientes->presenta3;?>">
                      <input type="text" maxlength="120" class="form-control" id="presenta4" name="presenta4" placeholder="" value="<?php echo $this->pacientes->presenta4;?>">
                      <input type="text" maxlength="120" class="form-control" id="presenta5" name="presenta5" placeholder="" value="<?php echo $this->pacientes->presenta5;?>">
                      <input type="text" maxlength="120" class="form-control" id="presenta6" name="presenta6" placeholder="" value="<?php echo $this->pacientes->presenta6;?>">
                      <input type="text" maxlength="120" class="form-control" id="presenta7" name="presenta7" placeholder="" value="<?php echo $this->pacientes->presenta7;?>">
                      <input type="text" maxlength="120" class="form-control" id="presenta8" name="presenta8" placeholder="" value="<?php echo $this->pacientes->presenta8;?>">
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Guardar Referencia</button>
                    </form>
                    <hr class="my-4">
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; Feliciano Figueroa Ontiveros</p>
  </footer>
</div>

<!--
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="form-validation.js"></script>
-->    
<script src="<?php echo constant('URL'); ?>public/js/form-validation.js"></script>
</body>
</html>

<script>
$(document).ready(function(){
function carga_data(query)
 {
  $.ajax({
   url:"referencia/ClonaRef/query",
   method:"POST",
   data:{elexpe},
   success:function(elexpe)
   {
    console.log(elexpe);
    //$('#employee_data').html(data);
   }
  });
 }
});
</script>