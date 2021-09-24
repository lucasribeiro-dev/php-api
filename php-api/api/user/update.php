<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../../config/database.php';
    include_once '../../classes/User.php';
    include_once '../../classes/Address.php';

    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new User($db);
    $address = new Address($db);

    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->id = $data->id;
    $address->name = $data->address;
    $address->user_id = $data->id;
    
    // User values
    $item->name = $data->name;
    $item->state_id = $data->state_id;
    $item->city_id = $data->city_id;
    $item->update_at = date('Y-m-d H:i:s');
    
    if($item->updateUser() && $address->updateAddress()){
        echo json_encode("User data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>