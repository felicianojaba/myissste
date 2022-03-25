<?php require 'views/header.php';


include_once 'models/paciente.php';
//aqui ya viene con informacion que envia el header en buscar
//referencia/muestraPaci envia los datos de la referencia anterior
//referencia/verpaciente envia solo los datos del paciente sin ref anterior
if (isset($this->paciente)) { //Viene de buscar
  $id=$this->paciente->id;
  $idpaciente=$this->paciente->idpaciente;
  $refExpediente=$this->paciente->expediente;
  $refNombre=$this->paciente->nombre;
  $refSexo=$this->paciente->sexo;
  $refServicio1=$this->paciente->servicio1;
  $refMotivo=$this->paciente->motivo;
  $refMedico=$this->paciente->medico;
  $refNacio=$this->paciente->nacio;
  $refTelefono=$this->paciente->telefono;
  $refUmreceptora=$this->paciente->umreceptora;
  $refCiudad=$this->paciente->ciudad;
  $refAreamedica=$this->paciente->areamedica;
  $refSituacion=$this->paciente->situacion;
  $refFconsulta=$this->paciente->fconsulta;
  $refConshora=$this->paciente->conshora;
  $refServicio2=$this->paciente->servicio2;
  $refFconsultaDos=$this->paciente->fconsultaDos;
  $refConshora2=$this->paciente->conshora2;
  $reflafecha=$this->paciente->lafecha;

}else
{  //De inicio los campos estan vacios
  $refExpediente="";
  $refNombre="";
  $refSexo="";
  $refServicio1="";
  $refMotivo="";
  $refmedico="";
  $refNacio="";
  $refTelefono="";
  $refUmreceptora="";
  $refCiudad="";
  $refSituacion="";
  $refAreamedica="";
  $refFconsulta=date("Y-m-d");
  $refFconsultaDos=date("Y-m-d");
  $mDate=new DateTime();
  $refConshora=$mDate->format("H:i:s");
  $refConshora2=$mDate->format("H:i:s");
  $refServicio2="";

}
?>

