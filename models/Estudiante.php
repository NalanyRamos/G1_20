<?php

    class Estudiante extends Conectar{
        
        public function get_estudiantes(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Estudiante";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }//Si esta Asegurado

        /////////////
        public function get_estudiante($NumeroAlumno){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Estudiante WHERE NumeroAlumno=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$NumeroAlumno);
            $sql->execute();
            return$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }//No esta asegurado


        public function insert_estudiante($NumeroAlumno, $nombres, $apellidos, $fechaNacimiento, $direccion, $altura, $carrera){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO Estudiante (NumeroAlumno, nombres, apellidos, fechaNacimiento, direccion, altura, carrera) 
            VALUES (?,?,?,?,?,?,?);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$NumeroAlumno);
            $sql->bindValue(2,$nombres);
            $sql->bindValue(3,$apellidos);
            $sql->bindValue(4,$fechaNacimiento);
            $sql->bindValue(5,$direccion);
            $sql->bindValue(6,$altura);
            $sql->bindValue(7,$carrera);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }//Si esta Asegurado



        ///////////
        public function update_estudiante($NumeroAlumno, $nombres, $apellidos, $fechaNacimiento, $direccion, $altura, $carrera){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE Estudiante set nombres=?, apellidos=?, fechaNacimiento=?, direccion=?, altura=?, carrera=? where NumeroAlumno=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nombres);
            $sql->bindValue(2,$apellidos);
            $sql->bindValue(3,$fechaNacimiento);
            $sql->bindValue(4,$direccion);
            $sql->bindValue(5,$altura);
            $sql->bindValue(6,$carrera);
            $sql->bindValue(7,$NumeroAlumno);
            $sql->execute();
            return$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }//No esta asegurado
        /////////////
        public function delete_estudiante($NumeroAlumno){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="DELETE FROM Estudiante WHERE NumeroAlumno=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$NumeroAlumno);
            $sql->execute();
            return$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }//No esta asegurado


    }

?>