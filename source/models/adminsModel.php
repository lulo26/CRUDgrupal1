<?php

require_once 'MYSQL.php';

class AdminsModel{
    private $db;

    public function __construct()
    {
        $this->db = new MYSQL();
        $this->db->connectDB();
    }

    public function LogIn($user, $pass) {
        $query = "SELECT * FROM `admin` WHERE usuario=? AND `password`=?";
        $hashed_pass = md5($pass);  
        $result = $this->db->sendQuery($query, [$user, $hashed_pass], 'ss');
    
        if (mysqli_fetch_assoc($result)) {
            return true;
        } else {
            return false;
        }
    }

    public function getAdmins(){
       $query = "SELECT * FROM `admin`";
       $result = $this->db->sendQuery($query);
       $admins = [];
       while ($row = mysqli_fetch_assoc($result)){
            $admins[] = $row;
       }
       return $admins;
    }

    public function getAdminID($id){
        $query = "SELECT * FROM `admin` WHERE idadmin = ?";
        $result = $this->db->sendQuery($query, [$id], 'i');
        return mysqli_fetch_assoc($result);
    }

    public function CreateAdmin($usuario, $pass, $mail, $nombre, $apellido){
        $query = "INSERT INTO `admin` (usuario, password, correo, nombre, apellido) VALUES (?,?,?,?,?)";
        return $this->db->sendQuery($query, [$usuario, $pass, $mail, $nombre, $apellido], 'sssss');
    }

    public function __destruct()
    {
        $this->db->disconnect();
    }
}

?>