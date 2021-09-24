<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../../config/database.php';
    include_once '../../classes/User.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new User($db);
    
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
    
    if($item->deleteUser()){
        echo json_encode("User deleted.");
    } else{
        echo json_encode("Data could not be deleted");
    }
?>