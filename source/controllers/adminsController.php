<?php

require_once './source/models/adminsModel.php';

Class AdminsController{
    private $adminsModel;

    public function __construct(){
        $this->adminsModel = new AdminsModel();
    }

    public function listAdmins(): void{
        $admins = $this->adminsModel->getAdmins();
        include 'source/views/mostrarAdmin.php';
    }

    public function showAdmin($id){
        $admin = $this->adminsModel->getAdminID($id);
        include_once '.source/views/mostrarAdmin.php';
    }

    public function manageAdmins(){
        if (isset($_POST['action'])){
            if($_POST['action'] === 'adminregistrar'){
                $usuario = $_POST['usuario'];
                $pass = md5($_POST['pass']);
                $mail = $_POST['mail'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
        
                $this->adminsModel->CreateAdmin($usuario, $pass, $mail, $nombre, $apellido);
                header('location: index.php');
                exit();

            }elseif ($_POST['action'] === 'login') {
                try 
                {
                    $nombre_admin= $_POST['nombre_admin'];
                    
                    $pass= md5($_POST['pass']);

                    if ($this->adminsModel->LogIn($nombre_admin,$pass)) {
                        header('location: index.php');
                        exit();
                    }else{
                        echo("No existes en el sistema");
                    }
                    
                } catch (Exception $e) {
                    throw new Exception("Error en el procedimiento", $e);
                }
                
            }
        }
    }

    public function goRegisterAdmin(){
        include './source/views/crearAdmin.php';
    }

    public function goLogIn(){
        include './source/views/loginAdmin.php';
    }
}

