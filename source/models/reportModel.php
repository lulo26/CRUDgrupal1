<?php
require_once 'MYSQL.php';

class ReportModel{
 private $db;

 public function __construct()
 {
     $this->db = new MYSQL();
     $this->db->connectDB();
 }

 public function aprendizReport(){
    $query = "SELECT aprendices.numeroDoc as `documento`, aprendices.nombre, aprendices.apellido, aprendices.genero, aprendices.fecha_nac as `fecha de nacimiento`, aprendices.telefono, aprendices.correo, cursos.nombre as `curso`, aprendices.fecha_creacion as `fecha de creacion` from aprendices
    INNER JOIN aprendices_has_cursos 
    ON aprendices_has_cursos.aprendices_numeroDoc = aprendices.numeroDoc
    INNER JOIN cursos
    ON cursos.idcursos = aprendices_has_cursos.cursos_idcursos";

    return $this->db->sendQuery($query);
 }

 public function adminReport(){
    $query = "SELECT idadmin as `ID`, usuario, nombre, apellido , password as `contraseña`, correo FROM `admin`";
    
    return $this->db->sendQuery($query);
 }
}

?>