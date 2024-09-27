<?php
require_once 'source/controllers/aprendicesController.php';
require_once 'source/controllers/homeController.php';
 
$controller = new AprendicesController();
$homie = new HomeController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->manageForm();
    if($_GET['action'] === 'registrar'){
        $controller->goRegister();
    }elseif ($_GET['action'] === 'editar') {
        
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
        
        default: 
            break;
    }
}else{
    $homie->goHome();
}

// POST method for the form
/* if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $controller->manageForm();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(isset($_GET['action'])){
        switch($_GET['action']) {
            case 'editar':
                if (isset($_GET['numeroDoc'])){
                    $controller->showForm($_GET['numeroDoc']);
                }
                break;
            default:
                $controller->listUsers();
                break;
        }
    } else{
        $controller->listUsers();
    }
} */

?>