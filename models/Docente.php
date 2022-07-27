<?php

    class Docente extends Conectar{
        
        public function get_docentes(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Docente";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }//Si esta Asegurado

        /////////////
        public function get_docente($NumeroDocente){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM Docente WHERE NumeroDocente=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$NumeroDocente);
            $sql->execute();
            return$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }//No esta asegurado


        public function insert_docente($NumeroDocente, $nombres, $apellidos, $fechaContratacion, $direccion, $salario, $profesion){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO Docente (NumeroDocente, nombres, apellidos, fechaContratacion, direccion, salario, profesion) 
            VALUES (?,?,?,?,?,?,?);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$NumeroDocente);
            $sql->bindValue(2,$nombres);
            $sql->bindValue(3,$apellidos);
            $sql->bindValue(4,$fechaContratacion);
            $sql->bindValue(5,$direccion);
            $sql->bindValue(6,$salario);
            $sql->bindValue(7,$profesion);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }//Si esta Asegurado



        ///////////
        public function update_docente($NumeroDocente, $nombres, $apellidos, $fechaContratacion, $direccion, $salario, $profesion){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE Docente set nombres=?, apellidos=?, fechaContratacion=?, direccion=?, salario=?, profesion=? where NumeroDocente=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nombres);
            $sql->bindValue(2,$apellidos);
            $sql->bindValue(3,$fechaContratacion);
            $sql->bindValue(4,$direccion);
            $sql->bindValue(5,$salario);
            $sql->bindValue(6,$profesion);
            $sql->bindValue(7,$NumeroDocente);
            $sql->execute();
            return$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }//No esta asegurado
        /////////////
        public function delete_docente($NumeroDocente){
            $conectar = parent::conexion();
            parent::set_names();
            $sql="DELETE FROM Docente WHERE NumeroDocente=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$NumeroDocente);
            $sql->execute();
            return$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }//No esta asegurado


    }

?>