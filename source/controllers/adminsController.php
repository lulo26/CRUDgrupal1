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

    public function showAdmin($id=null){
        if ($id) {
            $admin = $this->adminsModel->getAdminID($id);
            include_once 'source/views/crearAdmin.php';
        }
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
                header('location: index.php?pagina=home');
                exit();

            }elseif ($_POST['action'] === 'admineditar') {
                $usuario = $_POST['usuario'];
                $pass = $_POST['pass'];
                $mail = $_POST['mail'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $idadmin =$_POST['idadmin'];

                if (strlen(trim($pass))>0) {
                    $this->adminsModel->EditAdmin($usuario, md5($pass), $mail, $nombre, $apellido,$idadmin);
                } else {
                    $this->adminsModel->EditAdminWithoutPass($usuario, $mail, $nombre, $apellido,$idadmin);
                }

                header('location: index.php?pagina=admins');
                exit();

            }elseif ($_POST['action'] === 'login') {
                try 
                {
                    $nombre_admin= $_POST['nombre_admin'];
                    $pass= md5($_POST['pass']);
                    if ($this->adminsModel->LogIn($nombre_admin,$pass)) {
                        header('location: index.php?pagina=home');
                        exit();
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

?>