<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config/database.php';
    include_once '../../classes/User.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new User($db);

    $stmt = $items->getUsers();
    $itemCount = $stmt->rowCount();


    if($itemCount > 0){
        
        $UserArr = array();
        $UserArr["body"] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "name" => $name,
                "state_id" => $state_id,
                "city_id" => $city_id,
            );

            array_push($UserArr["body"], $e);
        }
        echo json_encode($UserArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("messcity_id" => "No record found.")
        );
    }
?>