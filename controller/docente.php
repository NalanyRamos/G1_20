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
    require_once("../models/Docente.php");

    $docente = new Docente();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){
        
        case "GetDocentes":   //Listo ya esta
            $datos = $docente->get_docentes();
            echo json_encode($datos);
        break;

        case "GetDocente":
            $datos = $docente->get_docente($body["NumeroDocente"]);
            echo json_encode($datos);
        break;

        case "insertDocente": //Listo ya esta
            $datos = $docente->insert_docente($body["NumeroDocente"],$body["nombres"],$body["apellidos"],$body["fechaContratacion"],$body["direccion"],$body["salario"],$body["profesion"]);
            echo json_encode("Docente Agregado con exito");
        break;

        case "UpdateDocente":
            $datos = $docente->update_docente($body["NumeroDocente"],$body["nombres"],$body["apellidos"],$body["fechaContratacion"],$body["direccion"],$body["salario"],$body["profesion"]);
            echo json_encode("Docente actualizado con exito");
        break;
        
        case "DeleteDocente":
            $datos = $docente->delete_docente($body["NumeroDocente"]);
            echo json_encode("Docente eliminado");
        break;
    }

?>