<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config/database.php';
    include_once '../../classes/City.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new City($db);

    $stmt = $items->getCitys();
    $itemCount = $stmt->rowCount();


    if($itemCount > 0){
        
        $CityArr = array();
        $CityArr["body"] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "name" => $name,
                "state_id" => $state_id
            );

            array_push($CityArr["body"], $e);
        }
        echo json_encode($CityArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("messcity_id" => "No record found.")
        );
    }
?>