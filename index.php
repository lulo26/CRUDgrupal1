<?php
require_once './source/controllers/aprendicesController.php';

$controller = new AprendicesController();

// POST method for the form
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
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
}

?>