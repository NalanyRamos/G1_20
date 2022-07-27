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
    require_once("../models/Estudiante.php");

    $estudiante = new Estudiante();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){
        
        case "GetEstudiantes":   //Listo ya esta
            $datos = $estudiante->get_estudiantes();
            echo json_encode($datos);
        break;

        case "GetEstudiante":
            $datos = $estudiante->get_estudiante($body["NumeroAlumno"]);
            echo json_encode($datos);
        break;

        case "insertEstudiante": //Listo ya esta
            $datos = $estudiante->insert_estudiante($body["NumeroAlumno"],$body["nombres"],$body["apellidos"],$body["fechaNacimiento"],$body["direccion"],$body["altura"],$body["carrera"]);
            echo json_encode("Estudiante Agregado con exito");
        break;

        case "UpdateEstudiante":
            $datos = $estudiante->update_estudiante($body["NumeroAlumno"],$body["nombres"],$body["apellidos"],$body["fechaNacimiento"],$body["direccion"],$body["altura"],$body["carrera"]);
            echo json_encode("Estudiante actualizado con exito");
        break;
        
        case "DeleteEstudiante":
            $datos = $estudiante->delete_estudiante($body["NumeroAlumno"]);
            echo json_encode("Estudiante eliminado");
        break;
    }

?>