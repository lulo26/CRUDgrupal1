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

    public function manageForm(){
        if(isset($_POST['action'])) {
            if($_POST['action'] == 'add'){
                $id = $_POST['numeroDoc'];
                $name = $_POST['nombre'];
                $lastName = $_POST['apellido'];
                $gender = $_POST['genero'];
                $birthDate = $_POST['fecha_nac'];
                $phoneNumb = $_POST['telefono'];
                $email = $_POST['correo'];

                $this->aprendicesModel->CreateUser($id, $name, $lastName, $gender, $birthDate, $phoneNumb, $email);

                header('Location: ./index.php');
                exit();
            }
        }
    }

}

?>