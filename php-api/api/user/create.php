<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-city_id: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../../config/database.php';
    include_once '../../classes/User.php';
    include_once '../../classes/Address.php';


    $database = new Database();
    $db = $database->getConnection();

    $item = new User($db);
    $address = new Address($db);


    $data = json_decode(file_get_contents("php://input"));

    $item->name = $data->name;
    $item->state_id = $data->state_id;
    $item->city_id = $data->city_id;
    $address->user_id =  $item->createUser();
    $address->name = $data->address;
    
    if($address->user_id > 0){
    
        $address->createAddress();

        echo 'User created successfully.';
    } else{
        echo 'User could not be created.';
    }
