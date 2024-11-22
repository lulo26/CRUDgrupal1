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

    public function showAdmin($id){
        $admin = $this->adminsModel->getAdminID($id);
        include_once 'source/views/crearAdmin.php';
    }

    public function manageAdmins(){
        if (isset($_POST['action'])){

            if($_POST['action'] === 'adminregistrar'){
                
                $pass = md5($_POST['pass']);
                $mail = $_POST['mail'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $usuario = $_POST['usuario'];
                
                function check_post(array $campos){
                    $validState = true;
                    foreach ($campos as $valor) {
                    if (!isset($_POST[$valor]) || empty(trim($_POST[$valor]))) {
                        $validState = false;
                        }   
                    }
                    return $validState;
                }
                

                $arrayCampos = array("usuario","pass","mail","nombre","apellido");

                if (check_post($arrayCampos)) {
                    //esto es una mierda de solucion pero sirve
                    $user_admin = $_POST['user_admin'];
                    
                    $user_repeated = $this->adminsModel->GetUserRepeated($usuario);
                    $email_repeated = $this->adminsModel->GetEmailRepeated($mail);

                    if ($user_repeated==true) {
                        echo '<script>alert("Ese usuario ya existe")</script>';

                    }elseif ($email_repeated==true) {
                        echo '<script>alert("Ese correo ya existe")</script>';

                    }else {
                        $this->adminsModel->CreateAdmin($usuario, $pass, $mail, $nombre, $apellido);

                        if (!empty($user_admin)) {
                            header('location: index.php?pagina=admins');
                        }else {
                            session_start();
                            header('location: index.php?pagina=home');
                            $_SESSION['user']=$usuario; 
                            $_SESSION['acceso']=true;
                        }
                        exit();
                    }

                }else {
                    echo '<script>alert("Ingrese todos los campos")</script>';
                }

            }elseif ($_POST['action'] === 'admineditar') {
                $pass = md5($_POST['pass']);
                $mail = $_POST['mail'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $idadmin =$_POST['idadmin'];

                function check_post(array $campos){
                    $validState = true;
                    foreach ($campos as $valor) {
                    if (!isset($_POST[$valor]) || empty(trim($_POST[$valor]))) {
                        $validState = false;
                        }   
                    }
                    return $validState;
                }

                $arrayCampos = array("mail","nombre","apellido");

                if (check_post($arrayCampos)) {

                    $email_exist = $this->adminsModel->getEmailByID($mail,$idadmin);

                    if (isset($email_exist)) {
                        
                        echo '<script>alert("Ese email ya lo tiene otro administrador")</script>';
                    } else {

                        if (strlen(trim($pass))>0) {

                            $editar = $this->adminsModel->EditAdmin($pass, $mail, $nombre, $apellido,$idadmin);
    
                            if (isset($editar) && $editar == true) {
                                header('location: index.php?pagina=admins');
                                exit();
                            }else {
                                echo '<script>alert("Ocurrió un error al momento de editar el usuario")</script>';
                                $this->showAdmin($idadmin); 
                            }
    
                        } else {
    
                            $editar = $this->adminsModel->EditAdminWithoutPass($mail, $nombre, $apellido,$idadmin);
    
                            if (isset($editar) && $editar == true) {
                                header('location: index.php?pagina=admins');
                                exit();
                            }else {
                                echo '<script>alert("Ocurrió un error al momento de editar el usuario")</script>';
                                $this->showAdmin($idadmin); 
                            }
                        }
                    }
                    
                }else {
                    echo '<script>alert("Ingrese todos los campos")</script>';
                    $this->showAdmin($idadmin); 
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