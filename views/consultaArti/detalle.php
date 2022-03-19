<?php 
require 'views/header.php';
include_once 'models/paciente.php';
//llamada por consultaArti/verArticulo
//se selecciona esta referencia de una lista de referencias pendientes
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
  $presenta1=$this->paciente->presenta1;
  $presenta2=$this->paciente->presenta2;
  $presenta3=$this->paciente->presenta3;
  $presenta4=$this->paciente->presenta4;
  $presenta5=$this->paciente->presenta5;
  $presenta6=$this->paciente->presenta6;
  $presenta7=$this->paciente->presenta7;
  $presenta8=$this->paciente->presenta8;
  
}else
{  //Viene de index
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
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
</svg>
<div class="alert alert-primary d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
  <div>
  Informacion de el Paciente
  </div>
</div>


<div class="container">
    <form action="<?php echo constant('URL'); ?>consultaArti/actualizarArticulo" method="POST">
        <div class="row">
            <input type="hidden" name="idpaciente" value="<?php echo $idpaciente;?>">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <!--Expediente $refExpediente  -->
            <div class="col-2">
                <label for="Expediente" class="form-label">Expediente</label>
                <input type="text" class="form-control" placeholder="Expediente" name="Expediente" value="<?php echo $refExpediente; ?>"required>
            </div>
            <!--Nombre $refNombre  -->  
            <div class="col-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre" name="Nombre" value="<?php echo $refNombre; ?>"required>
            </div>
            <!--Sexo $refSexo  -->  
            <div class="col-2">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-select" name="Sexo" value="<?php echo $refSexo; ?>"required>
                    <option><?php echo $refSexo;?></option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
            <!--Telefono $refTelefono-->  
            <div class="col-2">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="telefono" class="form-control" name="Telefono" value="<?php echo $refTelefono; ?>"required>
            </div>
            <!--FechaNac $refNacio-->  
            <div class="col-3">
                <label for="FechaNac" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="FechaNac" value="<?php echo $refNacio; ?>"required>
            </div>
        </div>  
       <!-- 
        <div class="row">
            <div class="col-12"><br>
                <h4 class="mb-3">Datos de la Referencia</h4>
            </div>  
        </div>      
        -->
        <div class="row">    
            <!--MotivoRef $refMotivo-->  
            <div class="col-3">
                <label for="MotivoRef" class="form-label">Motivo</label>
                <input type="text" class="form-control" name="MotivoRef" placeholder="Motivo de la Referencia" value="<?php echo $refMotivo; ?>"required>
            </div>  
            <!--UmReceptora $refUmreceptora-->  
            <div class="col-3">
                <label for="UmReceptora" class="form-label">Um Receptora</label>
                <select class="form-select" name="UmReceptora" value="<?php echo $refUmreceptora; ?>"required> 
                    <option><?php echo $refUmreceptora;?></option>
                    <option value="Hospital Fernando Ocaranza">Hospital Fernando Ocaranza</option>
                    <option value="Hospital General">Hospital General</option>
                </select>
            </div>
            <!--Ciudad RefCiudad  -->
            <div class="col-md-3">
                <label for="Ciudad" class="form-label">Se refiere a</label>
                <select class="form-select" name="Ciudad" value="<?php echo $refCiudad; ?>"required>
                <option><?php echo $refCiudad;?></option>
                <option value="Hermosillo, Son">Hermosillo, Son</option>
                <option value="Caborca, Son">Caborca,Son</option>
                </select>
            </div>
            
            <!--Areamedica RefAreamedica-->
            <div class="col-md-3">
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
                <label for="servicio1" class="form-label">Servicio</label>
                <input type="text" class="form-control" name="servicio1" value="<?php echo $refServicio1;?>"required>
            </div>

            <!--Situacion refSituacion-->
            <div class="col-md-2">
               
                <label for="Situacion" class="form-label">Tipo de Traslado</label>
                <select class="form-select" name="Situacion" value="<?php echo $refSituacion;?>"required>
                <option><?php echo $refSituacion;?></option>
                <option value="Primera Vez">Primera Vez</option>
                <option value="Subsecuente">Subsecuente</option>
                </select>
            </div>

            <!--Fconsulta refFconsulta-->
            <div class="col-sm-3">
           
                <label for="Fconsulta" class="form-label">Dia Mes Año</label>
                <input type="date" class="form-control" name="Fconsulta" value="<?php echo $refFconsulta;?>"required>
            </div>
            
            <!--Conshora refConshora-->
            <div class="col-sm-2">
                
                <label for="Conshora" class="form-label">Hora</label>
                <input type="time" class="form-control" name="Conshora" value="<?php echo $refConshora ?>" required>
            </div>
        </div>  
    
    
        <div class="row">
        
            <!--Servicio2 refServicio2 -->
            <div class="col-sm-7">
               
                <label for="Servicio2" class="form-label">Servicio</label>
                <input type="text" class="form-control" name="Servicio2" value="<?php echo $refServicio2 ?>">
            </div>

            <!--FconsultaDos refFconsultaDos-->
            <div class="col-sm-3">
            
                <label for="Fconsultados" class="form-label">Dia Mes Año</label>
                <input type="date" class="form-control" name="FconsultaDos" value="<?php echo $refFconsultaDos;?>">
            </div>
            
            <!--Conshora2 refConshora2-->
            <div class="col-sm-2">
            
                <label for="Conshora2" class="form-label">Hora</label>
                <input type="time" class="form-control" name="Conshora2" value="<?php echo $refConshora2 ?>">
            </div>
        </div>     
        <h4 class="mb-3">Presentacion del caso</h4>
        <div class="row">                    
            <div class="col-sm-12">
                <input type="text" maxlength="120" class="form-control" id="presenta1" name="presenta1" placeholder="" value="<?php echo $presenta1 ?>" required>
                <input type="text" maxlength="120" class="form-control" id="presenta2" name="presenta2" placeholder="" value="<?php echo $presenta2 ?>">
                <input type="text" maxlength="120" class="form-control" id="presenta3" name="presenta3" placeholder="" value="<?php echo $presenta3 ?>">
                <input type="text" maxlength="120" class="form-control" id="presenta4" name="presenta4" placeholder="" value="<?php echo $presenta4 ?>">
                <input type="text" maxlength="120" class="form-control" id="presenta5" name="presenta5" placeholder="" value="<?php echo $presenta5 ?>">
                <input type="text" maxlength="120" class="form-control" id="presenta6" name="presenta6" placeholder="" value="<?php echo $presenta6 ?>">
                <input type="text" maxlength="120" class="form-control" id="presenta7" name="presenta7" placeholder="" value="<?php echo $presenta7 ?>">
                <input type="text" maxlength="120" class="form-control" id="presenta8" name="presenta8" placeholder="" value="<?php echo $presenta8 ?>">
            </div>
        </div>    

        <div class="d-grid gap-2 col-6 mx-auto">
            <br>
            <button type="submit" class="btn btn-primary" class="btn btn-lg btn-primary">Grabar Referencia</button>
            
        </div>
    </form>  
    
  
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