<?php

class Matricula extends Conectar{
    public function get_matriculas(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM matricula ";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_matricula($codigo_matricula){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM matricula WHERE CODIGOMATRICULA = ?";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insert_matricula($codigo_matricula, $nombre_asignatura, $numero_alumno, 
    $fecha_matricula, $numero_docente, $carrera, $numero_edificio){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO matricula(CODIGOMATRICULA,NOMBREASIGNATURA,NUMEROALUMNO,FECHAMATRICULA,NUMERODOCENTE,CARRERA,NUMEROEDIFICIO)
        VALUES (?,?,?,?,?,?,?) ";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $codigo_matricula);
        $sql->bindValue(2, $nombre_asignatura);
        $sql->bindValue(3, $numero_alumno);
        $sql->bindValue(4, $fecha_matricula);
        $sql->bindValue(5, $numero_docente);
        $sql->bindValue(6, $carrera);
        $sql->bindValue(7, $numero_edificio);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);    
    }

}
?>
