<?php
require_once 'source/controllers/aprendicesController.php';
require_once 'source/controllers/homeController.php';
require_once 'source/controllers/adminsController.php';
 
$controller = new AprendicesController();
$controllerAdmin = new AdminsController();
$homie = new HomeController();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->manageForm();
    $controllerAdmin->manageAdmins();

    if (isset($_GET['action'])) {
        
        switch ($_GET['action']) {
            case 'registrar':
                $controller->goRegister();
                break;
            
            case 'editar':
                $controller->showForm();
                break;
            
            case 'adminregistrar':
                $controllerAdmin->goRegisterAdmin();
                break;
            
            case 'login':
                $controllerAdmin->goLogIn();
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

        case 'adminlogin':
            $controllerAdmin->goLogIn();
            break;

        default:
            break;
    }
}else{
    $homie->goHome();
}

?>