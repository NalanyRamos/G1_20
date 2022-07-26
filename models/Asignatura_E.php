<?php

    class Asignatura extends Conectar{
        
        public function get_asignaturas(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Asignatura";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }//Si esta Asegurado

        /////////////
        public function get_asignatura($codigoAs){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Asignatura WHERE codigoAsignatura=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$codigoAs);
            $sql->execute();
            return$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }//No esta asegurado


        public function insert_asignatura($codigoAs, $nombreAs, $carrera, $fechaCreacion, $unidadesValorativas, $promedioAprovacion, $numeroEdificio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO Asignatura (codigoAsignatura, nombreAsignatura, carrera, fechaCreacion, unidadesValorativas, promedioAprobacion, numeroEdificio) 
            VALUES (?,?,?,?,?,?,?);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$codigoAs);
            $sql->bindValue(2,$nombreAs);
            $sql->bindValue(3,$carrera);
            $sql->bindValue(4,$fechaCreacion);
            $sql->bindValue(5,$unidadesValorativas);
            $sql->bindValue(6,$promedioAprovacion);
            $sql->bindValue(7,$numeroEdificio);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }//Si esta Asegurado



        ///////////
        public function update_asignatura($codigoAs, $nombreAs, $carrera, $fechaCreacion, $unidadesValorativas, $promedioAprovacion, $numeroEdificio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE Asignatura set nombreAsignatura=?, carrera=?, fechaCreacion=?, unidadesValorativas=?, promedioAprobacion=?, numeroEdificio=? where codigoAsignatura=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nombreAs);
            $sql->bindValue(2,$carrera);
            $sql->bindValue(3,$fechaCreacion);
            $sql->bindValue(4,$unidadesValorativas);
            $sql->bindValue(5,$promedioAprovacion);
            $sql->bindValue(6,$numeroEdificio);
            $sql->bindValue(7,$codigoAs);
            $sql->execute();
            return$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }//No esta asegurado
        /////////////
        public function delete_asignatura($codigoAs){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="DELETE FROM Asignatura WHERE codigoAsignatura=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$codigoAs);
            $sql->execute();
            return$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }//No esta asegurado


    }

?>