<?php

require 'models/paciente.php';

class ConsultaArtiModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    
    public function get(){
        $items = [];
       
        try{
            $query = $this->db->connect()->query('SELECT * FROM referencias WHERE estatus LIKE 1');
          
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
                
                array_push($items, $item);
            }
            
            return $items;
        }catch(PDOException $e){

            return [];
        }
    }

    public function getById($id){
        $item = new Paciente();
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
                $item->telefono  = $row['telefono'];
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

    public function update($item){
        $query = $this->db->connect()->prepare('UPDATE alumnos SET nombre = :nombre, apellido = :apellido WHERE matricula = :matricula');
        try{
            $query->execute([
                'matricula' => $item['matricula'],
                'nombre' => $item['nombre'],
                'apellido' => $item['apellido']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare('DELETE FROM alumnos WHERE matricula = :matricula');
        try{
            $query->execute([
                'matricula' => $id
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}
?>