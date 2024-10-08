<?php

require_once './source/models/aprendicesModel.php';

Class AprendicesController{
    private $aprendicesModel;

    public function __construct()
    {
        $this->aprendicesModel = new AprendicesModel();
    }

    public function listUsers(){
        $usersWithCourse = $this->aprendicesModel->GetUsersWithCourse();
        $courses = $this->aprendicesModel->GetCourses();
        include './source/views/mostrarAprendiz.php';
    }

    public function showForm($id){
            $user =$this->aprendicesModel->GetUserID($id);
            $courseid =$this->aprendicesModel->GetCourseUserID($id);
            include './source/views/crearAprendiz.php';
    }

    public function goRegister(){
        include './source/views/crearAprendiz.php';
    }


    public function manageForm(){
        if(isset($_POST['action'])) {
            if($_POST['action'] == 'agregar'){
                $numeroDoc = $_POST['numeroDoc'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $genero = $_POST['genero'];
                $curso = $_POST['curso'];
                $fecha_nac = $_POST['fecha_nac'];
                $telefono = $_POST['telefono'];
                $correo = $_POST['correo'];

                $correo_repetido= $this->aprendicesModel->GetEmailUser($correo);

                if ($correo_repetido==true) {
                    echo '<script>alert("Ese correo ya existe")</script>';
                }else{
                    $this->aprendicesModel->CreateUser($numeroDoc, $nombre, $apellido, $genero, $fecha_nac, $telefono, $correo);
                    $this->aprendicesModel->CreateCourses($numeroDoc,$curso);
                    header('Location: index.php?pagina=estudiantes');
                    exit();
                }
                

            } elseif ($_POST['action'] == 'editar'){
                $numeroDoc = $_POST['numeroDoc'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $genero = $_POST['genero'];
                $curso = $_POST['curso'];
                $fecha_nac = $_POST['fecha_nac'];
                $telefono = $_POST['telefono'];
                $correo = $_POST['correo'];
                $this->aprendicesModel->EditUser($numeroDoc, $nombre, $apellido, $genero, $fecha_nac, $telefono, $correo, $numeroDoc);
                $this->aprendicesModel->EditCourses($numeroDoc,$curso, $numeroDoc);
                header('Location: index.php?pagina=estudiantes');
                exit();
            }
        }
    }

}