<div class="container">
  <br>
  <div class="card">
    <div class="card-body">
      
      <h4 class="mb-3">Informacion del paciente</h4>
      <form action="<?php echo constant('URL'); ?>clonada/grabaDatos" method="POST">
        <div class="row">
        <input type="hidden" name="idpaciente" value="<?php echo $idpaciente;?>">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        
          <!--Expediente $refExpediente  -->
          <div class="col">
            <label for="Expediente" class="form-label">Expediente</label>
            <input type="text" class="form-control" placeholder="Expediente" name="Expediente" value="<?php echo $refExpediente; ?>"required>
          </div>

          <!--Nombre $refNombre  -->  
          <div class="col-8">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" placeholder="Nombre" name="Nombre" value="<?php echo $refNombre; ?>"required>

          </div>
          
          
        </div>  
        
        <div class="row">

          <!--Sexo $refSexo  -->  
          <div class="col">
             <label for="sexo" class="form-label">Sexo</label>
            <select class="form-select" name="Sexo" value="<?php echo $refSexo; ?>"required>
              <option><?php echo $refSexo;?></option>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
            </select>
          </div>

           <!--Telefono $refTelefono-->  
          <div class="col">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="telefono" class="form-control" name="Telefono" value="<?php echo $refTelefono; ?>"required>
          </div>
          
          <!--FechaNac $refNacio-->  
          <div class="col">
            <label for="FechaNac" class="form-label">Fecha Nacimiento</label>
            <input type="date" class="form-control" name="FechaNac" value="<?php echo $refNacio; ?>"required>
          </div>
          
        </div>
        
        <div class="row">
          
          <div class="col-12">
            <br>
            <h4 class="mb-3">Datos de la Referencia</h4>
          </div>  
          
          
          <!--MotivoRef $refMotivo-->  
          <div class="col-8">
            <label for="MotivoRef" class="form-label">Motivo</label>
            <input type="text" class="form-control" name="MotivoRef" placeholder="Motivo de la Referencia" value="<?php echo $refMotivo; ?>"required>
          </div>  

          <!--UmReceptora $refUmreceptora-->  
          <div class="col-4">
            <label for="UmReceptora" class="form-label">Um Receptora</label>
            <select class="form-select" name="UmReceptora" value="<?php echo $refUmreceptora; ?>"required> 
                <option><?php echo $refUmreceptora;?></option>
                <option value="Hospital Fernando Ocaranza">Hospital Fernando Ocaranza</option>
                <option value="Hospital General">Hospital General</option>
                
            </select>
          </div>
        </div>  

        <div class="row">
           <!--Ciudad RefCiudad  -->
           <div class="col-md-5">
              <label for="Ciudad" class="form-label">Se refiere a</label>
              <select class="form-select" name="Ciudad" value="<?php echo $refCiudad; ?>"required>
                <option><?php echo $refCiudad;?></option>
                <option value="Hermosillo, Son">Hermosillo, Son</option>
                <option value="Caborca, Son">Caborca,Son</option>
              </select>
            </div>
            
            <!--Areamedica RefAreamedica-->
            <div class="col-md-7">
              <label for="Areamedica" class="form-label">Area Medica</label>
              <select class="form-select" name="Areamedica" value="<?php echo $refAreamedica; ?>"required>
                <option><?php echo $refAreamedica;?></option>
                <option value="Consulta Externa Espc">Consulta Externa Espc</option>
                <option value="Hospitalizacion">Hospitalizacion</option>
                <option value="Estudios Auxiliares de Diagnostico y Tratamiento">Estudios Auxiliares de Diagnostico y Tratamiento</option>
                <option value="Rehabilitacion Fisica">Rehabilitacion Fisica</option>
              </select>
              
            </div>
        </div>  

        <div class="row">
            <!--Servicio1 $refServicio1-->
            <div class="col-sm-5">
              <br>
              <label for="servicio1" class="form-label">Servicio</label>
              <input type="text" class="form-control" name="servicio1" value="<?php echo $refServicio1;?>"required>
            </div>

            <!--Situacion refSituacion-->
            <div class="col-md-2">
              <br>
              <label for="Situacion" class="form-label">Tipo de Traslado</label>
              <select class="form-select" name="Situacion" value="<?php echo $refSituacion;?>"required>
                <option><?php echo $refSituacion;?></option>
                <option value="Primera Vez">Primera Vez</option>
                <option value="Subsecuente">Subsecuente</option>
              </select>
            </div>

            <!--Fconsulta refFconsulta-->
            <div class="col-sm-3">
            <br>
              <label for="Fconsulta" class="form-label">Dia Mes Año</label>
              <input type="date" class="form-control" name="Fconsulta" value="<?php echo $refFconsulta;?>"required>
            </div>
            
            <!--Conshora refConshora-->
            <div class="col-sm-2">
              <br>
              <label for="Conshora" class="form-label">Hora</label>
              <input type="time" class="form-control" name="Conshora" value="<?php echo $refConshora ?>" required>
            </div>
        </div>  
        
        
        <div class="row">
        
            <!--Servicio2 refServicio2 -->
            <div class="col-sm-7">
              <br>
              <label for="Servicio2" class="form-label">Servicio</label>
              <input type="text" class="form-control" name="Servicio2" value="<?php echo $refServicio2 ?>">
            </div>

            <!--FconsultaDos refFconsultaDos-->
            <div class="col-sm-3">
            <br>
              <label for="Fconsultados" class="form-label">Dia Mes Año</label>
              <input type="date" class="form-control" name="FconsultaDos" value="<?php echo $refFconsultaDos;?>">
            </div>
            
            <!--Conshora2 refConshora2-->
            <div class="col-sm-2">
              <br>
              <label for="Conshora2" class="form-label">Hora</label>
              <input type="time" class="form-control" name="Conshora2" value="<?php echo $refConshora2 ?>">
            </div>
        </div>     
        <div class="d-grid gap-2 col-6 mx-auto">
          <br>
            <button type="input" class="btn btn-primary" class="btn btn-lg btn-primary">Grabar Referencia</button>
        
        </div>
        
      </form>  
    </div>
  </div>
</div>



<?php require 'views/footer.php'; ?>


            
