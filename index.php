<?php
require_once 'source/controllers/aprendicesController.php';
require_once 'source/controllers/homeController.php';
require_once 'source/controllers/adminsController.php';
require_once 'source/controllers/fpdfController.php';
require_once 'source/controllers/cursosController.php';
require_once 'source/controllers/logInController.php';
 
$controller = new AprendicesController();
$asignarCursos = new AprendicesController();
$controllerAdmin = new AdminsController();
$controllerCursos = new CursosController();
$controllerPDFaprendices = new FpdfController();
$login = new InicioSesion();
$homie = new HomeController();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['action'])) {

        switch ($_POST['action']) {
            
            case 'agregar':
                $controller->manageForm();
                break;
           
            case 'editar':
                $controller->manageForm();
                break;

            case 'adminregistrar':
                    $controllerAdmin->manageAdmins();
                break;

            case 'admineditar':
                $controllerAdmin->manageAdmins();
                break;

            case 'cursocrear':
                    $controllerCursos->manageCursos();
                    break;

            case 'cursoeditar':
                $controllerCursos->manageCursos();
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

    if (isset($_POST['btn_asignar'])) {
        $asignarCursos->AsignarCursos();
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
        
        case 'cursocrear':
            $controllerCursos->goCreatecurso();
            break;

        case 'cursoeditar':
            if (isset($_GET['id'])) {
                $controllerCursos->showCursos($_GET['id']);
            }else {
                $controllerAdmin->goLogIn();
            }
            
            break;

        case 'cursos':
            $controllerCursos->listCursos();
            break;

        default:
            break;
    }
}else{
    $controllerAdmin->goLogIn();
}

?>