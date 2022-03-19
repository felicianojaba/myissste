<?php

class ConsultaArti extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        $pacientes = $this->view->datos = $this->model->get();
        $this->view->pacientes = $pacientes;
        //echo var_dump($pacientes);
        $this->view->render('ConsultaArti/index');
    }
    //llamada por views/consultaArti/index    
    function verArticulo($param = null){
        $idReferencia = $param[0];
        $paciente = $this->model->getById($idReferencia);

        //session_start();
        //$_SESSION["id_verReferencia"] = $paciente->id;

        $this->view->paciente = $paciente;
        $this->view->render('ConsultaArti/detalle');
    }

    function actualizarArticulo($param = null){
        $id = $_POST['id'];
        $idpaciente = $_POST['idpaciente'];
        $expediente  = $_POST['Expediente'];
        $nombre = $_POST['Nombre'];
        $sexo = $_POST['Sexo'];
        $servicio1  = $_POST['servicio1'];   
        $motivo  = $_POST['MotivoRef'];
        //$medico  = $_POST['medico'];   
        $medico  = "GERARDO ALHAN CELAYA CELAYA";   
        $nacio  = $_POST['FechaNac'];   
        $telefono  = $_POST['Telefono'];   
        $umreceptora  = $_POST['UmReceptora'];   
        $ciudad  = $_POST['Ciudad'];   
        $areamedica  = $_POST['Areamedica'];   
        $situacion  = $_POST['Situacion'];   
        $fconsulta  = $_POST['Fconsulta'];   
        $conshora  = $_POST['Conshora'];   
        $servicio2  = $_POST['Servicio2'];   
        $fconsultaDos  = $_POST['FconsultaDos'];   
        $conshora2  = $_POST['Conshora2'];   
        $estatus  = 2;   
        
  /*      
        if($this->model->update(['id' => $id, 'nombre' => $nombre, 'clave' => $clave])){
            $articulo = new Articulo();
            $articulo->id = $id;
            $articulo->nombre = $nombre;
            $articulo->clave = $clave;

            $this->view->articulo = $articulo;
            $this->view->mensaje = "Articulo actualizado correctamente";
        }else{
            $this->view->mensaje = "No se pudo actualizar al articulo";
        }

        */
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        $this->pdf->Ln(8);    
        $this->pdf->SetFont('Times','',7);
        
        //$this->pdf->Image('http://192.166.127.160/DRGARCIA/public/imgs/logoissste3.jpg',Y,X,G);
        $this->pdf->Image('http://192.166.127.161/clon/myissste/public/imgs/logoissste3.jpg',4,12,26);
        
        $this->pdf->Text(27,19,"Instituto de Seguridad");
        $this->pdf->Text(27,22,"y Servicios Sociales");
        $this->pdf->Text(27,25,"de los Trabajadores");
        $this->pdf->Text(27,28,"del Estado");
                    
        
        $this->pdf->Text(160,17,"Folio");
        $this->pdf->Rect(166,14,40,4);
        $this->pdf->Text(178,21,"Fecha y Hora");
        $this->pdf->Text(166,23,"Dia      Mes     Ano          Hora   Min");
        $this->pdf->Rect(164,25,24,5);
        //DIA
        $this->pdf->Line(168,25,168,29);
        $this->pdf->Line(172,25,172,29);
        //mes
        $this->pdf->Line(176,25,176,29);
        $this->pdf->Line(180,25,180,25);
        //año
        $this->pdf->Line(184,25,184,29);

        $this->pdf->Rect(189,25,16,5);
        //Min
        $this->pdf->Line(193,25,193,29);
        $this->pdf->Line(197,25,197,29);
        //Seg
        $this->pdf->Line(201,25,201,29);
        $this->pdf->SetFont('Times','',10);
        $this->pdf->Output();
    
        $this->view->render('ConsultaArti/detalle');
    }

    function eliminarAlumno($param = null){
        $matricula = $param[0];

        if($this->model->delete($matricula)){
            $mensaje ="Alumno eliminado correctamente";
            //$this->view->mensaje = "Alumno eliminado correctamente";
        }else{
            $mensaje = "No se pudo eliminar al alumno";
            //$this->view->mensaje = "No se pudo eliminar al alumno";
        }

        //$this->render();

        echo $mensaje;
    }

    
}

?>