<?php
require_once './source/models/adminsModel.php';


class InicioSesion{
    private $adminsModels;

    public function __construct(){
        $this->adminsModels= new AdminsModel();
    }

    public function LogIn(){

        if (isset($_POST['action'])) {

            if ($_POST['action']=="login") {

                $nombre_usuario = $_POST['nombre_admin'];
                $pass = md5($_POST['pass']);

                $fila=$this->adminsModels->LogIn($nombre_usuario,$pass);

                if (isset($fila)) {
                    
                    session_start();
                    header('location: index.php?pagina=home');
                    
                    $_SESSION['user']=$nombre_usuario; 
                    $_SESSION['acceso']=true;

                    exit();
                }

            }
        }
        
    }



}







?>