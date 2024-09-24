<?php

class MYSQL{
    // get connection string
    private $ipServidor = "localhost";
    private $usuarioBase = "root";
    private $contrasena = "";
    private $DBName = "primercrud";
    private $conn;

    public function __construct($ipServidor = null, $usuarioBase = null, $contrasena = null, $DBName = null)
    {
        if ($ipServidor) $this->ipServidor = $ipServidor;
        if ($usuarioBase) $this->usuarioBase = $usuarioBase;
        if ($contrasena) $this->contrasena = $contrasena;
        if ($DBName) $this->DBName = $DBName;
    }

    // connect to data base
    public function connectDB(){
        try{
            $this->conn = new mysqli($this->ipServidor, $this->usuarioBase, $this->contrasena, $this->DBName);
            if($this->conn->connect_error){
                throw new Exception("error en la conexión: " .$this->conn->connect_error);
            }
            $this->conn->set_charset("utf8");
        } catch (Exception $e){
            die("excepción capturada: " . $e->getMessage());
        }
    } 

    public function getConnection(){
        return $this->conn;
    }

    public function disconnect(){
        if($this->conn){
            $this->conn->close();
        }
    }

    public function sendQuery($query, $parameters = [], $types = ""){
        try{
            $stmt = $this->conn->prepare($query);
            if(!$stmt){
                throw new Exception("Error en la preparación de la consulta" . $this->conn->error);
            }
            if($parameters){
                $stmt->bind_param($types, ...$parameters);
            }
            $stmt->execute();
            $result = $stmt->get_result();
            if($result){
                $stmt->close();
                return $result;
            } else{
                $stmt->close();
                return $this->conn->affected_rows; // for non-queries 
            }
        } catch (Exception $e){
            die("excepción capturada: " . $e->getMessage());
        }
    }

    public function lastInsert(){
        return $this->conn->insert_id;
    }

}

?>