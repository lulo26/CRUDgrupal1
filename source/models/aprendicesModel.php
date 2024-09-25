<?php 

require_once 'MYSQL.php';

class AprendicesModel{
    private $db;

    public function __construct()
    {
        $this->db = new MYSQL();
        $this->db->connectDB();
    }

    public function GetUsers(){
        $query = "SELECT * FROM aprendices";
        $result = $this->db->sendQuery($query);

        $users = [];
        while ($row = mysqli_fetch_assoc($result)){
            $users[] = $row;
        }
        return $users;
    }

    public function GetUserID($id){
        $query = "SELECT * FROM aprendices WHERE numeroDoc = ?";
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