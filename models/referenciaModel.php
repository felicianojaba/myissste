<?php

require 'models/paciente.php';

class referenciaModel extends Model{

    public function __construct(){
        parent::__construct();
    }
    //pacientes
    public function datosp($id){
        $cadena="SELECT * FROM pacientes WHERE expediente LIKE '%".$id."%'";
        $items = [];
        try{
            $query = $this->db->connect()->query("SELECT * FROM pacientes WHERE expediente LIKE '%".$id."%'");

            while($row = $query->fetch()){
                $item = new Paciente(); 
                $item->idpaciente = $row['id'];   
                $item->expediente = $row['expediente'];
                $item->nombre    = $row['nombre'];
                $item->sexo  = $row['sexo'];
                $item->nacio  = $row['nacio'];
                $item->telefono  = $row['telefono'];
                
                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            return null;
        }
    }
    
    //referencias
    public function mostrar($id){
        $items = [];
        try{
            $query = $this->db->connect()->query("SELECT * FROM referencias WHERE expediente LIKE '%".$id."%'");

            while($row = $query->fetch()){
                $item = new Paciente(); 
                $item->id = $row['id'];   
                $item->expediente = $row['expediente'];
                $item->nombre    = $row['nombre'];
                $item->sexo  = $row['sexo'];
                $item->servicio1  = $row['servicio1'];
                $item->motivo  = $row['motivo'];
                $item->medico  = $row['medico'];
                $item->nacio  = $row['nacio'];
                $item->telefono  = $row['telefono'];
                
                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            return null;
        }
    }

    public function getSufon($rfc){
        try{
            $surfc= $rfc;
            $query = $this->db->connect()->prepare('SELECT * FROM pacientes WHERE expediente LIKE :surfc');

            $query->execute(['surfc' => $surfc]);
        
                while($prow = $query->fetch()){
                    $telefono  = $prow['telefono'];
                }    
            return  $telefono;    
        }catch(PDOException $e){
            return null;
        }
    }    

    public function getById($id){
        $item = new paciente();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM referencias WHERE id = :id');

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                
                $item->id = $row['id'];   
                $item->expediente = $row['expediente'];
                $item->nombre    = $row['nombre'];
                $item->sexo  = $row['sexo'];
                $item->servicio1  = $row['servicio1'];
                $item->motivo  = $row['motivo'];
                $item->medico  = $row['medico'];
                $item->nacio  = $row['nacio'];
                $item->telefono  = $this->getSufon($row['expediente']);
                $item->umreceptora = $row['umreceptora'];
                $item->ciudad = $row['ciudad'];
                $item->areamedica = $row['areamedica'];
                $item->situacion = $row['situacion'];
                $item->fconsulta = $row['fconsulta'];
                $item->conshora = $row['conshora'];
                $item->servicio2 = $row['servicio2'];
                $item->fconsultaDos = $row['fconsultaDos'];
                $item->conshora2 = $row['conshora2'];
                $item->lafecha = date($row['lafecha']);
            }
                    
            return $item;
            
        }catch(PDOException $e){
            return null;
        }
    }

    
    public function getByRfc($id){
        $item = new paciente();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM pacientes WHERE id = :id');

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                
                $item->idpaciente = $row['id'];   
                $item->expediente = $row['expediente'];
                $item->nombre    = $row['nombre'];
                $item->sexo  = $row['sexo'];
                $item->nacio  = $row['nacio'];
                $item->telefono  =$row['telefono'];
                
            }
                    
            return $item;
            
        }catch(PDOException $e){
            return null;
        }
    }





    //pacientes
    public function pacientemostrar($id){
        $cadena="SELECT * FROM pacientes WHERE expediente LIKE '%".$id."%'";
        $items = [];
        try{
            $query = $this->db->connect()->query("SELECT * FROM pacientes WHERE expediente LIKE '%".$id."%'");

            while($row = $query->fetch()){
                $item = new Paciente(); 
                $item->idpaciente = $row['id'];   
                $item->expediente = $row['expediente'];
                $item->nombre    = $row['nombre'];
                $item->sexo  = $row['sexo'];
                $item->medico  = $row['medico'];
                $item->nacio  = $row['nacio'];
                $item->telefono  = $row['telefono'];
                
                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            return null;
        }
    }

    public function insertaref($datos){
        
        $query = $this->db->connect()->prepare("INSERT INTO referencias (id,idpaciente,
        expediente, nombre,nacio,sexo,telefono,areamedica,servicio1,motivo,umreceptora,
        ciudad,estatus) VALUES('',:idpaciente,:expediente, :nombre, :nacio, :sexo,:telefono, 
        :areamedica,:servicio1,:motivo, :umreceptora, :ciudad,:estatus)");
        try{
            $query->execute([
                'idpaciente' => $datos['idpaciente'],
                'expediente' => $datos['expediente'],
                'nombre' => $datos['nombre'],
                'nacio' => $datos['nacio'],
                'sexo' => $datos['sexo'],
                'telefono' => $datos['telefono'],
                'areamedica' => $datos['areamedica'],
                'servicio1' => $datos['servicio1'],
                'motivo' => $datos['motivo'],
                'umreceptora' => $datos['umreceptora'],
                'estatus' => $datos['estatus'],
                'ciudad' => $datos['ciudad']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }        


    
}
