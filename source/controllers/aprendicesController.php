<?php

require_once './source/models/aprendicesModel.php';

Class AprendicesController{
    private $aprendicesModel;

    public function __construct()
    {
        $this->aprendicesModel = new AprendicesModel();
    }

    public function listUsers(){
        $users =
        $this->aprendicesModel->GetUsers();
        include './source/views/mostrarAprendiz.php';
    }

    public function showForm($id = null){
        if ($id){
            $user = 
            $this->aprendicesModel->GetUserID($id);
            include './source/views/mostrarAprendiz.php';
        } else {
            include './source/views/crearAprendiz.php';
        }
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
                $fecha_nac = $_POST['fecha_nac'];
                $telefono = $_POST['telefono'];
                $correo = $_POST['correo'];

                $this->aprendicesModel->CreateUser($numeroDoc, $nombre, $apellido, $genero, $fecha_nac, $telefono, $correo);
                header('Location: index.php');
                exit();

            } elseif ($_POST['action'] == 'editar'){
                $numeroDoc = $_POST['numeroDoc'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $genero = $_POST['genero'];
                $fecha_nac = $_POST['fecha_nac'];
                $telefono = $_POST['telefono'];
                $correo = $_POST['correo'];

                $this->aprendicesModel->EditUser($numeroDoc, $nombre, $apellido, $genero, $fecha_nac, $telefono, $correo, $numeroDoc);
                header('Location: index.php');
                exit();
            }
        }
    }

}

?>