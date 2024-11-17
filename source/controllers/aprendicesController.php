<?php

require_once './source/models/aprendicesModel.php';

Class AprendicesController{
    private $aprendicesModel;

    public function __construct()
    {
        $this->aprendicesModel = new AprendicesModel();
    }

    public function listUsers(){
        $usersWithCourse = $this->aprendicesModel->GetUsersWithCourse();
        $courses = $this->aprendicesModel->GetCourses();
        include './source/views/mostrarAprendiz.php';
    }

    public function showForm($id){
            $user =$this->aprendicesModel->GetUserID($id);
            $courseid =$this->aprendicesModel->GetCourseUserID($id);
            include './source/views/crearAprendiz.php';
    }

    public function goRegister(){
        include './source/views/crearAprendiz.php';
    }

    public function manageForm(){
        if(isset($_POST['action'])) {
            if($_POST['action'] == 'agregar'){
                $numeroDoc = intval($_POST['numeroDoc']);
                $nombre = htmlspecialchars(trim(($_POST['nombre'])));
                $apellido = htmlspecialchars(trim($_POST['apellido']));
                $genero =htmlspecialchars($_POST['genero']);
                $curso = $_POST['curso'];
                $fecha_nac = htmlspecialchars($_POST['fecha_nac']);
                $telefono = htmlspecialchars(trim($_POST['telefono']));
                $correo = filter_var(trim($_POST['correo'],FILTER_SANITIZE_EMAIL));

                function check_post(array $campos){
                    $validState = true;
                    foreach ($campos as $valor) {
                    if (!isset($_POST[$valor]) || empty(trim($_POST[$valor]))) {
                        $validState = false;
                        }   
                    }
            
                    return $validState;
                }
                $count_post = 0;
                $array_validate = array();

                foreach ($curso as $item) {
                    if (isset($item) && !empty(intval($item)) && $item>0) {
                        $count_post++;
                    }
                }

                $arrayCampos = ["nombre","apellido","genero","fecha_nac","telefono","correo"];

                if (check_post($arrayCampos) && $count_post>0) {

                    $sql = [
                        "correo" => $this->aprendicesModel->GetEmailUser($correo),
                        "id" => $this->aprendicesModel->GetIDUser($numeroDoc)
                    ];

                    if ($sql["correo"]) {
                        echo '<script>alert("Ese correo ya existe")</script>';

                    }elseif ($sql["id"]) {
                        echo '<script>alert("Ese numero de documento ya existe")</script>';

                    } else {
                        $this->aprendicesModel->CreateUser($numeroDoc, $nombre, $apellido, $genero, $fecha_nac, $telefono, $correo);

                        foreach ($_POST['servicios']  as $item) {
                            $this->aprendicesModel->CreateCourses($numeroDoc,$curso);
                        }
                        
                        header('Location: index.php?pagina=estudiantes');
                        exit();
                    }

                }

            } elseif ($_POST['action'] == 'editar'){

                $numeroDoc = $_POST['numeroDoc'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $genero = $_POST['genero'];
                $curso = $_POST['curso'];
                $fecha_nac = $_POST['fecha_nac'];
                $telefono = $_POST['telefono'];
                $correo = $_POST['correo'];
                $this->aprendicesModel->EditUser($numeroDoc, $nombre, $apellido, $genero, $fecha_nac, $telefono, $correo, $numeroDoc);
                $this->aprendicesModel->EditCourses($numeroDoc,$curso, $numeroDoc);
                header('Location: index.php?pagina=estudiantes');
                exit();
            }
        }
    }

}