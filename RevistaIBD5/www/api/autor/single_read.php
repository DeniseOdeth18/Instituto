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

    $item = new Employee($db);

    $item->$id_Autor = isset($_GET['$id_Autor']) ? $_GET['$id_Autor'] : die();
  
    $item->getSingleAutor();

    if($item->Nombres != null){
        // create array
        $aut_arr = array(
            "id_Autor" =>  $item->id_Autor,
            "Nombres" => $item->Nombres,
            "ApellidoP" => $item->ApellidoP,
            "ApellidoM" => $item->ApellidoM
        );
      
        http_response_code(200);
        echo json_encode($aut_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Employee not found.");
    }
?>