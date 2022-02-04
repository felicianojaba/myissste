<?php require 'views/header.php'; ?>

<! ––Aqui algo -->
<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="12" height="12" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    <h5 class="center"><?php echo $this->mensaje; ?></h5>
  </div>
</div>


<! ––Aqui toda la pantalla
<div class="container m-1">
  <div class="row">
    <! ––Aqui Datos del Paciente
    <div class="col-10">
      <div class="card">
        <div class="card-body">
          
        <form id="paciente-form">
            <input type="hidden" id="pacienteId">
            
            <! ––El pirmer renglon del formulario
            <div class="row">
              
              <! ––Expediente
              <div class="col-2">
                <label for="expediente" class="form-label">Expediente</label>
                <input type="text"  class="text-uppercase form-control fs-15" id="expediente" maxlength="10">
              </div>  
              
              <! ––Tipo
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
              
              <! ––Descripe
              <div class="col-6">
                <label for="descripe" class="form-label">Apellido Paterno Materno Nombrea</label>
                <input type="text" class="form-control" id="nombre" maxlength="40">
              </div>
              
              <! ––Sexo
              <div class="col-2">
                <label for="sexo" class="form-label">Sexo</label>
                <select id="sexo" class="form-select" aria-label="Default select example">
                  <option value="FEMENINO">FEMENINO</option>
                  <option value="MACULINO">MASCULINO</option>
                </select>
              </div>
            </div> <! –– Div primer renglon del formulario
            
            <! ––El segundo renglon del formulario
            <div class="row">
              <! ––Nacio  
              <div class="col-3">
                <label for="nacio" class="form-label">Nacio</label>
                <input type="date" class="form-control" id="nacio">
              </div> 
              
              <! ––Telefon
              <div class="col-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="telefono">
              </div>  
              
              <! ––Dependencia
              <div class="col-6">
                <label for="depende" class="form-label">Dependencia</label>
                <input type="text" class="form-control" id="depende">
              </div>
            </div><! –– Div segundo renglon del formulario
            
            <! ––Aqui el boton de guardar
            <div class="row">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <BR>
                    <button class="btn btn-primary" type="submit">Guarda DaTos Paciente</button>
                </div>
            </div>
          </form>
        </div> <! ––Div del Body
      </div> <! ––Div del card
    </div> <! ––Div col-10
    <! ––Aqui el div de 2 colunas donde va la tabla
    <div class="col-2">
      <table class="table table-success table-striped table table-sm">
        <thead>
          <tr>
            <td>Id</td>
            <td>Expediente</td>
            <td>Tipo</td>
            <td>Nombre</td>
            <td></td>
          </tr>
        </thead>
        <tbody id="pacientes"></tbody>
      </table>
    </div>
  </div><! ––Div del Row
</div><! ––Div del Container
<script type="text/javascript" src="<?php echo constant('URL'); ?>public/js/tareas.js"></script>

<?php require 'views/footer.php'; ?>