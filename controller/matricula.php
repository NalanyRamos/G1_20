<?php

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}
header('Access-Control-Allow-Origin: *');  
header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/matricula.php");

$matricula = new Matricula();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){
        
        case "GetMatriculas": 
            $datos = $matricula->get_matriculas();
            echo json_encode($datos);
        break;

        case "GetMatricula":
            $datos = $matricula->get_matricula($body["CODIGOMATRICULA"]);
            echo json_encode($datos);
        break;

        case "insertMatricula":
            $datos = $matricula->insert_matricula($body["CODIGOMATRICULA"],$body["NOMBREASIGNATURA"],$body["NUMEROALUMNO"],$body["FECHAMATRICULA"],$body["NUMERODOCENTE"],$body["CARRERA"],$body["NUMEROEDIFICIO"]);
            echo json_encode("Matricula Agregada con exito");
        break;

        case "UpdateMatricula":
            $datos = $matricula->update_matricula($body["CODIGOMATRICULA"],$body["NOMBREASIGNATURA"],$body["NUMEROALUMNO"],$body["FECHAMATRICULA"],$body["NUMERODOCENTE"],$body["CARRERA"],$body["NUMEROEDIFICIO"]);
            echo json_encode("Matricula actualizada con exito");
        break;
        
        case "DeleteMatricula":
            $datos = $matricula->delete_matricula($body["CODIGOMATRICULA"]);
            echo json_encode("Matricula eliminada");
        break;
    }

?>