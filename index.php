<?php
require_once 'source/controllers/aprendicesController.php';
require_once 'source/controllers/homeController.php';
require_once 'source/controllers/adminsController.php';
require_once 'source/controllers/fpdfController.php';
require_once 'source/controllers/logInController.php';
 
$controller = new AprendicesController();
$controllerAdmin = new AdminsController();
$controllerPDFaprendices = new FpdfController();
$login = new InicioSesion();
$homie = new HomeController();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $controllerAdmin->manageAdmins();
    $login->LogIn();

    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            
            case 'registrar':
                $controller->manageForm();
                break;
           
            case 'editar':
                $controller->showForm();
                break;

            case 'admineditar':
                $controllerAdmin->showAdmin();
                break;

            case 'reporteAprendices':
                    $controllerPDFaprendices->reportAprendiz();
                    break;

            case 'reporteAdmins':
                    $controllerPDFaprendices->reportAdmins();
                    break;
            
            default:
                break;
        }
    }
    
}


if (count($_GET) > 0) {
    switch ($_GET['pagina']) {
        case 'home':
            $homie->goHome();
            break;

        case 'estudiantes':
            $controller->listUsers();
            break;

        case 'registro':
            $controller->goRegister();
            break;

        case 'editar':
            if (isset($_GET['id'])){
                $controller->showForm($_GET['id']);
            }
            break;
        
        case 'admins':
            $controllerAdmin->listAdmins();
            break;

        case 'adminregistro':
            $controllerAdmin->goRegisterAdmin();
            break;

        case 'editaradmin':
            if (isset($_GET['id'])) {
                $controllerAdmin->showAdmin($_GET['id']);
            }
            break;

        case 'adminlogin':
            $controllerAdmin->goLogIn();
            break;

        default:
            break;
    }
}else{
    $controllerAdmin->goLogIn();
}

?>