<?php
require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";
require_once "../../../../web_src/classes/GeneralContent.php";

// Input validation and sanitation
$admin_id = isset($_POST["admin_id"]) ? $_POST["admin_id"] : "";
$facebook = isset($_POST["facebook"]) ? $_POST["facebook"] : "";
$instagram = isset($_POST["instagram"]) ? $_POST["instagram"] : "";
$twitter = isset($_POST["twitter"]) ? $_POST["twitter"] : "";
$snapchat = isset($_POST["snapchat"]) ? $_POST["snapchat"] : "";
$pinterest = isset($_POST["pinterest"]) ? $_POST["pinterest"] : "";
$linkedin = isset($_POST["linkedin"]) ? $_POST["linkedin"] : "";
$key = isset($_POST["APIKEY"]) ? $_POST["APIKEY"] : "";

if ($key !== $GLOBAL_API_KEY) {
    echo json_encode(["message" => "Invalid API KEY"]);
    exit;
}

// Data for insertion
$params = [
    ":admin_id" => $admin_id,
    ":facebook" => $facebook,
    ":instagram" => $instagram,
    ":twitter" => $twitter,
    ":snapchat" => $snapchat,
    ":pinterest" => $pinterest,
    ":linkedin" => $linkedin
];

// Insert data into the database with error handling
try {
    $sql = "INSERT INTO adminsocialmedia (admin_id, facebook, instagram, twitter, snapchat, pinterest, linkedin) VALUES (:admin_id, :facebook, :instagram, :twitter, :snapchat, :pinterest, :linkedin)";
    FoodDatabase::executeSQL($sql, $params);
    $message = ["message" => "Social Media Created Successfully"];
    echo json_encode($message);
} catch (PDOException $e) {
    // Handle database errors here
    echo json_encode(["message" => "Database Error: " . $e->getMessage()]);
}
?>
