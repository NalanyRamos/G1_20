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

    require_once("../config/conexionAsignatura.php");
    require_once("../models/Asignatura_E.php");

    $asignatura = new Asignatura();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){
        
        case "GetAsignaturas":   //Listo ya esta
            $datos = $asignatura->get_asignaturas();
            echo json_encode($datos);
        break;

        case "GetAsignatura":
            $datos = $asignatura->get_asignatura($body["codigoAsignatura"]);
            echo json_encode($datos);
        break;

        case "insertAsignatura": //Listo ya esta
            $datos = $asignatura->insert_asignatura($body["codigoAsignatura"],$body["nombreAsignatura"],$body["carrera"],$body["fechaCreacion"],$body["unidadesValorativas"],$body["promedioAprobacion"],$body["numeroEdificio"]);
            echo json_encode("Asignatura Agregado con exito");
        break;

        case "UpdateAsignatura":
            $datos = $asignatura->update_asignatura($body["codigoAsignatura"],$body["nombreAsignatura"],$body["carrera"],$body["fechaCreacion"],$body["unidadesValorativas"],$body["promedioAprobacion"],$body["numeroEdificio"]);
            echo json_encode("Asignatura actualizada con exito");
        break;
        
        case "DeleteAsignatura":
            $datos = $asignatura->delete_asignatura($body["codigoAsignatura"]);
            echo json_encode("Asignatura eliminada");
        break;
    }

?>