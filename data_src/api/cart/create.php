<?PHP

require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";
require_once "../../classes/Validator.php";

// Validate
$schema = [
	'userID' => ['required' => true],
];

$validator = new Validator($schema, $_POST);
$validator->validate();

// Check API
$key = isset($_POST["APIKEY"]) ? $_POST["APIKEY"] : "";
if ($key != $GLOBAL_API_KEY) {
    echo json_encode(["message"=>"Invalid API KEY"]);
    exit;
}
$userID = $_POST["userID"];

// Check if a basket exists for user
$userParams = [":userID" => $userID];
$usersql = "Select b.basketID from basket b join user u on (b.userID = u.userID) Where b.userID = :userID;";
$userData = FoodDatabase::getDataFromSQL($usersql, $userParams);

if (!$userData) { // If there is no basket for user, create one
    $basketParams = [":userID" => $userID];
    $basketsql = "Insert into basket (basketDate, userID) VALUES (DATE_FORMAT(NOW(), '%Y-%m-%d'), :userID);";
    $data = FoodDatabase::executeSQL($basketsql, $basketParams, true);
    // New Basket Created message and Return new basketID
    $message = ["message" => "New Basket Created", "basketID" => $data];
} else {
    // If it already exists
    $message = ["message" => "Using Current Basket", "basketID" => $userData[0]["basketID"]];
}

echo json_encode($message);

?>