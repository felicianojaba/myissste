<?php require 'views/header.php'; ?>
    <div id="main">
        <h1 class="center">Bienvenido al Referencia</h1>
    </div>
<div class="container">
  <div class="card">
    <div class="card-body">
      <form id="xpacientes-form">                    
        <div class="row">
          <div class="col">
            <label for="Expediente" class="form-label">Expediente</label>
            <input type="text" class="form-control" placeholder="Expediente" aria-label="Expediente">
          </div>
          <div class="col-8">
            <label for="nombrepac" class="form-label">Nombre</label>
            <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre">

          </div>
          
          
        </div>  
        
        <div class="row">
          <div class="col">
             <label for="sexo" class="form-label">Sexo</label>
            <select class="form-select" aria-label="Default select example">
             
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
            </select>
          </div>
          <div class="col">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="telefono" class="form-control" id="telefono">
          </div>
          <div class="col">
            <label for="fnac" class="form-label">Fech Nac</label>
            <input type="date" class="form-control" id="fnac">
          </div>
          
        </div>
      </form>  
    </div>
  </div>
</div>
<div><?php echo $this->mensaje; ?></div>

<div class="container p-4">
    <div class="row">
      
      <div class="col-5">
          <div class="card">
            <div class="card-body">
              <form id="paciente-form">
                  <input type="hidden" id="pacienteId">
                  <div class="row">
                      <div class="col">
                        <label for="expediente" class="form-label">Expediente</label>
                        <input type="text"  class="text-uppercase form-control fs-5" id="expediente" maxlength="10">
                      </div>  
                      <div class="col">
                         
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
                          <option value="70">PrimerHijo</option>
                          <option value="71">SegundoHijo</option>
                          <option value="72">TercerHijo</option>
                          <option value="73">CuartoHijo</option>
                          <option value="80">PrimeraHija</option>
                          <option value="81">SegundaHija</option>
                          <option value="82">TerceraHija</option>
                          <option value="83">CuartaHija</option>
                          <option value="90">Pensionado</option>
                          <option value="91">Pensionada</option>
                          <option value="92">PrimerFamiliar</option>
                          <option value="93">SegundoFamiliar</option>
                          <option value="94">TercerFamiliar</option>
                          <option value="95">CuartoFamiliar</option>
                          
                        </select>
                         
                        
                      </div>
                  </div> 

                  <div class="mb-3">
                    <label for="descripe" class="form-label">Apellido Paterno Materno Nombrea</label>
                    <input type="text" class="form-control" id="nombre">
                  </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="submit">Guarda Paciente</button>
                   </div>
              </form>
              
            </div>
            
          </div>
      </div>
      
      <div class="col-7">
          <div class="card card my-4" id="paciente-result">
              <div class="card-body">
                  <ul id="container"></ul>
              </div>   
          </div>   
          <table class="table table-striped table-sm">
            <thead>
                <tr>
                  <td>id</td>
                  <td>Expediente</td>
                  <td>Nombre</td>
                  <td></td>
                </tr>
            </thead>
            <tbody id="pacientes">
                
            </tbody>
          </table>
      </div>


     </div>
</div>
<?php require 'views/footer.php'; ?>
    <?php require 'views/footer.php'; ?>
    
</body>
</html>