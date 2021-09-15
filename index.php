<?php

require 'Contact.php';
require_once './cors.php';

$method = $_SERVER['REQUEST_METHOD'];

if($method == "GET"){
    $connection = new Contact();
    $data = $connection->getAllContacts();
    echo json_encode($data);
}

if($method == "DELETE"){
    $id = basename($_SERVER['REQUEST_URI']);
    $connection = new Contact();
    $delId = $connection->deleteContact($id);
    echo json_encode($delId);
}

if($method == "POST"){
    $data = json_decode(file_get_contents("php://input"), true);
    $username = $data['username'];
    $email = $data['email'];
    $connection = new Contact();
    $contact = $connection->createContact($username, $email);
    echo json_encode($contact);
}

if($method == "PUT"){
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];
    $username = $data['username'];
    $email = $data['email'];
    $connection = new Contact();
    $contact = $connection->updateContact($id, $username, $email);
    echo json_encode($contact);
}

