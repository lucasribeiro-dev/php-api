<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config/database.php';
    include_once '../../classes/State.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new State($db);

    $stmt = $items->getTotalUsersOfStates();
    $itemCount = $stmt->rowCount();


    if($itemCount > 0){
        
        $StateArr = array();
        $StateArr["body"] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "state" => $name,
                "total" => $total,
            );

            array_push($StateArr["body"], $e);
        }
        echo json_encode($StateArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("messcity_id" => "No record found.")
        );
    }
?>