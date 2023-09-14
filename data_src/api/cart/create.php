<?php
// Include necessary dependencies
require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";

// Retrieve query parameters from the URL
$key = isset($_GET["APIKEY"]) ? $_GET["APIKEY"] : "";
$id = isset($_GET["productID"]) ? intval($_GET["productID"]) : "";
$quantity = isset($_GET["quantity"]) ? intval($_GET["quantity"]) : "";
$basket_id = isset($_GET["basketID"]) ? intval($_GET["basketID"]) : "";

// Check if the provided API key matches the global API key
if ($key != $GLOBAL_API_KEY) {
    echo json_encode(["message" => "Invalid API KEY"]);
    exit;
}

// Check if the product ID is valid
if ($id == "" || $id == 0) {
    echo json_encode(["message" => "No Product ID"]);
    exit;
}

// Check if the quantity is valid
if ($quantity == "" || $quantity == 0) {
    echo json_encode(["message" => "Invalid Quantity"]);
    exit;
}

// Check if the basket ID is valid
if ($basket_id == "" || $basket_id == 0) {
    echo json_encode(["message" => "No Basket ID"]);
    exit;
}

// Prepare an array of parameters for SQL queries
$params = [":id" => $id, ":quantity" => $quantity, ":basket_id" => $basket_id];

try {
    // Check if the product already exists in the cart
    $sqlCheck = "SELECT * FROM basketitem WHERE productID = :id AND BasketID = :basket_id";
    $result = FoodDatabase::executeSQL($sqlCheck, [":id" => $id, ":basket_id" => $basket_id]);

    if ($result !== false && $result->rowCount() > 0) {
        // If the product exists in the cart, update the quantity
        $sqlUpdate = "UPDATE basketitem SET Quantity = Quantity + :quantity WHERE productID = :id AND BasketID = :basket_id";
        FoodDatabase::executeSQL($sqlUpdate, $params);} 
    elseif ($result !== false) {
        // If the product doesn't exist in the cart, insert it as a new item
        $sqlInsert = "INSERT INTO basketitem (productID, Quantity, BasketID) VALUES (:id, :quantity, :basket_id)";
        FoodDatabase::executeSQL($sqlInsert, $params);}
    else {$message = ["message" => "Invalid value"];
        echo json_encode($message);}

    // Respond with a success message and HTTP status code 200 (OK)
    http_response_code(200);
    $message = ["message" => "Product Added to Cart"];
    echo json_encode($message);} 
    catch (PDOException $e) {
    
    // If there's a database error, respond with an error message and HTTP status code 500 (Internal Server Error)
    http_response_code(500);
    echo json_encode(["message" => "Database Error: " . $e->getMessage()]);}
?>