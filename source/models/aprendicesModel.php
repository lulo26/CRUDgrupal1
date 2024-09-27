<?php 

require_once 'MYSQL.php';

class AprendicesModel{
    private $db;

    public function __construct()
    {
        $this->db = new MYSQL();
        $this->db->connectDB();
    }

    //tuve que hacer una consulta que traiga todo lo de la tabla aprendices junto con el nombre del curso
    public function GetUsersWithCourse(){
        $query = "SELECT aprendices.numeroDoc,aprendices.nombre,aprendices.apellido,aprendices.genero,cursos.nombre as curso_nombre,aprendices.fecha_nac,aprendices.telefono,aprendices.correo,aprendices.fecha_creacion
        FROM aprendices
        INNER JOIN aprendices_has_cursos ON aprendices.numeroDoc = aprendices_has_cursos.aprendices_numeroDoc
        INNER JOIN cursos ON cursos.idcursos = aprendices_has_cursos.cursos_idcursos";

        $result = $this->db->sendQuery($query);

        $users = [];
        while ($row = mysqli_fetch_assoc($result)){
            $users[] = $row;
        }

        return $users;
    }

    /*  public function GetUsers(){
        $query = "SELECT * FROM aprendices";
        $result = $this->db->sendQuery($query);

        $users = [];
        while ($row = mysqli_fetch_assoc($result)){
            $users[] = $row;
        }
        return $users;
    } */

    public function GetUserID($id){
        $query = "SELECT * FROM aprendices WHERE numeroDoc = ?";
        $result = $this->db->sendQuery($query, [$id], 'i');
        return mysqli_fetch_assoc($result);
    }

    //insertamos en la tabla pivote
    public function CreateCourses($id_aprendiz,$id_course){
        $query = "INSERT INTO aprendices_has_cursos(aprendices_numeroDoc,cursos_idcursos) VALUES(?,?)";
        return $this->db->sendQuery($query, [$id_aprendiz,$id_course], "ii");
    }

    //obtenemos el nombre y id de los cursos para el registro
    public function GetCourses(){
        $query = "SELECT idcursos,nombre FROM cursos";
        $result = $this->db->sendQuery($query);

        $cursos = [];

        while ($row = mysqli_fetch_assoc($result)){
            $cursos[] = $row;
        }
        return $cursos;
    }

    //nombre del curso con el que se registro el usuario
    public function GetCourseUserID($id){
        $query = "SELECT cursos.nombre FROM aprendices_has_cursos
        INNER JOIN cursos ON cursos.idcursos = aprendices_has_cursos.cursos_idcursos";

        $result = $this->db->sendQuery($query, [$id], 'i');

        return mysqli_fetch_assoc($result);
    }

    public function CreateUser($numeroDoc, $nombre, $apellido, $genero, $fecha_nac, $telefono, $correo){
        $query = "INSERT INTO aprendices (numeroDoc, nombre, apellido, genero, fecha_nac, telefono, correo, fecha_creacion) VALUES (?,?,?,?,?,?,?, CURRENT_DATE())";
        return $this->db->sendQuery($query, [$numeroDoc, $nombre, $apellido, $genero, $fecha_nac, $telefono, $correo], "issssss");
    }

    public function EditUser($numeroDoc, $nombre, $apellido, $genero, $fecha_nac, $telefono, $correo){
        $query = "UPDATE aprendices SET numeroDoc = ?, nombre = ?, apellido = ?, genero = ?, fecha_nac = ?, telefono = ?, correo = ?, fecha_creacion = ? WHERE numeroDoc = ?";
        return $this->db->sendQuery($query,[$numeroDoc, $nombre, $apellido, $genero, $fecha_nac, $telefono, $correo, $numeroDoc], "issssssi");
    }

    public function __destruct()
    {
        $this->db->disconnect();
    }
}

?>