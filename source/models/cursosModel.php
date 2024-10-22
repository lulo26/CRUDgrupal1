<?php

require_once 'MYSQL.php';

class cursosModel{
    private $db;

    public function __construct()
    {
        $this->db = new MYSQL();
        $this->db->connectDB();
    }

    public function getCursos(){
        $query = "SELECT * FROM `cursos`";
        $result = $this->db->sendQuery($query);
        $admins = [];
        while ($row = mysqli_fetch_assoc($result)){
             $admins[] = $row;
        }
        return $admins;
     }

    public function GetCursoID($id){
        $query = "SELECT * FROM cursos WHERE idcursos = ?";
        $result = $this->db->sendQuery($query, [$id], 'i');
        return mysqli_fetch_assoc($result);
    }

    public function CreateCurso($nombre, $descripcion, $fecha){
        $query = "INSERT INTO cursos (nombre, descripcion, fecha_creacion) VALUES (?,?,?)";
        return $this->db->sendQuery($query, [$nombre, $descripcion, $fecha], "sss");
    }

    public function EditCurso($nombre, $descripcion, $fecha, $id){
        $query = "UPDATE cursos SET nombre = ?, descripcion = ?, fecha_creacion = ? WHERE idcursos = ?";
        return $this->db->sendQuery($query,[$nombre, $descripcion, $fecha, $id], "sssi");
    }

    public function __destruct()
    {
        $this->db->disconnect();
    }
}

?>