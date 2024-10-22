<?php

require_once './source/models/cursosModel.php';

Class CursosController{
    private $cursosModel;

    public function __construct(){
        $this->cursosModel = new cursosModel();
    }

    public function listCursos(): void{
        $cursos = $this->cursosModel->getCursos();
        include 'source/views/mostrarCurso.php';
    }

    public function showCursos($id=null){
        if ($id) {
            $cursos = $this->cursosModel->GetCursoID($id);
            include_once 'source/views/crearCurso.php';
        }
    }

    public function manageCursos(){
        if (isset($_POST['action'])){
            if($_POST['action'] === 'cursocrear'){
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $fecha = $_POST['fecha_creacion'];
                $this->cursosModel->CreateCurso($nombre, $descripcion, $fecha);
                header('location: index.php?pagina=home');
                exit();

            }elseif ($_POST['action'] === 'cursoeditar') {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $fecha = $_POST['fecha_creacion'];
                $idcurso =$_POST['idcurso'];

                
                $this->cursosModel->EditCurso($nombre, $descripcion, $fecha, $idcurso);

                

                header('location: index.php?pagina=cursos');
                exit();

            }
        }
    }

    public function goCreatecurso(){
        include './source/views/crearCurso.php';
    }
}

?>