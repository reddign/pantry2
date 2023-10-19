<?php
session_start(); 

//include '../includes/database_config.php';
include '../includes/config.php';
include '../data_src/includes/database_config.php';
require_once "../classes/LoginProcess.php";
require_once "../classes/DatabaseAPIConnection.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

global $api_key;
global $url;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $username = $_POST['username'];
    $apiUrl = $url."/data_src/api/user/create.php"; 
    $data = [
        "APIKEY" => $api_key,
        "username" => $username
    ];
/*
    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($apiUrl, false, $context);*/
    $result = DatabaseAPIConnection::post($apiUrl, $data);

    if ($result === FALSE) {
        $error = error_get_last();
        echo "HTTP request failed. Error was: " . $error['message'];
    }
    
    $response = json_decode($result, true);
    
    if ($response['status'] === 'success') {
        $success = LoginProcess::processLogin($username,$password,$url);
        if($success){
            header('Location: ../successPage.php'); 
        }else{
            header('Location: ../index.php'); 
        }
        exit;
    } elseif ($response['status'] === 'error') {
        $_SESSION['error'] = $response['message'];
        header('Location: ../index.php?page=register'); 
    }

    exit;
}

?>