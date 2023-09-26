<?php
// Headers for PUT Request
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-type, Access-Control-Allow-Origin, Authorization, X-Requested-With");

// Check if the HTTP method is PUT
if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["message" => "Invalid HTTP method"]);
    exit;
}

$data = file_get_contents("php://input") != null ? json_decode(file_get_contents("php://input")) : die();


require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";
require_once "../../../../web_src/classes/GeneralContent.php";

// Input validation and sanitation
$admin_id = isset($data->admin_id) ? $data->admin_id : 0;
$facebook = isset($data->facebook) ? $data->facebook : "";
$instagram = isset($data->instagram) ? $data->instagram : "";
$twitter = isset($data->twitter) ? $data->twitter : "";
$snapchat = isset($data->snapchat) ? $data->snapchat : "";
$pinterest = isset($data->pinterest) ? $data->pinterest : "";
$linkedin = isset($data->linkedin) ? $data->linkedin : "";
$key = isset($data->APIKEY) ? $data->APIKEY : "";

if ($key !== $GLOBAL_API_KEY) {
    http_response_code(403); // Forbidden
    echo json_encode(["message" => "Invalid API KEY"]);
    exit;
}

if ($admin_id === 0) {
    http_response_code(400); // Bad Request
    echo json_encode(["message" => "Invalid Admin ID"]);
    exit;
}

try {
    $params = [
        ":admin_id" => $admin_id,
        ":facebook" => $facebook,
        ":instagram" => $instagram,
        ":twitter" => $twitter,
        ":snapchat" => $snapchat,
        ":pinterest" => $pinterest,
        ":linkedin" => $linkedin
    ];
    
    $sql = "UPDATE adminsocialmedia SET facebook = :facebook, instagram = :instagram, twitter = :twitter, snapchat = :snapchat, pinterest = :pinterest, linkedin = :linkedin WHERE admin_id = :admin_id";
    
    $status = FoodDatabase::executeSQL($sql, $params);
    
    if ($status) {
        echo json_encode(["message" => "✅ Social Media Updated!"]);
    } else {
        echo json_encode(["message" => "❌ Cannot Update!"]);
    }
} catch (PDOException $e) {
    // Handle database errors here
    http_response_code(500); // Internal Server Error
    echo json_encode(["message" => "Database Error: " . $e->getMessage()]);
}
?>
