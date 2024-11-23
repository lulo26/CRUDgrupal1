<?php

require_once './source/models/aprendicesModel.php';

Class AprendicesController{
    private $aprendicesModel;

    public function __construct()
    {
        $this->aprendicesModel = new AprendicesModel();
    }

    public function listUsers(){
        $users = $this->aprendicesModel->GetUsers();
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

    public function AsignarCursos() {
        if (isset($_POST['btn_asignar'])) {
            $estudiante = intval($_POST['estudiante']);

            if (isset($_POST['cursos']) && !empty($_POST['cursos'])) {
                $cursos = $_POST['cursos'];
            }
            
            if ($estudiante>0 && isset($cursos)) {
                foreach ($cursos as $curso) {
                    $insert  = $this->aprendicesModel->CreateCourses($estudiante,$curso);
                }

                $_SESSION['mensaje']="";
                
            } else {
                session_start();
                $_SESSION['mensaje']="Faltan datos";
            }
            
            
            
        }
        
    }

    public function manageForm(){
        if(isset($_POST['action'])) {
            if($_POST['action'] == 'agregar'){
                $numeroDoc = intval($_POST['numeroDoc']);
                $nombre = htmlspecialchars(trim(($_POST['nombre'])));
                $apellido = htmlspecialchars(trim($_POST['apellido']));
                $genero =htmlspecialchars($_POST['genero']);
                $fecha_nac = htmlspecialchars(trim($_POST['fecha_nac']));
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

                $arrayCampos = ["nombre","apellido","genero","fecha_nac","telefono","correo"];

                if (check_post($arrayCampos)) {

                    $sql = [
                        "correo" => $this->aprendicesModel->GetEmailUser($correo),
                        "id" => $this->aprendicesModel->GetIDUser($numeroDoc),
                        "telefono" =>$this->aprendicesModel->GetNumUser($telefono)
                    ];

                    if ($sql["correo"]) {
                        echo '<script>alert("Ese correo ya existe")</script>';

                    }elseif ($sql["id"]) {
                        echo '<script>alert("Ese numero de documento ya existe")</script>';

                    }elseif ($sql["telefono"]) {
                        echo '<script>alert("Ese numero de telefono ya está registrado")</script>';

                    }else {
                        $insert = $this->aprendicesModel->CreateUser($numeroDoc, $nombre, $apellido, $genero, $fecha_nac, $telefono, $correo);

                        if ($insert) {
                            header('Location: index.php?pagina=estudiantes');
                            exit();

                        }else {
                            echo '<script>alert("Ocurrió un error durante el proceso de inserción")</script>';
                        }
                    }

                }else {
                    echo '<script>alert("Faltan datos")</script>';
                }

            } elseif ($_POST['action'] == 'editar'){

                $numeroDoc = $_POST['numeroDoc'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $genero = $_POST['genero'];
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