<?php

class ConsultaArti extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        $articulos = $this->view->datos = $this->model->get();
        $this->view->articulos = $articulos;
        $this->view->render('ConsultaArti/index');
    }

    function verArticulo($param = null){
        $idArticulo = $param[0];
        $articulo = $this->model->getById($idArticulo);

        session_start();
        $_SESSION["id_verArticulo"] = $articulo->id;

        $this->view->articulo = $articulo;
        $this->view->render('ConsultaArti/detalle');
    }

    function actualizarArticulo($param = null){
        session_start();
        $id = $_SESSION["id_verAticulo"];
        $nombre    = $_POST['nombre'];
        $clave  = $_POST['clave'];


        unset($_SESSION['id_verArticulo']);

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