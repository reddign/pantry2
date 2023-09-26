<?php
require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";
require_once "../../../../web_src/classes/GeneralContent.php";

// Check if the HTTP method is DELETE (or use GET/POST, as appropriate)
if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["message" => "Invalid HTTP method"]);
    exit;
}

// Input validation and sanitation
$admin_id = isset($_GET["admin_id"]) ? intval($_GET["admin_id"]) : 0;
$key = isset($_GET["APIKEY"]) ? $_GET["APIKEY"] : "";

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

// Delete data from the database with error handling
try {
    $params = [":admin_id" => $admin_id];
    $sql = "DELETE FROM adminsocialmedia WHERE admin_id = :admin_id";
    FoodDatabase::executeSQL($sql, $params);
    $message = ["message" => "Social Media Link Deleted Successfully"];
    echo json_encode($message);
} catch (PDOException $e) {
    // Handle database errors here
    http_response_code(500); // Internal Server Error
    echo json_encode(["message" => "Database Error: " . $e->getMessage()]);
}
?>
