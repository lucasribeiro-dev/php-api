<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config/database.php';
    include_once '../../classes/Address.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Address($db);

    $stmt = $items->getAddresses();
    $itemCount = $stmt->rowCount();


    if($itemCount > 0){
        
        $AddressArr = array();
        $AddressArr["body"] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "name" => $name,
                "user_id" => $user_id
            );

            array_push($AddressArr["body"], $e);
        }
        echo json_encode($AddressArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("messcity_id" => "No record found.")
        );
    }
