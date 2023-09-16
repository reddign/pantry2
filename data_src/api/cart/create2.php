<?PHP

require_once "../../includes/database_config.php";
require_once "../../classes/FoodDatabase.php";

$key = isset($_POST["APIKEY"])?$_POST["APIKEY"]:"";
$basketID = isset($_POST["basketID"])?$_POST["basketID"]:"";
$userID = isset($_POST["userID"])?$_POST["userID"]:"";

// Check if API Key matches
if($key != $GLOBAL_API_KEY){
  echo json_encode(["message"=>"Invalid API KEY"]);
  exit;
}

// Check if a basket exists for user
$userParams = [":userID" => $userID];
$usersql = "Select b.basketID from basket b join user u on (b.userID = u.userID) Where b.userID = :userID;";
$userData = FoodDatabase::getDataFromSQL($usersql, $usersql);

if (empty($userData)) { // If there is no basket for user, create one
    $basketParams = [":basketID" => $basketID, ":userID" => $userID];
    $basketsql = "Insert into basket (basketID, basketDate, userID) VALUES (:basketID, DATE_FORMAT(NOW(), '%Y-%m-%d'), :userID);";
    $data = FoodDatabase::executeSQL($basketsql, $basketParams);
    $message = ["basketID" => $basketID, "message" => "New Basket Created"];
} else {
    // If it already exists
    $message = ["basketID" => $basketID, "message" => "Using Current Basket"];
}

echo json_encode($message);

?>