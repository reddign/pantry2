<?php
require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";
require_once "../../../../web_src/classes/GeneralContent.php";

// Check if the HTTP method is GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["message" => "Invalid HTTP method"]);
    exit;
}

// Input validation and sanitation
$admin_id = isset($_GET["admin_id"]) ? $_GET["admin_id"] : "";
$key = isset($_GET["APIKEY"]) ? $_GET["APIKEY"] : "";

if ($key !== $GLOBAL_API_KEY) {
    http_response_code(403); // Forbidden
    echo json_encode(["message" => "Invalid API KEY"]);
    exit;
}

try {
    if (!empty($admin_id)) {
        $where = " WHERE admin_id = :admin_id ";
        $params = [":admin_id" => $admin_id];
    } else {
        $where = "";
        $params = null;
    }

    $sql = "SELECT * FROM adminsocialmedia " . $where;
    $data = FoodDatabase::getDataFromSQL($sql, $params);

    // Wrap the data in a structured response
    $response = ["data" => $data];
    echo json_encode($response);
} catch (PDOException $e) {
    // Handle database errors here
    http_response_code(500); // Internal Server Error
    echo json_encode(["message" => "Database Error: " . $e->getMessage()]);
}
?>
