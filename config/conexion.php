<?php
    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try {
                $conectar=$this->dbh=new PDO("mysql:host=20.216.41.245;dbname=g1_20","G1_20","fVl9pd2E");
                return $conectar;

            }catch(Exception $e){
                print "Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }

    }
?>