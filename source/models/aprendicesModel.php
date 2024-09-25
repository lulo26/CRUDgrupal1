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

    public function CreateUser($id, $name, $lastName, $gender, $birthDate, $phoneNumb, $email){
        $query = "INSERT INTO aprendices VALUES (?,?,?,?,?,?,?, CURRENT_DATE())";
        return $this->db->sendQuery($query, [$id, $name, $lastName, $gender, $birthDate, $phoneNumb, $email], "isssdss");
    }

    public function __destruct()
    {
        $this->db->disconnect();
    }
}

?>