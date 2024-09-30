<?php

require_once './source/models/adminsModel.php';

class AdminsController{
    private $adminsModel;

    public function __construct(){
        $this->adminsModel = new AdminsModel();
    }

    public function listAdmins(){
        $admins = $this->adminsModel->getAdmins();

        include 'route';
    }

    public function showAdmin($id){
        $admin = $this->adminsModel->getAdminID($id);
        include 'route';
    }

    public function manageAdmins(){
        if (isset($_POST['action'])){
            if($_POST['action'] === 'adminregistrar'){
                $usuario = $_POST['usuario'];
                $pass = $_POST['pass'];
                $mail = $_POST['mail'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
        
                $this->adminsModel->CreateAdmin($usuario, $pass, $mail, $nombre, $apellido);
                header('location: index.php');
                exit();
            }
        }
    }

    public function goRegisterAdmin(){
        include './source/views/crearAdmin.php';
    }

    public function goLogIn(){
        include './source/views/crearAdmin.php';
    }
}

