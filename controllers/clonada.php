<?php

class Clonada extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
        
    }

    function render(){
        $this->view->render('clonada/index');
    }

    function muestraPaci($param = null){
        //lo envia el index
        //recibe lo que se escribe en sears en el headers
        $idPaciente =  $_POST['sears'];

        if(strlen($idPaciente)<12) //si se capturo parte del rfc
        {    
            //busca si tiene referencias anteriores para copiarla
            $paciente = $this->model->mostrar($idPaciente);
            
            if ($paciente==NULL){ //Si el paciente no tiene referencia previa
                
                //lista paciente coincidentes con sears, se hara nueva referencia
                $paciente = $this->model->datosp($idPaciente);
                $this->view->pacientes = $paciente;
                $this->view->render('clonada/detallepac');    
                
            }else {//el paciente si tiene
                $this->view->pacientes = $paciente;
                $this->view->render('clonada/detalleref');    
            }
            

      
            
        }
        /*else{ //se capturo el rfc completo

            $paciente = $this->model->mostrar($idPaciente);
            
            if (count($paciente)>1){
                
                $this->view->pacientes = $paciente;

                $this->view->render('referencia/detalleref');
            
            }
            else{
                    $Myexpediente=$this->model->getById($idPaciente,$idMotive);
                    //$this->verPaciente($Myexpediente['expediente']);
                    if ($this->model->Anotar($Myexpediente))
                    {
                        
                        $this->view->mensaje = "Anotado por scanner";
                        //header('location: '.constant('URL').'consulta');
                    
                    } else
                    {
                        $this->view->mensaje = "Solo una por dia...Mal";
                    }
                    $this->render('consulta/index');            

            }
        } */
    }
    //llamada por views/referencia/detalleref trae datos de referencia previa  
    function verreferencia($param = null){
        $idRefe = $param[0];
        $paciente = $this->model->getById($idRefe);
        $this->view->paciente = $paciente;
        $this->view->render('clonada/index'); 
    }   
    
    //llamada por views/referencia/detallepac para que traiga los datos del paciente  
    function verpaciente($param = null){
        $idRefe = $param[0];
        $paciente = $this->model->getByRfc($idRefe);
        $this->view->paciente = $paciente;
        $this->view->render('clonada/index'); 
    }    

    //la manda llamar views/referencia/index
    function grabaDatos($param = null){
        $idestatus=1;
       
        $idpaciente =  $_POST['idpaciente'];
        $motivo =  $_POST['MotivoRef'];
        $ciudad =  $_POST['Ciudad'];
        $umreceptora =  $_POST['UmReceptora'];
        $idpaciente =  $_POST['idpaciente'];
        $expediente =  $_POST['Expediente'];
        $nombre =  $_POST['Nombre'];
        $sexo =  $_POST['Sexo'];
        $telefono =  $_POST['Telefono'];
        $areamedica =  $_POST['Areamedica'];
        $servicio1 =  $_POST['servicio1'];
        $situacion =  $_POST['Situacion'];
        $fconsulta =  $_POST['Fconsulta'];
        $nacio =  $_POST['FechaNac'];
        if($this->model->insertaref([
            'idpaciente' => $idpaciente,'nombre' => $nombre,'expediente' => $expediente,
            'sexo' => $sexo, 'telefono' => $telefono,'areamedica' => $areamedica,
            'servicio1' => $servicio1,'situacion' => $situacion,'fconsulta' => $fconsulta,
            'nacio' => $nacio,'ciudad' => $ciudad,
            'umreceptora' => $umreceptora,'motivo' => $motivo,'estatus' => $idestatus])){
            $this->view->mensaje = "Articulo creado";

            $this->view->render('referencia/aviso');
        }else{
            $this->view->mensaje = "Ya estaba registradi";
            $this->view->render('referencia/aviso');
        }

    }   
    
    

     function calculaedad($fechanacimiento){
              list($ano,$mes,$dia) = explode("-",$fechanacimiento);
              $ano_diferencia  = date("Y") - $ano;
              $mes_diferencia = date("m") - $mes;
              $dia_diferencia   = date("d") - $dia;
              if ($dia_diferencia < 0 || $mes_diferencia < 0)
                $ano_diferencia--;
              return $ano_diferencia;
            }

  
 


}

?>