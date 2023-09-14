<?php
include  '../includes/database_config.php';
include  '../includes/config.php';
include '../data_src/includes/database_config.php';
global $api_key;
global $url;
// reg.php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $username = $_POST['username'];
    $apiUrl = $url."../../data_src/api/user/create.php"; 
    echo $username;
    echo 'api key' .$api_key;
    echo $apiUrl;
    $data = [
        "APIKEY" => $api_key,
        "username" => $username
    ];

    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($apiUrl, false, $context);

    var_dump($result);
    
    $response = json_decode($result, true);
    var_dump($response);

    if (isset($response['userID'])) {
        echo "Successfully registered!";
        echo $response['userID'];
        // Successfully registered, you can redirect or show a success message
        header('Location: success_page.php'); // Redirect to a success page or whatever you like
        exit;
    } else {
        $errorMsg = $response['message'];
    }
}
