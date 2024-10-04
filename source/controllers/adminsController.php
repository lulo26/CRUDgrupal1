<?php

require_once './source/models/adminsModel.php';


Class AdminsController{
    private $adminsModel;
    private $user;

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
                
                $user_repeated = $this->adminsModel->GetUserRepeated($usuario);
                $email_repeated = $this->adminsModel->GetEmailRepeated($mail);

                if ($user_repeated==true) {
                    echo '<script>alert("Ese usuario ya existe")</script>';

                }elseif ($email_repeated==true) {
                    echo '<script>alert("Ese correo ya existe")</script>';

                }else {
                    $this->adminsModel->CreateAdmin($usuario, $pass, $mail, $nombre, $apellido);

                    session_start();
                    header('location: index.php?pagina=home');

                    $_SESSION['user']=$usuario; 
                    $_SESSION['acceso']=true;

                    exit();
                }

            }elseif ($_POST['action'] === 'admineditar') {
                $pass = $_POST['pass'];
                $mail = $_POST['mail'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $idadmin =$_POST['idadmin'];

                if (strlen(trim($pass))>0) {
                    $this->adminsModel->EditAdmin(md5($pass), $mail, $nombre, $apellido,$idadmin);
                } else {
                    $this->adminsModel->EditAdminWithoutPass($mail, $nombre, $apellido,$idadmin);
                }
                
                header('location: index.php?pagina=admins');
                exit();
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