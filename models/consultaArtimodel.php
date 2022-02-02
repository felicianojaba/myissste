<?php

require 'models/articulo.php';

class ConsultaArtiModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];
       
        try{
            $query = $this->db->connect()->query('SELECT * FROM articulos');
          
            while($row = $query->fetch()){
                $item = new Articulo();
                $item->id = $row['id'];
                $item->nombre  = $row['nombre'];
                $item->clave  = $row['clave'];
                array_push($items, $item);
            }
            
            return $items;
        }catch(PDOException $e){

            return [];
        }
    }

    public function getById($id){
        $item = new Articulo();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM articulos WHERE id = :id');

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                
                $item->id = $row['id'];
                $item->nombre    = $row['nombre'];
                $item->clave  = $row['clave'];
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