<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");


    include_once '../../config/database.php';
    include_once '../../class/autor.php';


    $database = new Database();
    $db = $database->getConnection();

    $items = new Autor($db);

    $stmt = $items->getAutor();
    $itemCount = $stmt->rowCount();

    



     echo json_encode($itemCount);

    if($itemCount > 0){
        
        $autorArr = array();
        $autorArr["body"] = array();
        $autorArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id_Autor" => $id_Autor,
                "Nombres" => $Nombres,
                "ApellidoP" => $ApellidoP,
                "ApellidoM" => $ApellidoM,
           
            );

            array_push($autorArr["body"], $e);
        }

        echo json_encode($autorArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>
