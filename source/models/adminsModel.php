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

        $query = "SELECT usuario,password FROM admin WHERE usuario=? AND password=?";
        $result = $this->db->sendQuery($query, [$user, $pass], 'ss');
        $arreglo = mysqli_fetch_assoc($result);

        if (isset($arreglo)) {
            return $arreglo;
        }else{
            echo '<script>alert("No existes en el sistema")</script>';
        }
        
    }

    public function GetUserRepeated($user) {

        $query = "SELECT * FROM admin WHERE usuario=?";

        $result = $this->db->sendQuery($query, [$user], 's');

        $arreglo = mysqli_fetch_assoc($result);

        if (isset($arreglo)) {
            return true;
        }else{
            return false;
        }
        
    }

    public function GetEmailRepeated($correo) {

        $query = "SELECT * FROM admin WHERE correo=?";

        $result = $this->db->sendQuery($query, [$correo], 's');

        $arreglo = mysqli_fetch_assoc($result);

        if (isset($arreglo)) {
            return true;
        }else{
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

    public function EditAdmin($pass, $mail, $nombre, $apellido,$id){

        $query = "UPDATE `admin` SET password=?, correo=?, nombre=?, apellido=? WHERE idadmin=?";
        return $this->db->sendQuery($query, [$usuario,$pass, $mail, $nombre, $apellido,$id], 'ssssi');

    }

    public function EditAdminWithoutPass($mail, $nombre, $apellido,$id){
        
        $query = "UPDATE `admin` SET correo=?, nombre=?, apellido=? WHERE idadmin=?";
        return $this->db->sendQuery($query, [$mail, $nombre, $apellido,$id], 'sssi');
        
    }

    public function __destruct()
    {
        $this->db->disconnect();
    }
}

?>