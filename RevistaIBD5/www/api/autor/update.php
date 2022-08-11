<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../../config/database.php';
    include_once '../../class/autor.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Autor($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->id_Autor = $data->id_Autor;
    
    // employee values
    $item->Nombres = $data->Nombres;
    $item->ApellidoP = $data->ApellidoP;
    $item->ApellidoM = $data->ApellidoM;

    
    if($item->updateAutor()){
        echo json_encode("Autor data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>